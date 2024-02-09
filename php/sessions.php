<?php
	require 'transaction.php';

	if(isset($_POST['lgUSR'], $_POST['lgPWD'])){
		if(checkEMPTY($_POST['lgUSR'], $_POST['lgPWD'])){
			sleep(1);
			session_start();
			$mysqli->set_charset('utf8');

			$Usr = $mysqli->real_escape_string($_POST['lgUSR']);
			$Pwd = $mysqli->real_escape_string($_POST['lgPWD']);

			if(typeUSER($Usr)){//Administrador
				$Hash = get_pwdEMPLEADO($Usr);
				if(password_verify($Pwd, $Hash)){
					$Pwd = $Hash;
				}

				if ($nQuery = $mysqli->prepare("SELECT * FROM empleado WHERE correo = ? AND contrasena = ?")){
						$nQuery->bind_param('ss', $Usr, $Pwd);
						$nQuery->execute();
						$Ans = $nQuery->get_result();
						if ($Ans->num_rows == 1){
							$Data = $Ans->fetch_assoc();
							$_SESSION['empleado'] = $Data;
							echo json_encode(array('error' => 0));
						}else{
							echo json_encode(array('error' => 2)); //Usuario o contrañesa incorrectos
						}
						$nQuery->close();
					}
			}else{
				$Hash = get_pwdCLIENTE($Usr);
				if(password_verify($Pwd, $Hash)){
					$Pwd = $Hash;
				}

				if ($nQuery = $mysqli->prepare("SELECT * FROM cliente WHERE correo = ? AND contrasena = ?")){
						$nQuery->bind_param('ss', $Usr, $Pwd);
						$nQuery->execute();
						$Ans = $nQuery->get_result();
						if ($Ans->num_rows == 1){
							$Data = $Ans->fetch_assoc();
							$_SESSION['cliente'] = $Data;
							echo json_encode(array('error' => 0));
						}else{
							echo json_encode(array('error' => 2)); //Usuario o contrañesa incorrectos
						}
						$nQuery->close();
					}
			}
		}else{
			echo json_encode(array('error' => 1)); //No lleno datos
		}
	}elseif(isset($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['emailaddress'], $_POST['pwd'])){
		if(checkEMPTY($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['emailaddress'], $_POST['pwd'])){
			sleep(1);
			session_start();
			$mysqli->set_charset('utf8');

			$Nom = $mysqli->real_escape_string($_POST['nombre']);
			$Ape = $mysqli->real_escape_string($_POST['apellido']);
			$Dir = $mysqli->real_escape_string($_POST['direccion']);
			$Cor = $mysqli->real_escape_string($_POST['emailaddress']);
			$Pwd = $mysqli->real_escape_string($_POST['pwd']);

			$Pwd = password_hash($Pwd, PASSWORD_DEFAULT);

			if (false){ //Verifica que el correo no este en uso
				add_newCLIENTE($Nom, $Ape, $fnacimiento, $Dir, 0, $Cor, $Pwd); /*Fnacimiento?*/
				echo json_encode(array('error' => 0));
			}else{ //Datos repetidos
				echo json_encode(array('error' => 2));
			}
		}else{
			echo json_encode(array('error' => 1)); //No lleno datos
		}
	}elseif (isset($_GET['exit'])){
		exitACCOUNT();
		header('location: /inicio');
	}else{
		header('location: /403');
	}
?>