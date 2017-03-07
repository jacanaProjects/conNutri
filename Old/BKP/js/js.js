function submitMenu(codMenu,actionMenu,tipoMenu){
	var form;
	var hidden;
	form = document.getElementById("controle");
	hidden = document.getElementById("hControle");
	
	hidden.value = "CM="+codMenu+",AM="+actionMenu+",TM="+tipoMenu;
	form.submit();
}

function enviarFormulario($campo){
	var $hidden= document.getElementById('hControle');
	var $form = document.getElementById('controle');
	if($campo[0] == 's'){
		$form.target = 'iConteudo';
		$form.action = 'View/conteudo.htm';
	}
	$hidden.value = $campo;
	$form.submit();
}

function alerta($alerta){
	alert($alerta);
}