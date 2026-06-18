<?php
class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
    public function view($viewName, $data = [] )
    {
        extract($data);
        require_once '../app/views/' . $viewName . '.php';
    }
    protected function checkLogin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user'])) {
        header("Location: /PMNM_68PM3_TrangAGia_0009068/public/Auth/login");
        exit;
    }
}
}