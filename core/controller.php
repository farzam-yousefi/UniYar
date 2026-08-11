<?php

class Controller
{
    public $model;

    function __construct()
    {
    }

    function view($viewUrl, $data = [],$headerType = "site", $footerType = "site", $baseTag = true, $headTag = true,
                  $showHeader = true, $showFooter = true )
    {
        if ($baseTag == true) {
            require("views/layout/baseTag.php");
        }
        if ($headTag == true) {
            $arr = explode("/", $viewUrl);
            array_pop($arr);
            $str = implode("/", $arr);
            require("views/$str/headTag.php");
            echo '</head>';

        }
        if ($showHeader == true) {
            if ($headerType == "site") {
                echo '<body>';
                require("views/layout/site/header.php");
            } else {
                echo '<body>';
                require("views/layout/adminPanel/header.php");
            }

        }

        require("views/$viewUrl.php");

        if ($showFooter == true) {
            if ($footerType == "site")
                require("views/layout/site/footer.php");
            else
                require("views/layout/adminPanel/footer.php");
        }
    }


    function model($modelUrl)
    {
        require "models/model_$modelUrl.php";
        $className = "model_" . $modelUrl;
        $this->model = new $className;
    }
    ////newww
     protected function loadModel($name)
    {
        $this->model($name);
    }

    protected function getCurrentAdminId()
    {
        return $_SESSION['adminId'] ?? null;
    }


}