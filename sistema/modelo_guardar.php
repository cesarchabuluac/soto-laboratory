


<?php include "../conexion.php"; //ubiación de la conexión?>



<?php




//==============================================================================================================

//REGISTRAR USUARIO si presionamos el botón guardar usuario
        if(isset($_POST['guardar_usuario']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['id_rol'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = md5($_POST['clave']);
        $id_rol = $_POST['id_rol'];

        $query = mysqli_query($conexion, "SELECT * FROM usuario where usuario = '$usuario'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El usuario ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO usuario(nombre,usuario,clave,id_rol) values ('$nombre',  '$usuario', '$clave', '$id_rol')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado.
                        </div>';

  header("Location: registro_usuario.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_usuario.php");
            }
        }
        header("Location: registro_usuario.php");

    }

}
}


?>



<?php




//==============================================================================================================

//REGISTRAR USUARIO si presionamos el botón guardar usuario
        if(isset($_POST['asignar_tecnico']))
        {
            

        $id_usuario_tecnico = $_POST['id_usuario_tecnico'];
        $estado_tecnico=1;
        date_default_timezone_set('America/Guatemala');
        $fecha_asignado=date('Y/m/d');
        $hora_asignado=date('H:i:s');

        session_start();
        $id_usuario=$_SESSION['id_usuario'];

    
$actualizar_estado= mysqli_query($conexion, "UPDATE asignar_tecnico SET  estado_tecnico=0  WHERE id_usuario_tecnico!=$id_usuario_tecnico");


            $query_insert = mysqli_query($conexion, "INSERT INTO asignar_tecnico(id_usuario_tecnico,estado_tecnico,fecha_asignado,hora_asignado,id_usuario) values ($id_usuario_tecnico,$estado_tecnico,'$fecha_asignado','$hora_asignado',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado.
                        </div>';

                      header("Location: asignar_tecnico.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: asignar_tecnico.php");
            }
   
                      header("Location: asignar_tecnico.php");



}
?>






<?php 
//==============================================================================================================
//Guardar el color
        if(isset($_POST['guardar_color']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_color']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre_color = $_POST['nombre_color'];
       
        $query = mysqli_query($conexion, "SELECT * FROM color where nombre_color = '$nombre_color'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El color ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO color(nombre_color) values ('$nombre_color')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            color registrado.
                        </div>';

  header("Location: registro_de_nomenclaturas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_de_nomenclaturas.php");
            }
        }
        header("Location: registro_de_nomenclaturas.php");

    }

}
}

//===========================================================================================
//Guardar la marca
        if(isset($_POST['guardar_marca']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_marca']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre_marca = $_POST['nombre_marca'];
       
        $query = mysqli_query($conexion, "SELECT * FROM marca where nombre_marca = '$nombre_marca'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        La marca ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO marca(nombre_marca) values ('$nombre_marca')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            marca registrado.
                        </div>';

  header("Location: registro_de_nomenclaturas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_de_nomenclaturas.php");
            }
        }
        header("Location: registro_de_nomenclaturas.php");

    }

}
}


//===========================================================================================
//Guardar la marca
        if(isset($_POST['guardar_modelo']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_modelo']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre_modelo = $_POST['nombre_modelo'];
       
        $query = mysqli_query($conexion, "SELECT * FROM modelo where nombre_modelo = '$nombre_modelo'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El Modelo ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO modelo(nombre_modelo) values ('$nombre_modelo')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Modelo registrado.
                        </div>';

  header("Location: registro_de_nomenclaturas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_de_nomenclaturas.php");
            }
        }
        header("Location: registro_de_nomenclaturas.php");

    }

}
}



//===========================================================================================
//Guardar la marca
        if(isset($_POST['guardar_tipo']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_tipo']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre_tipo = $_POST['nombre_tipo'];
       
        $query = mysqli_query($conexion, "SELECT * FROM tipo where nombre_tipo = '$nombre_tipo'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El Tipo ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO tipo(nombre_tipo) values ('$nombre_tipo')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           Tipo registrado.
                        </div>';

  header("Location: registro_de_nomenclaturas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_de_nomenclaturas.php");
            }
        }
        header("Location: registro_de_nomenclaturas.php");

    }

}
}



//===========================================================================================
//Guardar la categoria
        if(isset($_POST['guardar_categoria']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_categoria']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {
        $id_tipo = $_POST['id_tipo'];
        $nombre_categoria = $_POST['nombre_categoria'];
       
        $query = mysqli_query($conexion, "SELECT * FROM categoria where nombre_categoria = '$nombre_categoria'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        La categoria ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO categoria(nombre_categoria,id_tipo) values ('$nombre_categoria',$id_tipo)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           Categoría registrado.
                        </div>';

  header("Location: registro_de_nomenclaturas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_de_nomenclaturas.php");
            }
        }
        header("Location: registro_de_nomenclaturas.php");

    }

}
}



//===========================================================================================
//Guardar la TALLA (medida)
        if(isset($_POST['guardar_talla'])) //MEDIDA kg, mt, libra, lata, botella, galón, y más. Talla M, talla S si fuera ropa.
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_talla']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {
        $id_categoria= $_POST['id_categoria'];
        $nombre_talla = $_POST['nombre_talla'];
       
        $query = mysqli_query($conexion, "SELECT * FROM medida where nombre_talla = '$nombre_talla'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        La talla ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO medida (nombre_talla,id_categoria) values ('$nombre_talla',$id_categoria)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           Categoría registrado.
                        </div>';

  header("Location: registro_de_nomenclaturas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: registro_de_nomenclaturas.php");
            }
        }
        header("Location: registro_de_nomenclaturas.php");

    }

}
}


//===========================================================================================
//Guardar  productos

        if(isset($_POST['guardar_producto'])) //
        {
            session_start(); //INICIAMOS LA SESSIÓN

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['codigo_producto']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {
        $id_local=$_POST['id_local'];
        $codigo_producto= $_POST['codigo_producto'];
        $nombre_producto= $_POST['nombre_producto'];
         echo $llave_producto=$codigo_producto.$id_local;
     
        $stock_minimo= $_POST['stock_minimo'];

        date_default_timezone_set('America/Guatemala');
        $ultima_actualizacion=date('Y/m/d');
        $hora_actualizacion=date('H:i:s');
        $precio_compra= $_POST['precio_compra'];

        $precio_venta= $_POST['precio_venta'];
        $id_color= $_POST['id_color'];
        $id_marca= $_POST['id_marca'];
        $id_modelo= $_POST['id_modelo'];
        $id_tipo= $_POST['id_tipo'];
        $id_categoria= $_POST['id_categoria'];

        $id_talla= $_POST['id_talla'];
        date_default_timezone_set('America/Guatemala');
     $fecha_registro=date('Y-m-d');  //FECHA DE REGISTRO DEL PRODUCTO
      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


     

       
        $query = mysqli_query($conexion, "SELECT * FROM productos where codigo_producto= '$codigo_producto' or nombre_producto='$nombre_producto or llave_producto=$llave_producto'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El código del producto ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO productos (codigo_producto,llave_producto,nombre_producto,stock_minimo,ultima_actualizacion, hora_actualizacion,id_local,precio_compra,precio_venta,id_color,id_marca,id_modelo,id_tipo,id_categoria,id_talla,id_usuario,fecha_registro) values ('$codigo_producto','$llave_producto','$nombre_producto',$stock_minimo,'$ultima_actualizacion','$hora_actualizacion',$id_local,$precio_compra,$precio_venta,$id_color,$id_marca,$id_modelo,$id_tipo,$id_categoria,$id_talla,$id_usuario,'$fecha_registro')");
            if ($query_insert) {
                echo $alert = '<div class="alert alert-primary" role="alert">
                           Porducto registrado.
                        </div>';

  header("Location: registro_de_productos.php?id_local=$id_local");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
  header("Location: registro_de_productos.php?id_local=$id_local");
            }
        }
  header("Location: registro_de_productos.php?id_local=$id_local");

    }

}
}



?>


<?php
//===========================================================================================
//Guardar LOCALES

        if(isset($_POST['guardar_local'])) //
        {
            session_start(); //INICIAMOS LA SESSIÓN

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['codigo_local']))  {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {
        $codigo_local= $_POST['codigo_local'];
        $nombre_local= $_POST['nombre_local'];
     
        $encargado_local= $_POST['encargado_local'];
        
        $telefono_local= $_POST['telefono_local'];
        $correo_local= $_POST['correo_local'];
        $direccion_encargado= $_POST['direccion_encargado'];
        
      
        date_default_timezone_set('America/Guatemala');
     $fecha_registro_local=date('Y-m-d');  //FECHA DE REGISTRO DEL PRODUCTO
      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 

       
        $query = mysqli_query($conexion, "SELECT * FROM local where codigo_local= '$codigo_local' or nombre_local='$nombre_local'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El código del local ya existe.
                    </div>';
                    
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO local (codigo_local,nombre_local,encargado_local,telefono_local,correo_local,direccion_encargado,fecha_registro_local,id_usuario) values ('$codigo_local','$nombre_local','$encargado_local','$telefono_local','$correo_local','$direccion_encargado','$fecha_registro_local',$id_usuario)");
            if ($query_insert) {
                echo $alert = '<div class="alert alert-primary" role="alert">
                           Local registrado.
                        </div>';

  header("Location: registro_de_locales.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                        header("Location: registro_de_locales.php");
            }
        }
       
  header("Location: registro_de_locales.php");
    }

}
}



?>

<?php

//==============================================================================================================

//REGISTRAR PACIENTE
        if(isset($_POST['guardar_paciente']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_paciente'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        date_default_timezone_set('America/Guatemala');

        $fecha_paciente=date('Y/m/d');
        $hora_paciente=date('H:i:s');

               $nombre_paciente = $_POST['nombre_paciente'];

          $dpi_paciente = $_POST['dpi_paciente'];
    $id_genero= $_POST['id_genero'];

       $telefono_paciente = $_POST['telefono_paciente'];
        $correo_paciente = $_POST['correo_paciente'];
        $direccion_paciente = $_POST['direccion_paciente'];
         $fecha_nacimiento_paciente = $_POST['fecha_nacimiento_paciente'];

        $edad_paciente=$_POST['edad_paciente'];
                   session_start(); //INICIAMOS LA SESSIÓN

       

        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 



$name= substr($nombre_paciente,0,3);

          echo $codigo_unico_paciente=date('YmdHis').$name;

    


            $query_insert = mysqli_query($conexion, "INSERT INTO pacientes(codigo_unico_paciente,nombre_paciente,dpi_paciente,id_genero,telefono_paciente,correo_paciente,direccion_paciente,fecha_nacimiento_paciente,edad_paciente,id_usuario,fecha_paciente,hora_paciente) values ('$codigo_unico_paciente','$nombre_paciente','$dpi_paciente',$id_genero,'$telefono_paciente','$correo_paciente','$direccion_paciente','$fecha_nacimiento_paciente','$edad_paciente', $id_usuario,'$fecha_paciente','$hora_paciente')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado.
                        </div>';

  header("Location: registro_de_pacientes.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        
  header("Location: registro_de_pacientes.php");

    }

}
}


?>



<?php

//==============================================================================================================

//REGISTRAR MÉDICO
        if(isset($_POST['guardar_medico']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_medico'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


if(isset($_POST['codigo_formulario'])? $codigo_formulario=$_POST['codigo_formulario']:'');


           $nombre_medico = $_POST['nombre_medico'];

 

  $telefono_medico = $_POST['telefono_medico'];
            $institucion_referido = $_POST['institucion_referido'];

        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

        $query = mysqli_query($conexion, "SELECT * FROM medicos where nombre_medico= '$nombre_medico'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El medico ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO medicos(nombre_medico,telefono_medico,institucion_referido,id_usuario) values ('$nombre_medico','$telefono_medico','$institucion_referido', $id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Médico registrado.
                        </div>';
if(isset($codigo_formulario))
{
  header("Location: medicos_referidos_asignado.php?codigo_formulario=$codigo_formulario");
}
else
{
      header("Location: medicos_referidos.php");


}

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }
if(isset($codigo_formulario))
{
  header("Location: medicos_referidos_asignado.php?codigo_formulario=$codigo_formulario");
}
else
{
  header("Location: medicos_referidos.php");
}
    }

}
}


?>



<?php

//==============================================================================================================

//actualizar los datos del paciente antes de crear el formulario para agregar exámenes
        if(isset($_POST['actualizar_paciente_formulario']))
        {

            

//ACTUALIZAMOS LOS DATOS 
           $id_paciente=$_POST['id_paciente'];
$nombre_paciente = $_POST['nombre_paciente'];
$dpi_paciente= $_POST['dpi_paciente'];
 $id_genero= $_POST['id_genero'];
 $telefono_paciente = $_POST['telefono_paciente'];
 $correo_paciente= $_POST['correo_paciente'];
 $direccion_paciente= $_POST['direccion_paciente'];
$fecha_nacimiento_paciente=$_POST['fecha_nacimiento_paciente'];
$edad_paciente=$_POST['edad_paciente'];


$id_medico_referido=$_POST['id_medico_referido'];
$id_muestra=$_POST['id_muestra'];
$observaciones_muestra=$_POST['observaciones_muestra'];

session_start(); //INICIAMOS LA SESSIÓN


$_SESSION['id_medico_referido']=$id_medico_referido;
$_SESSION['id_muestra']=$id_muestra;
$_SESSION['observaciones_muestra']=$observaciones_muestra;




      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 




$actualizar_paciente= mysqli_query($conexion, "UPDATE pacientes SET  nombre_paciente = '$nombre_paciente',dpi_paciente = '$dpi_paciente', id_genero=$id_genero, telefono_paciente = '$telefono_paciente', correo_paciente = '$correo_paciente',direccion_paciente = '$direccion_paciente',fecha_nacimiento_paciente='$fecha_nacimiento_paciente',edad_paciente='$edad_paciente',id_usuario=$id_usuario  WHERE id_paciente=$id_paciente");

$id_usuario_tecnico = $_POST['id_usuario_tecnico'];
        $estado_tecnico=1;
        date_default_timezone_set('America/Guatemala');
        $fecha_asignado=date('Y/m/d');
        $hora_asignado=date('H:i:s');

        $id_usuario=$_SESSION['id_usuario'];

    
$actualizar_estado= mysqli_query($conexion, "UPDATE asignar_tecnico SET  estado_tecnico=0  WHERE id_usuario_tecnico!=$id_usuario_tecnico");


            $query_insert = mysqli_query($conexion, "INSERT INTO asignar_tecnico(id_usuario_tecnico,estado_tecnico,fecha_asignado,hora_asignado,id_usuario) values ($id_usuario_tecnico,$estado_tecnico,'$fecha_asignado','$hora_asignado',$id_usuario)");


            if ($actualizar_paciente) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Examen registrado.
                        </div>';

  header("Location: seleccion_area.php?id_paciente=$id_paciente");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        
  header("Location: seleccion_area.php?id_paciente=$id_paciente");

    

}



?>


<?php

//==============================================================================================================

//actualizar los datos del paciente antes de crear el formulario de REPORTE por muestra dañada u otro factor
        if(isset($_POST['actualizar_paciente_reporte']))
        {

            

//ACTUALIZAMOS LOS DATOS 
 $id_paciente=$_POST['id_paciente'];
$nombre_paciente = $_POST['nombre_paciente'];
$dpi_paciente= $_POST['dpi_paciente'];
 $id_genero= $_POST['id_genero'];
 $telefono_paciente = $_POST['telefono_paciente'];
 $correo_paciente= $_POST['correo_paciente'];
 $direccion_paciente= $_POST['direccion_paciente'];
$fecha_nacimiento_paciente=$_POST['fecha_nacimiento_paciente'];
$edad_paciente=$_POST['edad_paciente'];


$id_medico_referido=$_POST['id_medico_referido'];
$id_muestra=$_POST['id_muestra'];
$observaciones_muestra_reporte=$_POST['observaciones_muestra'];

session_start(); //INICIAMOS LA SESSIÓN


$_SESSION['id_medico_referido']=$id_medico_referido;
$_SESSION['id_muestra']=$id_muestra;
$_SESSION['observaciones_muestra']=$observaciones_muestra;




      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 




$actualizar_paciente= mysqli_query($conexion, "UPDATE pacientes SET  nombre_paciente = '$nombre_paciente',dpi_paciente = '$dpi_paciente', id_genero=$id_genero, telefono_paciente = '$telefono_paciente', correo_paciente = '$correo_paciente',direccion_paciente = '$direccion_paciente',fecha_nacimiento_paciente='$fecha_nacimiento_paciente',edad_paciente='$edad_paciente',id_usuario=$id_usuario  WHERE id_paciente=$id_paciente");


date_default_timezone_set('America/Guatemala');

$fecha_reporte=date('Y/m/d');
$hora_reporte=date('H:i:s');


 $query_insert = mysqli_query($conexion, "INSERT INTO reporte_pacientes(id_paciente,id_muestra,id_medico_referido,observaciones_muestra_reporte,fecha_reporte,hora_reporte,id_usuario) values ($id_paciente,$id_muestra,$id_medico_referido,'$observaciones_muestra_reporte','$fecha_reporte','$hora_reporte',$id_usuario)");

            if ($actualizar_paciente) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Examen registrado.
                        </div>';

  header("Location: listado_pacientes_reportes.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        
  header("Location: listado_pacientes_reportes.php");

    

}



?>





<?php

//==============================================================================================================

//actualizar los datos del paciente antes de crear el formulario de REPORTE por muestra dañada u otro factor
        if(isset($_POST['actualizar_paciente_formulario_cotizacion']))
        {

            

//ACTUALIZAMOS LOS DATOS 
 $id_paciente=$_POST['id_paciente'];
$nombre_paciente = $_POST['nombre_paciente'];
$dpi_paciente= $_POST['dpi_paciente'];
 $id_genero= $_POST['id_genero'];
 $telefono_paciente = $_POST['telefono_paciente'];
 $correo_paciente= $_POST['correo_paciente'];
 $direccion_paciente= $_POST['direccion_paciente'];
$fecha_nacimiento_paciente=$_POST['fecha_nacimiento_paciente'];
$edad_paciente=$_POST['edad_paciente'];


$id_medico_referido=$_POST['id_medico_referido'];
$id_muestra=$_POST['id_muestra'];
$observaciones_muestra_reporte=$_POST['observaciones_muestra'];

session_start(); //INICIAMOS LA SESSIÓN


$_SESSION['id_medico_referido']=$id_medico_referido;
$_SESSION['id_muestra']=$id_muestra;
$_SESSION['observaciones_muestra']=$observaciones_muestra;




      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 




$actualizar_paciente= mysqli_query($conexion, "UPDATE pacientes SET  nombre_paciente = '$nombre_paciente',dpi_paciente = '$dpi_paciente', id_genero=$id_genero, telefono_paciente = '$telefono_paciente', correo_paciente = '$correo_paciente',direccion_paciente = '$direccion_paciente',fecha_nacimiento_paciente='$fecha_nacimiento_paciente',edad_paciente='$edad_paciente',id_usuario=$id_usuario  WHERE id_paciente=$id_paciente");


date_default_timezone_set('America/Guatemala');

$fecha_reporte=date('Y/m/d');
$hora_reporte=date('H:i:s');


 $query_insert = mysqli_query($conexion, "INSERT INTO reporte_pacientes(id_paciente,id_muestra,id_medico_referido,observaciones_muestra_reporte,fecha_reporte,hora_reporte,id_usuario) values ($id_paciente,$id_muestra,$id_medico_referido,'$observaciones_muestra_reporte','$fecha_reporte','$hora_reporte',$id_usuario)");

            if ($actualizar_paciente) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Examen registrado.
                        </div>';

  header("Location: seleccion_area_cotizacion.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        
  header("Location: seleccion_area_cotizacion.php?id_paciente=$id_paciente");

    

}



?>





<?php

//==============================================================================================================

//REGISTRAR MÉDICO
        if(isset($_POST['crear_examen']))
        {



          $id_area = $_POST['id_area'];
          $id_paciente = $_POST['id_paciente'];

date_default_timezone_set('America/Guatemala');
 $codigo_formulario=date('YmdHis');
$fecha_creado=date('Y/m/d');
$hora_creado=date('H:i:s');

        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 

$id_medico_referido=$_POST['id_medico_referido'];
 $id_muestra=$_POST['id_muestra'];
 $observaciones_muestra=$_POST['observaciones_muestra'];
    

            $query_insert = mysqli_query($conexion, "INSERT INTO examenes_creados(id_area,id_paciente,codigo_formulario,fecha_creado,hora_creado,id_medico_referido,id_muestra,observaciones_muestra,id_usuario) values ($id_area,$id_paciente, '$codigo_formulario','$fecha_creado','$hora_creado',$id_medico_referido,$id_muestra,'$observaciones_muestra', $id_usuario)");
            


            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Examen registrado.
                        </div>';

 header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        
 header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

    

}



?>


<?php

//==============================================================================================================

//REGISTRAR MÉDICO
        if(isset($_POST['crear_examen_cotizacion']))
        {



          $id_area = $_POST['id_area'];
          $id_paciente = $_POST['id_paciente'];

date_default_timezone_set('America/Guatemala');
 $codigo_formulario=date('YmdHis');
$fecha_creado=date('Y/m/d');
$hora_creado=date('H:i:s');

        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 

$id_medico_referido=$_POST['id_medico_referido'];
 $id_muestra=$_POST['id_muestra'];
 $observaciones_muestra=$_POST['observaciones_muestra'];
    

            $query_insert = mysqli_query($conexion, "INSERT INTO examenes_creados(id_area,id_paciente,codigo_formulario,fecha_creado,hora_creado,id_medico_referido,id_muestra,observaciones_muestra,id_usuario) values ($id_area,$id_paciente, '$codigo_formulario','$fecha_creado','$hora_creado',$id_medico_referido,$id_muestra,'$observaciones_muestra', $id_usuario)");
            


            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Examen registrado.
                        </div>';

 header("Location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        
 header("Location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario");

    

}



?>




<?php

//==============================================================================================================

//REGISTRAR áreas de laborarotios
        if(isset($_POST['guardar_area']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_area'])||empty($_POST['codigo_area'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {




         $codigo_area = $_POST['codigo_area'];

     $nombre_area = $_POST['nombre_area'];

 


        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

        $query = mysqli_query($conexion, "SELECT * FROM areas where codigo_area= '$codigo_area'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El area ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO areas(codigo_area,nombre_area,id_usuario) values ('$codigo_area','$nombre_area',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Área registrado.
                        </div>';

  header("Location: lista_de_areas.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }
  header("Location: lista_de_areas.php");

    }

}
}


?>



<?php

//==============================================================================================================

//REGISTRAR los antibióticos
        if(isset($_POST['guardar_antibiotico']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_antibiotico'])||empty($_POST['codigo_antibiotico'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {




         $codigo_antibiotico = $_POST['codigo_antibiotico'];

     $nombre_antibiotico= $_POST['nombre_antibiotico'];

 


        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

        $query = mysqli_query($conexion, "SELECT * FROM antibioticos where codigo_antibiotico= '$codigo_antibiotico'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El antibiótico ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO antibioticos (codigo_antibiotico,nombre_antibiotico,id_usuario) values ('$codigo_antibiotico','$nombre_antibiotico',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            registrado.
                        </div>';

  header("Location: antibioticos.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }
  header("Location: antibioticos.php");

    }

}
}


?>


<?php

//==============================================================================================================

//REGISTRAR exámenes de laborarotios
        if(isset($_POST['guardar_examen']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_examen'])||empty($_POST['codigo_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {



     $id_area = $_POST['id_area'];
     $codigo_examen = $_POST['codigo_examen'];

     $nombre_examen = $_POST['nombre_examen'];
            $id_genero_referencia = $_POST['id_genero_referencia'];

       $valor_referencia = $_POST['valor_referencia'];  //mínimo
              $valor_referencia2 = $_POST['valor_referencia2']; //máximo

         $nombre_nomenclatura = $_POST['nombre_nomenclatura'];
         $subarea = $_POST['subarea'];

           $precio_examen = $_POST['precio_examen'];



        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

        $query = mysqli_query($conexion, "SELECT * FROM examenes where codigo_examen= '$codigo_examen'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO examenes(codigo_examen,id_area,nombre_examen,id_genero_referencia,valor_referencia,valor_referencia2,nombre_nomenclatura,subarea,precio_examen,id_usuario) values ('$codigo_examen',$id_area,'$nombre_examen',$id_genero_referencia,'$valor_referencia','$valor_referencia2','$nombre_nomenclatura','$subarea',$precio_examen,$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Área registrado.
                        </div>';

  header("Location: examenes.php?id_area=$id_area");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: examenes.php?id_area=$id_area");

    }

}
}


?>



<?php

//==============================================================================================================

//REGISTRAR exámenes múltiples en otras referencias de laborarotios
        if(isset($_POST['guardar_examen_multiples']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {



    $id_examen = $_POST['id_examen'];
        $id_titulo = $_POST['id_titulo'];

     $caracteristica = $_POST['caracteristica'];

     $dimensional = $_POST['dimensional'];
            $valor_referencia_multiple = $_POST['valor_referencia_multiple'];

       

        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 

$query_insert = mysqli_query($conexion, "INSERT INTO examen_multiple(id_examen, caracteristica,dimensional,valor_referencia_multiple,id_usuario) values ($id_examen,'$caracteristica','$dimensional','$valor_referencia_multiple',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Área registrado.
                        </div>';

  header("Location: otras_referencias.php.php?id_examen=$id_examen");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        

  header("Location: otras_referencias.php.php?id_examen=$id_examen");

    }

}
}


?>






<?php

//==============================================================================================================

//REGISTRAR los resultados de los exámnes seleccionados
        if(isset($_POST['agregar_examenes_formulario']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_examen'])||empty($_POST['id_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


     echo $codigo_formulario=$_POST['codigo_formulario'];
     $id_area = $_POST['id_area'];
     $id_paciente = $_POST['id_paciente'];
     $id_examen_creado = $_POST['id_examen_creado'];
     $id_examen = $_POST['id_examen'];
       $resultado = $_POST['resultado'];
     $descripcion = $_POST['descripcion'];



date_default_timezone_set('America/Guatemala');
     $fecha_agregado=date('Y/m/d');
     $hora_agregado=date('H:i:s');


    
        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

$query = mysqli_query($conexion, "SELECT * FROM detalle_examenes where id_examen= $id_examen and id_examen_creado=$id_examen_creado");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes(id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,id_usuario) values ($id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado',$id_usuario)");






            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

    }

}
}


?>




<?php

//==============================================================================================================

//REGISTRAR los campos de orina
        if(isset($_POST['agregar_examenes_orina']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_examen'])||empty($_POST['id_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


     echo $codigo_formulario=$_POST['codigo_formulario'];
     $id_area = $_POST['id_area'];
     $id_paciente = $_POST['id_paciente'];
     $id_examen_creado = $_POST['id_examen_creado'];
     $id_examen = $_POST['id_examen'];
       $resultado = $_POST['resultado'];
     $descripcion = $_POST['descripcion'];



date_default_timezone_set('America/Guatemala');
     $fecha_agregado=date('Y/m/d');
     $hora_agregado=date('H:i:s');


    
        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

$query = mysqli_query($conexion, "SELECT * FROM detalle_examenes where id_examen= $id_examen and id_examen_creado=$id_examen_creado");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {

            $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes(id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,id_usuario) values ($id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado',$id_usuario)");

$query_insert = mysqli_query($conexion, "INSERT INTO detalles_orina(codigo_formulario,id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,color,aspecto,sangre,bilirrubina,urobilinogeno,cetonas,glucosa,proteinas,nitritos,leucocitos,ph,densidad,celulas_epiteliales,leucocitos_2,eritrocitos,moco,cristales,cilindros,bacterias,levaduras,parasitos,observaciones,id_usuario) values ('$codigo_formulario',$id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado','$color','$aspecto','$sangre','$bilirrubina','$urobilinogeno','$cetonas','$glucosa', '$proteinas','$nitritos','$leucocitos','$ph','$densidad','$celulas_epiteliales','$leucocitos_2','$eritrocitos','$moco','$cristales','$cilindros','$bacterias','$levaduras','$parasitos','$observaciones','$id_usuario')");





            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

    }

}
}


?>




<?php

//==============================================================================================================

//REGISTRAR los campos de heces
        if(isset($_POST['agregar_examenes_heces']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_examen'])||empty($_POST['id_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


     echo $codigo_formulario=$_POST['codigo_formulario'];
     $id_area = $_POST['id_area'];
     $id_paciente = $_POST['id_paciente'];
     $id_examen_creado = $_POST['id_examen_creado'];
     $id_examen = $_POST['id_examen'];
       $resultado = $_POST['resultado'];
     $descripcion = $_POST['descripcion'];



date_default_timezone_set('America/Guatemala');
     $fecha_agregado=date('Y/m/d');
     $hora_agregado=date('H:i:s');


    
        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

$query = mysqli_query($conexion, "SELECT * FROM detalle_examenes where id_examen= $id_examen and id_examen_creado=$id_examen_creado");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {

            $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes(id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,id_usuario) values ($id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado',$id_usuario)");

$query_insert = mysqli_query($conexion, "INSERT INTO detalles_heces(codigo_formulario,id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,color,consistencia,ph,sangre,moco,restos_alimenticios,celulas_vegetales,almidones,jabones,grasas,levaduras,leucocitos,eritrocitos,parasitos,observaciones,id_usuario) values ('$codigo_formulario',$id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado','$color','$consistencia','$ph','$sangre','$moco','$restos_alimenticios','$celulas_vegetales','$almidones','$jabones','$grasas','$levaduras','$leucocitos','$eritrocitos','$parasitos','$observaciones',$id_usuario)");





            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

    }

}
}


?>


<?php

//==============================================================================================================

//REGISTRAR LOS DETALLES DEL EXAMEN DE CULTIVO GENERAL, Y EL SIGUIENTE BOTÓN ES PARA AGREGAR LOS ANTIBIÓTICOS
        if(isset($_POST['agregar_examenes_cultivos']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_examen'])||empty($_POST['id_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


     echo $codigo_formulario=$_POST['codigo_formulario'];
     $id_area = $_POST['id_area'];
     $id_paciente = $_POST['id_paciente'];
     $id_examen_creado = $_POST['id_examen_creado'];
     $id_examen = $_POST['id_examen'];
       $resultado = $_POST['resultado'];
     $descripcion = $_POST['descripcion'];



date_default_timezone_set('America/Guatemala');
     $fecha_agregado=date('Y/m/d');
     $hora_agregado=date('H:i:s');


    
        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

$query = mysqli_query($conexion, "SELECT * FROM detalle_examenes where id_examen= $id_examen and id_examen_creado=$id_examen_creado");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {

            $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes(id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,id_usuario) values ($id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado',$id_usuario)");

              $query_insert_2 = mysqli_query($conexion, "INSERT INTO examen_cultivo(codigo_formulario,id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,id_usuario) values ('$codigo_formulario',$id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado',$id_usuario)");


            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

    }

}
}


?>
















<?php

//==============================================================================================================

//REGISTRAR los resultados de los exámnes seleccionados
        if(isset($_POST['agregar_examenes_hematologia']))
        {
            echo "";
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_examen'])||empty($_POST['id_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


     echo $codigo_formulario=$_POST['codigo_formulario'];
     $id_area = $_POST['id_area'];
     $id_paciente = $_POST['id_paciente'];
     $id_examen_creado = $_POST['id_examen_creado'];
     $id_examen = $_POST['id_examen'];
       $resultado = $_POST['resultado'];
     $descripcion = $_POST['descripcion'];



date_default_timezone_set('America/Guatemala');
     $fecha_agregado=date('Y/m/d');
     $hora_agregado=date('H:i:s');


    
        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

$query = mysqli_query($conexion, "SELECT * FROM detalle_examenes where id_examen= $id_examen and id_examen_creado=$id_examen_creado");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes(id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,id_usuario) values ($id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado',$id_usuario)");

  $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes_hematologia(codigo_formulario,id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,fecha_agregado,hora_agregado,wbc,lym,lym_2,mid,mid_2,gra,gra_2,hgb,mch,mchc,rbc,mcv,hct,rdwa,rdw,plt,mpv,pdwa,pdw,ptc,p_lcr,p_lcc,observaciones,id_usuario) values ('$codigo_formulario',$id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion','$fecha_agregado','$hora_agregado','$wbc','$lym','$lym_2','$mid','$mid_2','$gra','$gra_2','$hgb','$mch','$mchc','$rbc','$mcv','$hct','$rdwa','$rdw','$plt','$mpv','$pdwa','$pdw','$ptc','$p_lcr','$p_lcc','$observaciones',$id_usuario)");




            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");

    }

}
}


?>





<?php

//==============================================================================================================

//REGISTRAR los resultados de los exámnes seleccionados
        if(isset($_POST['agregar_examenes_formulario_cotizacion']))
        {

            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['id_examen'])||empty($_POST['id_examen'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


     echo $codigo_formulario=$_POST['codigo_formulario'];
     $id_area = $_POST['id_area'];
     $id_paciente = $_POST['id_paciente'];
     $id_examen_creado = $_POST['id_examen_creado'];
     $id_examen = $_POST['id_examen'];
       $resultado = $_POST['resultado'];
     $descripcion = $_POST['descripcion'];

          $precio_examen = $_POST['precio_examen'];


date_default_timezone_set('America/Guatemala');
     $fecha_agregado=date('Y/m/d');
     $hora_agregado=date('H:i:s');


    
        session_start(); //INICIAMOS LA SESSIÓN

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

$query = mysqli_query($conexion, "SELECT * FROM detalle_examenes where id_examen= $id_examen and id_examen_creado=$id_examen_creado");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El examen ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO detalle_examenes(id_area,id_paciente,id_examen_creado,id_examen,resultado,descripcion,precio_examen,fecha_agregado,hora_agregado,id_usuario) values ($id_area,$id_paciente,$id_examen_creado,$id_examen,'$resultado','$descripcion',$precio_examen,'$fecha_agregado','$hora_agregado',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        }

  header("Location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario");

    }

}
}


?>








<?php

//==============================================================================================================

//REGISTRAR al cliente
        if(isset($_POST['guardar_cliente_venta']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre_cliente']) || empty($_POST['nit_cliente'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

         $id_venta = $_POST['id_venta'];   // no perdemos el id de la venta si registrarmos cliente desde la venta 
        $nit_cliente = $_POST['nit_cliente'];
        $nombre_cliente = $_POST['nombre_cliente'];
      
        $telefono_cliente = $_POST['telefono_cliente'];
        $correo_cliente = $_POST['correo_cliente'];
        $direccion_cliente = $_POST['direccion_cliente'];


        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


    

        $query = mysqli_query($conexion, "SELECT * FROM clientes where nit_cliente = '$nit_cliente'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El usuario ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO clientes(nombre_cliente,nit_cliente,telefono_cliente,correo_cliente,direccion_cliente,id_usuario) values ('$nombre_cliente','$nit_cliente','$telefono_cliente','$correo_cliente','$direccion_cliente', $id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado.
                        </div>';

 header("Location: agregar_productos_venta.php?id_venta=$id_venta");
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
 header("Location: agregar_productos_venta.php?id_venta=$id_venta");
            }
        }
 header("Location: agregar_productos_venta.php?id_venta=$id_venta");

    }

}
}


?>



<?php 
//==============================================================================================================
//crear venta
        if(isset($_POST['crear_venta']))
              
        {
            session_start(); //INICIAMOS LA SESSIÓN

            $codigo_venta=0;
           
          


            $id_usuario=$_SESSION['id_usuario'];
   
        $query_insert = mysqli_query($conexion, "INSERT INTO ventas_creadas(codigo_venta,id_usuario) values ($codigo_venta,$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           venta registrado!
                        </div>';

  header("Location: agregar_productos_venta.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
    
        //header("Location: registro_de_clientes.php");

        }




?>


<?php 
//==============================================================================================================
//REGISTRAR los detalles de la venta
        if(isset($_POST['agregar_detalles_venta']))
              
        {

           $id_producto=$_POST['id_producto'];
          session_start(); //INICIAMOS LA SESSIÓN


         $id_venta=$_POST['id_venta'];
           if(($_POST['id_producto']=='')) //si no existe el ID del producto es porque no está o no se buscó
          // si se da agregar, que solo recargue
            {
                              header("Location: agregar_productos_venta.php?id_venta=$id_venta");



            }
           
          $id_local=$_POST['id_local'];
          $codigo_producto2=$_POST['codigo_producto2'];
          $cantidad_producto=$_POST['cantidad_producto'];
         $subtotal_venta=$_POST['subtotal_venta'];
          $id_producto=$_POST['id_producto'];
          $nombre_producto=$_POST['nombre_producto'];
          $precio_venta=$_POST['precio_venta'];


          if($cantidad_producto<=0)  // si la cantidad de productos es menor o igual a cero solo recargar
          {
              header("Location: agregar_productos_venta.php?id_venta=$id_venta");


          }
          else  //de lo contrario buscar en la tabla detalle_ventas si existe el id del produto con su id de venta creada.
          {
            $query = mysqli_query($conexion,"SELECT * FROM detalle_ventas WHERE id_producto=$id_producto and id_venta=$id_venta");


$result = mysqli_num_rows($query);
                        if ($result > 0) { //buscar el producto en la tabla
while ($data = mysqli_fetch_assoc($query)) {
    $id_producto_encontrado=$data['id_producto'];
    $cantidad_actual=$data['cantidad_producto'];
     $id_venta_encontrado=$data['id_venta'];           
     $subtotal_venta_encontrado=$data['subtotal_venta']; 

}
}


if(isset($id_producto_encontrado) and isset($id_venta_encontrado))  //si existe el producto actualizar 
{
            
            $nueva_cantidad=$cantidad_producto+$cantidad_actual;  //sumar la cantidad actual con la cantidad agregada en post
          
            $nuevo_subtotal=$subtotal_venta+$subtotal_venta_encontrado; //multiplicar y sacar otro subtotal

       
$id_usuario=$_SESSION['id_usuario'];
//el subtotal solo es referencia, cualquier devolución de producto se usa la cantidad*el precio y ese es el verdadero subtotal
$sql_update = mysqli_query($conexion, "UPDATE detalle_ventas SET cantidad_producto=$nueva_cantidad, subtotal_venta=$nuevo_subtotal WHERE id_producto=$id_producto and id_venta=$id_venta");




    $alert = '<p>Usuario Actualizado</p>';
   if($sql_update)
   {
  header("Location: agregar_productos_venta.php?id_venta=$id_venta");
   }    


}else  //de lo contrario no existe en la tabla guardar el producto como nuevo de esta venta creada
{

           
 header("Location: agregar_productos_venta.php?id_venta=$id_venta");

      

  //session_start(); //INICIAMOS LA SESSIÓN

           
   $id_usuario=$_SESSION['id_usuario'];
   //el subtotal solo es referencia, cualquier devolución de producto se usa la cantidad*el precio y ese es el verdadero subtotal
   
   date_default_timezone_set('America/Guatemala');
   $fecha_agregado=date('Y/m/d');
   $hora_agregado=date('H:i:s');

        $query_insert = mysqli_query($conexion, "INSERT INTO detalle_ventas(id_venta,id_local,fecha_agregado,hora_agregado,cantidad_producto,id_producto,codigo_producto,nombre_producto,precio_venta,subtotal_venta,id_usuario) values ($id_venta,$id_local,'$fecha_agregado','$hora_agregado',$cantidad_producto,$id_producto,'$codigo_producto2','$nombre_producto',$precio_venta,$subtotal_venta,$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           Producto registrado!
                        </div>';

  header("Location: agregar_productos_venta.php?id_venta=$id_venta");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
            }
        
    }
    
       

        }
    


?>
<?php

//==============================================================================================================
//REGISTRAR el movimiento de caja
        if(isset($_POST['guardar_movimiento_caja']))
              
        {
            session_start(); //INICIAMOS LA SESSIÓN

            $id_caja=$_POST['id_caja'];
           date_default_timezone_set('America/Guatemala');
          $fecha_movimiento=date("Y/m/d");
          $hora_movimiento=date("H:i:s");

            
            $id_tipo_movimiento=$_POST['id_tipo_movimiento'];
            $monto_movimiento=$_POST['monto_movimiento'];
            $motivo_movimiento=$_POST['motivo_movimiento'];
          
          
            $id_usuario=$_SESSION['id_usuario'];
   
        $query_insert = mysqli_query($conexion, "INSERT INTO movimiento_de_caja(id_caja,fecha_movimiento,hora_movimiento,id_tipo_movimiento,monto_movimiento,motivo_movimiento,id_usuario) values ($id_caja,'$fecha_movimiento','$hora_movimiento',$id_tipo_movimiento,$monto_movimiento,'$motivo_movimiento',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           movimiento registrado!
                        </div>';

  header("Location: movimiento_de_caja.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
    
        //header("Location: registro_de_clientes.php");

        }




?>
<?php

//==============================================================================================================
//REGISTRAR el movimiento de caja pero en la sección tipo de GASTO
        if(isset($_POST['guardar_movimiento_gastos']))
              
        {
            session_start(); //INICIAMOS LA SESSIÓN

            $id_caja=$_POST['id_caja'];
           date_default_timezone_set('America/Guatemala');
          $fecha_movimiento=date("Y/m/d");
          $hora_movimiento=date("H:i:s");

            
            $id_tipo_movimiento=$_POST['id_tipo_movimiento'];
            $monto_movimiento=$_POST['monto_movimiento'];
            $motivo_movimiento=$_POST['motivo_movimiento'];
          
          
            $id_usuario=$_SESSION['id_usuario'];
   
        $query_insert = mysqli_query($conexion, "INSERT INTO movimiento_de_caja(id_caja,fecha_movimiento,hora_movimiento,id_tipo_movimiento,monto_movimiento,motivo_movimiento,id_usuario) values ($id_caja,'$fecha_movimiento','$hora_movimiento',$id_tipo_movimiento,$monto_movimiento,'$motivo_movimiento',$id_usuario)");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                           movimiento registrado!
                        </div>';

  header("Location: gastos_varios.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
    
        //header("Location: registro_de_clientes.php");

        }




?>

<?php
//=============================================  MARCOS      ================================
//GUARDAR EMPLEADOS POR MARKOS SANCHEZ
    if(isset($_POST['guardar_personal'])){
        session_start();

        $nombre_personal= $_POST['nombre_personal'];
        $direccion_personal= $_POST['direccion_personal'];
        $dpi_personal= $_POST['dpi_personal'];
        $telefono_personal= $_POST['telefono_personal'];
        $puesto_personal= $_POST['puesto_personal'];
         $pago_diario= $_POST['pago_diario'];
        $correo_personal= $_POST['correo_personal'];
        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 
        

        $query = mysqli_query($conexion, "SELECT * FROM mi_personal where dpi_personal= '$dpi_personal'");
            $result = mysqli_fetch_array($query);
            if ($result > 0) {
                 $alert = '<div class="alert alert-primary" role="alert">
                            Empleado ya registrado!!
                            </div>';     
                header("Location:lista_personal.php");          
            }else{
                $query_insert=mysqli_query($conexion,"INSERT INTO mi_personal(nombre_personal,direccion_personal,dpi_personal,telefono_personal,puesto_personal,pago_diario,correo_personal,id_usuario)
                                        VALUES
                                        ('$nombre_personal','$direccion_personal','$dpi_personal','$telefono_personal','$puesto_personal',$pago_diario,'$correo_personal','$id_usuario')");
                if ($query_insert) {    
                    $alert = '<div class="alert alert-primary" role="alert">
                            Empleado registrado!!
                            </div>';
                    header("Location:lista_personal.php");    
                }else{
                    $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                    header("Location: lista_personal.php");
                }       
    }
}
?>





<?php
// =============================================================================================================
//REGISTRAMOS LA ASISTENCIA DEL PERSONAL

    if(isset($_POST['registrar_asistencia'])){
        session_start();

        $id_personal=$_POST['id_personal'];
        $dpi_personal= $_POST['dpi_personal'];
       
         $id_usuario=$_SESSION['id_usuario'];

        date_default_timezone_set('America/Guatemala');
          $fecha_ingreso=date('Y/m/d');
        $hora_ingreso=date('H:i:s');
         $hora_egreso="";




       $codigo_asistencia=$fecha_ingreso.$dpi_personal."1"; // un uno al final para referencia del ingreso y un cero al final para referencia de efreso.
      
        

        $query = mysqli_query($conexion, "SELECT * FROM asistencia_personal where codigo_asistencia= '$codigo_asistencia'");
            $result = mysqli_fetch_array($query);
            if ($result > 0) {
                 $alert = '<div class="alert alert-primary" role="alert">
                            Empleado ya registrado!!
                            </div>';     
                header("Location:registro_ingreso_egreso_personal.php");          
            }else{
                $query_insert=mysqli_query($conexion,"INSERT INTO asistencia_personal(codigo_asistencia,fecha_ingreso,id_personal,hora_ingreso,hora_egreso,id_usuario)
                    VALUES   ('$codigo_asistencia','$fecha_ingreso',$id_personal,'$hora_ingreso','$hora_egreso',$id_usuario)");
                if ($query_insert) {    
                    echo $alert = '<div class="alert alert-primary" role="alert">
                            asistencia registrada!!
                            </div>';
                   header("Location:registro_ingreso_egreso_personal.php");   
                }else{
                    echo $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                     header("Location:registro_ingreso_egreso_personal.php"); 
                }       
    }
}
?>

<?php
// =============================================================================================================
//REGISTRAMOS LAS TAREAS DEL PERSONAL

    if(isset($_POST['registrar_tareas'])){
        session_start();

        $id_personal=$_POST['id_personal'];
       
       
        

        date_default_timezone_set('America/Guatemala');
        $fecha_tarea=date('Y/m/d');       
        $descripcion_tarea=$_POST['descripcion_tarea'];
        $hora_inicio=date('H:i:s');

   


$id_usuario=$_SESSION['id_usuario'];

    
      
                $query_insert=mysqli_query($conexion,"INSERT INTO tareas_asignadas(id_personal,fecha_tarea,descripcion_tarea,hora_inicio,id_usuario)
                    VALUES   ($id_personal,'$fecha_tarea','$descripcion_tarea','$hora_inicio',$id_usuario)");

                if ($query_insert) {    
                    echo $alert = '<div class="alert alert-primary" role="alert">
                            tarea asignada!!
                            </div>';
                   header("Location:tareas_asignadas.php");   
                }else{
                    echo $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                     header("Location:tareas_asignadas.php"); 
                }       
    }

?>


<?php
// =============================================================================================================
//REGISTRAMOS LA ASISTENCIA DEL PERSONAL

    if(isset($_POST['registrar_permisos'])){
        session_start();

        $id_personal=$_POST['id_personal'];
   $motivo_permiso= $_POST['motivo_permiso'];
               $pago_diario_permiso= $_POST['pago_diario_permiso'];
        

       
          $fecha_permiso=$_POST['fecha_permiso'];
           $id_usuario=$_SESSION['id_usuario'];
      


  
                $query_insert=mysqli_query($conexion,"INSERT INTO permisos_personal(id_personal,fecha_permiso,motivo_permiso,pago_diario_permiso,id_usuario)
                    VALUES   ($id_personal,'$fecha_permiso','$motivo_permiso',$pago_diario_permiso,$id_usuario)");
                if ($query_insert) {    
                    echo $alert = '<div class="alert alert-primary" role="alert">
                            permiso registrada!!
                            </div>';
                   header("Location:permisos_personal.php");   
                }else{
                    echo $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                   //header("Location:permisos_personal.php");   
                }       
    }

?>


<?php
// =============================================================================================================
//REGISTRAMOS LA ASISTENCIA DEL PERSONAL

    if(isset($_POST['registrar_faltas'])){
        session_start();

        $id_personal=$_POST['id_personal'];

        
          $fecha_falta=$_POST['fecha_falta'];
           $id_usuario=$_SESSION['id_usuario'];
      


  
                $query_insert=mysqli_query($conexion,"INSERT INTO faltas_personal(id_personal,fecha_falta,id_usuario)
                    VALUES   ($id_personal,'$fecha_falta',$id_usuario)");
                if ($query_insert) {    
                    echo $alert = '<div class="alert alert-primary" role="alert">
                            falta registrada!!
                            </div>';
                   header("Location:faltas_personal.php");   
                }else{
                    echo $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                   //header("Location:permisos_personal.php");   
                }       
    }

?>


<?php
// =============================================================================================================
//REGISTRAMOS el motorista para el envío express

    if(isset($_POST['registrar_motorista'])){
        session_start();

        $placa_motorista=$_POST['placa_motorista'];

        
          $nombre_motorista=$_POST['nombre_motorista'];
          $telefono_motorista=$_POST['telefono_motorista'];

           $id_usuario=$_SESSION['id_usuario'];
      


  
                $query_insert=mysqli_query($conexion,"INSERT INTO motorista(placa_motorista,nombre_motorista,telefono_motorista,id_usuario)
                    VALUES   ('$placa_motorista','$nombre_motorista','$telefono_motorista',$id_usuario)");
                if ($query_insert) {    
                    echo $alert = '<div class="alert alert-primary" role="alert">
                           motorista registrada!!
                            </div>';
                   header("Location:registro_motorista.php");   
                }else{
                    echo $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                   header("Location:registro_motorista.php");  //COMENTAR SI APARECE UN BUG--
                }       
    }

?>

<?php
// =============================================================================================================
//REGISTRAMOS el motorista para el envío express

    if(isset($_POST['registrar_express'])){
        session_start();

        $id_venta=$_POST['id_venta'];
        
        date_default_timezone_set('America/Guatemala');
          $fecha_pedido=date('Y/m/d');
          $hora_pedido=date('H:i:s');

          $id_motorista=$_POST['id_motorista'];
          $direccion_entrega=$_POST['direccion_entrega'];
          $persona_receptor=$_POST['persona_receptor'];
          $telefono_receptor=$_POST['telefono_receptor'];


           $id_usuario=$_SESSION['id_usuario'];
      


  
                $query_insert=mysqli_query($conexion,"INSERT INTO pedido_express(id_venta,fecha_pedido,hora_pedido,id_motorista,direccion_entrega,persona_receptor,telefono_receptor, id_usuario)
                    VALUES   ($id_venta,'$fecha_pedido','$hora_pedido',$id_motorista,'$direccion_entrega','$persona_receptor','$telefono_receptor', $id_usuario)");
                if ($query_insert) {    
                    echo $alert = '<div class="alert alert-primary" role="alert">
                          registrada con éxito!!
                            </div>';
                   header("Location:registro_express.php");   
                }else{
                    echo $alert = '<div class="alert alert-danger" role="alert">
                                Error al registrar.
                            </div>';
                   header("Location:registro_express.php");   
                }       
    }

?>

<?php

//REGISTRAMOS LA FOROGRAFÍA DEL PERSONAL
if(isset($_POST['guardar_foto_personal'])){
    $imagen = $_FILES['imagen']['name'];


    $id_personal=$_POST['id_personal'];

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp';
          $_SESSION['tipo'] = 'danger';
          header("location:agregar_foto_personal.php?id_personal=$id_personal");
       }else{
         $query = "INSERT INTO imagenes_personal(nombre_imagen_personal,id_personal) values('$imagen',$id_personal)";
         $resultado = mysqli_query($conexion,$query);
         if($resultado){
              move_uploaded_file($temp,'imagenes/'.$imagen);   
      
           header("location:agregar_foto_personal.php?id_personal=$id_personal");
         }else{

       
         }
       }

    }
                           header("location:agregar_foto_personal.php?id_personal=$id_personal");

}


?>

<?php

//REGISTRAMOS LA FOROGRAFÍA DEL PERSONAL
if(isset($_POST['guardar_foto_producto'])){
    $imagen = $_FILES['imagen']['name'];


    $id_producto=$_POST['id_producto'];

    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp';
          $_SESSION['tipo'] = 'danger';
          header("location:agregar_foto_producto.php?id_producto=$id_producto");
       }else{
         $query = "INSERT INTO imagenes_productos(nombre_imagen_producto,id_producto) values('$imagen',$id_producto)";
         $resultado = mysqli_query($conexion,$query);
         if($resultado){
              move_uploaded_file($temp,'imagenes_productos/'.$imagen);   
      
           header("location:agregar_foto_producto.php?id_producto=$id_producto");
         }else{

       
         }
       }

    }
                           header("location:agregar_foto_producto.php?id_producto=$id_producto");

}


?>


<?php

//REGISTRAMOS LA FOROGRAFÍA DEL PERSONAL
if(isset($_POST['guardar_documento'])){
    $imagen = $_FILES['imagen']['name'];



    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'pdf') || strpos($tipo,'docx') || strpos($tipo,'jpg')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, pdf,docx';
          $_SESSION['tipo'] = 'danger';
          header("location:mis_documentos.php");
       }else{
         $query = "INSERT INTO documentos(nombre_documento) values('$imagen')";
         $resultado = mysqli_query($conexion,$query);
         if($resultado){
              move_uploaded_file($temp,'documentos/'.$imagen);   
      
          header("location:mis_documentos.php");
         }else{

       
         }
       }

    }
          header("location:mis_documentos.php");

}


?>