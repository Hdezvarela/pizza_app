<?php
	require 'transaction.php';

	if(isset($_POST['tipo'])){
		if($_POST['tipo'] == "pizza"){
			$dato = 1;
			$consulta = "SELECT * FROM producto WHERE tipo = ?";
			if(isset($_POST['consulta'])){
				$dato = $mysqli->real_escape_string($_POST['consulta']);
				$dato = "%{$_POST['consulta']}%";
				$consulta = "SELECT id, nombre, descripcion, ingredientes, precio FROM producto WHERE tipo = 1 AND nombre LIKE ?";
			}

			$stmt = $mysqli->prepare($consulta);
			$stmt->bind_param("s", $dato);
			$stmt->execute();
			$datos = $stmt->get_result();

			if($datos->num_rows > 0){
				while($row = $datos->fetch_assoc()){
    			$resultados[] = $row;
				}
				echo json_encode($resultados);
			}
		}elseif($_POST['tipo'] == "bebida"){
			$dato = 2;
			$consulta = "SELECT * FROM producto WHERE tipo = ?";
			if(isset($_POST['consulta'])){
				$dato = $mysqli->real_escape_string($_POST['consulta']);
				$dato = "%{$_POST['consulta']}%";
				$consulta = "SELECT id, nombre, descripcion, ingredientes, precio FROM producto WHERE tipo = 2 AND nombre LIKE ?";
			}

			$stmt = $mysqli->prepare($consulta);
			$stmt->bind_param("s", $dato);
			$stmt->execute();
			$datos = $stmt->get_result();

			if($datos->num_rows > 0){
				while($row = $datos->fetch_assoc()){
    			$resultados[] = $row;
				}
				echo json_encode($resultados);
			}
		}elseif($_POST['tipo'] == "postre"){
			$dato = 3;
			$consulta = "SELECT * FROM producto WHERE tipo = ?";
			if(isset($_POST['consulta'])){
				$dato = $mysqli->real_escape_string($_POST['consulta']);
				$dato = "%{$_POST['consulta']}%";
				$consulta = "SELECT id, nombre, descripcion, ingredientes, precio FROM producto WHERE tipo = 3 AND nombre LIKE ?";
			}

			$stmt = $mysqli->prepare($consulta);
			$stmt->bind_param("s", $dato);
			$stmt->execute();
			$datos = $stmt->get_result();

			if($datos->num_rows > 0){
				while($row = $datos->fetch_assoc()){
    			$resultados[] = $row;
				}
				echo json_encode($resultados);
			}
		}
	}
 ?>