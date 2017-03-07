<?php
	Class class_unidade_medida{
		private $html;
		
		private $cod_undidade_medida;
		private $desc_unidade_medida;
		
		public function set_cod_undidade_medida($cod_undidade_medida){
			$this->cod_undidade_medida = $cod_undidade_medida;
		}
		
		public function get_cod_undidade_medida(){
			return $this->cod_undidade_medida;
		}
		
		public function set_desc_unidade_medida($desc_unidade_medida){
			$this->desc_unidade_medida = $desc_unidade_medida;
		}
		
		public function get_desc_unidade_medida(){
			return $this->desc_unidade_medida;
		}
		
		public function set_html($html){
			$this->html = $html;
		}
		
		public function get_html_cadastro(){
			$html = null;
			$this->set_html($html);
			return $this->html;
		}
		
		public function get_html_consulta(){
			$html = null;
			$this->set_html($html);
			return $this->html;
		}
	}
?>