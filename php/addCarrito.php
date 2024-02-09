<?php
	require 'transaction.php';
	session_start();

	if(isset($_SESSION['cliente']['id'])){
		$cliente = $_SESSION['cliente']['id'];
		if(isset($_POST['producto'], $_POST['tamano'], $_POST['precio'], $_POST['unidades'])){
			if(check_infCOMPRA($cliente)){
				sleep(1);
				$idCompra = get_idCOMPRA($cliente);
				$lista = get_lpCOMPRA($idCompra);
				$total = get_totCOMPRA($idCompra);
				$lista = $lista."#".$_POST['producto'].",";
				$total = $total+$_POST['precio'];
				add_newCARRITO($idCompra, $_POST['producto'], $_POST['tamano'], $_POST['unidades'], $_POST['precio']);
				upd_lpCOMPRA($idCompra, $lista, $total);
				echo json_encode(array('error' => 0));
			}else{
				sleep(1);
				$lista = "#".$_POST['producto'].",";
				add_newCOMPRA($cliente, 1, 0, $lista, $_POST['precio']);
				$idCompra = get_idCOMPRA($cliente);
				add_newCARRITO($idCompra, $_POST['producto'], $_POST['tamano'], $_POST['unidades'], $_POST['precio']);
				echo json_encode(array('error' => 0));
			}
		}elseif(isset($_POST['mproducto'], $_POST['mprecio'])){
			if(check_infCOMPRA($cliente)){
				$idCompra = get_idCOMPRA($cliente);
				$lista = get_lpCOMPRA($idCompra);
				$total = get_totCOMPRA($idCompra);
				$lista = $lista."#".$_POST['mproducto'].",";
				$total = $total+$_POST['mprecio'];
				add_newCARRITO($idCompra, $_POST['mproducto'], 3, 1, $_POST['mprecio']);
				upd_lpCOMPRA($idCompra, $lista, $total);
				echo json_encode(array('error' => 0));
			}else{
				$lista = "#".$_POST['mproducto'].",";
				add_newCOMPRA($cliente, 1, 0, $lista, $_POST['mprecio']);
				$idCompra = get_idCOMPRA($cliente);
				add_newCARRITO($idCompra, $_POST['mproducto'], 3, 1, $_POST['mprecio']);
				echo json_encode(array('error' => 0));
			}
		}elseif(isset($_POST['nproducto'])){ //VERIFICAR AQUI PARA PERSONALIZADA ERORES GRAVES
			if(check_infCOMPRA($cliente)){
				$idCompra = get_idCOMPRA($cliente);
				$lista = get_lpCOMPRA($idCompra);
				$total = get_totCOMPRA($idCompra);
				add_newPRODUCTO('Personalizada', $cliente, 0, 50, 4, '#0,', $_POST['nproducto']);
				$idProducto = get_infPRODUCTOCLIENTE($cliente); //PROBLEMA PARA MAS DE UNA PERSONALIZADA
				$lista = $lista."#".$idProducto.",";
				$total = $total+$_POST['nproducto'];
				add_newCARRITO($idCompra, $idProducto, 3, 1, $_POST['nproducto']);
				upd_lpCOMPRA($idCompra, $lista, $total);
				echo json_encode(array('error' => 0));
			}else{
				add_newPRODUCTO('Personalizada', $cliente, 0, 50, 4, '#0,', $_POST['nproducto']);
				$idProducto = get_infPRODUCTOCLIENTE($cliente);
				$lista = "#".$idProducto.",";
				add_newCOMPRA($cliente, 1, 0, $lista, $idProducto);
				$idCompra = get_idCOMPRA($cliente);
				add_newCARRITO($idCompra, $idProducto, 3, 1, $_POST['nproducto']);
				echo json_encode(array('error' => 0));
			}
		}elseif(isset($_POST['dproducto'], $_POST['producto'])){
			$idCompra = get_idCOMPRA($cliente);
			$lista = get_lpCOMPRA($idCompra);
			$delpro = '#'.$_POST['producto'].',';
			$lista = str_replace($delpro, '', $lista);
			$total = get_totCOMPRA($idCompra);
			$precio = get_prePRODUCTO($_POST['dproducto']);
			$total = $total-$precio;
			upd_lpCOMPRA($idCompra, $lista, $total);
			del_infCARRITOPRODUCTO($_POST['dproducto']);
			echo json_encode(array('error' => 0));
		}
	}else{
		echo json_encode(array('error' => 9));
	}
?>