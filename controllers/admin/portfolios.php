<?php

class portfolios extends Controller
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
        $this->view("admin/portfolios/index", $data,
            "admin", "admin");
    }

    function  sort(){
        $data=[];
        $this->view("admin/portfolios/sort", $data,
            "admin", "admin");
    }


   //futureeeeeeeee
    public function saveSort()
    {

        if(!isset($_POST["sortData"])){

            header("Location:".URL."admin/portfolio");

            exit;

        }

        $items=json_decode($_POST["sortData"],true);

        $this->model->saveSortOrder($items);

        header("Location:".URL."admin/portfolios");

        exit;

    }

    function add(){
        $data['mode']="add";
        $this->view("admin/portfolios/add-edit", $data,
            "admin", "admin");
    }

    function edit($id){
        $data['mode']="edit";
        $this->view("admin/portfolios/add-edit", $data,
            "admin", "admin");

    }
}
