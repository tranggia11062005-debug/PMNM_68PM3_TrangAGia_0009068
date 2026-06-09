<?php
require_once '../App/core/DB.php';
class SinhvienModel{
private $conn;
public function __construct(){
$this->conn = ConnectDB::Connect();
}
public function getAllSinhvien(){
$query = "SELECT * FROM sinhvien";
$stmt = $this->conn->prepare($query);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function create($data){
        $query = "INSERT INTO sinhvien (mssv, hoten, gioitinh) VALUES (:mssv, :hoten, :gioitinh)";
        $query = "INSERT INTO sinhvien (MSSV, HoTen, GioiTinh) VALUES (:mssv, :hoten, :gioitinh)";
$stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $data['mssv']);
        $stmt->bindParam(':hoten', $data['hoten']);
        $stmt->bindParam(':gioitinh', $data['gioitinh']);
if($stmt->execute()){
return true;
} else {
return false;
}
}
    // public function paging($limit = 5, $offset = 0, $search = ''){
    //     $query = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    //     $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     //tính tổng số bản ghi
    //     $selectAllquery = $this->conn->prepare("SELECT COUNT(*) FROM sinhvien");
    //     $totalRecord= $selectAllquery->fetchColumn();

    //     $totalPage = ceil($totalRecord/$totalPage);

    //     return ["sinhvien"=>$result, "totalPage"=>$totalPage];
    // }

    public function paging($limit = 5, $offset = 0, $search = ''){
    $query = "SELECT * FROM sinhvien LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($query);

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // FIX đặt biến

    //tính tổng số bản ghi
    $selectAllquery = $this->conn->query("SELECT COUNT(*) FROM sinhvien");
    // $selectAllquery->execute(); // FIX thiếu execute

    $totalRecord = $selectAllquery->fetchColumn();

    $totalPage = ceil($totalRecord / $limit); // FIX sai biến

    return ['sinhvien'=>$result, 'totalPage'=>$totalPage]; // FIX result
}
}
?>