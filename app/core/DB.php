<?php 
class connectDB {

    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $db_name = "68pm34";

    public static function Connect() {

        $conn = null;

        try {

            $conn = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$db_name,
                self::$username,
                self::$password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {

            echo "Kết nối thất bại: " . $e->getMessage();
        }

        return $conn;
    }
}
?>