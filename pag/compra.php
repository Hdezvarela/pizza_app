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
        <title>Delipizza - Compra</title>
        <link href="/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/ingredientes.css">
        <link rel="icon" type="image/png" href="/img/icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../mod/header_admin.php'; ?>
        <main class="contenedor">
            <section class="mostrarCompras ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="card col-md-6 " style="background-color:#F9F4F4;border-right-width: 5px;border-left-width: 5px;border-top-width: 8px;border-bottom-width: 5px;">
                            <div class="card-body list1"></div>
                        </div>  
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </section>
        </main>
        <script src='/js/jquery.js'></script>
        <script src="/js/notify.js"></script>
        <script src='/ext/bootstrap/js/bootstrap.min.js'></script>
        <script src='/ext/bootstrap/js/popper.min.js'></script>
        <script src="/js/shadmicompra.js"></script>
    </body>
</html>