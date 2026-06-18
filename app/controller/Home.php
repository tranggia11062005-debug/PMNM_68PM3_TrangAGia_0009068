<?php

require_once dirname(__DIR__) . '/models/UserModel.php';
require_once dirname(__DIR__) . '/core/Controller.php';

class Home extends Controller
{
    private $userModel;

    public function __construct()
    {
        session_start();
        $this->userModel = $this->model('UserModel');
    }

    public function index()
    { 
       $this->view('layout/masterlayout', [
            'viewname' => 'home/HomePage',
            'title'    => 'Trang chủ'
        ]);
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            $user = $this->userModel->login($username, $password);

            if ($user) {

                $_SESSION["user"] = $user;

                header("Location: /PMNM_68PM3_TrangAGia_0009068/public/SinhVien");
                exit;
            } else {

                $error = "Sai tài khoản hoặc mật khẩu";

                require "../app/views/home/login.php";
            }

        } else {

            require "../app/views/home/login.php";
        }
    }

    public function logout()
    {
        session_unset(); // Xóa toàn bộ biến session
    session_destroy(); // Hủy session
    header("Location: /PMNM_68PM3_TrangAGia_0009068/public/Home/login");
    exit;
    }
}