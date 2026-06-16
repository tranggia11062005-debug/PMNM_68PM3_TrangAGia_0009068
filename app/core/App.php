<?php

class App
{
    protected $controller = "Home";
    protected $action = "index";
    protected $param = [];

    public function __construct()
    {
        $urlProcessed = $this->urlProcess();

        // Kiểm tra controller từ URL
        if (isset($urlProcessed[0])) {

            // Chuẩn hóa tên controller (home -> Home)
            $controller = ucfirst(strtolower($urlProcessed[0]));

            if (file_exists("../app/controller/" . $controller . ".php")) {
                $this->controller = $controller;
                unset($urlProcessed[0]);
            }
        }

        // Load controller
        require_once "../app/controller/" . $this->controller . ".php";

        $this->controller = new $this->controller();

        // Kiểm tra action
        if (isset($urlProcessed[1])) {

            if (method_exists($this->controller, $urlProcessed[1])) {

                $this->action = $urlProcessed[1];
                unset($urlProcessed[1]);
            }
        }

        // Lấy tham số
        $this->param = $urlProcessed ? array_values($urlProcessed) : [];

        // Gọi action
        call_user_func_array(
            [$this->controller, $this->action],
            $this->param
        );
    }

    public function urlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }

        return [];
    }
}