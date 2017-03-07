<?php
	include_once "Control/anotacao.php";//Utiliza anotação para salvar o nome do tipo de arquivo e os campos de banco com suas regras e tipo
	abstract class classe_controle_interface{
		protected $anotacao;
		protected $html;
		protected $tags;
		
		protected function set_html($html){//Salva o HTML do arquivo
			$this->html = $html;
		}
		public function get_html(){//Retorno o HTML do arquivo
			return $this->html;
		}
		
		protected function set_tags($tags){//Salva as tags HTML que o arquivo possui
			$this->tags = $tags;
		}
		protected function get_tags(){//Retorno as tags HTML que o arquivo possui
			return $this->tags;
		}
		
		protected function set_anotacao($nome){//Cria a anotação, solicitando como parâmetro o nome do tipo de arquivo
			$this->anotacao = new anotacao($nome);
		}
		public function get_anotacao(){//Retorna a Anotação
			return $this->anotacao;
		}
	
		protected function get_arquivo($nomeArquivo){//Efetua a leitura do arquivo e retorna seu conteudo
			$arquivo = fopen($nomeArquivo,"r");
			$conteudo = NULL;
			while(!feof($arquivo)){
				$conteudo = $conteudo.fgets($arquivo);
			}
			return $conteudo;
		}
	
		protected function get_conteudoTag($tagInicio,$tagFim){//Separa o conteudo por Início de Tag e Fim de tag retornando seu meio
			if( ( (isset($tagInicio))&&($tagInicio<>NULL) )&&( (isset($tagFim))&&($tagFim<>NULL) ) ){
				$html = $this->get_html();
				$okInicio=false;
				$okFim=false;
				$retorno = array();
				$j=0;
				for($i=0;$i<count($html);$i++){
					if($html[$i]==$tagInicio[0]){
						$x = $i;
						$okInicio=false;
						for($k=0;$k<count($tagInicio);$k++){
							if($html[$x]==$tagInicio[$k]){
								$okInicio=true;
							}else{
								$okInicio=false;
								$k=count($tagInicio)+1;
							}
						}
						if($okInicio==true){
							$i=$i+count($tagInicio);
							$j++;
						}
					}else if($html[$i]==$tagFim[0]){
						$x = $i;
						$okFim=false;
						for($k=0;$k<count($tagFim);$k++){
							if($html[$x]==$tagFim[$k]){
								$okFim=true;
							}else{
								$okFim=false;
								$k=count($tagFim)+1;
							}
						}
						if($okFim==true){
							$i=$i+count($tagFim);
							$j++;
						}
					}
					
					if($okInicio==true){
						$retorno[$j]= $html[$i];
					}else if($okFim==true){
						$okInicio==false;
						$i==$i+count($tagFim);
					}
				}
			}else if( ( (isset($tagInicio))&&($tagInicio<>NULL) )&&( ($tagFim==NULL) ) ){
				$html = $this->get_html();
				$okInicio=false;
				$okFim=false;
				$retorno = array();
				$j=0;
				for($i=0;$i<count($html);$i++){
					if($html[$i]==$tagInicio[0]){
						$x = $i;
						$okInicio=false;
						for($k=0;$k<count($tagInicio);$k++){
							if($html[$x]==$tagInicio[$k]){
								$okInicio=true;
							}else{
								$okInicio=false;
								$k=count($tagInicio)+1;
							}
						}
						if($okInicio==true){
							$i=$i+count($tagInicio);
							$j++;
						}
					}
					
					if($okInicio==true){
						$retorno[$j]= $html[$i];
					}
				}
			}
		}
		
		protected function to_string($arr){//Transforma array em String
			
		}
		
		protected function to_array($string,$quebra,$tipoQuebra){//Transforma string em array, com um valor para quebra e como a quebra irá se compor
			
		}
	}
?>