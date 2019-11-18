<?php

require_once '../Class/Sql.php';


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
              $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE 1 ORDER BY `DATA`");
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


              $this->source = $data['source'];
              $this->destiny = $data['destiny'];
              $this->roundtrip = $data['roundtrip'];
              $this->sourceDate = $data['sourceDate'];
              $this->sourceHour = $data['sourceHour'];
              $this->price = $data['price'];
              $this->places = $data['places'];
              $this->iduser = 3;
              

              


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

    public function querySearch($from, $to) {
        try {

            $this->source = $from;
            $this->destiny = $to;
            
            $cst = $this->conn->connect()->prepare("SELECT * FROM `carona` WHERE `ORIGEM` =:source AND `DESTINO` =:destiny ORDER BY `DATA` DESC");
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

    public function querySelectEvaluate($id){

        $iduser = $id;

        try{
            $cst = $this->conn->connect()->prepare("SELECT `AVALIACAO` from  `usuario` WHERE `IDUSUARIO` = :iduser");
            $cst->bindParam(":iduser", $iduser);

            $cst->execute();

            return $cst->fetchColumn();

            

        } catch (PDOException $ex ) {
            return 'erro' . $ex->getMessage();
        }
        

    }

    public function queryUpdateEvaluate($data, $id){

       $iduser = $id;

       
        try{

            $evaluate = $data;

            $evaluate += 1;
            
            $cst = $this->conn->connect()->prepare("UPDATE `usuario` SET `AVALIACAO` =:evaluate WHERE `IDUSUARIO` =:iduser ");
            $cst->bindParam(":evaluate", $evaluate);
            $cst->bindParam(":iduser", $iduser);
            $cst->execute();

        } catch (PDOException $ex ) {
            return 'erro' . $ex->getMessage();
        }

    }

    public function queryDeleteEvaluate($data, $id){

        $iduser = $id;
 
        
         try{
 
             $evaluate = $data;
 
             $evaluate -= 1;
             
             $cst = $this->conn->connect()->prepare("UPDATE `usuario` SET `AVALIACAO` =:evaluate WHERE `IDUSUARIO` =:iduser ");
             $cst->bindParam(":evaluate", $evaluate);
             $cst->bindParam(":iduser", $iduser);
             $cst->execute();
 
         } catch (PDOException $ex ) {
             return 'erro' . $ex->getMessage();
         }
 
         
     }





}

?>