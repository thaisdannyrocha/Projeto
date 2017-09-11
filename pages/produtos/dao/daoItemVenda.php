<?php
	class DaoItemVenda{
		function executa($query, $tipo=""){
			$conecta = new Conecta();
			if($tipo != "cad"){
				return $conecta->pergunta($query);
			}else{
				return $conecta->cadastra($query);
			}
		}
		function existeItem($itemVenda){
			$query="select * from itemvenda where codigoVenda = ".$itemVenda->getCodigoVenda()." and codigoProduto = ".$itemVenda->getCodigoProduto();
			$resultado = $this->executa($query);
			
			$linha=mysqli_fetch_array($resultado);
			if($linha['codigoVenda']!=""){
				return 1;
			}else{
				return 0;
			}
		}
		function adicionaItem($itemVenda){
			$query="insert into itemvenda(codigoVenda, codigoProduto, quantidade) values(
				".$itemVenda->getCodigoVenda().",
				".$itemVenda->getCodigoProduto().",
				".$itemVenda->getQuantidade()."
			)";
			$resultado = $this->executa($query);
		}
	}
?>