<?php
class Order extends Controller
{
    function __construct()
    {
     //   $this->loadModel("order");

    }
    function index()
    {
        $x=[];
        $this->view("order/index",$x);

	}
	function edit($trackingCode){
        $data['trackingCode']=$trackingCode;
        $this->view("order/edit",$data);
    }


}
?>