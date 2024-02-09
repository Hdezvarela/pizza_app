<?php
	if(!isset($pag)){
		header('location: /inicio');
	}
?>

<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light form-group" style='padding-left: 200px; height: 66px;'>
			<a href="/inicio"><img src="/img/logotipo.svg" width="150" height="50" alt=""></a>
		<div class="collapse navbar-collapse " id="navbarSupportedContent ">
			<ul class="navbar-nav mr-auto ">
				<li class="nav-item active form-group ">
					<a class="btn btn-info" href="/admin/productos">Productos</a>
				</li>
				<li class="nav-item form-group">
					<a class="btn btn-info" href="/admin/ingredientes">Ingredientes</a>
				</li>
				<li class="nav-item form-group">
					<a class="btn btn-info" href="/admin/promociones">Promociones</a>
				</li>
				<li class="nav-item form-group">
					<a class="btn btn-info" href="/admin/empleados">Empleados</a>
				</li>
				<li class="nav-item form-group">
					<a class="btn btn-info" href="/admin/clientes">Clientes</a>
				</li>
				<li class="nav-item form-group">
					<a class="btn btn-info " href="/admin/compras">Compras</a>
				</li>
			</ul>
		</div>
	</nav>
</header>