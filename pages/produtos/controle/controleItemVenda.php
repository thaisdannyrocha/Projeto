<?php	
	include_once('../dao/conecta.php');
	include_once('../dao/daoItemVenda.php');
	include_once('../modelo/itemVenda.php');
	class ControleProduto{
		private $dao;
		function executa($comando){
			$this->dao=new DaoItemVenda();
			if($comando=="adicionaItem"){
				$this->adicionaItem();
			}
		}
		function adicionaItem(){ //Adiciona os ítens na venda aberta
			$codigoVenda=$_REQUEST['codigoVenda'];
			$codigoProduto=$_REQUEST['codigoProduto'];
			$nomeProduto=$_REQUEST['nomeProduto'];
			$quantidade=$_REQUEST['quantidade'];
			
			$itemVenda=new ItemVenda();
			$itemVenda->setCodigoVenda($codigoVenda);
			$itemVenda->setCodigoProduto($codigoProduto);
			$itemVenda->setQuantidade($quantidade);
			
			$this->dao=new DaoItemVenda();
			$existe=$this->dao->existeItem($itemVenda);
			if($existe==0){
				$this->dao->adicionaItem($itemVenda);
				echo $codigoProduto."#".$nomeProduto."#".$quantidade;
			}else{
				echo 1;
			}
		}
	}
	
	if(isset($_REQUEST['comando'])){
		$cd=new ControleProduto();
		
		$comando=$_REQUEST['comando'];
		
		$cd->executa($comando);
	}
?>