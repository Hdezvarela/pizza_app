<?php  
function muestraClientes(){
    require 'transaction.php';
    $mysqli->set_charset('utf8');
    if ($emQuery = $mysqli->prepare("SELECT * FROM cliente")){  
        $emQuery->execute();  
        $val=$emQuery->get_result();
        while ($row = $val->fetch_assoc()){
             
            $id = $row['id'];
            $nombre = $row['nombre'];
            $apellido = $row['apellidos'];
            $fecha= $row['fecha_de_nacimiento'];
            $direccion = $row['direccion'];
            $correo = $row['correo'];
            $puntos = $row['puntos'];
            $contrasena = $row['contrasena'];
            
            echo 
            '<div class="card prod-card">
            <!--<h5 class="card-header">'." <a href='/admin/eliminar/".$id."'> ".'<button type="button" class="btn btn-outline-danger" style="margin-left: 850px;">Eliminar</button></h5>-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <img src="/img/perfilM.jpg" alt="" style="width: 280px;padding-left: 80px;">
                    </div>
                    <div class="col-md">
                        <div class="form-group" style="padding-right: 0px;width: 599px;">
                            <label><strong>Nombre</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                    <h6>'.$nombre.'</h6>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="padding-right: 0px;width: 599px;">
                            <label><strong>Apellidos</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                    <h6>'.$apellido.'</h6>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="padding-right: 0px;width: 599px;">
                            <label><strong>Fecha de Nacimiento</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                    <h6>'.$fecha.'</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label><strong>Dirección</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                    <h6>'.$direccion.'</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label><strong>Correo</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                    <h6>'.$correo.'</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label><strong>Puntos</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;" >
                                    <h6>'.$puntos.'</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label><strong>Contraseña</strong></label>
                            <div class="card">
                                <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;" >
                                    <h6>'.$contrasena.'</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        }
        
        $emQuery->close();
    }
}

?>