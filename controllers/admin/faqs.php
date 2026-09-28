<?php

class faqs extends Controller
{
    function __construct()
    {
        $this->loadModel("faq");
        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {
        $data['faqs']=$this->model->getFaqs("all");
        $this->view("admin/faqs/index", $data,
            "admin", "admin");
    }

    function add(){
        $_SESSION['alert-resultOperation'] = $this->model->add($_POST);
        $_SESSION['operation'] = "addFaq";
        header("Location:" . URL . "admin/faqs");
    }

    function edit()
    {
        $_SESSION['alert-resultOperation'] = $this->model->edit($_POST);
        $_SESSION['operation'] = "editFaq";
        header("Location:" . URL . "admin/faqs");
    }

    function delete($id)
    {
        $_SESSION['alert-resultOperation'] = $this->model->delete($id);
        $_SESSION['operation'] = "deleteFaq";
        header("Location:" . URL . "admin/faqs");
    }

    public function saveSort()
    {

        $items = json_decode($_POST['sortData'], true);

        $this->model->saveSortOrder($items);

        header("Location:" . URL . "admin/faqs");

    }

    function changeActiveState($id){
        $this->model->changeActiveState($_POST,$id);
    }



}
