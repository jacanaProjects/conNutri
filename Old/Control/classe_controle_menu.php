<?php
	include_once "Control/classe_controle_interface.php";
	class classe_controle_menu extends classe_controle_interface{
		protected $html;
		protected $tags;
		
		public function __construct(){
			$this->set_anotacao('classe_controle_menu');
			$tags = array("inicio"=>NULL,"fim"=>NULL);
			//$tags["inicio"] = array("<html>","<head>","<META charset=".'"UTF-8"'."/>","<title>","<script type=".'"text/javascript"'." src=".'"js/js.js"'.">","<body>");
			//$tags["fim"] = array("</html>","</head>",NULL,"</title>","</script","</body>");
			//$this->set_tags($tags);
			$html = $this->get_arquivo("View/index_menu.html");
			$this->set_html($html);
		}
	}
?>