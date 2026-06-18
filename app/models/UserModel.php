<?php
require_once dirname(__DIR__) . '/core/DB.php';
class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::connect();
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':username' => $username
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function register($username, $password, $full_name)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, full_name) VALUES (:username, :password, :full_name)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':full_name' => $full_name
        ]);
    }
}