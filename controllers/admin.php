<?php

class Admin extends Controller
{

    function __construct()
    {
        Model::sessionInit('UNIYAR_ADMIN');
    }

    function index()
    {
        if (Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin/dashboard");
            exit;
        }
        $data = [];
        $this->view("admin/login/index", $data, "admin", "admin");

    }

    function login()
    {
        $result = $this->model->setLogin($_POST);
        if ($result) {
            Model::sessionInit('UNIYAR_ADMIN');
            Model::sessionSet("adminId", $result['id']);
            Model::sessionSet("adminUser", $result['full_name']);
            header("Location: " . URL . "admin/dashboard");
            exit;
        } else {
            $data['adminId'] = 'invalid';
            $this->view("admin/login/index", $data, "admin", "admin");
        }
    }

    function logout()
    {
        session_unset();
        session_destroy();
        header("Location:" . URL . "admin");

    }

    function changePassword()
    {

        $returnUrl = trim($_POST['return_url'] ?? '');

        // اگر return_url وجود نداشت
        if (empty($returnUrl)) {
            $returnUrl = URL . 'admin/dashboard';
        }

        // فقط اجازه redirect به داخل خود پروژه
        //for develop // after you should delete second condition
        if (!(str_starts_with($returnUrl, URL)||str_starts_with($returnUrl, '/uniyar'))) {
            $returnUrl = URL . 'admin/dashboard';
        }


        $adminId = $this->getCurrentAdminId();
        $user = $this->model->getCurrentUserPass($adminId);
        if (!empty($user) && (!password_verify($_POST['oldPassword'], $user['password']))) {
            $errors['newPassword'] = 'رمز عبور فعلی صحیح نیست.';

            // این اطلاعات را برای صفحه مقصد نگه می‌داریم
            $_SESSION['change_password_errors'] = $errors;
            $_SESSION['open_change_password'] = true;


            header('Location: ' . $returnUrl);
            exit;

        }
        $errors = $this->validator($_POST);
        if (!empty($errors)) {

            $_SESSION['change_password_errors'] = $errors;
            $_SESSION['open_change_password'] = true;


            header('Location: ' . $returnUrl);
            exit;
        }


        // اینجا یعنی همه چیز درست است

        $result = $this->model->changePassword($_POST['newPassword'], $adminId);
        if ($result)
            $_SESSION['alert-resultOperation'] = [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => 'رمز با موفقیت تغییر یافت.'
            ];
        else
            $_SESSION['alert-resultOperation'] = [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => ' تغییر رمز با خطا مواجه شد.مجددا تلاش کنید.'
            ];

        header('Location: ' . $returnUrl);

    }

    function validator($post)
    {
        $errors = [];
//$post['oldPassword']=null;
        if ($post['oldPassword'] === '') {
            $errors['oldPassword'] = 'وارد کردن رمز فعلی الزامی است';
        }
        if ($post['newPassword'] === '') {
            $errors['newPassword'] = 'وارد کردن رمز جدید الزامی است';
        }
        if ($post['reNewPassword'] === '') {
            $errors['reNewPassword'] = 'وارد کردن تکرار رمز جدید الزامی است';
        }

        $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d @$!%*#?&]{8,}$/';

        if (!preg_match($passwordPattern, $post['newPassword'])) {
            $errors['newPassword'] = 'رمز عبور جدید باید حداقل ۸ کاراکتر و شامل حروف، ارقام و حداقل یک کاراکتر خاص باشد.';
        }
        if ($post['newPassword'] !== $post['reNewPassword']) {
            $errors['reNewPassword'] = 'تکرار رمز عبور با رمز جدید یکسان نیست.';
        }
        return $errors;

    }

}

?>