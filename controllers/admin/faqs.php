<?php

class faqs extends Controller
{
    function __construct()
    {

        Model::sessionInit('UNIYAR_ADMIN');
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


}
