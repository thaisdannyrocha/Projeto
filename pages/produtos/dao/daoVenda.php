<?php
	class DaoVenda{
		function executa($query, $tipo=""){
			$conecta = new Conecta();
			if($tipo != "cad"){
				return $conecta->pergunta($query);
			}else{
				return $conecta->cadastra($query);
			}
		}
		function retornaVendaAberta(){
			$query="SELECT
						codigo,
						data,
						status
					FROM
						venda
					WHERE
						codigo = (SELECT MAX(codigo) FROM venda)";
			$resultado = $this->executa($query);
			
			$linha=mysqli_fetch_array($resultado);
			$venda = new Venda();
			$venda->setCodigo($linha['codigo']);
			$venda->setData($linha['data']);
			$venda->setStatus($linha['status']);
			
			return $venda;
		}
		function iniciaVenda($codigoVenda){
			$query="insert into venda(codigo, data) (
				select
					$codigoVenda,
					now()
			)";
			$resultado = $this->executa($query);
		}
		function finalizaVenda($codigoVenda){
			$query="UPDATE
						venda
					SET
						STATUS = 1
					WHERE
						codigo = $codigoVenda";
			$resultado = $this->executa($query);
		}
	}
?>