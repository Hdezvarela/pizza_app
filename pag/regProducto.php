<?php
	session_start();
	$pag = true;

    if (isset($_SESSION['empleado'])){
        $Rango = $_SESSION['empleado']['tipo_de_empleado'];
    }else{
        header('location: /inicio');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Delipizza - Registrar Producto</title>
        <link href="/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/ingredientes.css">
        <link rel="icon" type="image/png" href="/img/icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
    <?php require '../mod/header_admin.php'; ?>
        <main class="contenedor">
            <section id="regProducto">
                <ul class="nav nav-pills justify-content-center form-group">
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/productos">Pizzas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/productos">Postres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/productos">Bebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/agregar_producto">Registrar Productos</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar producto" aria-label="Search" style="margin-left: 5px;">
                        <button class="btn btn-outline-danger my-2 my-sm-0 fa fa-search" type="submit"></button>
                    </form>
                </ul>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="card col-md-8 back-card form-group">
                            <div class="card-body">
                                <form action="">
                                    <center><h1 class="log-usr">Registro Productos</h1></center>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Nombre</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Ej: Pizza Hawaiana" required value="">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Calificación</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Default 0" required value="">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Descripción</strong></label>
                                                <textarea name="" id="" cols="40" rows="5" require></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Ingredientes</strong></label>
                                                <textarea name="" id="" cols="84" rows="3" require></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md form-group">
                                            <label><strong>Selecciona imagen</strong></label>
                                            <div class="custom-file" id="customFile" lang="es">
                                                <input type="file" aria-describedby="fileHelp" accept=".jpg">
                                                <label class="" for="exampleInputFile"></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </section>
            <br><br>
        </main>
        <script src='/js/jquery.js'></script>
        <script src='/ext/bootstrap/js/bootstrap.min.js'></script>
        <script src='/ext/bootstrap/js/popper.min.js'></script>
    </body>
</html>