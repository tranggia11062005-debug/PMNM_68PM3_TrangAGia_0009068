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
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}