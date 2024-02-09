<?php
	function checkEMPTY(...$vrbles){
		$i = 0;
		foreach ($vrbles as $ap){
			if (empty($ap)){
				$i++;
			}
		}
		if ($i == 0){
			return true;
		}else{
			return false;
		}
	}

	function exitACCOUNT(){
		session_start();
		session_destroy();
	}

	/* Funciones Dedicadas */
	function typeUSER($string){
		$ap = strpos($string, 'delipizza.com');
		if ($ap === false){
			return false;
		}else{
			return true;
		}
	}
?>