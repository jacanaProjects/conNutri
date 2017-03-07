<?php
	include_once "Control/classe_controle_interface.php";
	class classe_controle_cabecalho extends classe_controle_interface{
		protected $html;
		protected $tags;
		
		public function __construct(){
			$this->set_anotacao('classe_controle_cabecalho');
			$tags = array("inicio"=>NULL,"fim"=>NULL);
			$tags["inicio"] = array("<html lang=".'"pt-br"'.">","<head>","<META http-equiv=".'"Content-Type"'." content=".'"text/html; charset=utf-8"'.">","<title>","<script type=".'"text/javascript"'." src=".'"js/js.js"'.">","<link rel=".'"stylesheet"'." type=".'"text/css"'." href=".'"css/css.css"'.">","<body>","<div id=".'"logo"'.">","<div id=".'"titulo"'.">","<div id=".'"login"'.">");
			$tags["fim"] = array("</html>","</head>",NULL,"</title>","</script>",NULL,"</body>","</div>","</div>","</div>");
			$this->set_tags($tags);
			$html = $this->get_arquivo("View/index_cabecalho.html");
			$this->set_html($html);
		}
	}
?>