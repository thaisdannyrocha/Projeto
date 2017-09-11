<?php
	include_once("controle/controlePagina.php");
	
	//Recuperar o mês selecionado
	if(isset($_GET['mes'])){
		$mes=$_GET['mes'];
	}else{
		$mes=date('m');
	}
	//Recuperar a estatística digitada
	if(isset($_GET['estatistica'])){
		$estatistica=$_GET['estatistica'];
	}else{
		$estatistica=1;
	}
	
	//Carregar mix
	$cp=new ControlePagina();
	$produtos = $cp->retornaMixProdutos($mes, $estatistica);
?>
<html>
	<head>
		<script src="js/scripts.js"></script>
	</head>
	<body>
		<div class="row" id="relatorio">
			<h3>Relatório</h3>
			<div class='row'>
				<div class="input-field col s4">
					Mês do relatório
					<select id='mesSelecionado'>
						<?php
							//Seleção de meses do ano para o relatório
							for($i=1; $i<=12; $i++){
								if($i==$mes){
								?>
						<option value='<?php echo $i; ?>' selected><?php echo $i; ?></option>
								<?php
								}else{
								?>
						<option value='<?php echo $i; ?>'><?php echo $i; ?></option>
								<?php
								}
							}
						?>
					</select>
				</div>
				<div class="input-field col s4">
					Estatística do próximo mês
					<input id="estatistica" type="text" value="<?php echo $estatistica; ?>">
				</div>
				<div class="input-field col s4">
					<a class="waves-effect waves-light btn" id="gerarRelatorio">Gerar relatório</a>
				</div>
			</div>
			<table id='tblItemVenda'>
				<thead>
					<tr>
						<th data-field="id">Código</th>
						<th data-field="name">Nome</th>
						<th data-field="name">Quantidade</th>
						<th data-field="name">Mix</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($produtos as $produto){
							//Lista de produtos vendidos no mês selecionado
					?>
					<tr>
						<td><?php echo $produto->getCodigo(); ?></td>
						<td><?php echo $produto->getNome(); ?></td>
						<td><?php echo $produto->getQuantidade(); ?></td>
						<td><?php echo $produto->getMix(); ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>