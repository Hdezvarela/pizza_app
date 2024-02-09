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
        <title>Delipizza - Empleados</title>
        <link href="/ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/ingredientes.css">
        <link rel="icon" type="image/png" href="/img/icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
        <?php require '../mod/header_admin.php'; ?>
        <main class="contenedor">
            <section class="mostrarClientes">
                <div class="container">
                    <div class="row">
                        <div class="col md" style="width: 930px;padding-left: 70px;padding-right: 70px;">
                            <?php require '../php/Clientes.php'; 
                            muestraClientes();
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <script src='/js/jquery.js'></script>
        <script src='/ext/bootstrap/js/bootstrap.min.js'></script>
        <script src='/ext/bootstrap/js/popper.min.js'></script>
    </body>
</html>