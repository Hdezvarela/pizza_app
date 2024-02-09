<?php
	require 'transaction.php';
	session_start();

	if (!isset($_SESSION['empleado'])){
        header('location: /inicio');
    }else{
        if(isset($_GET['no'])){
			del_infEMPLEADO($_GET['no']);
			header('location: /admin/empleados');
		}elseif(isset($_POST['nombre'], $_POST['descripcion'], $_POST['tipo'], $_POST['precio'])){
			$mysqli->set_charset('utf8');
			$nombre = $mysqli->real_escape_string($_POST['nombre']);
			$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
			$tipo = $mysqli->real_escape_string($_POST['tipo']);
			$precio = $mysqli->real_escape_string($_POST['precio']);
			add_newPRODUCTO($nombre, $descripcion, $tipo, $precio);
		}
    }
?>