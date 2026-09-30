<?php
class Faq extends Controller
{
    function __construct()
    {
     //   $this->loadModel("faq");

    }
    function index()
    {
        $data["faqs"]=$this->model->getFaqs("all");
        $this->view("faq/index",$data);

	}

}
?>