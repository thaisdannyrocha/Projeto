<?php
	include_once("controle/controlePagina.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Controle de Produtos | Produtos</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="estilos/estilos.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="js/scripts.js"></script>
	</head>
	<body>
		<nav>
			<!-- Menu principal -->
			<ul id="slide-out" class="side-nav fixed">
				<li><a href="#!" id="adicionarProduto">Novo Produto</a></li>
				<li><a href="#!" id="editarProduto">Editar Produto</a></li>
				<li><a href="#!" id="excluirProduto">Excluir Produto</a></li>
				<li><a href="#!" id="abrirRelatorio">Relatório</a></li>
			</ul>
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<div class="nav-wrapper teal darken-3" id='navPrincipal'>
				<a href="#" class="brand-logo">Produtos</a>
			</div>
		</nav>
		<div id="conteudo">
			<!-- Modal para as páginas do projeto -->
			<div id='modal'></div>
		</div>
	</body>
</html>