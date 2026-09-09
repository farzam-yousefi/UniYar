<?php

require_once 'core/const.php';

class model_order extends Model
{

    function __construct()
    {
        parent::__construct();
    }

//<!--=========================
//SITE section
//=========================-->
    function getOrderByTrackingCode($code)
    {

        $sql = "select full_name, mobile,email,orders.id as 'order_id', major,level,
orders.title as 'title',tracking_code,
  orders.description, delivery_date,first_price,services.type as service_id ,
  service_items_id,has_file,customer_id, teaching_type from orders,services,customers  where tracking_code=?
   and orders.service_id=services.id and orders.customer_id=customers.id";
        $order = $this->myFetch($sql, [$code]);
        if (!$order) {
            return null;
        }

        if ($order['service_items_id']) {
            $sql = "select service_items.title as 'project_category' from  
 service_items where id=?";
            $res = $this->myFetch($sql, [$order['service_items_id']]);
            $order['project_category'] = $res['project_category'] ?? null;

        }
        if ($order['has_file']) {
            $sql = "select original_name,id as 'file_id',stored_name,path  from order_files
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

        $service = $this->myFetch(
            "SELECT id FROM services WHERE type=?",
            [$post['service_id']]
        );

        if (!$service) {
            throw new Exception("نوع خدمت معتبر نیست.");
        }

        $service_id = $service['id'];


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
if(!empty($files)) {
    $oldDirRelative = 'public/files/orders/' .
        $post['full_name'] . '_' . $post ['title'];

    $oldDir = ROOT_PATH . $oldDirRelative;

    Helper::deleteDir($oldDir,true);
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
            $trackingCode='UY-'.$trackingCode;
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


}
