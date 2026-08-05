<?php
class Faq extends Controller
{
    function __construct()
    {
     //   $this->loadModel("faq");

    }
    function index()
    {
        $data["faqs"]=$this->model->getAllFaqs();
        $this->view("faqs/index",$data);

	}

}
?>