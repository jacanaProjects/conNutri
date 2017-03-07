<?php
	class controller_tela{
		private $html;
		private $menu;
		private $conteudo;
		private $login;
		private $rodape;
		
		private $inicioHtml;
		private $inicioHead;
		private $titulo;
		private $configuracoes;
		private $fimHead;
		private $inicioBody;
		private $inicioCabecalho;
		private $fimCabecalho;
		private $inicioLogin;
		private $fimLogin;
		private $inicioCorpo;
		private $inicioMenu;
		private $fimMenu;
		private $inicioConteudo;
		private $fimConteudo;
		private $fimCorpo;
		private $inicioRodape;
		private $fimRodape;
		private $controle;
		private $fimBody;
		private $fimHtml;
		
		public function __construct(){
			$arquivo = null;
			$p_arquivo = fopen('View/index.html','r');//Abre arquivo index.html somente para leitura
			while(!feof($p_arquivo)){//le todas as linhas e salva em variavel
				$arquivo = $arquivo.fgets($p_arquivo);
			}
			
			$inicioHtml = onechave_array($arquivo,'<head>',0,0);
			$inicioHead = onechave_array($inicioHtml[1],'<title>',0,0);
			$titulo = onechave_array($inicioHead[1],'</title>',1,0);
			$configuracoes = onechave_array($titulo[1],'</head>',0,0);
			$fimHead = onechave_array($configuracoes[1],'</head>',1,0);
			$inicioBody = onechave_array($fimHead[1],'<body>',1,0);
			//$body = onechave_array($inicioBody[1],'</body>',0,0);
			$inicioCabecalho = onechave_array($inicioBody[1],'<td width="90%" id="cabecalho">',1,0);
			$conteudoCabecalho = '
					<font class="tituloMenor">con</font>Nutri';
			$fimCabecalho = onechave_array($inicioCabecalho[1],'<table id="login" border=0>',0,0);
			$inicioLogin = onechave_array($fimCabecalho[1],'<table id="login" border=0>',1,0);
			$login = '
							<tr>
								<td>
									Login:
								</td>
								<td>
									<input type="text" name="usuario" id="usuario"/>
								</td>
							</tr>
							<tr>
								<td>
									Senha:
								</td>
								<td>
									<input type="password" name="senha" id="senha"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Entrar" class="SubmitLogin"/>
								</td>
							</tr>';
			$fimLogin = onechave_array($inicioLogin[1],'</table>
				</td>
			</tr>
		</table>',1,0);
			$inicioCorpo = onechave_array($fimLogin[1],'<table border=0 class="corpo">',1,0);
			$inicioMenu = onechave_array($inicioCorpo[1],'<table border=0 class="menu">',1,0);
			$fimMenu = onechave_array($inicioMenu[1],'</table>
				</td>',1,0);
			$inicioConteudo = onechave_array($fimMenu[1],'<td class="conteudo">',1,0);
			$conteudo = '
					<table border=0 class="conteudo">
						<tr>
							<td>
								<div class="titulo">Seja Bem Vindo ao conNutri!<br/>Favor efetue o login para dar continuidade.</div>
							</td>
						</tr>
					</table>';
			$fimConteudo = onechave_array($inicioConteudo[1],'</td>
			</tr>',1,0);
			$fimCorpo = onechave_array($fimConteudo[1],'<table border=0 class="rodape">',0,0);
			$inicioRodape = onechave_array($fimCorpo[1],'<table border=0 class="rodape">',1,0);
			$rodape = '
				<tr>
					<td>
						Desenvolvido por: Jackson A. Seratti & Jéssica T. C. J. Seratti
					</td>
				</tr>';
			$fimRodape = onechave_array($inicioRodape[1],'</table>',1,0);
			$controle = onechave_array($inicioRodape[1],'</form>',1,0);
			$fimBody = onechave_array($controle[1],'</body>',1,0);
			$fimHtml = onechave_array($fimBody[1],'</html>',1,0);
			
			$this->set_inicioHtml($inicioHtml[0]);
			$this->set_inicioHead($inicioHead[0]);
			$this->set_titulo($titulo[0]);
			$this->set_configuracoes($configuracoes[0]);
			$this->set_fimHead($fimHead[0]);
			$this->set_inicioBody($inicioBody[0]);
			$this->set_inicioCabecalho($inicioCabecalho[0]);
			$this->set_fimCabecalho($fimCabecalho[0]);
			$this->set_inicioLogin($inicioLogin[0]);
			$this->set_login($login);
			$this->set_fimLogin($fimLogin[0]);
			$this->set_inicioCorpo($inicioCorpo[0]);
			$this->set_inicioMenu($inicioMenu[0]);
			$this->set_fimMenu($fimMenu[0]);
			$this->set_inicioConteudo($inicioConteudo[0]);
			$this->set_conteudo($conteudo);
			$this->set_fimConteudo($fimConteudo[0]);
			$this->set_fimCorpo($fimCorpo[0]);
			$this->set_inicioRodape($inicioRodape[0]);
			$this->set_rodape($rodape);
			$this->set_fimRodape($fimRodape[0]);
			$this->set_controle($controle[0]);
			$this->set_fimBody($fimBody[0]);
			$this->set_fimHtml($fimHtml[0]);
			
			$this->set_tela(NULL);
		}
		
		private function set_inicioHtml($inicioHtml){
			$this->inicioHtml = $inicioHtml;
		}
		private function get_inicioHtml(){
			return $this->inicioHtml;
		}
		
		private function set_inicioHead($inicioHead){
			$this->inicioHead = $inicioHead;
		}
		private function get_inicioHead(){
			return $this->inicioHead;
		}
		
		private function set_titulo($titulo){
			$this->titulo = $titulo;
		}
		private function get_titulo(){
			return $this->titulo;
		}
		
		private function set_configuracoes($configuracoes){
			$this->configuracoes = $configuracoes;
		}
		private function get_configuracoes(){
			return $this->configuracoes;
		}
		
		private function set_fimHead($fimHead){
			$this->fimHead = $fimHead;
		}
		private function get_fimHead(){
			return $this->fimHead;
		}
		
		private function set_inicioBody($inicioBody){
			$this->inicioBody = $inicioBody;
		}
		private function get_inicioBody(){
			return $this->inicioBody;
		}
		
		private function set_inicioCabecalho($inicioCabecalho){
			$this->inicioCabecalho = $inicioCabecalho;
		}
		private function get_inicioCabecalho(){
			return $this->inicioCabecalho;
		}
		
		private function set_fimCabecalho($fimCabecalho){
			$this->fimCabecalho = $fimCabecalho;
		}
		private function get_fimCabecalho(){
			return $this->fimCabecalho;
		}
		private function set_inicioLogin($inicioLogin){
			$this->inicioLogin = $inicioLogin;
		}
		private function get_inicioLogin(){
			return $this->inicioLogin;
		}
		
		private function set_fimLogin($fimLogin){
			$this->fimLogin = $fimLogin;
		}
		private function get_fimLogin(){
			return $this->fimLogin;
		}
		
		private function set_inicioCorpo($inicioCorpo){
			$this->inicioCorpo = $inicioCorpo;
		}
		private function get_inicioCorpo(){
			return $this->inicioCorpo;
		}
		
		private function set_inicioMenu($inicioMenu){
			$this->inicioMenu = $inicioMenu;
		}
		private function get_inicioMenu(){
			return $this->inicioMenu;
		}
		
		private function set_fimMenu($fimMenu){
			$this->fimMenu = $fimMenu;
		}
		private function get_fimMenu(){
			return $this->fimMenu;
		}
		
		private function set_inicioConteudo($inicioConteudo){
			$this->inicioConteudo = $inicioConteudo;
		}
		private function get_inicioConteudo(){
			return $this->inicioConteudo;
		}
		
		private function set_fimConteudo($fimConteudo){
			$this->fimConteudo = $fimConteudo;
		}
		private function get_fimConteudo(){
			return $this->fimConteudo;
		}
		
		private function set_fimCorpo($fimCorpo){
			$this->fimCorpo = $fimCorpo;
		}
		private function get_fimCorpo(){
			return $this->fimCorpo;
		}
		
		private function set_inicioRodape($inicioRodape){
			$this->inicioRodape = $inicioRodape;
		}
		private function get_inicioRodape(){
			return $this->inicioRodape;
		}
		
		private function set_fimRodape($fimRodape){
			$this->fimRodape = $fimRodape;
		}
		private function get_fimRodape(){
			return $this->fimRodape;
		}
		
		private function set_controle($controle){
			$this->controle = $controle;
		}
		private function get_controle(){
			return $this->controle;
		}
		
		private function set_fimBody($fimBody){
			$this->fimBody = $fimBody;
		}
		private function get_fimBody(){
			return $this->fimBody;
		}
		
		private function set_fimHtml($fimHtml){
			$this->fimHtml = $fimHtml;
		}
		private function get_fimHtml(){
			return $this->fimHtml;
		}
		
		/*public function set_cabecalho($cabecalho){
			$this->cabecalho = $cabecalho;
		}
		
		public function get_cabecalho(){
			return $this->cabecalho;
		}*/
		
		public function set_login($login){
			$this->login = $login;
		}
		
		public function get_login(){
			return $this->login;
		}
		
		public function set_menu($menu){
			$this->menu = $menu;
		}
		
		public function get_menu(){
			return $this->menu;
		}
		
		public function set_conteudo($conteudo){
			$this->conteudo = $conteudo;
		}
		
		public function get_conteudo(){
			return $this->conteudo;
		}
		
		public function set_rodape($rodape){
			$this->rodape = $rodape;
		}
		
		public function get_rodape(){
			return $this->rodape;
		}
		
		public function get_tela(){
			return $this->html;
		}
		
		public function set_tela($html){
			if($html == NULL){
				$this->html = $this->get_inicioHtml().$this->get_inicioHead().$this->get_titulo().$this->get_configuracoes().$this->get_fimHead().$this->get_inicioBody().$this->get_inicioCabecalho().$this->get_fimCabecalho().$this->get_inicioLogin().$this->get_login().$this->get_fimLogin().$this->get_inicioCorpo().$this->get_inicioMenu().$this->get_menu().$this->get_fimMenu().$this->get_inicioConteudo().$this->get_conteudo().$this->get_fimConteudo().$this->get_fimCorpo().$this->get_inicioRodape().$this->get_rodape().$this->get_fimRodape().$this->get_controle().$this->get_fimBody().$this->get_fimHtml();
			}else{
				$this->html = $html;
			}
		}
		
		public function set_menu_total($controller){
			$htmlMenu = $controller->get_menu_sistema()->get_html_menu();
			$html = $htmlMenu;
			$this->set_menu(NULL);
			$this->set_menu($html);
			$this->set_tela(NULL);
		}
		
		public function show_result($result,$tela){
			$aux = onechave_array($this->get_conteudo(),'</form>',1,0);
			if(is_array($result)){
				$html = $aux[0].'
					<center>
						<table border =1>
							<tr>
								<td>
									Cód. Receita
								</td>
								<td>
									Receita
								</td>
								<td>
									Valor Calórico
								</td>
								<td>
									Porções
								</td>
							</tr>
							<tr>';
				for($i=0;$i<count($result);$i++){
					$html = $html.'
								<td>
									'.$result[$i]['cod_receita'].'
								</td>
								<td>
									'.$result[$i]['ds_receita'].'
								</td>
								<td>
									'.$result[$i]['vl_calorico_receita'].'
								</td>
								<td>
									'.$result[$i]['qt_porcao'].'
								</td>
							</tr>';
					$i++;
					if(array_key_exists($i,$result)){
						$html = $html.'
							<tr>';
					}
				}
				$html = $html.'
						</table>
					</center>';	
			}else{
				$html = $aux[0]."
					<center>
						".$result."
					</center>";
			}
			
			$this->set_conteudo($html);
			$this->set_tela(null);
		}
	}
?>