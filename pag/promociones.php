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
        <title>Delipizza - Promociones</title>
        <link href="/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/ingredientes.css">
        <link rel="icon" type="image/png" href="/img/icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../mod/header_admin.php'; ?>
        <main class="contenedor">
            <section class="mostrarPromo hid">
                <ul class="nav nav-pills justify-content-center" style="padding-left:  500px; padding-right:0px;">
                    <li class="nav-item">
                        <a class="nav-link active" onclick="muestraSeccion('promo')" href="#">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="muestraSeccion('registrarPromo')" href="#">Registrar Promociones</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar producto" aria-label="Search" style="margin-left: 5px;">
                        <button class="btn btn-outline-danger my-2 my-sm-0 fa fa-search" type="submit"></button>
                    </form>
                </ul>
                <br>
                <div class="container">
                    <div class="card back-card">
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="../img/pizzas/ejemplo.png" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong>Promo 2x1 Peperonni</strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="desc">2 pizzas de peperonni medianas</h6>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="puntos">Gana 15 puntos</small></p>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="vig">Del 6 de Abril al 15 de Abril</small></p>
                                                <h6 class="card-text" id="precio">$150.00</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="../img/pizzas/ejemplo.png" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong>Pizza individual</strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="desc">Pizza individual hawaiana</h6>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="puntos">Gana 5 puntos</small></p>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="vig">Del 6 de Abril al 15 de Abril</small></p>
                                                <h6 class="card-text" id="precio">$20.00</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="../img/pizzas/ejemplo.png" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong>Pizza + Refresco</strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="desc">Pizza 3 carnes ch más refresco sabor pepsi 500ml</h6>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="puntos">Gana 20 puntos</small></p>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="vig">Del 6 de Abril al 15 de Abril</small></p>
                                                <h6 class="card-text" id="precio">$50.00</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="../img/pizzas/ejemplo.png" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong>Pizza + Alitas</strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="desc">Pizza individual más alitas BBQ</h6>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="puntos">Gana 10 puntos</small></p>
                                                <p style="margin-bottom: 0px;padding-bottom: 0px;"><small class="card-text" id="vig">Del 6 de Abril al 15 de Abril</small></p>
                                                <h6 class="card-text" id="precio">$70.00</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </section>
            <section class="regPromo hid">
                <ul class="nav nav-pills justify-content-center" style="padding-left:  500px; padding-right:0px;">
                    <li class="nav-item">
                        <a class="nav-link" onclick="muestraSeccion('promo')" href="#">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="muestraSeccion('registrarPromo')" href="#">Registrar Promociones</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar Promocion" aria-label="Search" style="margin-left: 5px;">
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
                                    <center><h1 class="log-usr">Registro Promociones</h1></center>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Nombre</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Ej: Queso parmesano" required value="">
                                            </div>
                                        </div>
                                        <div class="col md">
                                            <div class="form-group">
                                                <label><strong>Puntos</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="requerido" required value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Precio</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Requerido" required value="">
                                            </div>
                                        </div>
                                        <div class="col md">
                                            <div class="form-group">
                                                <label><strong>Vigencia</strong></label>
                                                <input class="form-control" id="" type="text" placeholder=" Requerido" required value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Descripción</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Requerido" required value="">
                                            </div>
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
        </main>
        <script src='/js/jquery.js'></script>
        <script src='/ext/bootstrap/js/bootstrap.min.js'></script>
        <script src='/ext/bootstrap/js/popper.min.js'></script>
        <script src='/js/promos.js'></script>
    </body>
</html>