<?php
	class class_menu_sistema{
		private $menu;
		private $subMenu;
		private $menuAberto;
		private $html;
		
		public function __construct(){
			$this->menu = array("codMenu"=>NULL,"descMenu"=>NULL,"actionMenu"=>NULL,"codMenuSup"=>NULL);
			$this->subMenu = array("codSubMenu"=>NULL,"descSubMenu"=>NULL,"actionSubMenu"=>NULL,"codMenuSup"=>NULL);
			$this->set_bd_menu();
			
			$this->menuAberto = Array(NULL);
			
			$this->html = NULL;
		}
		
		private function set_bd_menu(){
			$menuSistema = array("codMenu"=>NULL,"descMenu"=>NULL,"actionMenu"=>NULL);
			$menuSistema["codMenu"] = array(0,1,2);
			$menuSistema["descMenu"] = array("Home","Cadastro","Consulta");
			$menuSistema["actionMenu"] = array(0,1,2);
//			$menuSistema["codMenuSup"] = array(NULL,NULL,NULL);
			
			$subMenuSistema = array("codSubMenu"=>NULL,"descSubMenu"=>NULL,"actionSubMenu"=>NULL,"codMenuSup"=>NULL);
			$subMenuSistema["codSubMenu"] = array(1,2);
			$subMenuSistema["descSubMenu"] = array("Receita","Receita");
			$subMenuSistema["actionSubMenu"] = array(1,2);
			$subMenuSistema["codMenuSup"] = array(1,2);
			
			$this->set_menu($menuSistema);
			$this->set_subMenu($subMenuSistema);
		}
		
		public function set_menu($arrMenu){
			$this->menu = $arrMenu;
		}
		
		public function get_menu(){
			return $this->menu;
		}
		
		public function set_subMenu($arrSubMenu){
			$this->subMenu = $arrSubMenu;
		}
		
		public function get_subMenu(){
			return $this->subMenu;
		}
		
		public function set_menu_aberto($arrMenuAberto){
			$this->menuAberto = $arrMenuAberto;
		}
		
		public function get_menu_aberto(){
			return $this->menuAberto;
		}
		
		public function get_html_menu(){
			$this->set_html_menu_total();
			return $this->get_html();
		}
		
		public function get_html(){
			return $this->html;
		}
		
		public function set_html($html){
			$this->html = $html;
		}
		
		public function set_html_menu_total(){
			$html = "<center>Desculpe, tivemos um problema na montagem do menu.<br/><br/>Favor Contactar o Administrador do Sistema</center>";
			if(isset($this->menuAberto[0])){
				$html = null;
				for($x=0;$x<count($this->menuAberto);$x++){
					for($i=0;$i<count($this->menu["codMenu"]);$i++){
						$html = null;
						if((array_key_exists($x,$this->menuAberto))&&($this->menu["codMenu"][$i] == $this->menuAberto[$x])){
							$html = $html.null;
							$html = $html.$this->get_html_menu_aberto($this->menu["codMenu"][$i]);
							$x++;
						}else{
							$html = $html.null;
						}
					}
				}
			}else{
				for($i=0;$i<count($this->menu["codMenu"]);$i++){
					if($i == 0){
						$html = '
				+<input type="button" name="m'.$this->menu['codMenu'][$i].'" id="m'.$this->menu['codMenu'][$i].'" value="'.$this->menu['descMenu'][$i].'" class="optMenu" onClick="enviarFormulario('."'m".$this->menu['codMenu'][$i]."'".')"/><p/>';
					}else
						$html = $html.'
				+<input type="button" name="m'.$this->menu['codMenu'][$i].'" id="m'.$this->menu['codMenu'][$i].'" value="'.$this->menu['descMenu'][$i].'" class="optMenu" onClick="enviarFormulario('."'m".$this->menu['codMenu'][$i]."'".')"/><p/>';
					//}
				}
			}
			$this->set_html($html);
		}
		
		public function get_html_menu_aberto($codMenuSup){
			$html = null;
			for($i=0; $i<count($this->subMenu["codSubMenu"]);$i++){
				if($this->subMenu["codMenuSup"][$i] == $codMenuSup){
					//echo "<script>alert('subMenu Superior= ".$this->subMenu["codMenuSup"][$i]." Menu = ".$codMenuSup."')</script>";
					
					$html = $html.null;
				}
			}
			return $html;
		}
	}
?>