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

    public function querySelectNumRows($data) {
        try {

            $idRide = $data;
        

              $cst = $this->conn->connect()->prepare("SELECT * FROM `solicitacao` AS s INNER JOIN `usuario` AS u ON s.IDSOLICITANTE = u.IDUSUARIO WHERE `ESTADO` = 2 AND s.IDCARONA = $idRide");
              $cst->bindParam(":id", $id);
              $cst->execute();

              return $cst->rowCount();

        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }


    public function setSolicit($data, $places){
        try {

            if ($places > 0){
                
            
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

        }

      } catch (PDOException $ex ) {
          return 'error ' . $ex->getMessage();
      }
    }

    public function getPlaces($data) {
        try {

            $idRide = $data;
        

              $cst = $this->conn->connect()->prepare("SELECT `VAGAS` FROM `carona` WHERE `IDCARONA` =:idRide");
              $cst->bindParam(":idRide", $idRide);
              $cst->execute();
              $places = $cst->fetch();
              return $places[0];
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function acceptSolicit($StateReq, $id, $places){
        try {

            
            $stateRequest = $StateReq;
            $idUser = $id;

           if($stateRequest == 1){
                $places -= 1;
                $nPlaces = $places;
            }

            $cst = $this->conn->connect()->prepare("UPDATE `solicitacao` AS s JOIN `carona`AS c ON s.IDCARONA = c.IDCARONA SET `ESTADO`=:stateRequest, `VAGAS`=:nPlaces WHERE `IDSOLICITANTE` =:iduser");
            $cst->bindParam(":stateRequest", $stateRequest);
            $cst->bindParam(":nPlaces", $nPlaces);
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

    /* TODO metodo para verificar se o usuario ja solicitou a carona e entao bloquear botao
    public function verifySolicit(){
        try {

             if(isset($_SESSION)){
                 $id = $_SESSION;
             }

              $cst = $this->conn->connect()->prepare("SELECT `ESTADO` FROM `solicitacao` WHERE `IDSOLICITANTE` =:id");
              $cst->bindParam(":id", $id);
              $cst->execute();
              return $cst->fetch();
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    } */


   

}