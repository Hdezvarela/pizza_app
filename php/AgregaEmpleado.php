<?php
	require 'transaction.php';
	echo "Antes de entrar";
	if(isset($_POST['nombre'], $_POST['puesto'], $_POST['email'], $_POST['nip'], $_POST['nip2'])){
		if (checkEMPTY($_POST['nombre'], $_POST['puesto'], $_POST['email'], $_POST['nip'], $_POST['nip2'])) {
			echo "HA entrado";
			$mysqli->set_charset('utf8');
			$nombre = $mysqli->real_escape_string($_POST['nombre']); 
			$puesto = $mysqli->real_escape_string($_POST['puesto']); 
			$correo = $mysqli->real_escape_string($_POST['email']); 
			$contrasena = $mysqli->real_escape_string($_POST['nip']); 
			$confirmacion = $_POST['nip2'];
			
			if(typeUSER($correo)){
				if(password_verify($contrasena, $confirmacion)){
					$contrasena = $confirmacion;
				}
				if ($nQuery = $mysqli->prepare("SELECT * FROM empleado WHERE correo = ?")){
						$nQuery->bind_param('s', $correo);
						$nQuery->execute();
						$Ans = $nQuery->get_result();
						if ($Ans->num_rows == 1){
							echo json_encode(array('error' => 2)); //Ya existe un usuario con ese correo ####CAMBIAR ERROR###
						}else{
							if($puesto=='Administrador'){
								$tipo="1";
							}else{
								$tipo="2";
							}
							if ($insertQuery = $mysqli->prepare("INSERT INTO empleado (nombre, correo, contrasena, tipo_de_empleado) VALUES (?,?,?,?)")) {
								$insertQuery->bind_param('ssss', $nombre, $correo, $contrasena, $tipo);
								$insertQuery->execute();
								 /*----------A PARTIR DEAQUÍ CONTINUAR----------------*/
								
							}									
						}
						$nQuery->close();
				}
				
			}else{
				echo json_encode(array('error' => 2)); //No puede ingresar un correo de empleado ####CAMBIAR ERROR###
			}
		}
	}elseif (isset($_GET['exit'])){
		/*exitACCOUNT();
		header('location: /inicio');*/
	}else{
		/*header('location: /403');*/
		echo "Hola";
	}
?>