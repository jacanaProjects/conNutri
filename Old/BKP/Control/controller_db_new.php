<?php
	include 'conection_new.php';
	class controller_bd extends conection{
		
		public function __construct(){
			$conection['endereco'] = 'localhost';
			$conection['user'] = 'root';
			$conection['pwd'] = '';
			$this->set_conection($conection);
			
			$bd = 'connutri';
			$this->set_bd($bd);
		}
		
		public function set_receita($receita){
			if($receita->get_ds_receita()==NULL){
				$ds_receita = 'NULL';
			}else{
				$ds_receita = $receita->get_ds_receita();
			}
			
			if($receita->get_vl_calorico_receita()==NULL){
				$vl_calorico = 'NULL';
			}else{
				$vl_calorico = $receita->get_vl_calorico_receita();
			
			}
			if($receita->get_qt_porcao()==NULL){
				$qt_porcao = 'NULL';
			}else{
				$qt_porcao = $receita->get_qt_porcao();
			}
			$query = "INSERT INTO connutri.receita(cod_receita, ds_receita, vl_calorico_receita, qt_porcao) VALUES (NULL,'".$ds_receita."',".$vl_calorico.",".$qt_porcao.")";
			$this->set_query($query);
			return $this->executa_query();
		}
		
		public function get_receita($arr){
			$query = "SELECT ";
			for($i=0;$i<count($arr['select']);$i++){//Select
				$query = $query.$arr['select'][$i];
				if(($arr['select'][$i]<>null)&&(array_key_exists($i+1,$arr['select']))){
					$query = $query.', ';					
				}
			}
			$query = $query." FROM connutri.receita WHERE ";
			for($i=0;$i<count($arr['where']);$i++){//Where
				if(($arr['condicao'][$i]<>null)&&(array_key_exists($i,$arr['condicao']))){
					$query = $query.$arr['where'][$i]." ".$arr['condicao'][$i]." ";
				}else{
					$query = $query.$arr['where'][$i];
				}
			}
			if(($arr['order'][0]<>NULL)&&(array_key_exists(0,$arr['order']))){//order by
				$query = $query." order by ";
				for($i=0;$i<count($arr['order']);$i++){
					$query = $query.$arr['order'][$i];
					if(($arr['order'][$i+1]<>null)&&(array_key_exists($i+1,$arr['order']))){
						$query = $query.', ';
					}
				}
			}
			$query = $query.";";
			
			$this->set_query($query);
			$result = $this->executa_query();
			
			return $result/*."<br/>".$query*/;
		}
		
		public function set_material_receita($material_receita){
			$query = "INSERT INTO connutri.material_receita(cod_material_receita, cod_receita, cod_material, cod_und_med, qt_material) VALUES (NULL,'".$material_receita->get_cod_receita()."',".$material_receita->get_cod_material().",".$material_receita->get_cod_und_med().",".$material_receita->get_qt_material().")";
			$this->set_query($query);
			$this->executa_query();			
		}
		
		public function get_material_receita($arr){
			$query = "SELECT ";
			for($i=0;$i<count($arr['select']);$i++){//Select
				$query = $query.$arr['select'][$i];
				if((array_key_exists($i+1,$arr['select']))&&($arr['select'][$i]<>null)){
					$query = $query.', ';					
				}
			}
			$query = $query." FROM connutri.material_receita WHERE ";
			for($i=0;$i<count($arr['where']);$i++){//Where
				if((array_key_exists($i,$arr['condicao']))&&($arr['condicao']<>null)){
					$query = $query.$arr['where'][$i]." ".$arr['condicao'][$i];
				}else{
					$query = $query.$arr['where'][$i];
				}
			}
			if(array_key_exists(0,$arr['order'])){//order by
				$query = $query." order by ";
				for($i=0;$i<count($arr['order']);$i++){
					$query = $query.$arr['order'][$i];
					if((array_key_exists($i+1,$arr['order']))&&($arr['order'][$i+1]<>null)){
						$query = $query.', ';
					}
				}
			}
			$query = $query.";";
			
			$this->set_query($query);
			$result = $this->executa_query();
			
			return $result;
		}
		
		public function set_material($material){
			$query = "INSERT INTO connutri.material(cod_material,desc_material,cod_und_med_comp,cod_und_med_esto,cod_und_med_cons,qt_conv_comp_esto,qt_conv_esot_cons,cod_mat_esto,vl_calorico) VALUES (NULL,'".$material->get_desc_material()."',".$material->get_und_med_compra().",".$material->get_und_med_estoque().",".$material->get_und_med_consumo().",".$material->get_qt_conv_comp_est().",".$material->get_qt_conv_est_cons().",".$material->get_cd_material_estoque().",".$material->get_vl_calorico().")";
			$this->set_query($query);
			$this->executa_query();
		}
		
		public function get_material($arr){
			$query = "SELECT ";
			for($i=0;$i<count($arr['select']);$i++){//Select
				$query = $query.$arr['select'][$i];
				if((array_key_exists($i+1,$arr['select']))&&($arr['select'][$i]<>null)){
					$query = $query.', ';					
				}
			}
			$query = $query." FROM connutri.material WHERE ";
			for($i=0;$i<count($arr['where']);$i++){//Where
				if((array_key_exists($i,$arr['condicao']))&&($arr['condicao']<>null)){
					$query = $query.$arr['where'][$i]." ".$arr['condicao'][$i];
				}else{
					$query = $query.$arr['where'][$i];
				}
			}
			if(array_key_exists(0,$arr['order'])){//order by
				$query = $query." order by ";
				for($i=0;$i<count($arr['order']);$i++){
					$query = $query.$arr['order'][$i];
					if((array_key_exists($i+1,$arr['order']))&&($arr['order'][$i+1]<>null)){
						$query = $query.', ';
					}
				}
			}
			$query = $query.";";
			
			$this->set_query($query);
			$result = $this->executa_query();
			
			return $result;
		}
	}
?>