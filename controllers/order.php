<?php
require_once 'core/helper.php';
require_once 'core/const.php';

class Order extends Controller
{
    function __construct()
    {
        //   $this->loadModel("order");

    }

    function index($type = "general")
    {
        $data['mode'] = "add";
        $data['service_type'] = $type;
        $this->view("order/index", $data);
    }

    /*
     =========================
      for پیگیری / ویرلیش btn in header
     =========================
    */

    function edit()
    {
        Model::sessionInit('UNIYAR_SITE');
        $returnUrl = trim($_GET['return_url'] ?? '');
        $trackingCode = $_GET['trackingCode'] ?? '';

        // اگر return_url وجود نداشت
        if (empty($returnUrl)) {
            $returnUrl = URL . 'index';
        }

        // فقط اجازه redirect به داخل خود پروژه
        //for develop // after you should delete second condition
        if (!(str_starts_with($returnUrl, URL) || str_starts_with($returnUrl, '/uniyar'))) {

            $returnUrl = URL . 'index';
        }
        //validation

        if ($trackingCode == '') {
            // این اطلاعات را برای صفحه مقصد نگه می‌داریم
            $_SESSION['trackingCode_errors'] = "کد پیگیری را وارد کنید.";
            $_SESSION['open_trackingModal'] = true;

            header('Location: ' . $returnUrl);
            exit;
        }

        $result = $this->model->getOrderByTrackingCode($trackingCode);

        if ($result) {
            $data['mode'] = 'edit';
            $data['order'] = $result;
            $this->view("order/edit", $data);

        } else {
            // این اطلاعات را برای صفحه مقصد نگه می‌داریم
            $_SESSION['trackingCode_errors'] = "کد پیگیری صحیح نیست.";
            $_SESSION['open_trackingModal'] = true;

            header('Location: ' . $returnUrl);
            exit;
        }
    }


    function action($mode)
    {
        $files = [];

        if (($_POST['service_id'] ?? '') === 'PROJECT') {

            $files = $_FILES['projectFiles'] ?? [];

        } elseif (($_POST['service_id'] ?? '') === 'DEBUG') {

            $files = $_FILES['debugFiles'] ?? [];

        }
        if ($mode == "add") {
            $this->insert($_POST, $files);
        }
        if ($mode == "edit")
            $this->update($_POST, $files);
    }

    function insert($post, $files)
    {
        $data['mode'] = "add";
        $res = $this->sharedPreworksForInsert_Edit($post, $files, $data['mode']);
        if (!$res['validation']) {

            $data['order'] = $res['dataResult'];
            $this->view("order/index", $data);
            return;

        } else {
            $post = $res['dataResult']['post'];
            $files = $res['dataResult']['files'];

            /*
            =========================
            Save- insert
            =========================
            */
            Model::sessionInit('UNIYAR_SITE');

            $_SESSION['alert-resultOperationFromSite'] = $this->model->addFromSite($post, $files);

            $_SESSION['operationFromSite'] = "addOrder";

            if ($_SESSION['alert-resultOperationFromSite']['type'] === 'success')
                header("Location:" . URL . "order");
            else { //return back without any file in files section
                $post['delivery_date'] =
                    (isset($post['delivery_date'])) ?
                        Helper::jaliliToMiladi($post['delivery_date']) :
                        date('Y-m-d');

                $data['order'] = $post;
                $data['hasErr'] = true;
                $this->view("order/index", $data);
            }

        }

    }

    function update($post, $files)
    {

        $data['mode'] = "edit";
        $res = $this->sharedPreworksForInsert_Edit($post, $files, $data['mode']);
        if (!$res['validation']) {

            $data['order'] = $res['dataResult'];

            $this->view("order/index", $data);
            return;
        } else {
            $post = $res['dataResult']['post'];
            $files = $res['dataResult']['files'];
            /*
            =========================
            Save- update
            =========================
            */
            Model::sessionInit('UNIYAR_SITE');

            $_SESSION['alert-resultOperationFromSite'] = $this->model->updateFromSite($post, $files);
            $_SESSION['operationFromSite'] = "editOrder";


            if ($_SESSION['alert-resultOperationFromSite']['type'] === 'success')
                header("Location:" . URL . "order");
            else {//return back without any file in files section
                $post['delivery_date'] =
                    (isset($post['delivery_date'])) ?
                        Helper::jaliliToMiladi($post['delivery_date']) :
                        date('Y-m-d');

                $data['order'] = $post;
                $data['hasErr'] = true;
                $this->view("order/index", $data);
            }
        }
    }

    /* ======================
 validation
 ====================== */

    function validator($post, &$subDir, $mode)
    {
        $errors = [];

        // پاک سازی
        $post['full_name'] = Helper::sanitize($post['full_name'] ?? '');
        $post['title'] = Helper::sanitize($post['title'] ?? '');
        $post['major'] = Helper::sanitize($post['major'] ?? '');


        $post['description'] = Helper::cleanTechDescription(
            $post['description'] ?? ''
        );

        $mobile = trim($post['mobile'] ?? '');
        $mobile = Helper::convert2english($mobile);

        if ($mobile === '') {
            $errors['mobile'] = 'شماره موبایل الزامی است.';
        } elseif (!preg_match('/^09\d{9}$/', $mobile)) {
            $errors['mobile'] = 'شماره موبایل معتبر نیست.';
        }

        $email = trim($post['email'] ?? '');
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'ایمیل وارد شده معتبر نیست.';
        }

        $post['level'] = trim($post['level'] ?? '');
        if ($post['level'] === '') {
            $errors['level'] = 'مقطع را انتخاب کنید.';
        } else if (!in_array($post['level'], ALLOWED_LEVELS, true)) {
            $errors['level'] = 'مقطع انتخاب شده معتبر نیست.';
        }

        $post['service_id'] = trim($post['service_id'] ?? '');
        if ($post['service_id'] === '') {
            $errors['service_id'] = 'نوع خدمت را انتخاب کنید.';
        } else if (!in_array($post['service_id'], ALLOWED_SERVICES, true)) {
            $errors['service_id'] = 'خدمت انتخاب شده معتبر نیست.';
        }

        if ($post['service_id'] === 'PROJECT') {

            $post['project_category'] = trim($post['project_category'] ?? '');
            if ($post['project_category'] === '') {
                $errors['project_category'] = 'نوع پروژه را انتخاب کنید.';
            } else if (!in_array($post['project_category'], ALLOWED_SERVICES_ITEMS, true))
                $errors['project_category'] = 'نوع پروژه انتخاب شده معتبر نیست.';
            else {
                if ($mode == 'add')
                    $subDir = $subDir . $post['full_name'] . '_' . $post['title'];

                else
                    $subDir = $subDir . $post['full_name'] . '_' . $post['title'];
            }

            $post['first_price'] = trim($post['first_price'] ?? '');
            if ($post['first_price'] !== '') {
                if (!is_numeric($post['first_price']))
                    $errors['first_price'] = 'قیمت باید عدد باشد.';
                else {
                    $post['first_price'] = Helper::convert2english($post['first_price']);
                    if (!ctype_digit($post['first_price']) || (int)$post['first_price'] <= 0) {
                        $errors['price'] = 'قیمت باید یک عدد صحیح بزرگ‌تر از صفر باشد.';
                    }
                }
            }


            $delivery_date = trim($post['delivery_date'] ?? '');
            if ($delivery_date !== '') {
                $miladiDeliveryDate = Helper::jaliliToMiladi($delivery_date);

                $deliveryDateObj = DateTime::createFromFormat('Y-m-d', $miladiDeliveryDate);
                $today = new DateTime('today');

                if (!$deliveryDateObj) {

                    $errors['delivery_date'] = 'تاریخ تحویل معتبر نیست.';

                } elseif ($deliveryDateObj < $today) {

                    $errors['delivery_date'] =
                        'تاریخ تحویل نمی‌تواند قبل از امروز باشد.';
                }

            }

        }

        if ($post['service_id'] === 'TEACH') {
            $post['teaching_type'] = trim($post['teaching_type'] ?? '');
            if ($post['teaching_type'] === '') {
                $errors['teaching_type'] = 'نحوه برگزاری را انتخاب کنید.';
            } else
                if (!in_array($post['teaching_type'], ALLOWED_TEACHING_TYPE, true)) {
                    $errors['teaching_type'] = 'نحوه برگزاری انتخاب شده معتبر نیست.';
                }


        }

        if ($post['service_id'] === 'DEBUG') {
            if ($mode == 'add')
                $subDir = $subDir . $post['full_name'] . '_' . $post['title'];

            else
                $subDir = $subDir . $post['customerId'] . '_' . $post['orderId'];
        }


// اعتبارسنجی فیلدهای ضروری

        if ($post['full_name'] === '') {
            $errors['full_name'] = 'نام و نام خانوادگی الزامی است.';
        }
        if ($post['title'] === '') {
            $errors['title'] = 'عنوان درخواست الزامی است.';
        }
        if ($post['description'] === '') {
            $errors['description'] = 'توضیحات درخواست الزامی است.';
        }


        return [
            'data' => $post,
            'errors' => $errors
        ];
    }


    /* ======================
    shared primary works For Insert and Edit
    ====================== */
    function sharedPreworksForInsert_Edit($post, $files, $mode)
    {
        $subDir = 'files/orders/';

        $postResult = $this->validator($post, $subDir, $mode);

        $isRequired = false;

        $filesResults = [];
        $uploadedFiles = [];

        $selectedFiles = !empty($files)
            ? Helper::normalizeFiles($files)
            : [];

        /*
        =========================
        No file uploaded  (for test is required )
        =========================
        */

        if (empty($selectedFiles)) {

            $filesResults[] = Helper::validatorFileOrImg(
                [],
                $subDir,
                'order',
                'درخواست',
                $isRequired
            );

        } /*
        =========================
        Files uploaded
        =========================
        */

        else {

            foreach ($selectedFiles as $file) {

                $result = Helper::validatorFileOrImg(
                    $file,
                    $subDir,
                    'order',
                    'درخواست',
                    $isRequired
                );
                $filesResults[] = $result;

                if (
                    $result['success'] &&
                    !empty($result['data']['filename'])
                ) {

                    $uploadedFiles[] = $result['data'];
                }
            }
        }
        /*
        =========================
        Collect Errors
        =========================
        */

        $errors = $postResult['errors'] ?? [];

        foreach ($filesResults as $result) {

            if (
                !$result['success'] &&
                !empty($result['errors']['file'])
            ) {

                $errors['file'] = array_merge(
                    $errors['file'] ?? [],
                    $result['errors']['file']
                );
            }
        }
        /*
        =========================
        Remove Empty Error Groups
        =========================
        */

        if (
            isset($errors['picture']) &&
            empty($errors['picture'])
        ) {
            unset($errors['picture']);
        }

        /*
        =========================
        Validation Failed
        =========================
        */
        if (!empty($errors)) {

            foreach ($uploadedFiles as $file) {

                if (!empty($file['path']) && file_exists($file['path']))
                    unlink($file['path']);
            }

            $data['errors'] = $errors;
            $postResult['data']['delivery_date'] =
                (isset($postResult['data']['delivery_date'])) ?
                    Helper::jaliliToMiladi($postResult['data']['delivery_date']) :
                    date('Y-m-d');;

            return ['validation' => false, 'dataResult' => $postResult['data']];

        }

        /*
        =========================
        Everything Valid
        =========================
        */

        $post = $postResult['data'];

        $files = [];

        foreach ($filesResults as $result) {

            if ($result['success']) {

                $files[] = $result['data'];
            }
        }
        return ['validation' => true, 'dataResult' => ['post' => $post, 'files' => $files]];
    }
}

?>