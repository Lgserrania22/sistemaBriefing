<?php

	class Cliente{

		private $id;
		private $nome;
		private $empresa;
		private $email;
		private $telefone;

		public function __construct(){

		}

		//GETTERS--------------------------	
		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getEmpresa(){
			return $this->empresa;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		//--------------------------------

		//SETTERS-------------------------
		private function setId($id){
			$this->id = $id;
		}
		private function setNome($nome){
			$this->nome = $nome;
		}
		private function setEmpresa($empresa){
			$this->empresa = $empresa;
		}
		private function setEmail($email){
			$this->email = $email;
		}
		private function setTelefone($telefone){
			$this->telefone = $telefone;
		}
		//--------------------------------

		//Função para setar todos os valores
		private function setters($cliente){
			$this->setId($cliente["idCliente"]);
			$this->setNome($cliente["nomeCliente"]);
			$this->setEmpresa($cliente["empresaCliente"]);
			$this->setEmail($cliente["emailCliente"]);
			$this->setTelefone($cliente["telefoneCliente"]);
		}
		//----------------------------------

		//Função para carregar um cliente pelo id
		public function loadById($id){
			$query = "SELECT * FROM cliente WHERE idCliente = :ID";
			$conn = new Sql();
			$cliente = $conn->select($query, array(
				":ID" => $id
				));
			if(isset($cliente[0])){
				$this->setters($cliente[0]);
				return TRUE;
			}else{
				return FALSE;
			}

		}
		//---------------------------------------

		//Função que carrega todos os clientes e retorna na forma de array
		public function loadAll(){
			$query = "SELECT * FROM cliente";
			$conn = new Sql();
			$clientes = $conn->select($query);
			return $clientes;
		}
	}

?>