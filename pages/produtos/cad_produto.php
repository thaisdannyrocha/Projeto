<?php
	include_once("controle/controlePagina.php");
	
	//Carregar produtos
	$cp=new ControlePagina();
	$produtos = $cp->retornaProdutosCadastrados();
?>
<html>
	<head>
		<script src="js/scripts.js"></script>
	</head>
	<body>
		<div class="row" id="cad_produto">
			<h3>Editar de produtos</h3>
			<form class="col s12">
				<div class="row">
					<div class="input-field col s2">
						<input disabled placeholder="Código" id="codigoProduto" type="text">
						<label for="codigo">Codigo</label>
					</div>
					<div class="input-field col s6">
						<input placeholder="Nome" id="nomeProduto" class="materialize-textarea" type="text">
						<label for="nome">Nome</label>
					</div>
					<div class="input-field col s2">
						<input placeholder="Preço" id="precoProduto" class="materialize-textarea" type="text">
						<label for="preco">Preço</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s2">
						<a class="waves-effect waves-light btn" id="cadProduto">Cadastrar</a>
					</div>
					
					
				</div>
			</form>
		</div>
		<div>
			<!-- Lista dos últimos produtos já cadastrados -->
			<h4>Produtos cadastrados</h4>
			<table>
				<thead>
					<tr>
						<th data-field="id">Código</th>
						<th data-field="name">Nome</th>
						<th data-field="preco">Preço</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($produtos as $produto){
					?>
					<tr>
						<td><?php echo $produto->getCodigo(); ?></td>
						<td><?php echo $produto->getNome(); ?></td>
						<td><?php echo $produto->getPreco(); ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			
		</div>
	</body>
</html>