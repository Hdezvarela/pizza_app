<?php
	require 'transaction.php';
	function get_listPRODUCTOS($idCompra){
		$lista = get_lpCOMPRA($idCompra);
		$coma=",";
		$productos = array();
		$productos = explode('#', $lista);
		foreach ($productos as &$valor) {
		    $valor = str_replace($coma, '', $valor);;
		}
		return $productos;
	}
    
    function getAtributosProducto($idProducto){
    	$sqli = connectBD();
        $atributos = array();
        $nom = '';
        $pre = '';
        $query = $sqli->query("SELECT nombre, precio FROM producto WHERE id = '$idProducto'");
        while ($ap = mysqli_fetch_array($query)){
			$nom=$ap['nombre'];
            $pre=$ap['precio'];
		}
		return array ($nom, $pre);
    }

	$exit = "";
	$nQuery = "SELECT * FROM compra WHERE confirmacion = 1";

	if (isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$nQuery = "SELECT id, cliente, lista_productos, total FROM producto WHERE confirmacion = 1 AND nombre LIKE '%".$q."%' OR precio LIKE '%".$q."%'";
	}
	
	$Pizzas = $mysqli->query($nQuery);
	
	if( $Pizzas->num_rows > 0){
		while($row = $Pizzas->fetch_assoc()){
			$list = array();
			$list = get_listPRODUCTOS($row['id']);
			$exit .= '<div class="card-body ">
        <center><h1 class="" style="color:#DE5902;">Nota de Pago '.$row['id'].'</h1></center>
        <hr>
        <div class="row">
        	<div class="col-md">
                <div class="form-group" style="width: 300px;">
                    <label><strong>Producto</strong></label>
                </div>
            </div>';
            foreach($list as $valor){
                list ($nom, $pre) = getAtributosProducto($valor);
                $nomProducto = $nom;
                $preProducto = $pre;
                
                $exit .= '<div class="col-md">
                <div class="form-group" style="width: 300px;">
                    <label><strong>'.$nomProducto.'</strong></label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label><strong>'.$preProducto.'</strong></label>
                </div>
            </div>';
            }
            
            $exit .= '</div>
        <div class="row">
            <div class="col-md">
                <div class="form-group" style="width: 300px;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"  style="background-color:#F9F4F4;"><strong>IVA</strong></li>
                        <li class="list-group-item"  style="background-color:#F9F4F4;"><strong>TOTAL</strong></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"  style="background-color:#F9F4F4;">$'.$row['total']*0.1.'</li>
                        <li class="list-group-item"  style="background-color:#F9F4F4;">$'.$row['total'].'</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>';
		}
		
	}else{
			$exit.= '<div class="noresultados">No se encontraron resultados.</div>';
	}
	echo $exit;
	$mysqli->close();
 ?>