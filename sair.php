<?php
	session_start();
	unset($_SESSION['IDUSUARIO']);
	header("location: ./login.php");
?>
