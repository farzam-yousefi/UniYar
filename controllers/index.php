<?php

class Index extends Controller
{
    function __construct()
    {
        Model::sessionInit('UNIYAR_SITE');
    }

    //  $this->loadModel("index");


    function index()
    {
        $result = $this->model->getFooterInfo();
        Model::sessionSet("footerInfo", $result);
        $data['selectedPortfolios'] = $this->model->getSelectedPortfolios();
        $this->view("index/index", $data);

    }

}

?>