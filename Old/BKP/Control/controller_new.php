<?php
//	include 'Model/class_material_alimentos.php';
	include 'Model/class_receita_new.php';
	include 'Model/class_material_receita_new.php';
	include 'Model/class_menu_sistema_new.php';
	include 'Control/controller_db_new.php';
	class controller{
		private $menuSistema;
		private $material_alimentos;
		private $receita;
		private $material_receita;
		private $arrAux;
		private $controller_db;
		
		public function __construct(){
			$this->menuSistema = new class_menu_sistema;
			$this->receita = new class_receita;
			$this->material_receita = new class_material_receita;
			$this->controller_db = new controller_bd;
		}
		
		public function set_menu_sistema($menu_sistema){
			$this->menuSistema = $menu_sistema;
		}
		
		public function get_menu_sistema(){
			return $this->menuSistema;
		}
		
		public function set_receita($receita){
			$this->receita = $receita;
		}
		
		public function get_receita(){
			return $this->receita;
		}
		
		public function set_material_receita($material_receita){
			$this->material_receita = $material_receita;
		}
		
		public function get_material_receita(){
			return $this->material_receita;
		}
		
		private function pesquisar_db($tela,$arr){
			if($tela == 'receita'){
				return $this->controller_db->get_receita($arr);
			}
		}
		
		private function salvar_db($tela,$obj){
			if($tela == 'receita'){
				$return = $this->controller_db->set_receita($obj);
				if($return){
					return $return;
				}
			}
		}
		
		public function cad_receita($arr){
			$auxReceita = new class_receita();
			$auxReceita->set_ds_receita($arr['ds_receita']);
			$auxReceita->set_qt_porcao($arr['qt_porcao']);
			
			$retorno = $this->salvar_db('receita',$auxReceita);
			if($retorno <> null){
				return $retorno;
			}else{
				$auxArr = array('select'=>NULL,'where'=>NULL,'condicao'=>NULL,'order'=>NULL);
				$auxArr['select'] = array('max(receita.cod_receita)');
				$auxArr['where'] = array("receita.ds_receita = '".$arr['ds_receita']."'");
				//$auxArr = array('select'=>'max(cod_receita)','where'=>'ds_receita = '.$arr['ds_receita'],'condicao'=>NULL,'order'=>NULL);
				$result = $this->pesquisar_db('receita',$auxArr);
				$auxReceita->set_cod_receita($result[0]);
				$this->get_receita($auxReceita);
				$this->get_material_receita()->set_cod_receita($result[0]);
			}
		}
		
		public function pesq_receita($arr){
			$auxArr = array('select'=>NULL,'where'=>NULL,'condicao'=>NULL,'order'=>NULL);
			$auxArr['select'] = array('receita.*');
			if((($arr['cod_receita'] <> NULL)||($arr['cod_receita'] <> ""))&&(($arr['ds_receita'] <> NULL)||($arr['ds_receita'] <> ""))){
				$auxArr['where'] = array('receita.cod_receita = '.$arr['cod_receita'],"upper(receita.ds_receita) = '".$arr['ds_receita']."'");
				$auxArr['condicao'] = array('and');
			}else if(($arr['cod_receita'] == NULL)||($arr['cod_receita'] == "")&&($arr['ds_receita'] <> NULL)||($arr['ds_receita'] <> "")){
				$auxArr['where'] = array("receita.ds_receita = '".$arr['ds_receita']."'");
			}else if(($arr['cod_receita'] <> NULL)||($arr['cod_receita'] <> "")&&($arr['ds_receita'] == NULL)||($arr['ds_receita'] == "")){
				$auxArr['where'] = array('receita.cod_receita = '.$arr['cod_receita']);
			}
			$result = $this->pesquisar_db('receita',$auxArr);
			return $result;
		}
	}
?>