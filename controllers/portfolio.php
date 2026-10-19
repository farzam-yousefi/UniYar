<?php
class Portfolio extends Controller
{
    function __construct()
    {
     //   $this->loadModel("portfolio");

    }
    function index()
    {
        $data['isActivePortfolios']=$this->model->getActivePortfolios();
        $this->view("portfolio/index",$data);

	}


}
?>