<?php
	require 'kernel.php';

	$mysqli = new mysqli('localhost', 'root', '', 'delipizza');

	function connectBD(){
		$mysqli = new mysqli('localhost', 'root', '', 'delipizza');
		return $mysqli;
	}

	/* AGREGAR DATOS */
	function add_newCARRITO($compra, $producto, $tamano, $cantidad, $total){
		$sqli = connectBD();
		$sqli->query("INSERT INTO carrito VALUES('$compra', '$producto', '$tamano', '$cantidad', '$total', '')");
	}

	function add_newCLIENTE($nombre, $apellidos, $fnacimiento, $direccion, $puntos, $correo, $contrasena){
		$sqli = connectBD();
		$sqli->query("INSERT INTO cliente VALUES('', '$nombre', '$apellidos', '$fnacimiento', '$direccion', '$puntos', '$correo', '$contrasena')");
	}

	function add_newCOMPRA($cliente, $promocion, $confirmacion, $productos, $total){
		$sqli = connectBD();
		$sqli->query("INSERT INTO compra VALUES('', '$cliente', '$promocion', '$confirmacion', '$productos', '$total')");
	}

	function add_newEMPLEADO($nombre, $correo, $contrasena, $tipo){
		$sqli = connectBD();
		$sqli->query("INSERT INTO empleado VALUES('', '$nombre', '$correo', '$contrasena', '$tipo')");
	}

	function add_newINGREDIENTE($nombre, $cantidad, $calorias, $precio, $categoria){
		$sqli = connectBD();
		$sqli->query("INSERT INTO ingrediente VALUES('', '$nombre', '$cantidad', '$calorias', '$precio', $categoria)");
	}

	function add_newPRODUCTO($nombre, $descripcion, $calificacion, $stock, $tipo, $ingredientes, $precio){
		$sqli = connectBD();
		$sqli->query("INSERT INTO producto VALUES('', '$nombre', '$descripcion', '$calificacion', '$stock', $tipo, '$ingredientes', '$precio')");
	}

	function add_newPROMOCION($puntos, $vigencia, $descuento){
		$sqli = connectBD();
		$sqli->query("INSERT INTO promocion VALUES('', '$puntos', '$vigencia', '$descuento')");
	}

	function add_newTARJETA($cliente, $numero, $propietario, $vigencia){
		$sqli = connectBD();
		$sqli->query("INSERT INTO tarjeta VALUES('$cliente', '$numero', '$propietario', '$vigencia')");
	}

	/* EXTRAER DATOS */
	function get_pwdEMPLEADO($correo){
		$sqli = connectBD();
		$query = $sqli->query("SELECT contrasena FROM empleado WHERE correo = $correo");
		return $query;
	}

	function get_pwdCLIENTE($correo){
		$sqli = connectBD();
		$query = $sqli->query("SELECT contrasena FROM cliente WHERE correo = $correo");
		return $query;
	}

	function get_infPRODUCTOS($tipo){
		$sqli = connectBD();
		$query = $sqli->query("SELECT * FROM producto WHERE tipo = $tipo");
		return $query;
	}

	function get_infPRODUCTO($id){
		$sqli = connectBD();
		$query = $sqli->query("SELECT * FROM producto WHERE id = $id");
		return $query;
	}

	function get_infINGREDIENTES(){
		$sqli = connectBD();
		$query = $sqli->query("SELECT * FROM ingrediente");
		return $query;
	}

	function get_idCOMPRA($cliente){
		$sqli = connectBD();
		$query = $sqli->query("SELECT id FROM compra WHERE cliente = $cliente AND confirmacion = 0");
		while ($ap = mysqli_fetch_array($query)){
			$idCompra = $ap['id'];
		}
		return $idCompra;
	}

	function get_infCARRITO($compra){
		$sqli = connectBD();
		$query = $sqli->query("SELECT * FROM carrito WHERE compra = $compra");
		return $query;
	}

	function get_infTARJETA($cliente){
		$sqli = connectBD();
		$query = $sqli->query("SELECT * FROM tarjeta WHERE cliente = $cliente");
		return $query;
	}

	function get_lpCOMPRA($id){
		$sqli = connectBD();
		$query = $sqli->query("SELECT lista_productos FROM compra WHERE id = $id");
		while ($ap = mysqli_fetch_array($query)){
			$lista = $ap['lista_productos'];
		}
		return $lista;
	}

	function get_totCOMPRA($id){
		$sqli = connectBD();
		$query = $sqli->query("SELECT total FROM compra WHERE id = $id");
		while ($ap = mysqli_fetch_array($query)){
			$total = $ap['total'];
		}
		return $total;
	}

	function get_infPRODUCTOCLIENTE($cliente){
		$sqli = connectBD();
		$query = $sqli->query("SELECT id FROM producto WHERE descripcion = $cliente AND tipo = 4");
		while ($ap = mysqli_fetch_array($query)){
			$id = $ap['id'];
		}
		return $id;
	}

	function get_prePRODUCTO($producto){
		$sqli = connectBD();
		$query = $sqli->query("SELECT total FROM carrito WHERE id = $producto");
		while ($ap = mysqli_fetch_array($query)){
			$precio = $ap['total'];
		}
		return $precio;
	}

	/* VERIFICAR DATOS */
	function check_infCOMPRA($cliente){
		$sqli = connectBD();
		if ($nQuery = $sqli->prepare("SELECT * FROM compra WHERE cliente = ? AND confirmacion = 0")){
			$nQuery->bind_param('s', $cliente);
			$nQuery->execute();
			$Ans = $nQuery->get_result();

			if ($Ans->num_rows != 0){
				return true;
			}else{
				return false;
			}
			$nQuery->close();
		}
	}

	/* ACTUALIZAR DATOS */
	function upd_lpCOMPRA($id, $lista, $total){
		$sqli = connectBD();
		$sqli->query("UPDATE compra SET lista_productos = '$lista', total = '$total' WHERE id = $id");
	}

	function upd_infCOMPRA($id){
		$sqli = connectBD();
		$sqli->query("UPDATE compra SET confirmacion = '1' WHERE id = $id");
	}

	/* ELIMINAR DATOS */
	function del_infCARRITO($compra){
		$sqli = connectBD();
		$sqli->query("DELETE FROM carrito WHERE compra = $compra");
	}

	function del_infCLIENTE($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM cliente WHERE id = $id");
	}

	function del_infCOMPRA($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM compra WHERE id = $id");
	}

	function del_infEMPLEADO($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM empleado WHERE id = $id");
	}

	function del_infINGREDIENTE($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM ingrediente WHERE id = $id");
	}

	function del_infPRODUCTO($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM producto WHERE id = $id");
	}

	function del_infPROMOCION($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM promocion WHERE id = $id");
	}

	function del_infTARJETA($cliente){
		$sqli = connectBD();
		$sqli->query("DELETE FROM tarjeta WHERE cliente = $cliente");
	}

	function del_infCARRITOPRODUCTO($id){
		$sqli = connectBD();
		$sqli->query("DELETE FROM carrito WHERE id = $id");
	}
?>