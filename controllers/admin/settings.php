<?php

class settings extends Controller
{
    function __construct()
    {
        $this->loadModel("setting");
        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {
        $data['settings'] = $this->model->getSettings();
        $this->view("admin/settings/index", $data,
            "admin", "admin");
    }

    function saveGeneral(){
        $result = $this->model->saveGeneral($_POST);
        if ($result)
            $_SESSION['alert-resultOperation'] = [
                'type' => 'success',
                'title' => 'عملیات موفق',
                'message' => 'تنظیمات عمومی با موفقیت ویرایش شد.'
            ];
        else
            $_SESSION['alert-resultOperation'] = [
                'type' => 'error',
                'title' => 'عملیات ناموفق',
                'message' => 'عملیات ویرایش تنظیمات عمومی با خطا مواجه شد.'
            ];
        $_SESSION['operation'] = "editGeneralSettings";

        header("Location:" . URL . "admin/settings");
    }


}
