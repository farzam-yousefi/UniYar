<?php
class About extends Controller
{
    function __construct()
    {
       // $this->loadModel("about");
    }
    function index()
    {
        $data= [];
        $this->view("about/index",$data);

	}

}
?>