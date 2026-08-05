<?php
class Portfolio extends Controller
{
    function __construct()
    {
     //   $this->loadModel("portfolio");

    }
    function index()
    {
        $x=[];
        $this->view("portfolio/index",$x);

	}


}
?>