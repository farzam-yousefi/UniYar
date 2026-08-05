<?php

class faqs extends Controller
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
        $this->view("admin/faqs/index", $data,
            "admin", "admin");
    }

//    function  details($orderId){
//
//        $data['mode'] = "view";
//        $this->view("admin/orders/details", $data,
//            "admin", "admin");
//    }
//    function  edit($orderId){
//
//        $data['mode'] = "edit";
//        $this->view("admin/orders/details", $data,
//            "admin", "admin");
//    }

}
