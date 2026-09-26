<?php

//require_once 'core/const.php';

class model_order extends Model
{
    private const ORDER_LIST_QUERY = "select orders.id,full_name ,tracking_code,
      services.type as service_type, orders.title as order_title,
      service_items.title as project_type ,status , orders.created_at as submission_date
         from orders INNER JOIN customers on orders.customer_id=customers.id
          INNER JOIN services on orders.service_id=services.id 
           LEFT  JOIN service_items on orders.service_items_id=service_items.id";

    function __construct()
    {
        parent::__construct();
    }

    function findService_id($service)
    {
        $service = $this->myFetch(
            "SELECT id FROM services WHERE type=?", [$service]);

        if (!$service) {
            throw new Exception("نوع خدمت معتبر نیست.");
        }

        return $service['id'];
    }

    function findCustomer_id($full_name)
    {
        $customer = $this->myFetch(
            "SELECT id FROM customers WHERE full_name=?", [$full_name]);

        if (!$customer) {
            throw new Exception("کابر معتبر نیست.");
        }

        return $customer['id'];
    }
//<!--=========================
//SITE section
//=========================-->
    function getOrderByTrackingCode($code)
    {

        $sql = "select full_name, mobile,email,orders.id as order_id, major,level,
orders.title as title,tracking_code,
  orders.description, delivery_date,first_price,services.type as service_id ,
  service_items_id,has_file,customer_id, teaching_type from orders,services,customers  where tracking_code=?
   and orders.service_id=services.id and orders.customer_id=customers.id";
        $order = $this->myFetch($sql, [$code]);
        if (!$order) {
            return null;
        }

        if ($order['service_items_id']) {
            $sql = "select service_items.title as project_category from  
 service_items where id=?";
            $res = $this->myFetch($sql, [$order['service_items_id']]);
            $order['project_category'] = $res['project_category'] ?? null;

        }
        if ($order['has_file']) {
            $sql = "select original_name,id as file_id,stored_name,path  from order_files
      where order_id=?";

            $files = $this->myFetchAll($sql, [$order['order_id']]);

        }
        $order['files'] = $files ?? [];
        return $order;

    }

    /* ======================
        shared primary works For Insert and Edit
        ====================== */
    function preWorksForAdd_Edit(&$post, $files)
    {
        /*
        =========================
        Service
        =========================
        */

//        $service = $this->myFetch(
//            "SELECT id FROM services WHERE type=?",
//            [$post['service_id']]
//        );
//
//        if (!$service) {
//            throw new Exception("نوع خدمت معتبر نیست.");
//        }
//
//        $service_id = $service['id'];
        $service_id = $this->findService_id($post['service_id']);

        /*
        =========================
        Project category + delivery --> service_items_id
        =========================
        */

        if ($post['service_id'] === "PROJECT") {

            $serviceItem = $this->myFetch(
                "SELECT id FROM service_items WHERE title=?",
                [$post['project_category']]
            );

            if (!$serviceItem) {
                throw new Exception("دسته‌بندی پروژه معتبر نیست.");
            }

            $serviceItem_id = $serviceItem['id'];

            $delivery_date =
                Helper::jaliliToMiladi(
                    $post['delivery_date']
                );

        } else {

            $serviceItem_id = null;
            $delivery_date = null;
        }


        /*
        =========================
        Files
        =========================
        */
        $order_files = [];
        if (($post['service_id'] === "PROJECT" || $post['service_id'] === "DEBUG") && !empty($files))

            if ($files[0]['filename'] || $files[0]['filename'] != '') {
                $order_files = $files;
            } else {
                $order_files = [];
            }
        if (($post['service_id'] === "PROJECT" || $post['service_id'] === "DEBUG") && empty($files))

            $order_files = [];


        return [
            'service_id' => $service_id,
            'serviceItem_id' => $serviceItem_id,
            'delivery_date' => $delivery_date,
            'order_files' => $order_files
        ];
    }

    function addFromSite($post, $files)
    {

        //<!--=========================
        //fetch or create customer
        //=========================-->
        self::$conn->beginTransaction();
        $sqlSearchUser = "select id, full_name from customers where mobile=?";
        $customer = $this->myFetch($sqlSearchUser, [$post['mobile']]);
        if (!empty($customer)) {
            if ($customer['full_name'] === $post['full_name'])
                $customerId = $customer['id'];
            else {
                self::$conn->rollBack();
                if (!empty($files)) {
                    $oldDirRelative = 'public/files/orders/' .
                        $post['full_name'] . '_' . $post ['title'];

                    $oldDir = ROOT_PATH . $oldDirRelative;

                    Helper::deleteDir($oldDir, true);
                }
                return [
                    'type' => 'error',
                    'title' => 'عملیات ناموفق',
                    'message' => 'این شماره موبایل قبلا به نام دیگری ثبت شده است.',
                    'tracking' => null
                ];
            }
        } else {
            $sql = "insert into customers (full_name, mobile,email) values (?,?,?)";
            $this->doQuery($sql, [$post['full_name'], $post['mobile'], $post['email']]);
            $customerId = Model::lastInsertId();
        }

        /*
           =========================
            Prepare data
           =========================
         */

        $result = $this->preWorksForAdd_Edit(
            $post,
            $files
        );

        //<!--=========================
        //INSERT
        //=========================-->

        try {

            $mainSql = "insert into orders (service_id,service_items_id,title,
             description,major,level,first_price, delivery_date,teaching_type,
             customer_id)  values (?,?,?,?,?,?,?,?,?,?)";
            $this->doQuery($mainSql, [$result['service_id'], $result['serviceItem_id'],
                $post['title'], $post['description'], $post['major'], $post['level'],
                $post['first_price'] ?? null, $result['delivery_date'], $post['teaching_type'] ?? null,
                $customerId]);


            //save order's files
            $orderId = Model::lastInsertId();
            $hasFile = false;
            $order_files = $result['order_files'];

            if (($post['service_id'] === "DEBUG" || $post['service_id'] === "PROJECT") && !empty($order_files)) {
                $hasFile = true;

                if ($hasFile) {

                    $newDirRelative = 'public/files/orders/' .
                        $customerId . '_' . $orderId;
                    $oldDirRelative = 'public/files/orders/' .
                        $post['full_name'] . '_' . $post ['title'];

                    $oldDir = ROOT_PATH . $oldDirRelative;
                    $newDir = ROOT_PATH . $newDirRelative;

                    if (!rename($oldDir, $newDir)) {
                        throw new Exception(
                            "تغییر نام پوشه انجام نشد."
                        );
                    }
                    $fileSql = "insert into order_files (order_id,original_name,stored_name
                   ,file_size, file_type ,path) values (?,?,?,?,?,?)";

                    foreach ($order_files as $file) {

                        $this->doQuery($fileSql, [$orderId, $file['originalName'], $file['filename'],
                            $file['fileSize'], $file['fileType'], $newDirRelative . '/' . $file['filename']]);
                    }
                }
            }
            do {
                $trackingCode = random_int(1000000, 9999999);
                $sql = "select id from orders where tracking_code=?";
                $repeated = $this->myFetch($sql, [$trackingCode]);
            } while ($repeated);
            $trackingCode = 'UY-' . $trackingCode;
            $trckCodeSql = "update orders set tracking_code=? , has_file=? where id=?";
            $this->doQuery($trckCodeSql, [$trackingCode, $hasFile, $orderId]);

            self::$conn->commit();
            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => 'درخواست شما با موفقیت با کد رهگیری' . $trackingCode . 'ثبت شد.',
                'tracking' => $trackingCode
            ];


        } catch (Exception $e) {

            if (self::$conn->inTransaction()) {
                self::$conn->rollBack();
            }
            echo $e;
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'ثبت درخواست شما با خطا مواجه شد.لطفا مجددا تلاش کنید.',
                'tracking' => null
            ];

        }

    }


    function updateFromSite($post, $files)
    {
        self::$conn->beginTransaction();

        try {

            /*
            =========================
            Prepare data
            =========================
            */
            $result = $this->preWorksForAdd_Edit($post, $files);
            /*
            =========================
            Update customer
            =========================
            */
            $customerSql = "UPDATE customers SET full_name = ?, mobile = ?,email = ?
            WHERE id = ?";

            $this->doQuery($customerSql, [$post['full_name'], $post['mobile'],
                $post['email'], $post['customerId']]);
            /*
            =========================
            Update order
            =========================
            */
            $previousServiceId = $this->myFetch("SELECT service_id FROM orders 
                WHERE id=?", [$post['orderId']]);

            $mainSql = "UPDATE orders SET service_id = ?, service_items_id = ?,
                title = ?,description = ?, major = ?, level = ?, first_price = ?,
                delivery_date = ?, teaching_type = ?  WHERE id = ?";

            $this->doQuery($mainSql, [$result['service_id'], $result['serviceItem_id'],
                $post['title'], $post['description'], $post['major'], $post['level'],
                $post['first_price'] ?? null, $result['delivery_date'],
                $post['teaching_type'] ?? null, $post['orderId']]);
            /*
            =========================
            deleted previous files if service was changed to consult or teach
            =========================
            */
            if ($post['service_id'] === 'TEACH' || $post['service_id'] === 'CONSULT') {
                //   unlink(ROOT_PATH . $path);
                $filesToDelete = $this->myFetchAll("select path from order_files where order_id=?", [$post['orderId']]);
                foreach ($filesToDelete as $file) {

                    if (!empty($file['path']) && file_exists($file['path']))
                        unlink($file['path']);
                }
                $this->doQuery("DELETE FROM order_files WHERE order_id=?", [$post['orderId']]);
            }
            /*
            =========================
            previous previous files if service was changed from project to debug or reverse
            =========================
            */

            if (($post['service_id'] === 'DEBUG' && $previousServiceId === 'PROJECT')
                || ($post['service_id'] === 'PROJECT' && $previousServiceId === 'DEBUG')) {
                $filesToDelete = $this->myFetchAll("select path from order_files where order_id=?", [$post['orderId']]);
                foreach ($filesToDelete as $file) {

                    if (!empty($file['path']) && file_exists($file['path']))
                        unlink($file['path']);
                }
                $this->doQuery("DELETE FROM order_files WHERE order_id=?", [$post['orderId']]);
            }
            /*
            =========================
            Insert new files
            =========================
            */
            if (($post['service_id'] === 'PROJECT' || $post['service_id'] === 'DEBUG')
                && !empty($result['order_files'])) {

                $fileSql = "INSERT INTO order_files(order_id,original_name,stored_name,
                    file_size, file_type,path) VALUES (?, ?, ?, ?, ?, ?)";

                foreach ($result['order_files'] as $file) {

                    $this->doQuery($fileSql, [$post['orderId'], $file['originalName'],
                        $file['filename'], $file['fileSize'], $file['fileType'],
                        $file['path']]);
                }
            }


            /*
            =========================
            Delete removed files
            =========================
            */

            $deletedFiles = json_decode(
                $post['deleted_files'] ?? '[]',
                true
            );

            if (!is_array($deletedFiles)) {
                $deletedFiles = [];
            }

            if (!empty($deletedFiles)) {

                $placeholders = implode(
                    ',',
                    array_fill(
                        0,
                        count($deletedFiles),
                        '?'
                    )
                );

                $sql = "DELETE FROM order_files WHERE id IN ($placeholders) AND order_id = ? ";

                $this->doQuery($sql, array_merge($deletedFiles, [$post['orderId']]));
            }
            $fileCount = $this->myFetch(
                "SELECT COUNT(*) AS count FROM order_files WHERE order_id=?",
                [$post['orderId']]);

            $hasFile = ((int)$fileCount['count'] > 0);

            $this->doQuery("UPDATE orders SET has_file=? WHERE id=?",
                [$hasFile, $post['orderId']]
            );

            /*
            =========================
            Commit
            =========================
            */

            self::$conn->commit();

            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => 'درخواست شما با موفقیت ویرایش شد.'
            ];

        } catch (Exception $e) {

            if (self::$conn->inTransaction()) {
                self::$conn->rollBack();
            }

            // برای توسعه موقتاً:
            // error_log($e->getMessage());
            echo $e;
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'ویرایش درخواست شما با خطا مواجه شد.'
            ];
        }
    }




    //<!--=========================
//ADMIN PANEL section
//=========================-->

    function getInitialInfo()
    {
        $pendingCount = $this->myFetch("select count(*) as pendingCount from orders 
 where status = ?", ['PENDING'])['pendingCount'];
        $reviewingCount = $this->myFetch("select count(*) as reviewingCount from orders 
 where status = ?", ['REVIEWING'])['reviewingCount'];
        $inProgressCount = $this->myFetch("select count(*) as inProgressCount from orders 
 where status = ?", ['IN_PROGRESS'])['inProgressCount'];
        $completedCount = $this->myFetch("select count(*) as completedCount from orders 
 where status = ?", ['COMPLETED'])['completedCount'];
        $canceledCount = $this->myFetch("select count(*) as canceledCount from orders 
 where status = ?", ['CANCELED'])['canceledCount'];

        $totalCount = $this->myFetch("select count(*) as totalCount from orders")['totalCount'];

        $sql = self::ORDER_LIST_QUERY . " ORDER BY orders.created_at DESC limit " . ItemsPerPage;
        $orders = $this->myFetchAll($sql);
        return [
            'pendingCount' => $pendingCount,
            'reviewingCount' => $reviewingCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'canceledCount' => $canceledCount,
            'totalCount' => $totalCount,
            'orders' => $orders];

    }

    function getOrdersByStatus($status = "ALL", $page)
    {
        $offset = ($page - 1) * ItemsPerPage;
        if ($status == "ALL")
            return $this->getPageOrders($page);

        else {
            $filteredOrdersCount = $this->myFetch("select count(*) as totalCount from orders 
           where status = ?", [$status])['totalCount'];

            $sql = self::ORDER_LIST_QUERY . " WHERE orders.status=? ORDER BY orders.created_at DESC 
           LIMIT " . ItemsPerPage . " OFFSET " . $offset;
            $orders = $this->myFetchAll($sql, [$status]);
            return [
                'totalCount' => $filteredOrdersCount,
                'orders' => $orders,
            ];
        }
    }

    function getPageOrders($page = 1)
    {
        $offset = ($page - 1) * ItemsPerPage;
        $totalOrdersCount = $this->myFetch("select count(*) as totalCount from orders")['totalCount'];

        $sql = self::ORDER_LIST_QUERY . " ORDER BY orders.created_at DESC  LIMIT " . ItemsPerPage . " OFFSET " . $offset;
        $orders = $this->myFetchAll($sql);
        return [
            'totalCount' => $totalOrdersCount,
            'orders' => $orders,
        ];

    }

    function searchOrders($tracking_code, $full_name, $service, $page)
    {

        if ($tracking_code && $tracking_code != '')
            $result = $this->findByTracking($tracking_code, $page);

        else {
            if ($full_name != '' && ($service == '' || $service == 'ALL')) {
                $searchItem = 'user';
                $result = $this->findByOneAttribute($searchItem, $full_name, $page);
            }
            if ($full_name == '' && ($service != '' && $service != 'ALL')) {
                $searchItem = 'service';
                $result = $this->findByOneAttribute($searchItem, $service, $page);
            }
            if ($full_name != '' && ($service != '' && $service != 'ALL')) {
                $result = $this->findByServiceAndCustomer($service, $full_name, $page);
            }
        }
        return [
            'totalCount' => $result['totalCount'],
            'orders' => $result['orders'],
        ];

    }


    function findByTracking($tracking_code, $page)
    {
        $offset = ($page - 1) * ItemsPerPage;

        $totalCount = $this->myFetch("select count(*) as totalCount from orders
               where tracking_code=?", [$tracking_code])['totalCount'];

        $sql = self::ORDER_LIST_QUERY . " WHERE tracking_code=?
          ORDER BY orders.created_at DESC  LIMIT " . ItemsPerPage . " OFFSET " . $offset;
        $orders = $this->myFetchAll($sql, [$tracking_code]);

        return [
            'totalCount' => $totalCount,
            'orders' => $orders
        ];
    }

    function findOrderById($orderId)
    {

        $sql = "select full_name, mobile,email,
        orders.id,tracking_code,major,level,
      services.type as service_type, orders.title as order_title,
      service_items.title as project_type ,status , orders.created_at as submission_date,
      orders.description, delivery_date,final_delivery_date,first_price,agreed_price,
      progress_percent,admin_note,has_file
         from orders INNER JOIN customers on orders.customer_id=customers.id
          INNER JOIN services on orders.service_id=services.id 
           LEFT  JOIN service_items on orders.service_items_id=service_items.id
          WHERE orders.id=?";
        $order = $this->myFetch($sql, [$orderId]);
        $files = [];
        if ($order['has_file']) {
            $files = $this->myFetchAll("select id,original_name,path from order_files
         where order_id=?", [$orderId]);
        }
        return [
            'order' => $order,
            'files' => $files
        ];

    }

    function findByServiceAndCustomer($service, $full_name, $page)
    {
        $offset = ($page - 1) * ItemsPerPage;

        $service_id = $this->findService_id($service);
        $customer_id = $this->findCustomer_id($full_name);

        $totalCount = $this->myFetch("select count(*) as totalCount from orders
               where service_id=? and customer_id=?", [$service_id, $customer_id])['totalCount'];

        $sql = self::ORDER_LIST_QUERY . " WHERE orders.service_id=? and orders.customer_id=?
          ORDER BY orders.created_at DESC  LIMIT " . ItemsPerPage . " OFFSET " . $offset;
        $orders = $this->myFetchAll($sql, [$service_id, $customer_id]);

        return [
            'totalCount' => $totalCount,
            'orders' => $orders
        ];
    }

    function findByOneAttribute($searchItem, $value, $page)
    {
        $offset = ($page - 1) * ItemsPerPage;

        if ($searchItem == 'service') {
            $value_id = $this->findService_id($value);
            $column = 'service_id';
        }
        if ($searchItem == 'user') {
            $value_id = $this->findCustomer_id($value);
            $column = 'customer_id';
        }

        $totalCount = $this->myFetch("select count(*) as totalCount from orders
               where  $column=?", [$value_id])['totalCount'];

        $sql = self::ORDER_LIST_QUERY . " WHERE orders.$column=?
          ORDER BY orders.created_at DESC  LIMIT " . ItemsPerPage . " OFFSET " . $offset;
        $orders = $this->myFetchAll($sql, [$value_id]);

        return [
            'totalCount' => $totalCount,
            'orders' => $orders
        ];
    }

    function getOrderFileById($fileId)
    {
        return $this->myFetch(
            "SELECT id, original_name, stored_name, path
         FROM order_files  WHERE id=?", [$fileId]
        );
    }

    function manageOrderByAdmin($id, $adminId, $post)
    {
        try {
            if($post['service_type']==="DEBUG") {
                $sql = "update orders set title=? , description=? , status=? , agreed_price=?,
            final_delivery_date= ? , progress_percent=? , admin_note=? , delivery_date=? ,
             first_price=? , handled_by_admin_id=? where id=?";
                $this->doQuery($sql, [$post['title'], $post['description'], $post['status'],
                    $post['agreed_price'] ?? null, $post['final_delivery_date'], $post['progress_percent'],
                    $post['admin_note'], $post['delivery_date'], $post['first_price'], $adminId, $id]);
            }
            else{
                $sql = "update orders set title=? , description=? , status=? , agreed_price=?,
            final_delivery_date= ? , progress_percent=? , admin_note=? , handled_by_admin_id=? where id=?";
                $this->doQuery($sql, [$post['title'], $post['description'], $post['status'],
                    $post['agreed_price'] ?? null, $post['final_delivery_date'], $post['progress_percent'],
                    $post['admin_note'], $adminId, $id]);

            }
            return [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => 'درخواست با موفقیت ویرایش شد.'
            ];

        } catch (Exception $e) {

            // برای توسعه موقتاً:
            // error_log($e->getMessage());
            return [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'ویرایش درخواست با خطا مواجه شد.'
            ];
        }
    }
    function delete($id){
        $sql="delete from orders where id=?";
        $this->doQuery($sql,[$id]);

    }
}
