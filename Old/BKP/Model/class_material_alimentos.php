<?php
	include 'class_padrao_material.php';
	Class class_material_alimentos extends class_padrao_material{
		private $vl_calorico;
		
		public function __construct(){

		}
		
		public function set_desc_material_alimento($ds_material){
			$this->set_desc_material($ds_material);
		}
		
		public function get_desc_material_alimento(){
			//return $this->desc_material;
			return $this->get_desc_material();
		}
		
		public function set_und_med_compra_alimento($und_med_compra){
			//$this->und_med_compra = $und_med_compra;
			$this->set_und_med_compra($und_med_compra);
		}
		
		public function get_und_med_compra_alimento(){
			//return $this->und_med_compra;
			return $this->get_und_med_compra();
		}
		
		public function set_und_med_estoque_alimento($und_med_estoque){
			//$this->und_med_estoque = $und_med_estoque;
			$this->set_und_med_estoque($und_med_estoque);
		}
		
		public function get_und_med_estoque_alimento(){
			//return $this->und_med_estoque;
			return $this->get_und_med_estoque();
		}
		
		public function set_und_med_consumo_alimento($und_med_consumo){
			//$this->und_med_consumo = $und_med_consumo;
			$this->set_und_med_consumo($und_med_consumo);
		}
		
		public function get_und_med_consumo_alimento(){
			//return $this->und_med_consumo;
			return $this->get_und_med_consumo();
		}
		
		public function set_qt_conv_comp_est_alimento($qt_conv_comp_est){
			$this->qt_conv_comp_est = $qt_conv_comp_est;
		}
		
		public function get_qt_conv_comp_est_alimento(){
			return $this->qt_conv_comp_est;
		}
		
		public function set_qt_conv_est_cons_alimento($qt_conv_est_cons){
			$this->qt_conv_est_cons = $qt_conv_est_cons;
		}
		
		public function get_qt_conv_est_cons_alimento(){
			return $this->qt_conv_est_cons;
		}
		
		public function set_cd_material_estoque_alimento($cd_material_estoque){
			$this->cd_material_estoque = $cd_material_estoque;
		}
		
		public function get_cd_material_estoque_alimento(){
			return $this->cd_material_estoque;
		}
		
		public function set_vl_calorico($vl_calorico){
			$this->vl_calorico = $vl_calorico;
		}
		
		public function get_vl_calorico(){
			return $this->vl_calorico;
		}
	}
?>