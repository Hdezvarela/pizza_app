<?php
    require '../php/transaction.php';
	session_start();
	$pag = true;

    $Ingredientes = get_infINGREDIENTES();

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
        <title>Delipizza - Ingredientes</title>
        <link href="/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/ingredientes.css">
        <link rel="icon" type="image/png" href="/img/icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../mod/header_admin.php'; ?>
        <main class="contenedor">
            <section class="mostrarIng hid">
                <ul class="nav nav-pills justify-content-center" style="padding-left:  500px; padding-right:0px;">
                    <li class="nav-item">
                        <a class="nav-link active" onclick="muestraSeccion('ing')" href="#">Ingredientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="muestraSeccion('registrarIng')" href="#">Registrar Ingredientes</a>
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
                            <?php while($row = $Ingredientes->fetch_assoc()){ ?>
                                <div class="col-sm form-group" >
                                    <div class="card prod-card" style="width: 15rem;">
                                        <br>
                                        <img class="card-img-top img-prod rounded-circle" src="../img/jamon.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <hr>
                                            <center>
                                                <h6 class="card-title titulo-card" id="nombre"> <strong><?= $row['nombre'] ?></strong></h6>
                                                <hr>
                                                <h6 class="card-text" id="cant"><?= $row['cantidad'] ?> gr</h6>
                                                <h6 class="card-text" id="cal"><?= $row['calorias'] ?> cal</h6>
                                                <h6 class="card-text" id="precio"><?= $row['precio'] ?></h6>
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
            <section class="regIng hid">
                <ul class="nav nav-pills justify-content-center" style="padding-left:  500px; padding-right:0px;">
                    <li class="nav-item">
                        <a class="nav-link" onclick="muestraSeccion('ing')" href="#">Ingredientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="muestraSeccion('registrarIng')" href="#">Registrar Ingredientes</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar ingrediente" aria-label="Search" style="margin-left: 5px;">
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
                                    <center><h1 class="log-usr">Registro Ingrediente</h1></center>
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
                                                <label><strong>Cantidad</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Aprox. 300g" required value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label><strong>Calorias</strong></label>
                                                <input class="form-control" id="" type="text" placeholder="Aprox. 120cal" required value="">
                                            </div>
                                        </div>
                                        <div class="col md">
                                            <div class="form-group">
                                                <label><strong>Precio</strong></label>
                                                <input class="form-control" id="" type="text" placeholder=" 25.00" required value="">
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
        <script src='/js/ingredientes.js'></script>
    </body>
</html>