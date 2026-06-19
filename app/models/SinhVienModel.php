<?php

require_once '../app/core/DB.php';

class sinhvienModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::connect();
    }

    // Lấy tất cả sinh viên
    public function getAllSinhVien()
    {
        $sql = "SELECT * FROM sinhvien";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Phân trang + tìm kiếm
    public function paging($limit = 5, $offset = 0, $search = '')
    {
        // Dùng JOIN để lấy ten_lop thay vì cột lop (text) cũ
    $sql = "SELECT sv.*, lh.ten_lop 
            FROM sinhvien sv
            LEFT JOIN lop_hoc lh ON sv.lop_id = lh.id
            WHERE (sv.ho_ten LIKE :search OR sv.ma_sv LIKE :search)
            ORDER BY sv.id ASC
            LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $count = $this->conn->prepare(
            "SELECT COUNT(*) FROM sinhvien 
                 WHERE (ho_ten LIKE :search OR ma_sv LIKE :search)"
        );
        $count->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        $count->execute();  

        $total = $count->fetchColumn();

        return [
            'sinhviens' => $data,
            'totalPages' => ceil($total / $limit)
        ];
    }

    // Thêm sinh viên
    public function create($data)
    {
        $sql = "INSERT INTO sinhvien
                (ma_sv, ho_ten, gioi_tinh, ngay_sinh, dia_chi, lop_id)
                VALUES
                (:ma_sv, :ho_ten, :gioi_tinh, :ngay_sinh, :dia_chi, :lop_id)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':ma_sv' => $data['ma_sv'],
            ':ho_ten' => $data['ho_ten'],
            ':gioi_tinh' => $data['gioi_tinh'],
            ':ngay_sinh' => $data['ngay_sinh'],
            ':dia_chi' => $data['dia_chi'],
            ':lop_id' => $data['lop_id']
        ]);
    }

    // Lấy thông tin 1 sinh viên
    public function edit($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM sinhvien WHERE id = :id"
        );

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật sinh viên
    public function update($id, $data)
    {
        $sql = "UPDATE sinhvien SET
                ma_sv = :ma_sv,
                ho_ten = :ho_ten,
                gioi_tinh = :gioi_tinh,
                ngay_sinh = :ngay_sinh,
                dia_chi = :dia_chi,
                lop_id = :lop_id
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':ma_sv' => $data['ma_sv'],
            ':ho_ten' => $data['ho_ten'],
            ':gioi_tinh' => $data['gioi_tinh'],
            ':ngay_sinh' => $data['ngay_sinh'],
            ':dia_chi' => $data['dia_chi'],
            ':lop_id' => $data['lop_id']
        ]);
    }

    // Xóa sinh viên
    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM sinhvien WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}