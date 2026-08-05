<?php

class App
{
    public $controller = "index";
    public $method = "index";
    public $params = [];

    function __construct()
    {
        $url = [];

        if (isset($_GET['url'])) {
            $url = $this->parseUrl($_GET['url']);
        }

        $controllerFolder = "controllers/";
        $controllerName   = "index";

        /*
        ==================================================
        ADMIN ROUTES
        ==================================================
        */

        if (isset($url[0]) && strtolower($url[0]) == "admin") {

            /*
             * /admin
             * /admin/login
             * /admin/logout
             */

            if (!isset($url[1])) {

                $controllerName = "admin";
                unset($url[0]);

            } elseif (in_array(strtolower($url[1]), ["login", "logout"])) {

                $controllerName = "admin";
                $this->method   = strtolower($url[1]);

                unset($url[0], $url[1]);

            }

            /*
             * /admin/dashboard
             * /admin/order
             * /admin/user
             */

            else {

                $controllerFolder = "controllers/admin/";

                $controllerName = strtolower(
                    str_replace("-", "_", $url[1])
                );

                unset($url[0], $url[1]);
            }

        }

        /*
        ==================================================
        NORMAL ROUTES
        ==================================================
        */

        else {

            if (isset($url[0])) {

                $controllerName = strtolower(
                    str_replace("-", "_", $url[0])
                );

                unset($url[0]);
            }
        }

        /*
        ==================================================
        LOAD CONTROLLER
        ==================================================
        */

        $controllerFile = $controllerFolder . $controllerName . ".php";

        if (!file_exists($controllerFile)) {
            return $this->res404();
        }

        require_once $controllerFile;

        $className = ucfirst($controllerName);

        if (!class_exists($className)) {
            return $this->res404();
        }

        $controllerObj = new $className;

        /*
        ==================================================
        AUTO LOAD MODEL
        ==================================================
        */

        if (method_exists($controllerObj, "model")) {

            if (file_exists("models/model_" . $controllerName . ".php")) {

                $controllerObj->model($controllerName);
            }

        }

        /*
        ==================================================
        METHOD
        ==================================================
        */

        $url = array_values($url);

        if ($this->method == "index" && isset($url[0])) {

            $method = str_replace("-", "_", $url[0]);

            if (method_exists($controllerObj, $method)) {

                $this->method = $method;

                unset($url[0]);
            }
        }

        /*
        ==================================================
        PARAMS
        ==================================================
        */

        $this->params = array_values($url);

        if (!method_exists($controllerObj, $this->method)) {
            return $this->res404();
        }

        call_user_func_array(
            [$controllerObj, $this->method],
            $this->params
        );
    }

    private function parseUrl($url)
    {
        $url = trim($url, "/");

        return explode("/", $url);
    }

    private function res404()
    {
        http_response_code(404);

        require "404.html";

        exit;
    }
}