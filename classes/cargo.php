<?php
	
	require_once("./config.php");

	class Cargo{

		private $id;
		private $nome;

		public function __construct(){
		
		}
		
		//SETTERS------------------------------
		private function setId($id){
			$this->id = $id;
		}
		private function setNome($nome){
			$this->nome = $nome;
		}
		//-------------------------------------

		//GETTERS------------------------------
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		//-------------------------------------

		//Função que seta os valores nas variáveis
		private function setters($cargo){
			$this->setId($cargo["idCargo"]);
			$this->setNome($cargo["nomeCargo"]);
		}

		//Função para carregar um cargo pelo nome
		public function loadByNome($nome){
			$query = "SELECT * FROM cargo WHERE nomeCargo = :NOME";
			$conn = new Sql();
			$cargo = $conn->select($query, array(
				":NOME" => $nome
				));
			if(isset($cargo[0])){ 
				$this->setters($cargo[0]);
				return TRUE;
			}else{
				return FALSE;
			}
		}
		//---------------------------------------

		//Função que carrega todos os cargos e retorna um array contendo eles
		public function loadAll(){
			$query = "SELECT * FROM cargo";
			$conn = new Sql();
			$cargo = $conn->select($query);
			return $cargo;
		}
		//---------------------------------------

		//Função para cadastrar um cargo---------
		public function insertCargo($nome){
			$query = "INSERT INTO cargo(nomeCargo) VALUES(:NOME)";
			$conn = new Sql();
			$conn->query($query, array(
				":NOME" => $nome
				));
		}
		//---------------------------------------

	}

?>