<?php
	
	require_once("./config.php");

	class Cargo{

		private $id;
		private $texto;

		public function __construct(){
		
		}
		
		//SETTERS------------------------------
		private function setId($id){
			$this->id = $id;
		}
		private function setTexto($texto){
			$this->texto = $texto;
		}
		//-------------------------------------

		//GETTERS------------------------------
		public function getId(){
			return $this->id;
		}
		public function getTexto(){
			return $this->texto;
		}
		//-------------------------------------

		//Função que seta os valores nas variáveis
		private function setters($pergunta){
			$this->setId($pergunta["idPergunta"]);
			$this->setTexto($pergunta["textoPergunta"]);
		}
		//--------------------------------------

		//Função que retorna todas as perguntas na forma de array
		public function loadAll(){
			$query = "SELECT * FROM pergunta";
			$conn = new Sql();
			$pergunta = $conn->select($query);
			return $pergunta;
		}
		//----------------------------------------

		//Função que carrega uma pergunta pelo seu ID
		public function loadById($id){
			$query = "SELECT * FROM pergunta WHERE idPergunta = :ID";
			$conn = new Sql();
			$pergunta = $conn->select($query, array(
				":ID" => $id
				));
			if(isset($pergunta[0])){
				$this->setters($pergunta[0]);
				return TRUE;
			}else{
				return FALSE;
			}
		}
		//---------------------------------------------
	}

?>