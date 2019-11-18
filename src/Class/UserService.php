<?php

require_once '../Class/Sql.php';


class UserService {

    private $iduser;

    public function __construct() {
        $this->conn = new Sql();
    }

    public function __set($param, $value){
        $this->$param = $value;
    }

    public function __get($param){
        return $this->$param;
    }

    public function querySelectionUser($id) {
        try {
              $this->iduser = $id;
              $cst = $this->conn->connect()->prepare("SELECT * FROM `usuario` WHERE `IDUSUARIO` = :iduser");
              $cst->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
              $cst->execute();
              return $cst->fetch();
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

}