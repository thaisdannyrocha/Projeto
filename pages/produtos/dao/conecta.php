<?php
	class Conecta{
		private $mysqli;
		function conecta(){
			$this->mysqli = new mysqli('localhost','root','','prova');
			mysqli_set_charset($this->mysqli,'utf8');
		}
		function cadastra($query){
			$this->conecta();
			$this->mysqli->query($query);
			
			return $this->mysqli->insert_id;
		}
		function pergunta($query){
			$this->conecta();
			$dados = $this->mysqli->query($query);
			$this->fechaConexao();
			
			return $dados;
		}
		function fechaConexao(){
			mysqli_close ($this->mysqli);
		}
		function getMsqli(){
			return $this->mysqli;
		}
	}
	
?>