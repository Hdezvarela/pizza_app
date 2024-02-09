<?php
    require '../php/transaction.php';
	session_start();
	$pag = true;

    if (isset($_SESSION['empleado'])){
        $Rango = $_SESSION['empleado']['tipo_de_empleado'];
        $Pizzas = get_infPRODUCTOS(1);
        $Bebidas = get_infPRODUCTOS(2);
        $Postres = get_infPRODUCTOS(3);
    }else{
        header('location: /inicio');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Delipizza - Productos</title>
        <link href="/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/admin_productos.css">
        <link rel="stylesheet" href="/css/ingredientes.css">
        <link rel="icon" type="image/png" href="/img/icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../mod/header_admin.php'; ?>
        <main class="contenedor">
            <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" id="pizzas" onclick="muestraSeccion('pizzas')" href="#">Pizzas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="postres" onclick="muestraSeccion('postres')" href="#">Postres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bebidas" onclick="muestraSeccion('bebidas')" href="#">Bebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/agregar_producto">Registrar Productos</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                        <!--<input class="form-control mr-sm-2" type="search" id="cuadroBusqueda" placeholder="Buscar producto" aria-label="Search" style="margin-left: 5px;">
                        <button class="btn btn-outline-danger my-2 my-sm-0 fa fa-search" onclick="busquedaActiva()" type="submit"></button>-->
                    </form>
                </ul>
            <section class="mostrarPizzas hid" >
                <br>
                <div class="container">
                    <div class="card back-card">
                        <div class="card-body">
                            <div class="row form-group">
                                <?php while($row = $Pizzas->fetch_assoc()){ ?>
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="/img/producto/<?= $row['id'] ?>.png" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong><?= $row['nombre'] ?></strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="desc"><?= $row['descripcion'] ?></h6>
                                                <small class="card-text" id="ing">Queso mozarella, peperoni, salsa de tomate, especias y queso parmesano</small>
                                                <form>
                                                    <p class="clasificacion p-star">
                                                        <input id="radio1" type="radio" name="estrellas" value="5">
                                                        <label for="radio1">★</label>
                                                        <input id="radio2" type="radio" name="estrellas" value="4">
                                                        <label for="radio2">★</label>
                                                        <input id="radio3" type="radio" name="estrellas" value="3">
                                                        <label for="radio3">★</label>
                                                        <input id="radio4" type="radio" name="estrellas" value="2">
                                                        <label for="radio4">★</label>
                                                        <input id="radio5" type="radio" name="estrellas" value="1">
                                                        <label for="radio5">★</label>
                                                    </p>
                                                </form>
                                                <h6 class="card-text" id="precio">$ <?= $row['precio'] ?></h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
            </section>
            <section class="mostrarPostres hid" >
                <br>
                <div class="container">
                    <div class="card back-card">
                        <div class="card-body">
                            <div class="row form-group list1"></div>
                        </div>
                    </div>

                </div>
                <br>
            </section>
            <section class="mostrarBebidas hid" >
                <br>
                <div class="container">
                    <div class="card back-card">
                        <div class="card-body">
                            <div class="row form-group">
                                <?php while($row = $Bebidas->fetch_assoc()){ ?>
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="/img/producto/<?= $row['id'] ?>.png" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong><?= $row['nombre'] ?></strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="desc"><?= $row['descripcion'] ?></h6>
                                                <small class="card-text" id="ing"><?= $row['ingredientes'] ?></small>
                                                <form>
                                                    <p class="clasificacion p-star">
                                                        <input id="b1" type="radio" name="estrellas" value="5">
                                                        <label for="b1">★</label>
                                                        <input id="b2" type="radio" name="estrellas" value="4">
                                                        <label for="b2">★</label>
                                                        <input id="b3" type="radio" name="estrellas" value="3">
                                                        <label for="b3">★</label>
                                                        <input id="b4" type="radio" name="estrellas" value="2">
                                                        <label for="b4">★</label>
                                                        <input id="b5" type="radio" name="estrellas" value="1">
                                                        <label for="b5">★</label>
                                                    </p>
                                                </form>
                                                <h6 class="card-text" id="precio">$ <?= $row['precio'] ?></h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
            </section>
        </main>
        <script src='/js/jquery.js'></script>
        <script src="/js/notify.js"></script>
        <script src='/ext/bootstrap/js/bootstrap.min.js'></script>
        <script src='/ext/bootstrap/js/popper.min.js'></script>
        <script src="/js/shadmipostre.js"></script>
        <script src='/js/productos.js'></script>
    </body>
</html>