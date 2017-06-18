<?php
	
	class Sql extends PDO{
	
		private $host = "localhost";
		private $dbname = "sistemabriefing";
		private $user = "root";
		private $pass = "";
		private $conn;

		//Quando a classe é chamada, ela já conecta automáticamente no banco
		public function __construct(){
			
			$this->conn = new PDO("mysql:dbname=$this->dbname;host=$this->host", $this->user, $this->pass);

		}

		//Função para setar um único parâmetro em uma statment
		private function setParametro($statment, $key, $value){
			
			$statment->bindParam($key,$value);

		}

		//Função para setar vários parâmetros em uma statment
		private function setParametros($statment, $parametros = array()){
			
			foreach ($parametros as $key => $value) {
				$this->setParametro($statment,$key,$value);
			}

		}

		//Função que lê uma query de SQL, associa os parâmetros e executa
		public function query($rowQuery, $parametros = array()){
			
			$stmt = $this->conn->prepare($rowQuery);
			if(count($parametros) != 0){
				$this->setParametros($stmt, $parametros);
			}
			$stmt->execute();

			return $stmt;
		}

		//Função que faz o SELECT no SQL e retorna um array com os dados coletados
		public function select($rowQuery, $parametros = array()){
			$stmt = $this->query($rowQuery, $parametros);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

	}	

?>