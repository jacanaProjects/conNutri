<?php
	class conection{
		private $conection;
		private $bd;
		private $query;
		private $result_query;
		
		public function __construct($arr_con,$bd){
		}
		
		private function get_conexao(){
			$aux = $this->get_conection();
			return mysql_connect($aux['endereco'],$aux['user'],$aux['pwd']);
		}
		
		private function close_conexao(){
			mysql_close($this->get_conexao());
		}
		
		protected function set_conection($conection){
			$this->conection = $conection;
		}
		
		private function get_conection(){
			return $this->conection;
		}
		
		private function get_banco(){
			return mysql_select_db($this->get_bd());
		}
		
		protected function set_bd($bd){
			$this->bd = $bd;
		}
		
		private function get_bd(){
			return $this->bd;
		}
		
		protected function set_query($query){
			$this->query = $query;
		}
		
		protected function get_query(){
			return $this->query;
		}
		
		private function set_result_query($result){
			$this->result_query = $result;
		}
		
		protected function get_result_query(){
			return $this->result_query;
		}
		
		protected function executa_query(){
			$resultado = 'Nada consta com este filtro';
			$this->get_banco();
			$result = mysql_query($this->get_query(),$this->get_conexao());
			if(($this->get_query()[0]=='s')||($this->get_query()[0]=='S')){
				if($result){
					while($linha = mysql_fetch_array($result)){
						$resultado[] = $linha;
					}
					$this->set_result_query($linha);
					mysql_free_result($result);
				}else{
					$linha = 'Desculpe, não podemos efetuar sua Busca.<br/>Erro: '.mysql_error().' - Código: '.mysql_errno();
				}
			}else if($this->get_query()[0]=='I'){
				
			}
			$this->close_conexao();
			return $resultado;
		}
	}
?>