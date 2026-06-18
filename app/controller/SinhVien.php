<?php

require_once '../app/core/Controller.php';

class SinhVien extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $limit = 12;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) {
            $page = 1;
        }

        $offset = ($page - 1) * $limit;
        $search = $_GET['search'] ?? '';

        $model = $this->model('sinhvienModel');
        $result = $model->paging($limit, $offset, $search);

        $this->view('layout/masterlayout', [
            'viewname'    => 'sinhvien/index',
            'sinhviens'   => $result['sinhviens'],
            'totalPages'  => $result['totalPages'],
            'currentPage' => $page,
            'search'      => $search
        ]);
    }

   public function create()
{
    $lopHocModel = $this->model("LopHocModel");
    $this->view("sinhvien/Create", [
        "title" => "Thêm sinh viên",
        "action" => "store",
        "sinhvien" => null,
        "lops" => $lopHocModel->getAll()
        
    ]);
    
}

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'ma_sv'     => $_POST['ma_sv'],
                'ho_ten'    => $_POST['ho_ten'],
                'gioi_tinh' => $_POST['gioi_tinh'],
                'ngay_sinh' => $_POST['ngay_sinh'],
                'dia_chi'   => $_POST['dia_chi'],
                'lop_id'       => $_POST['lop_id']
            ];

            $model = $this->model('sinhvienModel');

            if ($model->create($data)) {
                header("Location: /PMNM_68PM3_TrangAGia_0009068/public/SinhVien");
            } else {
                echo "Thêm thất bại";
            }
        }
    }

    public function delete($id)
    {
        $lopHocModel = $this->model("LopHocModel");
        $model = $this->model('sinhvienModel');
        $model->delete($id);

        header("Location: /PMNM_68PM3_TrangAGia_0009068/public/SinhVien");
    }

    public function edit($id)
{
    $lopHocModel = $this->model("LopHocModel");
    $model = $this->model("SinhVienModel");

    $sinhvien = $model->edit($id);

    if (!$sinhvien) {
        die("Không tìm thấy sinh viên");
    }

    $this->view("sinhvien/Create", [
        "title" => "Cập nhật sinh viên",
        "action" => "update/" . $id,
        "sinhvien" => $sinhvien,
        "lops" => $lopHocModel->getAll()
    ]);
}

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'ma_sv'     => $_POST['ma_sv'],
                'ho_ten'    => $_POST['ho_ten'],
                'gioi_tinh' => $_POST['gioi_tinh'],
                'ngay_sinh' => $_POST['ngay_sinh'],
                'dia_chi'   => $_POST['dia_chi'],
                'lop_id'       => $_POST['lop_id']
            ];

            $model = $this->model('sinhvienModel');
            $model->update($id, $data);

            header("Location: /PMNM_68PM3_TrangAGia_0009068/public/SinhVien");
        }
    }
}