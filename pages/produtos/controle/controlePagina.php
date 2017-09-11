<?php
	include_once('/dao/conecta.php');
	include_once('/dao/daoProduto.php');
	include_once('/dao/daoVenda.php');
	include_once('/modelo/produto.php');
	include_once('/modelo/venda.php'); 
	class ControlePagina{
		private $dao;
		function retornaProdutosCadastrados(){ //Retorna os últimos produtos cadastrados no sistema
			$this->dao=new DaoProduto();
			$produtos = $this->dao->retornaProdutosCadastrados();
			return $produtos;
		}
		function retornaProdutosCadastradosCombo(){ //Retorna os produtos cadastrados no sistema para ser selecionado na venda
			$this->dao=new DaoProduto();
			$produtos = $this->dao->retornaProdutosCadastradosCombo();
			return $produtos;
		}
		function retornaProdutosVenda($codigoVenda){ //Retorna os produtos cadastrados na venda
			$this->dao=new DaoProduto();
			$produtos = $this->dao->retornaProdutosVenda($codigoVenda);
			return $produtos;
		}
		function retornaVendaAberta(){ //Retorna a venda aberta que não está fechada
			$this->dao=new DaoVenda();
			$venda=$this->dao->retornaVendaAberta();
			return $venda;
		}
		function iniciaVenda($codigoVenda){ //Inicia uma venda
			$this->dao=new DaoVenda();
			$this->dao->iniciaVenda($codigoVenda);
		}
		function retornaMixProdutos($mes, $estatistica){ //Retorna o relatório de Mix de produtos
			$this->dao=new DaoProduto();
			$produtos = $this->dao->retornaMixProdutos($mes, $estatistica);
			return $produtos;
		}
	}
?>