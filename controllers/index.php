<?php
class Index extends Controller
{
    function __construct()
    {
      //  $this->loadModel("index");

    }
    function index()
    {
        $x=[];
        $this->view("index/index",$x);

	}


}
?>