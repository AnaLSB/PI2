<?php

require_once '../Class/Sql.php';


class RequestService {

    private $idSolicit;
    private $idUser;
    private $idRide;

    public function __construct() {
        $this->conn = new Sql();
    }

    public function __set($param, $value){
        $this->$param = $value;
    }

    public function __get($param){
        return $this->$param;
    }

    public function querySelection($data) {
        try {

            $idRide = $data;
        

              $cst = $this->conn->connect()->prepare("SELECT * FROM `solicitacao` AS s INNER JOIN `usuario` AS u ON s.IDSOLICITANTE = u.IDUSUARIO WHERE `ESTADO` = 2 AND s.IDCARONA = $idRide");
              $cst->bindParam(":id", $id);
              $cst->execute();
              return $cst->fetchAll();
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }


    public function setSolicit($data){
        try {

            session_start();
    
            $id = $_SESSION['IDUSUARIO'];

            $this->idUser = $id;
            $this->idRide = $data['idRide'];
            $stateRequest = 2;

            $cst = $this->conn->connect()->prepare("INSERT INTO `solicitacao`(`IDSOLICITANTE`, `IDCARONA`, `ESTADO`) VALUES (:idUser, :idRide, :stateRequest)");
            $cst->bindParam(":idUser", $this->idUser);
            $cst->bindParam(":idRide", $this->idRide);
            $cst->bindParam(":stateRequest", $stateRequest);

            if($cst->execute()){
                return 'ok';
            } else {
                return 'erro';
            }

      } catch (PDOException $ex ) {
          return 'error ' . $ex->getMessage();
      }
    }

    public function acceptSolicit($StateReq, $id){
        try {

            
            $stateRequest = $StateReq;
            $idUser = $id;

            $cst = $this->conn->connect()->prepare("UPDATE `solicitacao` SET `ESTADO`=:stateRequest  WHERE `IDSOLICITANTE` =:iduser");
            $cst->bindParam(":stateRequest", $stateRequest);
            $cst->bindParam(":iduser", $idUser);

            if($cst->execute()){
                return 'ok';
            } else {
                return 'erro';
            }

        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function verifySolicit(){
        try {

            session_start();
    
            $id = $_SESSION['IDUSUARIO'];

              $cst = $this->conn->connect()->prepare("SELECT `ESTADO` FROM `solicitacao` AS s WHERE `IDUSUARIO` = :id");
              $cst->bindParam(":id", $id);
              $cst->execute();
              return $cst->fetch();
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }


}