<?php
	require 'transaction.php';
	session_start();

	if(isset($_POST['nombre'], $_POST['descripcion'], $_POST['calificacion'], $_POST['stock'], $_POST['tipo'], $_POST['ingredientes'], $_POST['precio'])){
		if(checkEMPTY($_POST['nombre'], $_POST['descripcion'], $_POST['calificacion'], $_POST['stock'], $_POST['tipo'], $_POST['ingredientes'], $_POST['precio'])){
			$mysqli->set_charset('utf8');

			$Nom = $mysqli->real_escape_string($_POST['nombre']);
			$Des = $mysqli->real_escape_string($_POST['descripcion']);
			$Cal = $mysqli->real_escape_string($_POST['calificacion']);
			$Stc = $mysqli->real_escape_string($_POST['stock']);
			$Tip = $mysqli->real_escape_string($_POST['tipo']);
			$Ing = $mysqli->real_escape_string($_POST['ingredientes']);
			$Pre = $mysqli->real_escape_string($_POST['precio']);

			add_newPRODUCTO($Nom, $Des, $Cal, $Stc, $Tip, $Ing, $Pre);
			echo json_encode(array('error' => 0));
		}else{
			echo json_encode(array('error' => 1));
		}
	}
?>