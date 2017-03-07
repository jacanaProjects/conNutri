<?php
	Class class_padrao_material{
		private $html;
		
		private $cod_material;
		private $desc_material;
		private $und_med_compra;
		private $und_med_estoque;
		private $und_med_consumo;
		private $qt_conv_comp_est;
		private $qt_conv_est_cons;
		private $cd_material_estoque;
		private $vl_colorico;
		
		public function set_cod_material($cod_material){
			$this->cod_material = $cod_material;
		}
		
		public function get_cod_material(){
			return $this->cod_material;
		}
		
		public function set_desc_material($ds_material){
			$this->desc_material = $ds_material;
		}
		
		public function get_desc_material(){
			return $this->desc_material;
		}
		
		public function set_und_med_compra($und_med_compra){
			$this->und_med_compra = $und_med_compra;
		}
		
		public function get_und_med_compra(){
			return $this->und_med_compra;
		}
		
		public function set_und_med_estoque($und_med_estoque){
			$this->und_med_estoque = $und_med_estoque;
		}
		
		public function get_und_med_estoque(){
			return $this->und_med_estoque;
		}
		
		public function set_und_med_consumo($und_med_consumo){
			$this->und_med_consumo = $und_med_consumo;
		}
		
		public function get_und_med_consumo(){
			return $this->und_med_consumo;
		}
		
		public function set_qt_conv_comp_est($qt_conv_comp_est){
			$this->qt_conv_comp_est = $qt_conv_comp_est;
		}
		
		public function get_qt_conv_comp_est(){
			return $this->qt_conv_comp_est;
		}
		
		public function set_qt_conv_est_cons($qt_conv_est_cons){
			$this->qt_conv_est_cons = $qt_conv_est_cons;
		}
		
		public function get_qt_conv_est_cons(){
			return $this->qt_conv_est_cons;
		}
		
		public function set_cd_material_estoque($cd_material_estoque){
			$this->cd_material_estoque = $cd_material_estoque;
		}
		
		public function get_cd_material_estoque(){
			return $this->cd_material_estoque;
		}
		
		public function set_vl_calorico($vl_calorico){
			$this->vl_calorico = $vl_calorico;
		}
		
		public function get_vl_calorico(){
			return $this->vl_calorico;
		}
		
		public function set_html($html){
			$this->html = $html;
		}
		
		public function get_html_cadastro(){
			$html = '
				<td class="conteudo">
					<form id="cadastro_material" name="cadastro_material" method="POST">
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
									Unidade de Medida Compra:
								</td>
								<td>
									<input type="text" name="cod_und_med_comp" id="cod_und_med_comp"/>
								</td>
							</tr>
							<tr>
								<td>
									Unidade de Medida Estoque:
								</td>
								<td>
									<input type="text" name="cod_und_med_esto" id="cod_und_med_esto"/>
								</td>
							</tr>
							<tr>
								<td>
									Unidade de Medida Consumo:
								</td>
								<td>
									<input type="text" name="cod_und_med_cons" id="cod_und_med_cons"/>
								</td>
							</tr>
							<tr>
								<td>
									Conversao Compra x Estoque:
								</td>
								<td>
									<input type="text" name="qt_conv_comp_esto" id="qt_conv_comp_esto"/>
								</td>
							</tr>
							<tr>
								<td>
									Conversao Estoque x Consumo:
								</td>
								<td>
									<input type="text" name="qt_conv_esot_cons" id="qt_conv_esot_cons"/>
								</td>
							</tr>
							<tr>
								<td>
									Material de Estoque:
								</td>
								<td>
									<input type="text" name="cod_mat_esto" id="cod_mat_esto"/>
								</td>
							</tr>
							<tr>
								<td>
									Valor calórico do material:
								</td>
								<td>
									<input type="text" name="vl_calorico" id="vl_calorico"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Salvar"/>
								</td>
							</tr>
						</table>
						<input type="hidden" name="funcao" id="funcao" value="cadastro_material"/>
					</form>
				</td>
			</tr>
		</table>';
			$html = null;
			$this->set_html($html);
			return $this->html;
		}
		
		public function get_html_consulta(){
			$html = '
					<form id="pesquisa_material" name="pesquisa_material" method="POST">
						<table border=0 class="conteudo">
							<tr>
								<td>
									Código Material:
								</td>
								<td>
									<input type="text" name="cod_material" id="cod_material"/>
								</td>
							</tr>
							<tr>
								<td>
									Descrição Material:
								</td>
								<td>
									<input type="text" name="ds_material" id="ds_material"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Pesquisar"/>
								</td>
							</tr>
						</table>
						<input type="hidden" name="funcao" id="funcao" value="pesq_receita"/>
					</form>';
			$html = null;
			$this->set_html($html);
			return $this->html;
		}
	}
?>