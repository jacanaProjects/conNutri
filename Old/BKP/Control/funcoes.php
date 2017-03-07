<?php

	function transforma_array_string($arr){
		$indices = array_keys($arr);
		$string = null;
		$k=0;
		$totalIndices = 0;
		
		while(array_key_exists($k,$indices)){
			$totalIndices++;
			$k++;
		}
		
		$k=0;
		while($k<$totalIndices){
			$string = $string.$arr[$indices[$k]];
			$k++;
		}
		
		return $string;
	}
	
	function transforma_array_index_string($arr,$pos){
		$string = $arr[$pos];
		
		return $string;
	}
	
	function onechave_array($str, $chave, $pos, $case){
		if($case == 1){
			return onechave_array_c_case($str, $chave, $pos);//Transforma em array com case (Diferencia maiúscula de minúscula)
		}else if($case == 0){
			return onechave_array_s_case($str, $chave, $pos);//Transforma em array sem case (Não diferencia maiúscula de minúscula)
		}
	}
	
	/*A implantar pois precisa descobrir como utilizar todos em uppercase*/
	function onechave_array_c_case($str, $chave, $pos){
		$ok = 0;
		$auxPosResult = 0;
		$primPos = 0;
		$ultPos = 0;
		$result = NULL;
		$auxString = NULL;
		for($i=0;$i<strlen($str);$i++){
			
			if($str[$i]==$chave[0]){
				for($k=0;$k<strlen($chave);$k++){
					if($str[($i+$k)]==$chave[$k]){
						$ok = 1;
					}else{
						$ok = 0;
						$k = strlen($chave)+1;
					}
					$ultPos = ($i+$k);
				}
				
				if($ok==1){
					
					if($pos==0){
						$result[$auxPosResult] = $auxString;
						$auxString = NULL;
						$auxPosResult++;
						$result[] = array($auxPosResult=>NULL);
						$result[$auxPosResult] = $result[$auxPosResult].$chave;
						$primPos = $ultPos;
						$i = $ultPos;
						
					}else if($pos==1){
						$result[$auxPosResult] = $auxString.$chave;
						$auxString = NULL;
						$primPos = $ultPos;
						$i = $ultPos;
						$auxPosResult++;
					}
				}else if($ok==0){
					$auxString = $auxString.$str[$i];
					$result[$auxPosResult] = $auxString;
					$ultPos = $i;
				}
			}else{
				//$result[$auxPosResult] = $result[$auxPosResult].$str[$i];
				if(!array_key_exists($auxPosResult,$result)){
					$result[] = array($auxPosResult=>NULL);
				}
				$auxString = $auxString.$str[$i];
				//$result[$auxPosResult] = $result[$auxPosResult].$str[$i];
				$ultPos = $i;
				
			}
		}
		if($auxString <> NULL){
			$result[$auxPosResult] = $auxString;
		}
		if($result==NULL){
			$result = $str;
		}
		return $result;
	}
	
	function onechave_array_s_case($str, $chave, $pos){
		$ok = 0;
		$auxPosResult = 0;
		$primPos = 0;
		$ultPos = 0;
		$result = NULL;
		$auxString = NULL;
		for($i=0;$i<strlen($str);$i++){
			
			if($str[$i]==$chave[0]){
				for($k=0;$k<strlen($chave);$k++){
					if($str[($i+$k)]==$chave[$k]){
						$ok = 1;
					}else{
						$ok = 0;
						$k = strlen($chave)+1;
					}
					$ultPos = ($i+$k);
				}
				
				if($ok==1){
					
					if($pos==0){
						$result[$auxPosResult] = $auxString;
						$auxString = /*$auxString.*/$chave;
						$auxPosResult++;
						$result[] = array($auxPosResult=>NULL);
						$primPos = $ultPos;
						$i = $ultPos;
						
					}else if($pos==1){
						$result[$auxPosResult] = $auxString.$chave;
						$auxString = NULL;
						$primPos = $ultPos;
						$i = $ultPos;
						$auxPosResult++;
					}
				}else if($ok==0){
					$auxString = $auxString.$str[$i];
					$result[$auxPosResult] = $auxString;
					$ultPos = $i;
				}
			}else{
				//$result[$auxPosResult] = $result[$auxPosResult].$str[$i];
				if($result <> NULL){
					if(!array_key_exists($auxPosResult,$result)){
						$result[] = array($auxPosResult=>NULL);
					}
				}else{
					$result[] = array($auxPosResult=>NULL);
				}
				$auxString = $auxString.$str[$i];
				//$result[$auxPosResult] = $result[$auxPosResult].$str[$i];
				$ultPos = $i;
				
			}
		}
		if($auxString <> NULL){
			$result[$auxPosResult] = $auxString;
		}
		if($result==NULL){
			$result = $str;
		}
		return $result;
	}
?>