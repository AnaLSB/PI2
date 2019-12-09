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

    public function querySelect($id) {
        try {

            

              $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE `IDUSUARIO` =:id");
              $cst->bindParam(":id", $id);
              $cst->execute();
              return $cst->fetchAll();
        } catch (PDOException $ex){
              return 'error ' . $ex->getMessage();
        }
    }

    public function queryInsert($data, $id) {
        try {

            if ($data['roundtrip'] ==  NULL ){
                $this->destinyDate = NULL;
                $this->destinyHour = NULL;
            } else {
                $this->destinyDate = $data['destinyDate'];
                $this->destinyHour = $data['destinyHour'];
            }

            

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

    public function queryUpdate($data, $id) {
        
        try {

            

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

    public function deleteConstraint($idRide){
        $id = $idRide;
        $cst = $this->conn->connect()->prepare("UPDATE `carona` SET `IDUSUARIO` = '0' WHERE `IDCARONA` =:id");
        $cst->bindParam(":id", $id);

        $cst->execute();
    }

    public function queryDelete($data, $id) {
        try {

            if($data == 1){
                $this->idRide = $id;

                $cst = $this->conn->connect()->prepare("DELETE * FROM `carona` WHERE `IDCARONA` =:idRide");
                $cst->bindParam(":idRide", $this->idRide);

                if($cst->execute()){
                    return 'ok';
                } else {
                    return 'erro';
                }
            }

        
        } catch (PDOException $ex ) {
            return 'erro' . $ex->getMessage();
        }
    }

    public function querySearch($from, $to, $id) {
        try {

            $this->source = $from;
            $this->destiny = $to;
            $dataAtual = date("Y-m-d");
            $this->iduser = $id;
            
            $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` AS c INNER JOIN `usuario` AS u ON c.IDUSUARIO = u.IDUSUARIO  WHERE `ORIGEM` =:source AND `DESTINO` =:destiny AND c.IDUSUARIO <> :idUser  AND `DATA` >= :dataAtual ORDER BY `DATA` ASC");
            $cst->bindParam(":source", $this->source);
            $cst->bindParam(":destiny", $this->destiny);
            $cst->bindParam(":idUser", $this->iduser);
            $cst->bindParam(":dataAtual", $dataAtual);

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

    public function insertFacebookUser($data, $idUser){

    try{
        $fbName = $data;
        $id = $idUser;

        $cst = $this->conn->connect()->prepare("UPDATE `usuario` SET `FACEBOOK`=:fbName where `IDUSUARIO` = :id");
        $cst->bindParam(":fbName", $fbName);
        $cst->bindParam(":id", $id);

        
        if($cst->execute()){
            return 'ok';
        } else {
            return 'erro';
        }

    } catch (PDOException $ex ) {
        return 'error ' . $ex->getMessage();
    }

    }

    public function getEvaluate($data){
        try {

              $idUser = $data;
        

              $cst = $this->conn->connect()->prepare("SELECT `AVALIACAO` FROM `usuario` WHERE `IDUSUARIO` =:idUser");
              $cst->bindParam(":idUser", $idUser);
              $cst->execute();
              $value = $cst->fetch();
              return $value[0];
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function setEvaluate($value, $id, $nEvaluate){
        try{

            switch ($value) {
                case 1:
                    $evaluate = $nEvaluate - 3;
                    break;
                case 2:
                    $evaluate = $nEvaluate - 1;
                    break;
                case 3: 
                    $evaluate = $nEvaluate + 1;
                    break;
                case 4: 
                    $evaluate = $nEvaluate + 3;
                    break;
                case 5: 
                    $evaluate = $nEvaluate + 5;
                    break;
            }
            $id = $id; 
            
    
            $cst = $this->conn->connect()->prepare("UPDATE `usuario` SET `AVALIACAO`=:evaluate where `IDUSUARIO` = :id");
            $cst->bindParam(":evaluate", $evaluate);
            $cst->bindParam(":id", $id);
    
            
            if($cst->execute()){
                return 'ok';
            } else {
                return 'erro';
            }
    
        } catch (PDOException $ex ) {
            return 'error ' . $ex->getMessage();
        }
    }


    


}

?>