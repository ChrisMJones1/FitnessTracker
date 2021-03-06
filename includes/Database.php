<?php
namespace fitnessTracker\includes;

class Database {
    private static $username = 'root';
    private static $password = '';
    private static $dbname = 'phpbro';
    private static $dsn = 'mysql:host=localhost;dbname=phpbro';
    private static $dbcon;

    private function __construct()
    {
    }

    //Create a connection and return the connection
    public static function GetDb() {
        try {
            if (!isset(self::$dbcon)) {
                self::$dbcon = new \PDO(self::$dsn, self::$username, self::$password);
            }
        }
        catch (\PDOException $e) {
            $msg = $e->getMessage();
            include 'custom-error.php';
            exit();
        }
        return self::$dbcon;
    }
}

?>