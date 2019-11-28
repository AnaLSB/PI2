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

              $count = $cst->rowCount();

              if($count == 0){
                  $cst = 0;
              } else {
            
              return $cst->fetchAll();
              }

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

    public function acceptSolicit($StateReq, $id, $places, $idRide){
        try {

            
            $stateRequest = $StateReq;
            $idUser = $id;
            $ride = $idRide;
 

           if($stateRequest == 1){
               if($places > 0){
                  $nPlaces = $places - 1;
               } else {
                    return 'erro';
                }
            } elseif ($stateRequest == 0){
                $nPlaces = $places;
            }

            $cst = $this->conn->connect()->prepare("UPDATE `solicitacao` AS s JOIN `carona`AS c ON s.IDCARONA = c.IDCARONA SET `ESTADO`=:stateRequest, `VAGAS`=:nPlaces WHERE `IDSOLICITANTE` =:iduser AND c.IDCARONA =:idRide");
            $cst->bindParam(":stateRequest", $stateRequest);
            $cst->bindParam(":nPlaces", $nPlaces);
            $cst->bindParam(":iduser", $idUser);
            $cst->bindParam(":idRide", $ride);

            if($cst->execute()){
                return 'ok';
            } else {
                return 'erro';
            }

        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    
    public function verifySolicit($data, $idRide){
        try {

            
            $id = $data;

            $ride = $idRide;
             

              $cst = $this->conn->connect()->prepare("SELECT `ESTADO` FROM `solicitacao` WHERE `IDSOLICITANTE` =:id AND `IDCARONA` =:idRide");
              $cst->bindParam(":id", $id);
              $cst->bindParam(":idRide", $ride);
              $cst->execute();
              $value = $cst->fetch();
              return $value[0];
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    } 


   

}