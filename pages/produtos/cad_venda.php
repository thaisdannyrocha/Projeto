<?php
	include_once("controle/controlePagina.php");
	include_once("modelo/venda.php");
	
	//Carregar produtos
	$cp=new ControlePagina();
	$produtosCombo = $cp->retornaProdutosCadastradosCombo();
	
	//Inicia venda
	$venda = $cp->retornaVendaAberta();
	if($venda->getStatus()==0){ //Caso já exista uma venda em aberto
		//Carregar itens da venda não terminada
		$codigoVenda=$venda->getCodigo();
		$produtosVenda = $cp->retornaProdutosVenda($codigoVenda);
	}else if($venda->getStatus()==1){ //Caso a última venda já esteja fechada
		$codigoVenda=$venda->getCodigo()+1;
		$cp->iniciaVenda($codigoVenda);
	}else{ //Caso não tenha venda nenhuma
		$venda = new Venda();
		$codigoVenda=1;
		$cp->iniciaVenda($codigoVenda);
	}
?>
<html>
	<head>
		<script src="js/scripts.js"></script>
	</head>
	<body>
		<div class="row" id="cad_produto">
			<h3>Nova Venda</h3>
			<form class="col s12">
				<div class="row">
					<div class="input-field col s2">
						<input placeholder="Código" disabled id="codigoVenda" type="text" value="<?php echo $codigoVenda; ?>">
					</div>
					<div class="input-field col s4">
						<!-- Carregar os produtos cadastrados -->
						<select id="codigoProduto">
							<option value="">:: Selecione ::</option>
							<?php
								foreach($produtosCombo as $produto){
									?>
							<option value="<?php echo $produto->getCodigo(); ?>"><?php echo $produto->getNome(); ?></option>
									<?php
								}
							?>
							<label>Materialize Select</label>
						</select>
					</div>
					<div class="input-field col s2">
						<input placeholder="Quantidade" id="quantidade" class="materialize-textarea" type="text">
						<label for="quantidade">Quantidade</label>
					</div>
					<div class="input-field col s2">
						<a class="waves-effect waves-light btn" id="adicionarItem">+</a>
					</div>
				</div>
				
				<div class="row">
					<!-- Lista dos produtos incluídos na venda -->
					<h4>Produtos incluidos</h4>
					<table id='tblItemVenda'>
						<thead>
							<tr>
								<th data-field="id">Código</th>
								<th data-field="name">Nome</th>
								<th data-field="name">Quantidade</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($produtosVenda)){
									foreach($produtosVenda as $produto){
							?>
							<tr>
								<td><?php echo $produto->getCodigo(); ?></td>
								<td><?php echo $produto->getNome(); ?></td>
								<td><?php echo $produto->getQuantidade(); ?></td>
							</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="input-field col s2">
						<a class="waves-effect waves-light btn" id="cadVenda">Finalizar</a>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>