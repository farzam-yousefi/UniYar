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
        $this->view("admin/orders/details", $data,
            "admin", "admin");
    }


    function edit($orderId)
    {
        $data['mode'] = "edit";
        $this->view("admin/orders/details", $data,
            "admin", "admin");
    }

    function getOrdersByStatus($status,$page){

//        $data['orders']=$this->model->getOrdersByStatus($status,$page);
        $result=$this->model->getOrdersByStatus($status,$page);
        $data['orders']=$result ['orders'];
       $data['totalCount']=$result['totalCount'];
print_r($data);
        $this->view("admin/orders/_orderRows", $data, "admin", "admin",
            false, false, false, false);

    }

}
