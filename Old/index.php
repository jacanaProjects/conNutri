<?php
	session_start();//Cria Sessão do navegador
	include_once "Control/classe_controle.php";
	$controle = new classe_controle();
	echo $controle->get_html();
	//session_destroy();
?>