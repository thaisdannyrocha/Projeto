<?php	
	include_once('../dao/conecta.php');
	include_once('../dao/daoVenda.php');
	include_once('../modelo/venda.php');
	class ControleVenda{
		private $dao;
		function executa($comando){
			$this->dao=new DaoVenda();
			if($comando=="finalizaVenda"){
				$this->finalizaVenda();
			}
		}
		function finalizaVenda(){ //Finaliza a venda
			$codigoVenda=$_REQUEST['codigoVenda'];
			
			$this->dao=new DaoVenda();
			$this->dao->finalizaVenda($codigoVenda);
			
			echo $codigoVenda;
		}
	}
	
	if(isset($_REQUEST['comando'])){
		$cd=new ControleVenda(); //Inicia a classe de controle
		
		$comando=$_REQUEST['comando'];
		
		$cd->executa($comando);
	}
?>