<?php

require_once '../Class/Sql.php';


class OfferLift {

    private $conn;
    private $source;
    private $destiny;
    private $roundtrip;
    private $sourceDate;
    private $sourceHour;
    private $price;
    private $places;
    private $idride;
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

    public function querySelection($data) {
        try {
              $this->idride = $data;
              $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE IDCARONA = :idride");
              $cst->bindParam(":idride", $this->idride, PDO::PARAM_INT);
              $cst->execute();
              return $cst->fetch();
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelect() {
        try {
              $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE 1");
              $cst->execute();
              return $cst->fetchAll();
        } catch (PDOException $ex){
              return 'error ' . $ex->getMessage();
        }
    }

    public function queryInsert($data) {
        try {
            
              $this->source = $data['source'];
              $this->destiny = $data['destiny'];
              $this->roundtrip = $data['roundtrip'];
              $this->sourceDate = $data['sourceDate'];
              $this->sourceHour = $data['sourceHour'];
              $this->price = $data['price'];
              $this->places = $data['places'];
              $this->iduser = 2;


              $cst = $this->conn->connect()->prepare("INSERT INTO `carona`(`ORIGEM`, `DESTINO`, `DATA`, `HORARIO`, `PRECO`, `VAGAS`, `IDAVOLTA`, `IDUSUARIO`) VALUES (:source, :destiny, :sourceDate, :sourceHour, :price, :places, :roundtrip, :iduser)");
              $cst->bindParam(":source", $this->source);
              $cst->bindParam(":destiny", $this->destiny);
              $cst->bindParam(":sourceDate", $this->sourceDate);
              $cst->bindParam(":sourceHour", $this->sourceHour);
              $cst->bindParam(":price", $this->price);
              $cst->bindParam(":places", $this->places);
              $cst->bindParam(":roundtrip", $this->roundtrip);
              $cst->bindParam(":iduser", $this->iduser);

              if($cst->execute()){
                  return 'ok';
              } else {
                  return 'erro';
              }

        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function queryUpdate($data) {
        try {
            $this->source = $data['source'];
            $this->destiny = $data['destiny'];
            $this->roundtrip = $data['roundtrip'];
            $this->sourceDate = $data['sourceDate'];
            $this->sourceHour = $data['sourceHour'];
            $this->price = $data['price'];
            $this->places = $data['places'];
            $this->iduser = 1;

            $cst = $this->conn->connect()->prepare("UPDATE `carona` SET `ORIGEM`=:source,`DESTINO`=:destiny,`DATA`=:sourceDate,`HORARIO`=sourceHour,`PRECO`=:price,`VAGAS`=:places,`IDAVOLTA`=:roundtrip WHERE `IDUSUARIO` =:iduser");
            $cst->bindParam(":source", $this->source);
            $cst->bindParam(":destiny", $this->destiny);
            $cst->bindParam(":sourceDate", $this->sourceDate);
            $cst->bindParam(":sourceHour", $this->sourceHour);
            $cst->bindParam(":price", $this->price);
            $cst->bindParam(":places", $this->places);
            $cst->bindParam(":roundtrip", $this->roundtrip);

            if($cst->execute()){
                return 'ok';
            } else {
                return 'erro';
            }

      } catch (PDOException $ex ) {
          return 'error ' . $ex->getMessage();
      }
        
    }

    public function queryDelete($data) {
        try {
            $this->iduser = 1;

            $cst = $this->conn->connect()->prepare("DELETE FROM `carona` WHERE `IDUSUARIO` =:iduser");
            $cst->bindParam(":iduser", $this->iduser);

            if($cst->execute()){
                return 'ok';
            } else {
                return 'erro';
            }
            

        
        } catch (PDOException $ex ) {
            return 'erro' . $ex->getMessage();
        }
    }





}

?>