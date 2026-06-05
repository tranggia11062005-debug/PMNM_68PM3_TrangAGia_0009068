<?php
class home
{
  public function index()
  {
    echo "Đây là trang chủ";
  }

  public function about()
  {
    echo "Đây là trang giới thiệu";
    require_once '../app/views/layout/masterlayout.php';
  }
  public function login()
  {
    require_once '../app/views/home/login.php';

  }
}