<?php
class About extends Controller
{
    function __construct()
    {
       // $this->loadModel("about");
    }
    function index()
    {
        $data= $this->model->test();
        $this->view("about/index",$data);

	}
	function test(){
        $this->model->test();
    }


}
?>