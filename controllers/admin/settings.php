<?php

class settings extends Controller
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
        $this->view("admin/settings/index", $data,
            "admin", "admin");
    }


}
