<?php

require_once '../app/core/Controller.php';

class Auth extends Controller
{
    public function login()
    {
        // Hiển thị form
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->view('home/login');
            return;
        }

        // Lấy dữ liệu từ form
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Gọi Model
        $userModel = $this->model('UserModel');

        $user = $userModel->login($username, $password);

        if ($user) {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user'] = $user;
            $_SESSION['username'] = $user['username'];

            header("Location: /PMNM_68PM3_TrangAGia_0009068/public/SinhVien");
            exit;
        }

        // Sai tài khoản hoặc mật khẩu
        $this->view('home/login', [
            'error' => 'Tên đăng nhập hoặc mật khẩu không đúng!'
        ]);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        header("Location: /PMNM_68PM3_TrangAGia_0009068/public/Auth/login");
        exit;
    }
}