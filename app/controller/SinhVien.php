<?php
require_once '../app/core/Controller.php';
class sinhvien extends Controller
{
  public function index()
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhviens = $sinhvienModel->getAllSinhVien();
    // trả về view
    //require_once '../app/views/sinhvien/index.php';
      $this->view('sinhvien/index', ['sinhviens' => $sinhviens, 'title' => 'Danh sách sinh viên']);
  }
  public function create()
  {
    // trả về view
    require_once '../app/views/sinhvien/create.php';
  }
}
$sv = new sinhvien();
$sv->index();