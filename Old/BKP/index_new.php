<?php
	//---------------************** Start de Session **************---------------\\
	Session_start();
	//---------------************** Inserção de Biblitecas **************---------------\\
	include 'Control/controller_tela_new.php';
	include 'Control/funcoes_new.php';
	include 'Control/controller_new.php';

	//---------------************** Instanciação de variáveis **************---------------\\
	if(!isset($_SESSION["controller"])){//Caso a session não tenha sido criada ainda
		$controller = new controller();//variavel contendo ações e objetos de controle do sistema
		
		$controller_tela = new controller_tela();//variavél de controle para montagem da tela

		$controller_tela->set_menu_total($controller);
		$controller_tela->set_tela(NULL);
		
		$_SESSION["controller"] = serialize($controller);//Grava em sessão os objetos do sistema
		$_SESSION["controller_tela"] = serialize($controller_tela);//Grava em sessão o objeto de controle de tela
	}else{//Caso a session ja tenha sido criada
		$controller = unserialize($_SESSION["controller"]);//Descriptografa sessao
		$controller_tela = unserialize($_SESSION["controller_tela"]);
	}
	
	//---------------************** POSTs e GETS **************---------------\\
	if((isset($_REQUEST["hControle"]))&&($_REQUEST["hControle"] <> NULL)){
		if($_REQUEST["hControle"][0] == 'm'){

		}else if($_REQUEST["hControle"][0] == 's'){

		}
	}
	//---------------************** Montagem de tela **************---------------\\
	echo $controller_tela->get_tela();

	$_SESSION["controller"] = serialize($controller);
	$_SESSION["controller_tela"] = serialize($controller_tela);
	
	session_destroy();
?>