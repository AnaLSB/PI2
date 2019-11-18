<?php

Class Usuario{ 
    private $pdo; 
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $data, $ddd, $telefone, $email, $senha){
        global $pdo;
        // Verificar se o email já está cadastrado
        $sql = $pdo->prepare("SELECT IDUSUARIO FROM usuario WHERE EMAIL = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }
        else{
            //Caso não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuario(NOME, DATANASC, DDD, TELEFONE, EMAIL, SENHA) values(:n, :d, :ddd, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":d", $data);
            $sql->bindValue(":ddd", $ddd);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }


        

    }

    public function logar($email, $senha){
        global $pdo;
        //Verificar se o email e senha estão cadastrados
        $sql= $pdo->prepare("SELECT IDUSUARIO FROM usuario WHERE EMAIL = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            //Se sim, entrar no sistema (Sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['IDUSUARIO'] = $dado['IDUSUARIO'];
            echo $_SESSION;
            return true; // Logado Com Sucesso
        }
        else{
            return false; // Nao foi possivel logar
            echo "Erro";
        }

         
    }

   

}


?>