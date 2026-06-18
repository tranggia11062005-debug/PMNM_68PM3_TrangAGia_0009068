<?php
require_once __DIR__ . '/../core/DB.php';

class LopHocModel {
    private $pdo; // 1. Khai báo thuộc tính để lưu trữ đối tượng kết nối

    public function __construct() {
        // 2. Khởi tạo kết nối và gán vào thuộc tính $this->pdo
        // Giả sử class DB của bạn có static method là connect()
        $this->pdo = ConnectDB::connect(); 
    }

    public function getAll($search = '', $limit = 12, $offset = 0) {
        // 3. Bây giờ $this->pdo đã có dữ liệu, bạn có thể gọi query()
        $sql = "SELECT lop_hoc.*, COUNT(sinhvien.id) as si_so FROM lop_hoc LEFT JOIN sinhvien ON lop_hoc.id = sinhvien.lop_id";
        $params = [];
        if (!empty($search)) {
            $sql .= " WHERE ten_lop LIKE :search";
            $params[':search'] = "%$search%";
        }
        $sql .= " GROUP BY lop_hoc.id ORDER BY lop_hoc.id ASC LIMIT :limit OFFSET :offset";
        $params[':limit'] = (int)$limit;
        $params[':offset'] = (int)$offset;
    
        $stmt = $this->pdo->prepare($sql);
        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
   public function add($data) {
    // Sửa thành nhận vào mảng $data
    $stmt = $this->pdo->prepare("INSERT INTO lop_hoc (ten_lop) VALUES (?)");
    return $stmt->execute([$data['ten_lop']]);
}
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM lop_hoc WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
    // Debug để kiểm tra xem $data có thực sự là mảng không
    // var_dump($data); die(); 

    $stmt = $this->pdo->prepare("UPDATE lop_hoc SET ten_lop = ? WHERE id = ?");
    
    // Đảm bảo bạn đang truy cập mảng với đúng tên key là 'ten_lop' và 'si_so'
    return $stmt->execute([$data['ten_lop'], $id]);
}
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM lop_hoc WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function count($search = '') {
        $sql = "SELECT COUNT(*) FROM lop_hoc";
        if (!empty($search)) {
            $sql .= " WHERE ten_lop LIKE :search";
        }
        $stmt = $this->pdo->prepare($sql);
        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%");
        }
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}