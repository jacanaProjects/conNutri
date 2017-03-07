<?php
	//---------------************** Start de Session **************---------------\\
	Session_start();
	
	//---------------************** Inserção de Biblitecas **************---------------\\
	include 'Control/funcoes.php';
	include 'Control/controller_tela.php';
	include 'Control/controller.php';

	//---------------************** Instanciação de variáveis **************---------------\\
	if(!isset($_SESSION["controller"])){//Caso a session não tenha sido criada ainda
		$controller = new controller;//variavel contendo ações e objetos de controle do sistema
		
		$controller_tela = new controller_tela();//variavél de controle para montagem da tela

		$controller_tela->set_tela(NULL);
		
		$_SESSION["controller"] = serialize($controller);//Grava em sessão os objetos do sistema
		$_SESSION["controller_tela"] = serialize($controller_tela);//Grava em sessão o objeto de controle de tela
	}else{//Caso a session ja tenha sido criada
		$controller = unserialize($_SESSION["controller"]);//Descriptografa sessao
		$controller_tela = unserialize($_SESSION["controller_tela"]);
	}
	
	//---------------************** POSTs e GETS **************---------------\\
	if((isset($_REQUEST))&&($_REQUEST <> NULL)){
		if(isset($_REQUEST['funcao'])){
			if($_REQUEST['funcao']=='cad_receita'){
				if( (($_REQUEST['ds_receita'] <> "")||($_REQUEST['ds_receita'] <> NULL))&&(($_REQUEST['qt_porcao'] <> "")||($_REQUEST['qt_porcao'] <> NULL)) ){
					$arr = array('ds_receita'=>$_REQUEST['ds_receita'],'qt_porcao'=>$_REQUEST['qt_porcao']);
					$result = $controller->cad_receita($arr);
					if($result <> null){
						$controller_tela->set_conteudo($result);
						$controller_tela->set_tela(NULL);
					}else{
						$html = $controller->get_material_receita()->get_html_cadastro();
						$controller_tela->set_conteudo($html);
						$controller_tela->set_tela(NULL);
					}
				}else{
					if(($_REQUEST['ds_receita'] == "")||($_REQUEST['ds_receita'] == NULL)){
						echo "<script>alert('Favor preencher o campo Receita!'); window.location.reload('');</script>";
					}else if(($_REQUEST['qt_porcao'] == "")||($_REQUEST['qt_porcao'] == NULL)){
						echo "<script>alert('Favor preencher o campo Porções!'); window.location.reload('');</script>";
					}
				}
			}else if($_REQUEST['funcao']=='cad_mat_receita'){
				if( (($_REQUEST['ds_material']<>"")||($_REQUEST['ds_material'] <> NULL))&&(($_REQUEST['ds_und_med_mat'] <>"")||($_REQUEST['ds_und_med_mat']<>NULL))&&(($_REQUEST['qt_material']<>"")||($_REQUEST['qt_material']<>NULL)) ){
					$arr = array('ds_material'=>$_REQUEST['ds_material'],'ds_und_med_mat'=>$_REQUEST['ds_und_med_mat'],'qt_material'=>$_REQUEST['qt_material']);
					$result = $controller->cad_mat_receita($arr);
					if($result <> null){
						$controller_tela->set_conteudo($result);
						$controller_tela->set_tela(NULL);
					}
				}else{
					if(($_REQUEST['ds_material'] == "")||($_REQUEST['ds_material'] == NULL)){
						echo "<script>alert('Favor preencher o campo Material!'); window.location.reload('');</script>";
					}else if(($_REQUEST['ds_und_med_mat'] == "")||($_REQUEST['ds_und_med_mat'] == NULL)){
						echo "<script>alert('Favor preencher o campo Und. Med. Material!'); window.location.reload('');</script>";
					}else if(($_REQUEST['qt_material'] == "")||($_REQUEST['qt_material'] == NULL)){
						echo "<script>alert('Favor preencher o campo Qtd. Material!'); window.location.reload('');</script>";
					}
				}
			}else if($_REQUEST['funcao']=='pesq_receita'){
				if((($_REQUEST['cod_receita'] == "")||($_REQUEST['cod_receita'] == null))&&(($_REQUEST['ds_receita'] == "")||($_REQUEST['ds_receita'] == null))){
					echo "<script>alert('Favor um dos campos para se efetuar a pesquisa!'); window.location.reload('');</script>";
				}else{
					$arr = array('cod_receita'=>$_REQUEST['cod_receita'],'ds_receita'=>$_REQUEST['ds_receita']);
					$result = $controller->pesq_receita($arr);
					if($result <> null){
						$controller_tela->show_result($result,'receita');
					}
				}
			}
		}else if((isset($_REQUEST))&&($_REQUEST<>NULL)&&(isset($_REQUEST['hControle']))){
			$hControle = onechave_array($_REQUEST['hControle'],',',1,0);
			if($hControle[2] == 'TM=1'){
				if($hControle[0]=='CM=0,'){
					$conteudo = '
					<table border=0 class="conteudo">
						<tr>
							<td>
								<div class="titulo">Seja Bem Vindo ao conNutri!<br/>Favor efetue o login para dar continuidade.</div>
							</td>
						</tr>
					</table>';
					$controller_tela->set_conteudo($conteudo);
					$controller_tela->set_tela(NULL);
				}else{
					$menu = $controller->get_menu_sistema()->get_menu_aberto();
					$codMenu = onechave_array($hControle[0],'=',1,0);
					$aux = onechave_array($codMenu[1],',',0,0);
					if($menu[0] <> NULL){
						$arrMenuAberto = NULL;
						$ok=1;
						for($i=0;$i<count($menu);$i++){
							if($menu[$i] <> $aux[0]){
								$arrMenuAberto[] = $menu[$i];
							}else{
								$ok=0;
							}
						}
						if($ok==1){
							$arrMenuAberto[] = $aux[0];
						}
						$controller->get_menu_sistema()->set_menu_aberto($arrMenuAberto);
						//$controller_tela->set_menu_total($controller);
					}else{
						$arrMenuAberto = array($aux[0]);
						$controller->get_menu_sistema()->set_menu_aberto($arrMenuAberto);
						//$controller_tela->set_menu_total($controller);
					}
				}
			}else if($hControle[2] == 'TM=2'){
				$subMenu = $controller->get_menu_sistema()->get_subMenu();
				for($i=0;$i<count($subMenu["codSubMenu"]);$i++){
					$aux = 'CM='.$subMenu["codSubMenu"][$i].',';
					if($hControle[0]==$aux){
						if($hControle[1]=="AM=1,"){
							$html = $controller->get_receita()->get_html_cadastro();
							$controller_tela->set_conteudo($html);
							$controller_tela->set_tela(NULL);
						}else if($hControle[1]="AM=2,"){
							$html = $controller->get_receita()->get_html_consulta();
							$controller_tela->set_conteudo($html);
							$controller_tela->set_tela(null);
						}
					}
				}
			}
		}else{
			echo 'Desculpe, tivemos um problema. Favor reinicie sua conexão.';
		}
	}
	
	//---------------************** Montagem de tela **************---------------\\
	$controller_tela->set_menu_total($controller);
	echo $controller_tela->get_tela();
	
	$_SESSION["controller"] = serialize($controller);
	$_SESSION["controller_tela"] = serialize($controller_tela);
	
	//session_destroy();
?>