<?php
	//No hay mucho que hacer aqui por ahora
	session_start();
	$pag = true;
	if(isset($_SESSION['empleado']) || isset($_SESSION['cliente'])){
        header('location: /inicio');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Delipizza - Registro</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/sessions.css">
	<link rel="icon" type="image/png" href="/img/icon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
	<link rel="stylesheet" href="/ext/fontawesome/css/all.css">
</head>
<body>
	<?php require '../mod/header.php'; ?>
	<main class="contenedor">
		<div class="cuerpo">
			<form action="../php/Registra.php" method="POST" id="form-register">
			<div class="colums">				
				<div class="field-container">
					<p>Nombre:</p>
					<i class="fas fa-user fa-lg"></i>
					<input type="text" name="nombre" placeholder="Jose Antonio" required class="field"> <br/>
				</div>
				
				<div class="field-container">
					<p>Apellido:</p>
					<i class="fas fa-user fa-lg"></i>
					<input type="text" name="apellido" placeholder="Lorenzo Cruz" required class="field"> <br/>
				</div>
			</div>

			
			<div class="colums-three">		
				<p>Fecha de nacimiento</p>		
				<div class="field-container">
					<p>Día:</p>
					<i class="fas fa-calendar-day fa-lg"></i>
					<select name="diaNacimiento" class="field">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>


				</div>
				
				<div class="field-container">
					<p>Mes:</p>
					<i class="fas fa-calendar fa-lg"></i>
					<select name="mesNacimiento" class="field">
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Mayo</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
				</div>

				<div class="field-container">
					<p>Año:</p>
					<i class="fas fa-calendar-check fa-lg"></i>
					<select name="anoNacimiento" class="field">
						<option value="70">1971</option>
						<option value="71">1972</option>
						<option value="72">1973</option>
						<option value="73">1974</option>
						<option value="74">1975</option>
						<option value="75">1976</option>
						<option value="76">1977</option>
						<option value="77">1978</option>
						<option value="78">1979</option>
						<option value="79">1970</option>
						<option value="90">1980</option>
						<option value="80">1981</option>
						<option value="81">1982</option>
						<option value="82">1983</option>
						<option value="83">1984</option>
						<option value="84">1985</option>
						<option value="85">1986</option>
						<option value="86">1987</option>
						<option value="87">1988</option>
						<option value="88">1989</option>
						<option value="89">1980</option>
						<option value="90">1990</option>
						<option value="91">1991</option>
						<option value="92">1992</option>
						<option value="93">1993</option>
						<option value="94">1994</option>
						<option value="95">1995</option>
						<option value="96">1996</option>
						<option value="97">1997</option>
						<option value="98">1998</option>
						<option value="99">1999</option>
						<option value="2000">2000</option>
						<option value="01">2001</option>
					</select>
				</div>
			</div>

			<div class="colums">				
				<div class="field-container">
					<p>Dirección:</p>
					<i class="fas fa-map-marker-alt fa-lg"></i>
					<input type="text" name="direccion" placeholder="Col. Centro Calle 3 sur #2543" required class="field"> <br/>
				</div>

				
				<div class="field-container">
					<p>Correo Electrónico:</p>
					<i class="fa fa-envelope fa-lg"></i>
					<input type="email" placeholder="example@mail.com" required name="emailaddress" class="field"> </br>
				</div>
			</div>
			
			<div class="colums">			
				<div class="field-container">
					<p>Contraseña:</p>
					<i class="fas fa-key fa-lg"></i>
					<input type="password" placeholder="********" required name="pwd" class="field"> <br/>
				</div>

				<div class="field-container">
					<p>Repita la contraseña:</p>
					<i class="fas fa-key fa-lg"></i>
					<input type="password" placeholder="********" required name="Confirmacionpwd" class="field"> <br/>
				</div>
			</div>		

			
			<div class="colums">
				<p>Información de pago</p>	
				
				<div class="field-container">
					<p>Número de tarjeta:</p>
					<i class="fas fa-credit-card fa-lg"></i>
					<input type="number" name="numTarjeta" placeholder="1234123412341234" class="field"> <br/>
				</div>	

				
				<div class="field-container">
					<p>Propietario:</p>
					<i class="fas fa-id-card fa-lg"></i>
					<input type="text" name="propietarioTarjeta" placeholder="Fulanito" class="field"> <br/>
				</div>	
			</div>
			<p>Fecha de expiración:</p>		

			<div class="colums">				
				<div class="field-container">
					<p>Mes:</p>
					<i class="fas fa-calendar fa-lg"></i>
					<select name="mesTarjeta" class="field">
						<option value="01">Enero</option>
						<option value="02">Febrero</option>
						<option value="03">Marzo</option>
						<option value="04">Abril</option>
						<option value="05">Mayo</option>
						<option value="06">Junio</option>
						<option value="07">Julio</option>
						<option value="08">Agosto</option>
						<option value="09">Mayo</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
				</div>
				
				<div class="field-container">
					<p>Año:</p>
					<i class="fas fa-user fa-lg"></i>
					<select name="anoTarjeta" class="field">
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
					</select>
				</div>
			</div>

			<p class="center-content">
				<input type="submit" class="btn btn-cyan" value="Registrarme">
			</p>
		</form>
		</div>
	</main>
	<?php require '../mod/footer.php'; ?>
</body>
</html>