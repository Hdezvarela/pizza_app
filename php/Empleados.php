<?php  
function muestraEmpleados(){
    require 'transaction.php';
    $mysqli->set_charset('utf8');
    if ($emQuery = $mysqli->prepare("SELECT * FROM empleado")){  
        $emQuery->execute();  
        $val=$emQuery->get_result();
        while ($row = $val->fetch_assoc()){
             
            $id = $row['id'];
            $nombre = $row['nombre'];
            $correo = $row['correo'];
            $contrasena = $row['contrasena'];
            $tipo = $row['tipo_de_empleado'];
            if($tipo == 1){
                $empleado='Administrador';
            }
            else{
                $empleado='Repartidor';
            }
            echo '
            <div class="col md '.$id.'">
                <div class="card prod-card">
                    <h5 class="card-header">'." <a href='/admin/eliminar/".$id."'> ".'<button type="button" onclick="borraEmpleado('.$id.')" class="btn btn-outline-danger"  style="margin-left: 950px;">Eliminar</button></a></h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <img src="../img/perfilM.jpg" alt="" style="width: 280px;padding-left: 80px;">
                            </div>
                            <div class="col-md">
                                <div class="form-group" style="padding-right: 80px;width: 599px;">
                                    <label><strong>Nombre</strong></label>
                                    <div class="card">
                                        <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                            <h6>'.$nombre.'</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-right: 80px;width: 599px;">
                                    <label><strong>Puesto</strong></label>
                                    <div class="card">
                                        <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                            <h6>'.$empleado.'</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group" style="padding-left:50px;">
                                    <label><strong>Correo</strong></label>
                                    <div class="card">
                                        <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                            <h6>'.$correo.'</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md" style="padding-right:95px;">
                                <div class="form-group">
                                    <label><strong>Contraseña</strong></label>
                                    <div class="card">
                                        <div class="card-body" style="padding-top: 5px;padding-bottom: 1px;padding-left: 5px;padding-right: 1px;">
                                            <h6>'.$contrasena.'</h6>
                                        </div>
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