<?php
	class class_receita{
		private $html;
		private $cod_receita;
		private $ds_receita;
		private $vl_calorico_receita;
		private $qt_porcao;
		
		public function __construct(){
			
		}
		
		public function get_html_cadastro(){
			$html = null;
			$this->set_html($html);
			return $this->get_html();
		}
		public function get_html_consulta(){
			$html = null;
			$this->set_html($html);
			return $this->get_html();
		}
		
		public function set_html($html){
			$this->html = $html;
		}
		
		public function get_html(){
			return $this->html;
		}
		
		public function set_cod_receita($cod_receita){
			$this->cod_receita = $cod_receita;
		}
		
		public function get_cod_receita(){
			return $this->cod_receita;
		}
		
		public function set_ds_receita($ds_receita){
			$this->ds_receita = $ds_receita;
		}
		
		public function get_ds_receita(){
			return $this->ds_receita;
		}
		
		public function set_vl_calorico_receita($vl_calorico_receita){
			$this->vl_calorico_receita = $vl_calorico_receita;
		}
		
		public function get_vl_calorico_receita(){
			return $this->vl_calorico_receita;
		}
		
		public function set_qt_porcao($qt_porcao){
			$this->qt_porcao = $qt_porcao;
		}
		
		public function get_qt_porcao(){
			return $this->qt_porcao;
		}
	}
?>