<?php
	class anotacao{
		private $nome;
		private $campos;
		private $funcoes;
		
		public function __construct($nome){
			$this->set_nome($nome);
		}
		
		private function set_nome($nome){
			$this->nome = $nome;
		}
		
		public function get_nome(){
			return $this->nome;
		}
		
		private function set_campos(){
			
		}
		
		public function get_campos(){
			
		}
		
		private function set_funcoes(){
			
		}
		
		public function get_funcoes(){
			
		}
	}
?>