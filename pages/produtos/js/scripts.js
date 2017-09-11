$(document).ready(function(){
	//Comandos da página principal
	$('#adicionarProduto').click(function(){
		$('#modal').load('cad_produto.php');
		return false;
	});
	$('#iniciarVenda').click(function(){
		$('#modal').load('cad_venda.php');
		return false;
	});
	$('#abrirRelatorio').click(function(){
		$('#modal').load('relatorio.php');
		return false;
	});
	
	//Página cadastro de produtos
	$('#cadProduto').click(function(){
		nome=$('#nomeProduto').val();
		if(nome!=""){
			$.ajax({
				type: 'POST',
				url: 'controle/controleProduto.php',
				data:{
					nome:nome,
					comando:"cadastraProduto"
				},
				success: function(resultado){
					if(!resultado.isNaN){
						Materialize.toast('Produto cadastrado com o código '+resultado, 4000);
						$('#modal').load('cad_produto.php');
						return false;
					}
				}
			});
		}else{
			Materialize.toast('Digite um nome de produto', 4000);
		}
	});
	
	//Página vendas
	$('#adicionarItem').click(function(){
		codigoVenda=$("#codigoVenda").val();
		codigoProduto=$("#codigoProduto").val();
		nomeProduto=$('#codigoProduto :selected').text();
		quantidade=$("#quantidade").val();
		$.ajax({
			type: 'POST',
			url: 'controle/controleItemVenda.php',
			data:{
				codigoVenda:codigoVenda,
				codigoProduto:codigoProduto,
				nomeProduto:nomeProduto,
				quantidade:quantidade,
				comando:"adicionaItem"
			},
			success: function(resultado){
				//Incluir itens na tabela
				if(resultado==1){
					Materialize.toast('Item já foi adicionado', 4000);
				}else{
					resultado=resultado.split('#');
					addNewRowVenda(resultado[0], resultado[1], resultado[2]);
				}
			}
		});
	});
	$('#cadVenda').click(function(){
		codigoVenda=$('#codigoVenda').val();
		$.ajax({
			type: 'POST',
			url: 'controle/controleVenda.php',
			data:{
				codigoVenda:codigoVenda,
				comando:"finalizaVenda"
			},
			success: function(resultado){
				if(resultado != 0){
					Materialize.toast('Venda '+resultado+' realizada com sucesso', 4000);
					$('#modal').html('');
				}
			}
		});
	});
	
	//Página relatório
	$('#gerarRelatorio').click(function(){
		mes=$('#mesSelecionado').val();
		estatistica=$('#estatistica').val();
		$('#modal').load('relatorio.php?mes='+mes+'&estatistica='+estatistica);
	});
	
	//Inicializações
	$('select').material_select();
});
function addNewRowVenda(codigoProduto, nomeProduto, quantidade){
	var newRow = $("<tr>");
    var cols = "";
	
    cols += '<td>'+codigoProduto+'</td>';
    cols += '<td>'+nomeProduto+'</td>';
    cols += '<td>'+quantidade+'</td>';
	
    newRow.append(cols);
    $("#tblItemVenda").append(newRow);
	
    return false;
}