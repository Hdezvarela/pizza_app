<?php
	require 'transaction.php';

	if(isset($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['emailaddress'], $_POST['pwd'], $_POST['Confirmacionpwd'])){
		if (checkEMPTY($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['emailaddress'], $_POST['pwd'], $_POST['Confirmacionpwd'])) {
			$mysqli->set_charset('utf8');
			$nombre = $mysqli->real_escape_string($_POST['nombre']); 
			$apellido = $mysqli->real_escape_string($_POST['apellido']); 
			$direccion= $mysqli->real_escape_string($_POST['direccion']); 
			$correo = $mysqli->real_escape_string($_POST['emailaddress']); 
			$contrasena = $mysqli->real_escape_string($_POST['pwd']); 
			$confirmacion = $_POST['Confirmacionpwd'];
			$nacimiento = $mysqli->real_escape_string($_POST['anoNacimiento']."-".$_POST['mesNacimiento']."-".$_POST['diaNacimiento']);  
			if(typeUSER($correo)){
				echo json_encode(array('error' => 2)); //No puede ingresar un correo de empleado ####CAMBIAR ERROR###
			}else{
				if(password_verify($contrasena, $confirmacion)){
					$contrasena = $confirmacion;
				}
				if ($nQuery = $mysqli->prepare("SELECT * FROM cliente WHERE correo = ?")){
						$nQuery->bind_param('s', $correo);
						$nQuery->execute();
						$Ans = $nQuery->get_result();
						if ($Ans->num_rows == 1){
							echo json_encode(array('error' => 2)); //Ya existe un usuario con ese correo ####CAMBIAR ERROR###
						}else{
							if ($insertQuery = $mysqli->prepare("INSERT INTO cliente (nombre, apellidos, fecha_de_nacimiento, direccion, correo, contrasena) VALUES (?,?,?,?,?,?)")) {
								$insertQuery->bind_param('ssssss', $nombre, $apellido, $nacimiento, $direccion, $correo, $contrasena);
								$insertQuery->execute();
								
								if(isset($_POST['numTarjeta'], $_POST['propietarioTarjeta'])){
									if (checkEMPTY($_POST['propietarioTarjeta'], $_POST['numTarjeta'])){
										$propietario = $mysqli->real_escape_string($_POST['propietarioTarjeta']); 
										$tarjeta = $mysqli->real_escape_string($_POST['numTarjeta']);
										$vencimiento = $mysqli->real_escape_string($_POST['anoTarjeta']."-".$_POST['mesTarjeta']."-01"); 
										if ($idQuery = $mysqli->prepare("SELECT id FROM cliente WHERE correo = ? AND contrasena= ?"))
										{
											$idQuery->bind_param('ss', $correo, $contrasena);
											$idQuery->execute();
											$id=NULL;
											$val=$idQuery->get_result();
											while ($row = $val->fetch_assoc()){
												$id = $row['id'];
											}
											if($tarQuery = $mysqli->prepare("INSERT INTO tarjeta (cliente, no_de_tarjeta, propietario, vigencia) VALUES (?,?,?,?)")){
												$tarQuery->bind_param('ssss', $id, $tarjeta, $propietario, $vencimiento);
												$tarQuery->execute();
											}
										}
									}
								}
								 /*----------A PARTIR DEAQUÍ CONTINUAR----------------*/
								if ($inQuery = $mysqli->prepare("SELECT * FROM cliente WHERE correo = ? AND contrasena = ?")){
									$inQuery->bind_param('ss', $correo, $contrasena);
									$inQuery->execute();
									$inAns = $inQuery->get_result();
									if ($inAns->num_rows == 1){
										$inData = $inAns->fetch_assoc();
										$_SESSION['cliente'] = $inData;
										echo json_encode(array('error' => 0));
									}else{
										echo json_encode(array('error' => 2)); //Usuario o contrañesa incorrectos
									}
								
								}
							}									
						}
						$nQuery->close();
				}
			}
		}
	}elseif (isset($_GET['exit'])){
		exitACCOUNT();
		header('location: /inicio');
	}else{
		header('location: /403');
	}
?>