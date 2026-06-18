<?php
class LopHoc extends Controller {
    private $lopHocModel;

    public function __construct() {
        $this->lopHocModel = $this->model('LopHocModel');
    }

    public function index() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $data['lophocs'] = $this->lopHocModel->getAll($search);
        $data['title'] = "Quản lý lớp học";
        $this->view('layout/masterlayout', [
        'viewname' => 'lophoc/index',
        'lophocs'  => $data['lophocs'],
        'title'    => $data['title']
    ]);
    }
    public function create() {
        $this->view('lophoc/create', [
            'viewname' => 'lophoc/create',
            "title"    => "Thêm lớp học",
            "action"   => "store",
            "lophoc"   => null
        ]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['ten_lop' => $_POST['ten_lop']];
            $this->lopHocModel->add($data); // Lưu ý: hàm trong Model là add()
            header("Location: /PMNM_68PM3_TrangAGia_0009068/public/LopHoc");
        }
    }

    public function edit($id) {
        $lophoc = $this->lopHocModel->getById($id);
        $this->view('lophoc/create', [
            'viewname' => 'lophoc/create',
            "title"    => "Cập nhật lớp học",
            "action"   => "update/" . $id,
            "lophoc"   => $lophoc
        ]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['ten_lop' => $_POST['ten_lop']];
            $this->lopHocModel->update($id, $data);
            header("Location: /PMNM_68PM3_TrangAGia_0009068/public/LopHoc");
        }
    }

    public function delete($id) {
        $this->lopHocModel->delete($id);
        header("Location: /PMNM_68PM3_TrangAGia_0009068/public/LopHoc");
    }
}