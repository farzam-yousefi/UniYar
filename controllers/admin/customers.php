<?php

class customers extends Controller
{
    function __construct()
    {
        $this->loadModel("customer");
        Model::sessionInit('UNIYAR_ADMIN');
        if (!Model::isAdminLoggedIn()) {
            header("Location:" . URL . "admin");
        }

    }

    function index()
    {

        $data = $this->model->getInitialInfo();
        $this->view("admin/customers/index", $data,
            "admin", "admin");
    }

    function getCustomers($mode, $page)
    {
        $result = $this->model->getCustomers($mode, $page);

        $data['customers'] = $result['customers'];

        ob_start();
        $this->view("admin/customers/_customerRows", $data, "admin",
            "admin", false, false, false, false);
        $html = ob_get_clean();

        echo json_encode([
            'customers' => $html,
            'totalCount' => $result['totalCount']
        ], JSON_UNESCAPED_UNICODE);


    }

    function getTodayCustomers($page){
        $result = $this->model->getTodayCustomers($page);

        $data['customers'] = $result['customers'];

        ob_start();
        $this->view("admin/customers/_customerRows", $data, "admin",
            "admin", false, false, false, false);
        $html = ob_get_clean();

        echo json_encode([
            'customers' => $html,
            'totalCount' => $result['totalCount']
        ], JSON_UNESCAPED_UNICODE);

    }


}
