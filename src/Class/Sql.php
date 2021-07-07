<?php

class Sql {

    private $user;
    private $PW;
    private $dbname;
    private $host;
    private static $pdo;

    public function __construct() {
        $this->host = "localhost";
        $this->dbname = "integrador";
        $this->user = "root";
        $this->PW = "";
    }

    public function connect() {
        try {
            if(is_null(self::$pdo)){
                self::$pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->PW);
            }
            return self::$pdo;
        } catch (PDOException $ex) {
                echo $ex->getMessage();
        }
    }

}


?>