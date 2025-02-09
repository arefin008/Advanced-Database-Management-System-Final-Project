<?php
class Database {
    private static $conn = null;

    public static function getConnection() {
        if (!self::$conn) {
            $username = 'BRMS'; 
            $password = 'rounok'; 
            $sid = 'XE'; 
            $host = 'localhost'; 

            self::$conn = oci_connect($username, $password, "$host/$sid");

            if (!self::$conn) {
                $error = oci_error();
                throw new Exception("Database Connection Failed: " . htmlentities($error['message'], ENT_QUOTES));
            }
        }
        return self::$conn;
    }
}
?>

