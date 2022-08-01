<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
class db {
        public static $host = "localhost";
        public static $user = "root";
        public static $pass = "";
        public static $database = "db_catalogo";
        public static $connection = null;
        public static function connect() {
            $connection = new mysqli(db::$host, db::$user,db::$pass,db::$database);
            return $connection;
        }
    }
?>