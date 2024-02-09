<?php
	if(!isset($pag)){
		header('location: /inicio');
	}else{
		$ban = 0;
		if(isset($_SESSION['empleado'])){
			$ban = 1;
		}elseif(isset($_SESSION['cliente'])) {
			$ban = 2;
		}
	}
?>

<header>
	<a href="/inicio"><img class="logo" src="/img/logotipo.svg"></a>

	<nav>
		<ul class="nav">
			<li><a href="/pizzas" class="navlink" >Pizzas</a></li>
			<li><a href="/bebidas" class="navlink" >Bebidas</a></li>
			<li><a href="/postres" class="navlink" >Postres</a></li>
		</ul>
	</nav>

	<?php if($ban == 2){ ?>
		<a href="/carrito" class="carrito"><img src="/img/carrito.svg" class="Csvg"></a>
	<?php } ?>

	<div class="options">
		<a href="/pizzas/preparar"><div class="objpre">Crea la tuya!</div></a>
		<?php if($ban == 0){ ?>
			<a href="/iniciar_sesion"><div class="objlog" id="sesion">Iniciar sesión</div></a>
			<a href="/registro"><div class="objlog" id="registrarme">Registrarme</div></a>
		<?php }elseif($ban == 1){ ?>
			<a href="#"><div class="objlog" id="sesion"><?= $_SESSION['empleado']['nombre'] ?></div></a>
			<a href="/admin/productos"><div class="objlog" id="sesion">Admin</div></a>
			<a href="/perfil/salir"><div class="objlog" id="sesion">Salir</div></a>
		<?php }elseif($ban == 2){ ?>
			<a href="#"><div class="objlog" id="sesion"><?= $_SESSION['cliente']['nombre'] ?></div></a>
			<a href="/perfil/salir"><div class="objlog" id="sesion">Salir</div></a>
		<?php } ?>
	</div>
</header>