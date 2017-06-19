<?php
	session_start();
	require_once("config.php");

	/*$usuario = new Usuario();
	$conectar = $usuario->login('lgserrania','1234');
	if($conectar == TRUE){
		$_SESSION["usuario"] = $usuario;
		echo $_SESSION["usuario"]->getId()."<br>";
		echo $_SESSION["usuario"]->getNome()."<br>";
		echo $_SESSION["usuario"]->getLogin()."<br>";
		echo $_SESSION["usuario"]->getCargo()."<br>";

	}else{
		echo "Não conectou";
	}*/

	/*$cargo = new Cargo();
	$cargo->insertCargo("Programador");*/

	$usuario = new Usuario();
	$teste = $usuario->insertUsuario("Carlos", "lgserrania", "1234", 1);
	if($teste){
		echo "Inseriu";
	}else{
		echo "Não inseriu";
	}
	
?>