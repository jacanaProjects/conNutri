<?php
/*	include '../Model/class_receita_new.php';
	include '../Model/class_material_receita_new.php';
	include '../Control/controller_db_new.php';*/
	include '../Control/controller_new.php';
	class controller_interface{
		private $html;
		private $receita;
		private $material_receita;
		private $controller_bd;
		
		public function __construct(){
			$this->receita = new class_receita;
			$this->material_receita = new class_material_receita;
			$this->controller_bd = new controller_bd;
			$html = '
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
	</head>
	<body>
		oi
	</body>
</html>';
			$this->set_html($html);
		}
		
		public function set_html($html){
			$this->html = $html;
		}
		
		public function get_html(){
			return $this->html;
		}
	}
?>