<?php

class customers extends Controller
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
        $this->view("admin/customers/index", $data,
            "admin", "admin");
    }



}
