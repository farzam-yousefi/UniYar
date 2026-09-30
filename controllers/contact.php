<?php
class Contact extends Controller
{
    function __construct()
    {

    }
    function index()
    {
        $x=[];
        $this->view("contact/index",$x);

	}

	function add(){

        $res=$this->validator($_POST);
        if (!empty($res['errors'])) {

            $data['messageInfo'] = $res['data'];
            $data['errors']=$res['errors'];
            $this->view("contact/index", $data);
            return;

        } else {
            $post = $res['data'];

            /*
            =========================
            Save- insert
            =========================
            */
            Model::sessionInit('UNIYAR_SITE');

            $_SESSION['alert-resultOperation'] = $this->model->add($post);
            $_SESSION['operation'] = "addMessage";

            if ($_SESSION['alert-resultOperation']['type'] === 'success')
                header("Location:" . URL . "contact");
            else {
                $data['messageInfo'] = $post;
                $this->view("contact/index", $data);
            }

        }

    }

    function validator($post)
    {
        $errors = [];

        // پاک سازی
        $post['full_name'] = Helper::sanitize($post['full_name'] ?? '');
        $post['subject'] = Helper::sanitize($post['subject'] ?? '');
        $post['message'] = Helper::sanitize($post['message'] ?? '');


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


// اعتبارسنجی فیلدهای ضروری

        if ($post['full_name'] === '') {
            $errors['full_name'] = 'نام و نام خانوادگی الزامی است.';
        }
        if ($post['mobile'] === '') {
            $errors['mobile'] = 'شماره تماس الزامی است.';
        }
        if ($post['email'] === '') {
            $errors['email'] = 'ایمیل الزامی است.';
        }
        if ($post['subject'] === '') {
            $errors['subject'] = 'موضوع پیام الزامی است.';
        }
        if ($post['message'] === '') {
            $errors['message'] = 'متن پیام الزامی است.';
        }


        return [
            'data' => $post,
            'errors' => $errors
        ];
    }


}
?>