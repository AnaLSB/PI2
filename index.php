<?php
	session_start();
	if(!isset($_SESSION['IDUSUARIO'])){
		header("location: login.php");
		exit;
	}
?>
BEM VINDO!!!
<a href="sair.php">Sair</a>