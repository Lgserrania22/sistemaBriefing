<?php

require_once("./config.php");

class Usuario{
	private $id;
	private $nome;
	private $login;
	private $senha;
	private $cargo;

	public function __construct(){
		
	}

	//SETTERS----------------------------
	private function setId($id){
		$this->id = $id;
	}
	private function setNome($nome){
		$this->nome = $nome;
	}
	private function setLogin($login){
		$this->login = $login;
	}
	private function setSenha($senha){
		$this->senha = $senha;
	}
	private function setCargo($cargo){
		$this->cargo = $cargo;
	}
	//------------------------------------

	//GETTERS-----------------------------
	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getCargo(){
		$query = "SELECT nomeCargo FROM cargo WHERE idCargo = :ID";
		$conn = new Sql();
		$nomeCargo = $conn->select($query, array(
			":ID" => $this->id
			));
		return $nomeCargo[0]["nomeCargo"];
	}
	//------------------------------------

	//Função para logar o usuário---------
	public function login($login, $senha){
		$query = "SELECT * FROM usuario WHERE loginUsuario = :LOGIN AND senhaUsuario = :SENHA";
		$conn = new Sql();
		$usuario = $conn->select($query, array(
			":LOGIN" => $login, 
			":SENHA" => $senha));
		//Depois de logar, seta os dados na classe usuário
		if(isset($usuario[0])){ 
			$this->setters($usuario[0]);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//----------------------------------
	//Função para carregar um usuário pelo ID
	public function loadById($id){
		$query = "SELECT * FROM usuario WHERE idUsuario = :ID";
		$conn = new Sql();
		$usuario = $conn->select($query, array(
			":ID" => $id));
		//Depois de logar, seta os dados na classe usuário
		if(isset($usuario[0])){ 
			$this->setters($usuario[0]);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//---------------------------------
	//Função para chamar os setters quando carregar um usuário
	private function setters($dados){
		$this->setId($dados["idUsuario"]);
		$this->setNome($dados["nomeUsuario"]);
		$this->setLogin($dados["loginUsuario"]);
		$this->setSenha($dados["senhaUsuario"]);
		$this->setCargo($dados["idCargo"]);
	}
	//-----------------------------------
	//Função para inserir um usuário-----
	public function insertUsuario($nome, $login, $senha, $cargo){
		$testeLogin = $this->testaLogin($login);
		if($testeLogin){
			return FALSE;
		}else{
			$query = "INSERT INTO usuario(nomeUsuario, loginUsuario, senhaUsuario, idCargo) VALUES (:NOME, :LOGIN, :SENHA, :CARGO)";
			$conn = new Sql();
			$conn->query($query, array(
				":NOME" => $nome,
				":LOGIN" => $login,
				":SENHA" => $senha,
				":CARGO" => $cargo
				));
			return TRUE;
		}
	}
	//-----------------------------------
	//Função para ver se já existe um usuário com aquele login
	public function testaLogin($login){
		$query = "SELECT * FROM usuario WHERE loginusuario = :LOGIN";
		$conn = new Sql();
		$usuario = $conn->select($query, array(
			":LOGIN" => $login
			));
		if(count($usuario) > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//---------------------------------
}

?>