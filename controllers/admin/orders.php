<?php

class orders extends Controller
{
    function __construct()
    {

        Model::sessionInit();
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {
        $data = Model::getAdminLoggedInfo();
        $this->view("admin/orders/index", $data,
            "admin", "admin");
    }

    function  details($orderId){

        $data['mode'] = "view";
        $this->view("admin/orders/details", $data,
            "admin", "admin");
    }
    function  edit($orderId){

        $data['mode'] = "edit";
        $this->view("admin/orders/details", $data,
            "admin", "admin");
    }

}
