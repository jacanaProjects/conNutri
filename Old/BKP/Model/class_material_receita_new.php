<?php
	class class_material_receita{
		private $html;
		private $cd_receita;
		private $ds_material;
		private $ds_und_med_mat;
		private $vl_calorico_material;
		private $qt_material;
		
		public function __construct(){
			
		}
		
		public function get_html_cadastro(){
			$html = '
				<td class="conteudo">
					<form id="cadastro_material_receita" name="cadastro_material_receita" method="POST">
						<table border=0 class="conteudo">
							<tr>
								<td>
									Material Receita:
								</td>
								<td>
									<input type="text" name="ds_material" id="ds_material"/>
								</td>
							</tr>
							<tr>
								<td>
									Unidade de Medida:
								</td>
								<td>
									<input type="text" name="ds_und_med_mat" id="ds_und_med_mat"/>
								</td>
							</tr>
							<tr>
								<td>
									Valor calórico do material:
								</td>
								<td>
									<input type="text" name="vl_calorico_material" id="vl_calorico_material" readonly="readonly"/>
								</td>
							</tr>
							<tr>
								<td>
									Quantidade:
								</td>
								<td>
									<input type="text" name="qt_material" id="qt_material"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Salvar"/>
								</td>
							</tr>
						</table>
						<input type="hidden" name="funcao" id="funcao" value="cad_mat_receita"/>
					</form>
				</td>
			</tr>
		</table>';
			$this->set_html($html);
			return $this->get_html();
		}
		
		public function set_html($html){
			$this->html = $html;
		}
		
		public function get_html(){
			return $this->html;
		}
		
		public function set_cd_receita($cd_receita){
			$this->cd_receita = $cd_receita;
		}
		
		public function get_cd_receita(){
			return $this->cd_receita;
		}
		
		public function set_ds_material($ds_material){
			$this->ds_material = $ds_material;
		}
		
		public function get_ds_material(){
			return $this->ds_material;
		}
		
		public function set_ds_und_med_mat($ds_und_med_mat){
			$this->ds_und_med_mat = $ds_und_med_mat;
		}
		
		public function get_ds_und_med_mat(){
			return $this->ds_und_med_mat;
		}
		
		public function set_vl_calorico_material($vl_calorico_material){
			$this->vl_calorico_material = $vl_calorico_material;
		}
		
		public function get_vl_calorico_material(){
			return $this->vl_calorico_material;
		}
		
		public function set_qt_material($qt_material){
			$this->qt_material = $qt_material;
		}
		
		public function get_qt_material(){
			return $this->qt_material;
		}
	}
?>