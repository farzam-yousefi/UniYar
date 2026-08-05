<?php
class Dashboard extends Controller
{
    function __construct()
    {
        Model::sessionInit();
        if(!Model::isAdminLoggedIn()){
            header("Location:".URL."admin");
        }
    }
    function index()
    {
//            $data = [
//                'adminId' => Model::sessionGet("adminId"),
//                'adminUser' => Model::sessionGet("adminUser")
//            ];
        $data=Model::getAdminLoggedInfo();

            $this->view("admin/dashboard/index", $data,
                "admin", "admin");
	}



}
?>