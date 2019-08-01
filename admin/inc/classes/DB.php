<?php

class DB {

    protected static $con;

    private function __construct() {

        try {
            self::$con = new PDO('mysql:host=localhost;dbname=login-sys', 'root', '');
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
            
        } catch (PDOException $e) {
            echo "Error :" . $e->getMessage;
            exit;
        }
    }

    public static function setConnection()
    {
        if(!self::$con) {
            new DB();
        }
        return self::$con;
    }

}

?>