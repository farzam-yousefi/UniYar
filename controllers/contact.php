<?php
class Contact extends Controller
{
    function __construct()
    {
      //  $this->loadModel("contact");

    }
    function index()
    {
        $x=[];
        $this->view("contact/index",$x);

	}


}
?>