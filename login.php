<?php
    require_once './Classes/usuarios.php';
    $u = new Usuario;
    $u->conectar("integrador","localhost","root", "");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/estilo.css">
</head> 


<body>
	<div class="overlay"></div>
	<div class="login">
		<div id="corpo-form">
			<form method="POST">
				<h1 style="color: rgb(0, 139, 139);">Login</h1>
				<input type="email" placeholder="E-mail" name="lemail">
				<input type="password" placeholder="Senha" name="lsenha">
				<input type="submit" value="Acessar" name="login">
			</form>
		</div>
		<?php

	        // Verificar se clicou no botao de login
	        if(isset($_POST['lemail'])){
	            $email = addslashes($_POST['lemail']);
	            $senha = addslashes($_POST['lsenha']);

	            //Verificar se está preenchido
	            if(!empty($email) && !empty($senha)){
	                if($u->msgErro == ""){
		                if($u->logar($email, $senha)){
		                    header("location: src/profile/profile.php");
		                }
		                else{
	                        ?>
	                        <div class="msg-erro">
	                        	Usuário e/ou senha inválidos.
	                    	</div>
	                    	<?php
		                }
	                }
	                else{
	                    echo "Erro: ".$u->msgErro;
	                }
	            }
	            else{
	                ?>
                    <div class="msg-erro">
                    	Preencha todos os campos.
                	</div>
                	<?php
	            }
	        }
        ?>
	</div>
	<div class="cadastro">
		<div id="corpo-form" style="margin-top: 70px">
			<form method="POST">
				<h1 style="color: rgb(0, 139, 139);">Cadastro</h1>
				<input type="name" placeholder="Nome Completo" name="nome" maxlength="100" required>
				<input placeholder="Data de Nascimento" class="textbox-n" type="text" onfocus="(this.type='date')" name="data" style="width: 12.5em;" required>
				<table>
					<tr>
						<td><input type="number" placeholder="DDD" name="ddd" maxlength="3" style="width: 70px;" required></td>
						<td><input type="number" placeholder="Telefone" name="telefone" maxlength="9" required style="width: 280px;"></td>
					</tr>
				</table>
				<input type="email" placeholder="E-mail" name="email" maxlength="255" required>
				<input type="password" placeholder="Senha" name="senha" maxlength="8" required>
				<input type="password" placeholder="Confirmar Senha" name="confsenha" maxlength="8" required>
				<input type="submit" value="Cadastrar" name="cadastro">
			</form>
		</div>
		<?php
	        // Verificar se clicou no botao de cadastro
	        if(isset($_POST['nome'])){
	            $nome = addslashes($_POST['nome']);
	            $data = addslashes($_POST['data']);
	            $ddd = addslashes($_POST['ddd']);
	            $telefone = addslashes($_POST['telefone']);
	            $email = addslashes($_POST['email']);
	            $senha = addslashes($_POST['senha']);
	            $ConfirmarSenha = addslashes($_POST['confsenha']);

	            //Verificar se está preenchido
	            if(!empty($nome) && !empty($data) && !empty($ddd) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($ConfirmarSenha)){
	                if($u->msgErro == ""){
	                    if($senha == $ConfirmarSenha){
	                        if($u->cadastrar($nome, $data, $ddd, $telefone, $email, $senha)){
	                            ?>
	                            <div class="msg-sucesso">
	                            	Cadastrado com sucesso! Acesse para entrar.
	                        	</div>
	                        	<?php
	                        }
	                        else{
	                            ?>
	                            <div class="msg-erro">
	                            	E-mail já cadastrado.
	                        	</div>
	                        	<?php
	                        }
	                    }
	                    else{
	                        ?>
	                        <div class="msg-erro">
	                        	Senhas não conferem.
	                    	</div>
	                    	<?php
	                    }
	                    
	                }
	                else{
	                    echo "Erro: ".$u->msgErro;
	                }
	            }
	            else{
	                ?>
	                <div class="msg-erro">
	                	Preencha todos os campos.
	            	</div>
	            	<?php
	            }
	        }
    	?>
	</div>
	

        


</body>

</html>