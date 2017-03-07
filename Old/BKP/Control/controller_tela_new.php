<?php	
	class controller_tela{
		private $class_conteudo;
		private $html;
		private $menu;
		private $conteudo;
		private $hConteudo;
		private $conteudoTitulo;
		private $login;
		private $rodape;
		
		private $inicioHtml;
		private $inicioHead;
		private $titulo;
		private $configuracoes;
		private $fimHead;
		private $inicioBody;
		private $inicioCabecalho;
		private $inicioConteudoCabecalho;
		private $fimConteudoCabecalho;
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
			$p_arquivo = fopen('View/index_new.html','r');//Abre arquivo index.html somente para leitura
			while(!feof($p_arquivo)){//le todas as linhas e salva em variavel
				$arquivo = $arquivo.fgets($p_arquivo);
			}
			
			$inicioHtml = onechave_array($arquivo,'<html lang="pt-br">',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($inicioHtml,1);
			$inicioHead = onechave_array($aux,'<head>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($inicioHead,1);
			$titulo = onechave_array($aux,'</title>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($titulo,1);
			$configuracoes = onechave_array($aux,'</head>',0,0);
			
			$aux = transforma_array_1_pos_a_x_string($configuracoes,1);
			$fimHead = onechave_array($aux,'</head>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimHead,1);
			$inicioBody = onechave_array($aux,'<body>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($inicioBody,1);
			$inicioCabecalho = onechave_array($aux,'<div id="cabecalho">',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($inicioCabecalho,1);
			$inicioConteudoCabecalho = onechave_array($aux,'<div id="titulo">',1,0);
			
			$conteudoTitulo = '
				Teste';
			
			$aux = transforma_array_1_pos_a_x_string($inicioConteudoCabecalho,1);
			$fimConteudoCabecalho = onechave_array($aux,'</div>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimConteudoCabecalho,1);
			$inicioLogin = onechave_array($aux,'<div id="loginArea">',1,0);
			
			$login = '
				<table>
					<tr>
						<td>
							Login: 
						</td>
						<td>
							<input type="text" name="login" id="login"/>
						</td>
					</tr>
					<tr>
						<td>
							Senha: 
						</td>
						<td>
							<input type="password" name="pswd" id="pswd"/>
						</td>
					</tr>
				</table>';
			
			$aux = transforma_array_1_pos_a_x_string($inicioLogin,1);
			$fimLogin = onechave_array($aux,'</div>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimLogin,1);
			$fimCabecalho = onechave_array($aux,'</div>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimCabecalho,1);
			$inicioCorpo = onechave_array($aux,'<div id="corpo">',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($inicioCorpo,1);
			$inicioMenu = onechave_array($aux,'<div id="menu">',1,0);
			
			$menu = null;
			
			$aux = transforma_array_1_pos_a_x_string($inicioMenu,1);
			$fimMenu = onechave_array($aux,'</div>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimMenu,1);
			$inicioConteudo = onechave_array($aux,'<div id="conteudo">',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($inicioConteudo,1);
			$conteudo = onechave_array($aux,'<iframe src="conteudo.html" name="iConteudo" id="iConteudo"></iframe>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($conteudo,1);
			$fimConteudo = onechave_array($aux,'</div>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimConteudo,1);
			$fimCorpo = onechave_array($aux,'</div>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimCorpo,1);
			$inicioRodape = onechave_array($aux,'<div id="rodape">',1,0);
			
			$rodape = null;
			
			$aux = transforma_array_1_pos_a_x_string($inicioRodape,1);
			$fimRodape = onechave_array($aux,'</div>',1,0);
			
			/*$aux = transforma_array_1_pos_a_x_string($fimRodape,1);
			$hConteudo = onechave_array($aux,'<input type="hidden" value="" name="hConteudo" id="hConteudo" onLoad="submitConteudo()">',0,0);*/
			
			$aux = transforma_array_1_pos_a_x_string($fimRodape,1);
			$controle = onechave_array($aux,'</body>',0,0);
			
			$aux = transforma_array_1_pos_a_x_string($controle,1);
			$fimBody = onechave_array($aux,'</body>',1,0);
			
			$aux = transforma_array_1_pos_a_x_string($fimBody,1);
			$fimHtml = onechave_array($aux,'</html>',1,0);
			
			$this->set_inicioHtml($inicioHtml[0]);
			$this->set_inicioHead($inicioHead[0]);
			$this->set_titulo($titulo[0]);
			$this->set_configuracoes($configuracoes[0]);
			$this->set_fimHead($fimHead[0]);
			$this->set_inicioBody($inicioBody[0]);
			$this->set_inicioCabecalho($inicioCabecalho[0]);
			$this->set_inicioConteudoCabecalho($inicioConteudoCabecalho[0]);
			$this->set_conteudoTitulo($conteudoTitulo);
			$this->set_fimConteudoCabecalho($fimConteudoCabecalho[0]);
			$this->set_fimCabecalho($fimCabecalho[0]);
			$this->set_inicioLogin($inicioLogin[0]);
			$this->set_login($login);
			$this->set_fimLogin($fimLogin[0]);
			$this->set_inicioCorpo($inicioCorpo[0]);
			$this->set_inicioMenu($inicioMenu[0]);
			$this->set_fimMenu($fimMenu[0]);
			$this->set_inicioConteudo($inicioConteudo[0]);
			$this->set_conteudo($conteudo[0]);
			$this->set_fimConteudo($fimConteudo[0]);
			$this->set_fimCorpo($fimCorpo[0]);
			$this->set_inicioRodape($inicioRodape[0]);
			$this->set_rodape($rodape);
			$this->set_fimRodape($fimRodape[0]);
			$this->set_controle($controle[0]);
			//$this->set_hConteudo($hConteudo[0]);
			$this->set_fimBody($fimBody[0]);
			$this->set_fimHtml($fimHtml[0]);
			
			//$this->set_tela(NULL);
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
		
		private function set_inicioConteudoCabecalho($inicioConteudoCabecalho){
			$this->inicioConteudoCabecalho = $inicioConteudoCabecalho;
		}
		private function get_inicioConteudoCabecalho(){
			return $this->inicioConteudoCabecalho;
		}
		
		private function set_conteudoTitulo($conteudoTitulo){
			$this->conteudoTitulo = $conteudoTitulo;
		}
		private function get_conteudoTitulo(){
			return $this->conteudoTitulo;
		}
		
		private function set_fimConteudoCabecalho($fimConteudoCabecalho){
			$this->fimConteudoCabecalho = $fimConteudoCabecalho;
		}
		private function get_fimConteudoCabecalho(){
			return $this->fimConteudoCabecalho;
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
		
		private function set_hConteudo($hConteudo){
			$this->hConteudo = $hConteudo;
		}
		private function get_hConteudo(){
			return $this->hConteudo;
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
				$this->html = $this->get_inicioHtml().$this->get_inicioHead().$this->get_titulo().$this->get_configuracoes().$this->get_fimHead().$this->get_inicioBody().$this->get_inicioCabecalho().$this->get_inicioConteudoCabecalho().$this->get_conteudoTitulo().$this->get_fimConteudoCabecalho().$this->get_inicioLogin().$this->get_login().$this->get_fimLogin().$this->get_fimCabecalho().$this->get_inicioCorpo().$this->get_inicioMenu().$this->get_menu().$this->get_fimMenu().$this->get_inicioConteudo().$this->get_conteudo().$this->get_fimConteudo().$this->get_fimCorpo().$this->get_inicioRodape().$this->get_rodape().$this->get_fimRodape().$this->get_controle()/*.$this->get_hConteudo()*/.$this->get_fimBody().$this->get_fimHtml();
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
			$aux = null;
			if(is_array($result)){
				$html = $aux[0].null;
				for($i=0;$i<count($result);$i++){
					$html = $html.null
									.$result[$i]['cod_receita'].
								null
									.$result[$i]['ds_receita'].
								null
									.$result[$i]['vl_calorico_receita'].
								null
									.$result[$i]['qt_porcao'].
								null;
					$i++;
					if(array_key_exists($i,$result)){
						$html = $html.null;
					}
				}
				$html = $html.null;
			}else{
				$html = $aux[0].null
						.$result.
					null;
			}
			
			$this->set_conteudo($html);
			$this->set_tela(null);
		}
	}
?>