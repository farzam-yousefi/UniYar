<?php

class Admin extends Controller
{
    function __construct()
    {
        Model::sessionInit();
        if(Model::isAdminLoggedIn())
            header("Location:".URL."admin/dashboard");

    }

    function index()
    {
        $x = [];
        $this->view("admin/login/index",$x,"admin","admin");

    }

    function login()
    {
        $result = $this->model->setLogin($_POST);
        if ($result) {
            Model::sessionInit();
            Model::sessionSet("adminId", $result['id']);
            Model::sessionSet("adminUser", $result['full_name']);
            header("Location: " . URL . "admin/dashboard");
            exit;
        } else {
            $data['adminId'] = 'invalid';
            $this->view("admin/login", $data, "admin","admin");
        }
    }

    function logout()
    {
        session_unset();
        session_destroy();
        header("Location:" . URL . "admin");

    }

}

?>