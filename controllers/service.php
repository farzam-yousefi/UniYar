<?php
class Service extends Controller
{
    function __construct()
    {
      //  $this->loadModel("service");

    }
    function index()
    {
        $x=[];
        $this->view("service/index",$x);

	}
	function projectService()
    {
        $data['serviceTitle']="انجام پروژه";
        $this->view("service/project",$data);

	}

    function consultService()
    {
        $data['serviceTitle']="خدمات مشاوره";
        $this->view("service/consult",$data);

    }
 function debugService()
    {
        $data['serviceTitle']="خدمات رفع اشکال";
        $this->view("service/debug",$data);

    }
    function privateTeachingService()
    {
        $data['serviceTitle']="خدمات تدریس خصوصی";
        $this->view("service/teach",$data);

    }




}
?>