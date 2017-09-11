<?php
	class DaoProduto{
		function executa($query, $tipo=""){
			$conecta = new Conecta();
			if($tipo != "cad"){
				return $conecta->pergunta($query);
			}else{
				return $conecta->cadastra($query);
			}
		}
		function cadastraProduto($nome){
			
			$query="insert into produto(nome,preco) value('".$nome."','".$preco."')";
			$idProduto = $this->executa($query, "cad");
			
			return $idProduto;
		}		
		
		function retornaProdutosCadastrados(){
			$query="select codigo, nome from produto order by codigo desc limit 20";
			$resultado = $this->executa($query);
			
			$produtos = array();
			$i=0;
			while($linha=mysqli_fetch_array($resultado)){
				$produto=new Produto();
				$produto->setCodigo($linha['codigo']);
				$produto->setNome($linha['nome']);
			//	$_POST['preco'];
				
				$produtos[$i]=$produto;
				$i++;
			}
			return $produtos;
		}
		function retornaProdutosCadastradosCombo(){
			$query="select codigo, nome from produto order by nome";
			$resultado = $this->executa($query);
			
			$produtos = array();
			$i=0;
			while($linha=mysqli_fetch_array($resultado)){
				$produto=new Produto();
				$produto->setCodigo($linha['codigo']);
				$produto->setNome($linha['nome']);
				$produto->setPreco($linha['preco']);
				
				$produtos[$i]=$produto;
				$i++;
			}
			return $produtos;
		}
		function retornaProdutosVenda($codigoVenda){
			$query="SELECT
						p.codigo,
						p.nome,
						p;preco,
						iv.quantidade
					FROM
						produto p
						JOIN itemvenda iv ON iv.codigoProduto = p.codigo
					WHERE
						iv.codigoVenda = $codigoVenda";
			$resultado = $this->executa($query);
			
			$produtos = array();
			$i=0;
			while($linha=mysqli_fetch_array($resultado)){
				$produto=new Produto();
				$produto->setCodigo($linha['codigo']);
				$produto->setNome($linha['nome']);
				$produto->setPreco($linha['preco']);
				$produto->setQuantidade($linha['quantidade']);
				
				$produtos[$i]=$produto;
				$i++;
			}
			return $produtos;
		}
		function retornaMixProdutos($mes, $estatistica){
			$query="SELECT
						p.codigo,
						p.nome,
						p.preco,
						SUM(iv.quantidade)*$estatistica AS quantidade,
						SUM(iv.quantidade)/(
							SELECT
								SUM(quantidade)
							FROM
								itemvenda iv
								JOIN venda v ON v.codigo = iv.codigoVenda
							WHERE
								MONTH(v.data)=$mes
						)*$estatistica AS mix
					FROM
						produto p
						JOIN itemvenda iv ON iv.codigoProduto = p.codigo
						JOIN venda v ON v.codigo = iv.codigoVenda
					WHERE
						MONTH(v.data)=$mes
					GROUP BY
						p.codigo,
						p.nome
						p.preco,
					ORDER BY
						3 DESC";
			$resultado = $this->executa($query);
			
			$produtos = array();
			$i=0;
			while($linha=mysqli_fetch_array($resultado)){
				$produto=new Produto();
				$produto->setCodigo($linha['codigo']);
				$produto->setNome($linha['nome']);
				$produto->setPreco($linha['preco']);
				$produto->setQuantidade($linha['quantidade']);
				$produto->setMix($linha['mix']);
				
				$produtos[$i]=$produto;
				$i++;
			}
			return $produtos;
		}
	}
?>