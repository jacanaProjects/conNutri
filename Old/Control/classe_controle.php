<?php
	include_once "Control/classe_controle_interface.php";
	include_once "Control/classe_controle_pagina.php";
	include_once "Control/classe_controle_cabecalho.php";
	include_once "Control/classe_controle_menu.php";
	include_once "Control/classe_controle_conteudo.php";
	class classe_controle extends classe_controle_interface{
		private $controller_pagina;
		private $controller_cabecalho;
		private $controller_menu;
		private $controller_conteudo;
		
		public function __construct(){
			$this->controller_pagina = new classe_controle_pagina();//Instancia o controlador da página
			$this->set_html($this->controller_pagina->get_html());//Instancia HTML Index;
			$this->controller_cabecalho = new classe_controle_cabecalho();//Instancia o controlador de cabecalho
			$_SESSION["cabecalho"] = $this->controller_cabecalho->get_html();
			$this->controller_menu = new classe_controle_menu();//Instancia o controlador de Menu
			$_SESSION["menu"] = $this->controller_menu->get_html();
			$this->controller_conteudo = new classe_controle_conteudo();//instancia o controlador de conteudo
			$_SESSION["conteudo"] = $this->controller_conteudo->get_html();
		}
	}
?>