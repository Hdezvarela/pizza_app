<?php
	require '../php/transaction.php';
	session_start();
	$pag = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Preparar pizza</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/preparar.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<div class="producto"></div>
			<div class="imagen">
				<div class="Chedar ImaChedar"></div>
				<div class="Mozzarella ImaMozzarella"></div>
				<div class="MozzarellaExtra ImaMozzarellaExtra"></div>
				<div class="Pepperoni ImaPepperoni"></div>
				<div class="Salami ImaSalami"></div>
				<div class="Tocino ImaTocino"></div>
				<div class="Pina ImaPina"></div>
				<div class="Jamon ImaJamon"></div>	
				<div class="Salchicha ImaSalchicha"></div>	
				<div class="Chorizo ImaChorizo"></div>
				<div class="Pollo ImaPollo"></div>
				<div class="Cerdo ImaCerdo"></div>
				<div class="CarneMolida ImaCarneMolida"></div>
				<div class="Champinon ImaChampinones"></div>
				<div class="Pimiento ImaPimiento"></div>
				<div class="Mango ImaMango"></div>
				<div class="Jalapeno ImaJalapeno"></div>	
				<div class="Cebolla ImaCebolla"></div>
				<div class="FinasHierbas ImaFinasHierbas"></div>
				<div class="Aceituna ImaAceitunas"></div>
				<div class="AceitunaNegra ImaAceitunasNegras"></div>
			</div>
			<div class="infCostos">
				<p class="infCosto">COSTO TOTAL:</p>
				<p class="signo">$</p>
				<p class="costo" id="impTotal"></p>
				<div class="addCarrito" id="nCa" onclick="addCarrito()">Agregar al carrito</div>
			</div>
			<h1 class="nombre">Preparemos tu pizza:</h1>
			<p class="descripcion">¡Para gustos colores!<br>No hay nada mas rico que una pizza hecha a tu medida.</p>
			<hr class="sepuno">
			<div class="tamano">
				<p class="infTamano">Seleccione el tamaño que desea ordenar: </p>
				<select name="" class="optTamano" onchange="mTam()" id="tam">
					<option value="3">Grande</option>
					<option value="2">Mediana</option>
					<option value="1">Pequeña</option>
				</select>
			</div>
			<div class="pan">
				<p class="infTamano">Tipo de pan que desea ordenar: </p>
				<select name="" class="optTamano" onchange="mPan()" id="pan">
					<option value="3">Clasico</option>
					<option value="2">Ajo</option>
					<option value="1">Delgado</option>
				</select>
			</div>
			<div class="orilla">
				<p class="infTamano">Tipo de orilla que desea ordenar: </p>
				<select name="" class="optTamano" onchange="mOri()" id="ori">
					<option value="3">Sin queso</option>
					<option value="2">Queso</option>
					<option value="1">Extra queso</option>
				</select>
			</div>
			<p class="infIngredientes">Selecciona los ingredientes que deseas agregar a tu pizza: </p>
			<div class="ingredientes">
				<div class="noact">
					<div class="radio">
						<div class="Subtitulo">Quesos:</div>
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Mozzarella', 'Si', 12.50)" id="Mozzarella">
						<label for="Mozzarella">Mozzarella</label>
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('MozzarellaExtra', 'Si', 6)" id="MozzarellaExtra">
						<label for="MozzarellaExtra"> Mozzarella Extra</label>
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Chedar', 'Si', 12)" id="Chedar">
						<label for="Chedar">Chedar</label>
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Parmesano', 'No', 15)" id="Parmesano">
						<label for="Parmesano">Parmesano</label>
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Crema', 'No', 10)" id="Crema">
						<label for="Crema">Crema</label>

						<div class="Subtitulo">Carnes:</div>	 					
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Pollo', 'Si', 20)" id="Pollo">
						<label for="Pollo">Pollo</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Cerdo', 'Si', 25)" id="Cerdo">
						<label for="Cerdo">Cerdo</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('CarneMolida', 'Si', 16)" id="CarneMolida">
						<label for="CarneMolida">Carne Molida</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Jamon', 'Si', 15)" id="Jamon">
						<label for="Jamon">Jamón</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Pepperoni', 'Si', 15)" id="Pepperoni">
						<label for="Pepperoni">Pepperoni</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Salchicha', 'Si', 16)" id="Salchicha">
						<label for="Salchicha">Salchicha</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Salami', 'Si', 15)" id="Salami">
						<label for="Salami">Salami</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Tocino', 'Si', 18)" id="Tocino">
						<label for="Tocino">Tocino</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Chorizo', 'Si', 22)" id="Chorizo">
						<label for="Chorizo">Chorizo</label>
						<div class="Subtitulo">Otros:</div>		
						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('FinasHierbas', 'Si', 6)" id="FinasHierbas">
						<label for="FinasHierbas">Finas Hierbas</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Pimiento', 'Si', 16)" id="Pimiento">
						<label for="Pimiento">Pimiento</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Mango', 'Si', 10)" id="Mango">
						<label for="Mango">Mango</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Jalapeno', 'Si', 8)" id="Jalapeno">
						<label for="Jalapeno">Jalapeño</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Champinones', 'Si', 13)" id="Champinones">
						<label for="Champinones">Champiñones</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Cebolla', 'Si', 12)" id="Cebolla">
						<label for="Cebolla">Cebolla</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Aceitunas', 'Si', 10)" id="Aceitunas">
						<label for="Aceitunas">Aceitunas</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('AceitunasNegras', 'Si', 12)" id="AceitunasNegras">
						<label for="AceitunasNegras">Aceitunas Negras</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Pina', 'Si', 14)" id="Pina">
						<label for="Pina">Piña</label>

						<input type="checkbox" name="ingrediente" onclick="agregarIngrediente('Aguacate', 'No', 19)" id="Aguacate">
						<label for="Aguacate">Aguacate</label>
					</div>
				</div>
				<div class="act">
					<div class="subAct">Ingredientes seleccionados:</div>
					<div class="agregado SMozzarella">
						<div class="proing">Mozzarella</div>
						<div class="proing">100 grs</div>
						<div class="proing">$ 12.50</div>
					</div>
					<div class="agregado SMozzarellaExtra">
						<div class="proing">Mozzarella Extra</div>
						<div class="proing">25 grs</div>
						<div class="proing">$  6.00</div>
					</div>
					<div class="agregado SChedar">
						<div class="proing">Chedar</div>
						<div class="proing">  80 grs</div>
						<div class="proing">$ 12.00</div>
					</div>
					<div class="agregado SParmesano">
						<div class="proing">Parmesano</div>
						<div class="proing">80 grs</div>
						<div class="proing">$ 15.00</div>
					</div>
					<div class="agregado SCrema">
						<div class="proing">Crema</div>
						<div class="proing">250grs</div>
						<div class="proing">10.00$</div>
					</div>
					<div class="agregado SPollo">
						<div class="proing">Pollo</div>
						<div class="proing">70 grs</div>
						<div class="proing">$ 20.00</div>
					</div>
					<div class="agregado SCerdo">
						<div class="proing">Cerdo</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 25.00$</div>
					</div>
					<div class="agregado SCarneMolida">
						<div class="proing">Carne Molida</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 16.00</div>
					</div>
					<div class="agregado SJamon">
						<div class="proing">Jamon</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 15.00</div>
					</div>
					<div class="agregado SPepperoni">
						<div class="proing">Pepperoni</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 15.00</div>
					</div>
					<div class="agregado SSalchicha">
						<div class="proing">Salchicha</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 16.00</div>
					</div>
					<div class="agregado SSalami">
						<div class="proing">Salami</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 15.00</div>
					</div>
					<div class="agregado STocino">
						<div class="proing">Tocino</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 18.00</div>
					</div>
					<div class="agregado SChorizo">
						<div class="proing">Chorizo</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 22.00</div>
					</div>
					<div class="agregado SFinasHierbas">
						<div class="proing">FinasHierbas</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 6.00</div>
					</div>
					<div class="agregado SPimiento">
						<div class="proing">Pimiento</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 16.00</div>
					</div>
					<div class="agregado SMango">
						<div class="proing">Mango</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 10.00</div>
					</div>
					<div class="agregado SJalapeno">
						<div class="proing">Jalapeño</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 8.00</div>
					</div>
					<div class="agregado SChampinones">
						<div class="proing">Champiñones</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 13.00</div>
					</div>
					<div class="agregado SCebolla">
						<div class="proing">Cebolla</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 12.00</div>
					</div>
					<div class="agregado SAceitunas">
						<div class="proing">Aceitunas</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 10.00</div>
					</div>
					<div class="agregado SAceitunasNegras">
						<div class="proing">Aceitunas Negras</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 12.00</div>
					</div>
					<div class="agregado SPina">
						<div class="proing">Piña</div>
						<div class="proing">250grs</div>
						<div class="proing">$ 14.00</div>
					</div>
					<div class="agregado SAguacate">
						<div class="proing">Aguacate</div>
						<div class="proing">250grs</div>
						<div class="proing">19.00</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
	<script src="/js/jquery.js"></script>
	<script src="/js/preparar.js"></script>
</body>
</html>