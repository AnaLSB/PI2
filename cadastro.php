<?php
    require_once './Classes/usuarios.php';
    $u = new Usuario;

?>
<!DOCTYPE html>
<html lang="pt-br"> 

<head>
	<meta charset="utf-8">
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
	<div id="corpo-form-Cad">
		<form method="POST">
			<h1>Cadastrar</h1>
            <input type="text" placeholder="Nome Completo" name="nome" maxlength="30">
            <input type="text" placeholder="Telefone" name="telefone" maxlength="30">
            <input type="email" placeholder="E-mail" name="email" maxlength="40">
            <input type="password" placeholder="Senha" name="senha"  maxlength="15">
            <input type="password" placeholder="Confirmar Senha" name="confsenha" maxlength="15">
			<input type="submit" value="Cadastrar" name="">
		</form>
    </div>
    <?php

        // Verificar se clicou no botao 
        if(isset($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $ConfirmarSenha = addslashes($_POST['confsenha']);

            //Verificar se está preenchido
            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($ConfirmarSenha)){
                $u->conectar("projeto_login","localhost","root", "");
                if($u->msgErro == ""){
                    if($senha == $ConfirmarSenha){
                        if($u->cadastrar($nome, $telefone, $email, $senha)){
                            echo "Cadastrado com sucesso! Acesse para entrar.";
                        }
                        else{
                            echo"Email já cadastrado!";
                        }
                    }
                    else{
                        echo "Senhas não conferem!";
                    }
                    
                }
                else{
                    echo "Erro: ".$u->msgErro;
                }
            }
            else{
                echo "Preencha todos os campos!";
            }
        }
    
    ?>

</body>

</html>