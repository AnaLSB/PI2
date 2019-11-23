<?php

require_once '../Class/Sql.php';
require_once '../../Classes/usuarios.php';

$usuario = new Usuario();


class Service {

    private $conn;
    private $source;
    private $destiny;
    private $roundtrip;
    private $sourceDate;
    private $sourceHour;
    private $destinyDate;
    private $destinyHour;
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
              $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` AS c INNER JOIN `usuario` AS u ON c.IDUSUARIO = u.IDUSUARIO WHERE `IDCARONA` = :idride");
              $cst->bindParam(":idride", $this->idride, PDO::PARAM_INT);
              $cst->execute();
              return $cst->fetch();
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelect() {
        try {

            session_start();
    
            $id = $_SESSION['IDUSUARIO'];

              $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE `IDUSUARIO` =:id");
              $cst->bindParam(":id", $id);
              $cst->execute();
              return $cst->fetchAll();
        } catch (PDOException $ex){
              return 'error ' . $ex->getMessage();
        }
    }

    public function queryInsert($data) {
        try {

            if ($data['roundtrip'] ==  NULL ){
                $this->destinyDate = NULL;
                $this->destinyHour = NULL;
            } else {
                $this->destinyDate = $data['destinyDate'];
                $this->destinyHour = $data['destinyHour'];
            }

            session_start();
    
            $id = $_SESSION['IDUSUARIO'];

              $this->source = $data['source'];
              $this->destiny = $data['destiny'];
              $this->roundtrip = $data['roundtrip'];
              $this->sourceDate = $data['sourceDate'];
              $this->sourceHour = $data['sourceHour'];
              $this->price = $data['price'];
              $this->places = $data['places'];
              $this->iduser = $id;
              

              


              $cst = $this->conn->connect()->prepare("INSERT INTO `carona`(`ORIGEM`, `DESTINO`, `DATA`, `HORARIO`, `PRECO`, `VAGAS`, `IDAVOLTA`, `IDUSUARIO`, `DATAVOLTA`, `HORAVOLTA`) VALUES (:source, :destiny, :sourceDate, :sourceHour, :price, :places, :roundtrip, :iduser, :destinyDate, :destinyHour)");
              $cst->bindParam(":source", $this->source);
              $cst->bindParam(":destiny", $this->destiny);
              $cst->bindParam(":sourceDate", $this->sourceDate);
              $cst->bindParam(":sourceHour", $this->sourceHour);
              $cst->bindParam(":price", $this->price);
              $cst->bindParam(":places", $this->places);
              $cst->bindParam(":roundtrip", $this->roundtrip);
              $cst->bindParam(":iduser", $this->iduser);
              $cst->bindParam(":destinyDate", $this->destinyDate);
              $cst->bindParam(":destinyHour", $this->destinyHour);

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

            session_start();
    
            $id = $_SESSION['IDUSUARIO'];

            $this->source = $data['source'];
            $this->destiny = $data['destiny'];
            $this->roundtrip = $data['roundtrip'];
            $this->sourceDate = $data['sourceDate'];
            $this->sourceHour = $data['sourceHour'];
            $this->price = $data['price'];
            $this->places = $data['places'];
            $this->iduser = $id;

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

            session_start();
    
            $id = $_SESSION['IDUSUARIO'];

            $this->iduser = $id;

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

    public function querySearch($from, $to) {
        try {

            $this->source = $from;
            $this->destiny = $to;
            
            $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` AS c INNER JOIN `usuario` AS u ON c.IDUSUARIO = u.IDUSUARIO  WHERE `ORIGEM` =:source AND `DESTINO` =:destiny ORDER BY `DATA` DESC");
            $cst->bindParam(":source", $this->source);
            $cst->bindParam(":destiny", $this->destiny);

            $cst->execute();

            $count = $cst->rowCount();

            if ($count == 0){
                return "count 0";
            }

            return $cst->fetchAll();

            

            
            



        } catch (PDOException $ex ) {
            return 'erro' . $ex->getMessage();
        }
    }

    


    public function queryFilter($from, $to) {

        try {

            $this->source = $from;
            $this->destiny = $to;

            $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE `ORIGEM` LIKE :source AND `DESTINO` LIKE :destiny ");
            $cst->bindParam(":source", $this->source);
            $cst->bindParam(":destiny", $this->destiny);
            

            $cst->execute();
            return $cst->fetchAll();


        } catch (PDOException $ex ) {
            return 'erro' . $ex->getMessage();
        }
        

    }


    


}

?>