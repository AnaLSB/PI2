<?php

Class Usuario{ 
    private $pdo; 
    public $msgErro = "";
    private $id;

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
            global $id;
            //Se sim, entrar no sistema (Sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['IDUSUARIO'] = $dado['IDUSUARIO'];
            $id = $_SESSION['IDUSUARIO'];
            return true; // Logado Com Sucesso
        }
        else{
            return false; // Nao foi possivel logar
            echo "Erro";
        }
    }
    public function alterarNome($nome, $id){
        global $pdo;
        $sql= $pdo->prepare("UPDATE usuario SET NOME = :n WHERE IDUSUARIO = :id");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function alterarData($data, $id){
        global $pdo;
        $sql= $pdo->prepare("UPDATE usuario SET DATANASC = :d WHERE IDUSUARIO = :id");
        $sql->bindValue(":d",$data);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function alterarEmail($email, $id){
        global $pdo;
        // Verificar se o email já está cadastrado
        $sql = $pdo->prepare("SELECT IDUSUARIO FROM usuario WHERE EMAIL = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        

        //Se está, não cadastra e retorna false
        if($sql->rowCount() > 0){
            $msgErro = "E-mail já cadastrado!";
            return false;
        }
        else{
            $sql= $pdo->prepare("UPDATE usuario SET EMAIL = :e WHERE IDUSUARIO = :id");
            $sql->bindValue(":e",$email);
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() == 1){
                return true;
            }
            else{
                return false;
            }
        }
        
        
    }

    public function alterarDDD($ddd, $id){
        global $pdo;
        $sql= $pdo->prepare("UPDATE usuario SET DDD = :d WHERE IDUSUARIO = :id");
        $sql->bindValue(":d",$ddd);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function alterarTelefone($tel, $id){
        global $pdo;
        $sql= $pdo->prepare("UPDATE usuario SET TELEFONE = :t WHERE IDUSUARIO = :id");
        $sql->bindValue(":t",$tel);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function alterarSenha($senha, $id){
        global $pdo;
        $sql= $pdo->prepare("UPDATE usuario SET SENHA = :s WHERE IDUSUARIO = :id");
        $sql->bindValue(":s",md5($senha));
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function comparaSenha($senha, $id){
        global $pdo;
        $sql = $pdo->prepare("SELECT IDUSUARIO FROM usuario WHERE SENHA = :s and IDUSUARIO = :id");
        $sql->bindValue(":s",md5($senha));
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
?>
