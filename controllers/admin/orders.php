<?php


class orders extends Controller
{
    function __construct()
    {
        $this->loadModel("order");
        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {
        $data = $this->model->getInitialInfo();

        $this->view("admin/orders/index", $data,
            "admin", "admin");
    }

    function details($orderId)
    {
        $data['mode'] = "view";
        $result = $this->model->findOrderById($orderId);
        $data['order'] = $result['order'];
        $data['files'] = $result['files'];
        $this->view("admin/orders/details", $data,
            "admin", "admin");
    }


    function edit($orderId)
    {
        $data['mode'] = "edit";
        $result = $this->model->findOrderById($orderId);
        $data['order'] = $result['order'];
        $data['files'] = $result['files'];
        $this->view("admin/orders/details", $data,
            "admin", "admin");
    }

    function getOrdersByStatus($status, $page)
    {
        $result = $this->model->getOrdersByStatus($status, $page);

        $data['orders'] = $result['orders'];

        ob_start();
        $this->view("admin/orders/_orderRows", $data, "admin",
            "admin", false, false, false, false);
        $html = ob_get_clean();

        echo json_encode([
            'orders' => $html,
            'totalCount' => $result['totalCount']
        ], JSON_UNESCAPED_UNICODE);
    }

    function searchOrders($page)
    {
        $tracking_code = Helper::sanitize($_GET['tracking'] ?? '');
        $full_name = Helper::sanitize($_GET['user'] ?? '');
        $service = trim($_GET['service'] ?? '');

        $validation = true;
        $error = '';
        if ($tracking_code == '' && $full_name == '' && ($service == '' || $service == 'ALL')) {
            $validation = false;
            $error = 'برای جستجو باید حداقل یک فیلد را پر کنید.';
        }
        if (!in_array($service, ALLOWED_SERVICES, true) && $service != "ALL") {
            $validation = false;
            $error = 'خدمت انتخاب شده معتبر نیست.';
        }
        if (!$validation) {
            echo json_encode([
                'type' => 'error',
                'errorMsg' => $error
            ], JSON_UNESCAPED_UNICODE);
        } else {
            try {
                $result = $this->model->searchOrders($tracking_code, $full_name, $service, $page);

                $data['orders'] = $result['orders'];
                ob_start();
                $this->view("admin/orders/_orderRows", $data, "admin",
                    "admin", false, false, false, false);
                $html = ob_get_clean();

                echo json_encode([
                    'type' => 'success',
                    'orders' => $html,
                    'totalCount' => $result['totalCount']
                ], JSON_UNESCAPED_UNICODE);

            } catch (Exception $e) {

                echo json_encode([
                    'type' => 'error',
                    'errorMsg' => $e->getMessage()
                ], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    function downloadOrderFile($fileId)
    {
        $file = $this->model->getOrderFileById($fileId);
        Helper::downloadFile($file);
    }

    function manageOrderByAdmin($id)
    {

        $validationResult = $this->validator($_POST);
        $post = $validationResult['data'];
        $isValid = $validationResult['success'];
        $errors = $validationResult['errors'];

        if (!$isValid) {

            $data = $this->prepareForView($id, $post);
            $data['errors'] = $errors;

            $this->view("admin/orders/details", $data,
                "admin", "admin");
            return;
        }


        /*
           =========================
           Save- update
           =========================
           */
        Model::sessionInit('UNIYAR_ADMIN');
        $adminId = Model::sessionGet("adminId");
        $_SESSION['alert-resultOperationFromAdmin'] =
            $this->model->manageOrderByAdmin($id, $adminId, $post);
        $_SESSION['operationFromAdmin'] = "manageOrder";


        if ($_SESSION['alert-resultOperationFromAdmin']['type'] === 'success')
            header("Location:" . URL . "admin/orders");
        else {

            $data = $this->prepareForView($id, $post);
            $data['errors'] = [];

            $this->view("admin/orders/details", $data,
                "admin", "admin");
        }
    }

    function validator($post)
    {
        $isValid = true;
        $errors = [];

        $post['title'] = Helper::sanitize($post['title'] ?? '');

        $post['description'] = Helper::cleanTechDescription(
            $post['description'] ?? ''
        );

        $post['status'] = Helper::sanitize($post['status'] ?? '');

        $post['progress_percent'] =
            Helper::sanitize($post['progress_percent'] ?? '');

        $post['agreed_price'] =
            Helper::sanitize($post['agreed_price'] ?? '');

        $post['final_delivery_date'] =
            Helper::sanitize($post['final_delivery_date'] ?? '');

        $post['admin_note'] =
            Helper::sanitize($post['admin_note'] ?? '');


        if ($post['status'] !== '' && !in_array($post['status'], ALLOWED_ORDER_STATUSES, true)) {
            $errors['status'] = 'وضعیت انتخاب شده معتبر نیست.';
            $isValid = false;
        }

        if ($post['progress_percent'] !== '' && !in_array($post['progress_percent'], ALLOWED_ORDER_PRPGRESS_PERCENT, true)) {
            $errors['progress_percent'] = 'میزان پیشرفت انتخاب شده؛ معتبر نیست.';
            $isValid = false;

        }


        if ($post['agreed_price'] !== '') {
            if (!is_numeric($post['agreed_price'])) {
                $isValid = false;
                $errors['agreed_price'] = 'قیمت باید عدد باشد.';
            } else {
                $post['agreed_price'] = Helper::convert2english($post['agreed_price']);
                if (!ctype_digit($post['agreed_price']) || (int)$post['agreed_price'] <= 0) {
                    $isValid = false;
                    $errors['agreed_price'] = 'قیمت باید یک عدد صحیح بزرگ‌تر از صفر باشد.';
                }
            }
        }

        $final_delivery_date = trim($post['final_delivery_date'] ?? '');
        if ($final_delivery_date !== '') {
            $miladiFinalDeliveryDate = Helper::jaliliToMiladi($final_delivery_date);

            $finalDeliveryDateObj = DateTime::createFromFormat('Y-m-d', $miladiFinalDeliveryDate);
            $today = new DateTime('today');

            if (!$finalDeliveryDateObj) {
                $isValid = false;
                $errors['final_delivery_date'] = 'تاریخ تحویل معتبر نیست.';

            } else {
                if ($finalDeliveryDateObj < $today && $post['status'] !== "COMPLETED") {
                    $isValid = false;
                    $errors['final_delivery_date'] =
                        'تاریخ تحویل نمی‌تواند قبل از امروز باشد.';

                }
                $post['final_delivery_date'] = $miladiFinalDeliveryDate;

            }
        } else {

            $post['final_delivery_date'] = null;
        }


        if ($post['service_type'] === "DEBUG") {
            $post['first_price'] = trim($post['first_price'] ?? '');
            if ($post['first_price'] !== '') {
                if (!is_numeric($post['first_price'])) {
                    $isValid = false;
                    $errors['first_price'] = 'قیمت باید عدد باشد.';
                } else {
                    $post['first_price'] = Helper::convert2english($post['first_price']);
                    if (!ctype_digit($post['first_price']) || (int)$post['first_price'] <= 0) {
                        $isValid = false;
                        $errors['first_price'] = 'قیمت باید یک عدد صحیح بزرگ‌تر از صفر باشد.';
                    }
                }
            }

            $delivery_date = trim($post['delivery_date'] ?? '');
            if ($delivery_date !== '') {
                $miladiDeliveryDate = Helper::jaliliToMiladi($delivery_date);

                $deliveryDateObj = DateTime::createFromFormat('Y-m-d', $miladiDeliveryDate);
                $today = new DateTime('today');

                if (!$deliveryDateObj) {
                    $isValid = false;
                    $errors['delivery_date'] = 'تاریخ تحویل معتبر نیست.';

                } else{
                    if ($deliveryDateObj < $today && $post['status'] !== "COMPLETED") {
                        $isValid = false;
                        $errors['delivery_date'] =
                            'تاریخ تحویل نمی‌تواند قبل از امروز باشد.';
                    }
                $post['delivery_date'] = $miladiDeliveryDate;
            }

            } else {

                $post['delivery_date'] = null;
            }
        }


        return [
            'success' => $isValid,
            'data' => $post,
            'errors' => $errors
        ];
    }

    function prepareForView($id, $post)
    {
        $result = $this->model->findOrderById($id);

        $result['order']['order_title'] = $post['title'];
        $result['order']['description'] = $post['description'];
        $result['order']['status'] = $post['status'];
        $result['order']['progress_percent'] = $post['progress_percent'];
        $result['order']['agreed_price'] = $post['agreed_price'];
        $result['order']['final_delivery_date'] = $post['final_delivery_date'];

        $result['order']['admin_note'] = $post['admin_note'];

        if ($post['service_type'] === "DEBUG") {
            $result['order']['first_price'] = $post['first_price'];
            $result['order']['delivery_date'] = $post['delivery_date'];
        }

        $data['mode'] = 'edit';
        $data['order'] = $result['order'];
        $data['files'] = $result['files'];
        $data['hasError'] = true;
        return $data;
    }

}
