<?php

class messages extends Controller
{
    function __construct()
    {

        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn('UNIYAR_ADMIN')) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {
        $data = Model::getAdminLoggedInfo();
        $this->view("admin/messages/index", $data,
            "admin", "admin");
    }


}
