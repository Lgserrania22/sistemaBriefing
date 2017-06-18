<?php
	session_start();
	require_once("config.php");

	$usuario = new Usuario();
	$conectar = $usuario->login('lgserrania','1234');
	if($conectar == TRUE){
		$_SESSION["usuario"] = $usuario;
	}else{
		echo "Não conectou";
	}

?>