
<?php include "../conexion.php"; //ubiación de la conexión?>
<?php session_start();  ?>

<?php

//==============================================================================================================

// Editamos los datos de la empresa si presionamos el botón guardar empresa .

 if(isset($_POST['editar_empresa']))
        {
//GUARDAR DATOS DE LA EMPRESA
$alert = '';
$nit= $_POST['nit'];
$nombre = $_POST['nombre'];
$razon = $_POST['razon'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$iva = $_POST['iva'];

$actualizar_empresa = mysqli_query($conexion, "UPDATE empresa SET nit = $nit, nombre = '$nombre', razon = '$razon', telefono = '$telefono', correo = '$correo', direccion = '$direccion', iva = $iva WHERE id_empresa=1");
mysqli_close($conexion);
if ($actualizar_empresa) {
  $alert = '<p class="msg_save">Configuración de empresa Actualizado</p>';
  header("Location: empresa.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar la Configuración de empresa</p>';
    header("Location:empresa.php");
}

}
?>

<?php

//==============================================================================================================

//EDITAR USUARIO 


//EDITAR USUARIO SI PRESIONAMOS EL BOTÓN EDITAR USAURIO

if(isset($_POST['editar_usuario']))
{
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['id_rol'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $usuario=$_POST['usuario'];
    $id_rol=$_POST['id_rol'];

    $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre',  usuario = '$usuario', id_rol = $id_rol WHERE id_usuario = $id_usuario");
    $alert = '<p>Usuario Actualizado</p>';
   if($sql_update)
   {
        header("Location: registro_usuario.php"); 
   }
    
  }
}
}

?>

<?php  

//==============================================================================================================
//CAMBIAR LA CLAVE DEL USUARIO

if(isset($_POST['cambiar_clave_usuario']))
{

    $id_usuario = $_POST['id_usuario'];
   
    $clave = md5($_POST['clave']); // CLAVE EN MODO MD5

    $sql_update = mysqli_query($conexion, "UPDATE usuario SET clave = '$clave' WHERE id_usuario = $id_usuario");
    $alert = '<p>Clave Cambiado</p>';
  
   if($sql_update)
   {
        header("Location: registro_usuario.php"); 
   }
      
  

}
?>

<?php

//==============================================================================================================

// Obtenemos el id del color para actualizar

 if(isset($_POST['editar_color']))
        {

$id_color= $_GET['id_color'];
$nombre_color= $_POST['nombre_color'];


$actualizar = mysqli_query($conexion, "UPDATE color SET nombre_color ='$nombre_color' WHERE id_color=$id_color");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_nomenclaturas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>


<?php

//==============================================================================================================

// Obtenemos el id de la marca para actualizar

 if(isset($_POST['editar_marca']))
        {

$id_marca= $_GET['id_marca'];
$nombre_marca= $_POST['nombre_marca'];


$actualizar = mysqli_query($conexion, "UPDATE marca SET nombre_marca ='$nombre_marca' WHERE id_marca=$id_marca");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_nomenclaturas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>

<?php

//==============================================================================================================

// Obtenemos el id del amodelo para actualizar

 if(isset($_POST['editar_modelo']))
        {
//GUARDAR DATOS DE LA EMPRESA
$id_modelo= $_GET['id_modelo'];
$nombre_modelo= $_POST['nombre_modelo'];


$actualizar = mysqli_query($conexion, "UPDATE modelo SET nombre_modelo ='$nombre_modelo' WHERE id_modelo=$id_modelo");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_nomenclaturas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>

<?php
//=============================================================================================
// Obtenemos el id deL TIPO para actualizar

 if(isset($_POST['editar_tipo']))
        {

$id_tipo= $_POST['id_tipo'];
$nombre_tipo= $_POST['nombre_tipo'];


$actualizar = mysqli_query($conexion, "UPDATE tipo SET nombre_tipo ='$nombre_tipo' WHERE id_tipo=$id_tipo");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_nomenclaturas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}

//=============================================================================================
?>



<?php

//==============================================================================================================

// Obtenemos el id de la CATEGORIA para actualizar

 if(isset($_POST['editar_categoria']))
        {

$id_tipo= $_POST['id_tipo'];
$id_categoria= $_GET['id_categoria'];
$nombre_categoria= $_POST['nombre_categoria'];


$actualizar = mysqli_query($conexion, "UPDATE categoria SET nombre_categoria ='$nombre_categoria', id_tipo=$id_tipo WHERE id_categoria=$id_categoria");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_nomenclaturas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>

<?php



//==============================================================================================================

// Obtenemos el id de la MEDIDA para actualizar

 if(isset($_POST['editar_medida']))
        {

echo $id_categoria= $_POST['id_categoria'];
echo $id_talla=$_GET['id_talla'];
echo $nombre_talla= $_POST['nombre_talla'];


$actualizar = mysqli_query($conexion, "UPDATE medida SET nombre_talla ='$nombre_talla', id_categoria=$id_categoria WHERE id_talla=$id_talla");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_nomenclaturas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}


//==============================================================================================================

// Obtenemos el id DEL PRODUCTO para actualizar

 if(isset($_POST['editar_producto']))
        {
        $id_local=$_POST['id_local'];
        $id_producto=$_POST['id_producto'];
     
        $nombre_producto=$_POST['nombre_producto'];
     
        $stock_minimo= $_POST['stock_minimo'];
        
        $precio_compra=$_POST['precio_compra'];

        $precio_venta=$_POST['precio_venta'];
        $id_color= $_POST['id_color'];
        $id_marca= $_POST['id_marca'];
        $id_modelo= $_POST['id_modelo'];
        $id_tipo= $_POST['id_tipo'];
        $id_categoria= $_POST['id_categoria'];

        $id_talla= $_POST['id_talla'];
         $id_usuario=$_SESSION['id_usuario'];  // ID USARIO


$actualizar = mysqli_query($conexion, "UPDATE productos SET nombre_producto ='$nombre_producto', stock_minimo=$stock_minimo,precio_compra=$precio_compra,precio_venta=$precio_venta,id_color=$id_color, id_marca=$id_marca, id_modelo=$id_modelo,id_tipo=$id_tipo,id_categoria=$id_categoria, id_talla=$id_talla WHERE id_producto=$id_producto and id_local=$id_local");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_productos.php?id_local=$id_local");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>



<?php
//==============================================================================================================

// Obtenemos el id del local para actualizar

 if(isset($_POST['editar_local']))
        {

        $id_local=$_POST['id_local'];
         $codigo_local= $_POST['codigo_local'];
        $nombre_local= $_POST['nombre_local'];
     
        $encargado_local= $_POST['encargado_local'];
        
        $telefono_local= $_POST['telefono_local'];
        $correo_local= $_POST['correo_local'];
        $direccion_encargado= $_POST['direccion_encargado'];
        
      
        date_default_timezone_set('America/Guatemala');
     $fecha_registro_local=date('Y-m-d');  //FECHA DE REGISTRO DEL PRODUCTO
      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar = mysqli_query($conexion, "UPDATE local SET nombre_local ='$nombre_local', encargado_local='$encargado_local',telefono_local='$telefono_local',correo_local='$correo_local',direccion_encargado='$direccion_encargado',id_usuario='$id_usuario' WHERE id_local=$id_local");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_locales.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>

<?php
// Obtenemos el id del local para actualizar EL ESTADO HABILITADO/DESHABILITADO

 if(isset($_POST['estado_local_habilitar']))
        {

        $id_local=$_GET['id_local'];
      
            
         $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar = mysqli_query($conexion, "UPDATE local SET estado_local =0,id_usuario=$id_usuario WHERE id_local=$id_local");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_locales.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>

<?php
//OBTENEMOS EL ID PARA DESHABILITAR EL ESTADO DEL LOCAL
 if(isset($_POST['estado_local_deshabilitar']))
        {

        $id_local=$_GET['id_local'];
      
            
         $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar = mysqli_query($conexion, "UPDATE local SET estado_local =1,id_usuario=$id_usuario WHERE id_local=$id_local");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: registro_de_locales.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>


<?php

// Obtenemos el id de la MEDIDA para actualizar

 if(isset($_POST['editar_producto_stock']))
        {
        $id_producto=$_POST['id_producto'];
        $id_local=$_POST['id_local'];
        $id_producto=$_POST['id_producto'];
        $llave_producto=$_POST['llave_producto'];
       $stock_local=$_POST['stock_local'];
      $stock_almacen=$_POST['stock_almacen'];
        $stock_local_entrante=$_POST['stock_local_entrante']+$stock_local;
        $stock_almacen_entrante=$_POST['stock_almacen_entrante']+$stock_almacen;

         date_default_timezone_set('America/Guatemala');
        $ultima_actualizacion=date('Y/m/d');
    $hora_actualizacion=date('H:i:s');
     
        
        
         $id_usuario=$_SESSION['id_usuario'];  // ID USARIO


$actualizar = mysqli_query($conexion, "UPDATE productos SET stock_local =$stock_local_entrante, stock_almacen=$stock_almacen_entrante, ultima_actualizacion='$ultima_actualizacion',hora_actualizacion='$hora_actualizacion' WHERE llave_producto=$llave_producto");
mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
header("Location: ingreso_producto_stock.php?id_producto=$id_producto");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    //header("Location: registro_de_nomenclaturas.php");
}

}
?>

<?php

//==============================================================================================================

// Editamos los datos del PACIENTE

 if(isset($_POST['editar_paciente']))
        {

$alert = '';
echo $id_paciente= $_POST['id_paciente'];
$nombre_paciente = $_POST['nombre_paciente'];
$dpi_paciente= $_POST['dpi_paciente'];
$id_genero= $_POST['id_genero'];
$telefono_paciente = $_POST['telefono_paciente'];
$correo_paciente= $_POST['correo_paciente'];
$direccion_paciente= $_POST['direccion_paciente'];
$fecha_nacimiento_paciente=$_POST['fecha_nacimiento_paciente'];
$edad_paciente= $_POST['edad_paciente'];

        session_start(); //INICIAMOS LA SESSIÓN

        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar_paciente= mysqli_query($conexion, "UPDATE pacientes SET  nombre_paciente = '$nombre_paciente',dpi_paciente = '$dpi_paciente', id_genero=$id_genero, telefono_paciente = '$telefono_paciente', correo_paciente = '$correo_paciente',direccion_paciente = '$direccion_paciente',fecha_nacimiento_paciente='$fecha_nacimiento_paciente',edad_paciente='$edad_paciente',id_usuario=$id_usuario  WHERE id_paciente=$id_paciente");
mysqli_close($conexion);
if ($actualizar_paciente) {
  $alert = '<p class="msg_save"> Actualizado</p>';
  header("Location: registro_de_pacientes.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: registro_de_pacientes.php");
}

}
?>



<?php

//==============================================================================================================

// Editamos los datos del MÉDICO

 if(isset($_POST['editar_medico']))
        {

$alert = '';
echo $id_medico= $_POST['id_medico'];
$nombre_medico = $_POST['nombre_medico'];
$telefono_medico = $_POST['telefono_medico'];
$institucion_referido= $_POST['institucion_referido'];

if(isset($_POST['codigo_formulario'])? $codigo_formulario=$_POST['codigo_formulario']:'');


        session_start(); //INICIAMOS LA SESSIÓN

        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar_medico= mysqli_query($conexion, "UPDATE medicos SET  nombre_medico = '$nombre_medico',telefono_medico = '$telefono_medico',institucion_referido= '$institucion_referido', id_usuario=$id_usuario  WHERE id_medico=$id_medico");
mysqli_close($conexion);
if ($actualizar_medico) {
  $alert = '<p class="msg_save"> Actualizado</p>';


if(isset($codigo_formulario))
{
  header("Location: medicos_referidos_asignado.php?codigo_formulario=$codigo_formulario");

}
else
{
  header("Location: medicos_referidos.php");
}
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


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
?>




<?php

//==============================================================================================================

// Editamos los datos del MÉDICO

 if(isset($_POST['asignar_medico']))
        {

$alert = '';
 $codigo_formulario= $_POST['codigo_formulario'];
$id_medico = $_POST['id_medico'];

 

$actualizar_medico= mysqli_query($conexion, "UPDATE examenes_creados SET  id_medico_referido = $id_medico  WHERE codigo_formulario='$codigo_formulario'");
mysqli_close($conexion);
if ($actualizar_medico) {
  $alert = '<p class="msg_save"> Actualizado</p>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");
}
}


?>


<?php

//==============================================================================================================

// Editamos los datos del área

 if(isset($_POST['editar_area']))
        {

$alert = '';
echo $id_area= $_POST['id_area'];
$codigo_area= $_POST['codigo_area'];
$nombre_area = $_POST['nombre_area'];




        session_start(); //INICIAMOS LA SESSIÓN

        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar_area= mysqli_query($conexion, "UPDATE areas SET  codigo_area='$codigo_area',nombre_area = '$nombre_area',id_usuario=$id_usuario  WHERE id_area=$id_area");
mysqli_close($conexion);
if ($actualizar_area) {
  $alert = '<p cmedicolass="msg_save"> Actualizado</p>';
  header("Location: lista_de_areas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: lista_de_areas.php");
}

}
?>

<?php

//==============================================================================================================

// Editamos los datos del antibiótico

 if(isset($_POST['editar_antibiotico']))
        {

$alert = '';
echo $id_antibiotico= $_POST['id_antibiotico'];
$codigo_antibiotico= $_POST['codigo_antibiotico'];
$nombre_antibiotico = $_POST['nombre_antibiotico'];




        session_start(); //INICIAMOS LA SESSIÓN

        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar_area= mysqli_query($conexion, "UPDATE antibioticos SET  codigo_antibiotico='$codigo_antibiotico',nombre_antibiotico = '$nombre_antibiotico',id_usuario=$id_usuario  WHERE id_antibiotico=$id_antibiotico");
mysqli_close($conexion);
if ($actualizar_antibiotico) {
  $alert = '<p cmedicolass="msg_save"> Actualizado</p>';
  header("Location: antibioticos.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: antibioticos.php");
}

}
?>


<?php

//==============================================================================================================

// Editamos los datos del Examen

 if(isset($_POST['editar_examen']))
        {

$alert = '';
$id_area= $_POST['id_area'];
$id_examen= $_POST['id_examen'];
$codigo_examen= $_POST['codigo_examen'];
$nombre_examen = $_POST['nombre_examen'];
$id_genero_referencia = $_POST['id_genero_referencia'];

$valor_referencia = $_POST['valor_referencia'];
$valor_referencia2 = $_POST['valor_referencia2'];

$nombre_nomenclatura= $_POST['nombre_nomenclatura'];
$subarea= $_POST['subarea'];
$precio_examen= $_POST['precio_examen'];






        session_start(); //INICIAMOS LA SESSIÓN

        $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar_examen= mysqli_query($conexion, "UPDATE examenes SET  nombre_examen = '$nombre_examen',codigo_examen=$codigo_examen,id_genero_referencia=$id_genero_referencia,valor_referencia='$valor_referencia',valor_referencia2='$valor_referencia2', nombre_nomenclatura='$nombre_nomenclatura',subarea='$subarea',precio_examen=$precio_examen,id_usuario=$id_usuario  WHERE id_examen=$id_examen");
mysqli_close($conexion);
if ($actualizar_examen) {
  $alert = '<p class="msg_save"> Actualizado</p>';
  header("Location: examenes.php?id_area=$id_area");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: examenes.php?id_area=$id_area");
}

}
?>



<?php




//==============================================================================================================

//DESACTIVAR EL TÉCNICO ACTUAL PARA TERMINAR LA ASISTENCIA DE FORMA MANUAL
        if(isset($_POST['desactivar_tecnico_asignado']))
        {
            

      $id_tecnico_asignado = $_POST['id_tecnico_asignado'];
      date_default_timezone_set('America/Guatemala');
      echo $hora_desasignado=date('H:i:s');


    
$actualizar_estado= mysqli_query($conexion, "UPDATE asignar_tecnico SET  estado_tecnico=0,hora_desasignado='$hora_desasignado'  WHERE id_tecnico_asignado=$id_tecnico_asignado");


           
            if ($actualizar_estado) {
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

// FINALIZAR AGREGADO CAMBIANDO EL ESTADO del exámen creado y examenes agreados

 if(isset($_POST['cargar_resultado'])) //FINALIZAR AGREGADO DE EXÁMENES
        {
 $codigo_formulario=$_POST['codigo_formulario'];
 $id_examen=$_POST['id_examen'];

   $resultado = $_POST['resultado'];
   $descripcion = $_POST['descripcion'];
   $id_detalle_examen = $_POST['id_detalle_examen'];


$id_usuario=$_SESSION['id_usuario'];
date_default_timezone_set('America/Guatemala');
$hora_modificacion=date('H:i:s');
$fecha_modificacion=date('Y/m/d');

$actualizar_cargado= mysqli_query($conexion, "UPDATE detalle_examenes SET estado_examen_cargado=0, resultado='$resultado', descripcion='$descripcion', id_usuario=$id_usuario, fecha_modificacion='$fecha_modificacion',hora_modificacion='$hora_modificacion'  WHERE id_detalle_examen=$id_detalle_examen");


$actualizar_agregado_2= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=0,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion',id_usuario=$id_usuario WHERE codigo_formulario='$codigo_formulario'");


$actualizar_agregado_3= mysqli_query($conexion, "UPDATE detalles_heces SET  estado_examen_cargado=0 WHERE codigo_formulario='$codigo_formulario'");


$actualizar_hem= mysqli_query($conexion, "UPDATE detalle_examenes_hematologia SET  estado_examen_cargado=0 WHERE  codigo_formulario='$codigo_formulario'");

$actualizar_orina=mysqli_query($conexion, "UPDATE detalles_orina SET  estado_examen_cargado=0 WHERE  codigo_formulario='$codigo_formulario'");

$actualizar_cultivo=mysqli_query($conexion, "UPDATE examen_cultivo SET  estado_examen_cargado=0 WHERE  codigo_formulario='$codigo_formulario'");

if ($actualizar_cargado) {

  header("Location: cargar_resultados.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: cargar_resultados.php?codigo_formulario=$codigo_formulario");
}
}


?>






<?php

//==============================================================================================================

// FINALIZAR AGREGADO CAMBIANDO EL ESTADO del exámen creado y examenes agreados

 if(isset($_POST['cargar_resultado_modificado'])) //FINALIZAR AGREGADO DE EXÁMENES
        {
 $codigo_formulario=$_POST['codigo_formulario'];
 $id_examen=$_POST['id_examen'];

   $resultado = $_POST['resultado'];
   $descripcion = $_POST['descripcion'];
   $id_detalle_examen = $_POST['id_detalle_examen'];


$id_usuario=$_SESSION['id_usuario'];
date_default_timezone_set('America/Guatemala');
$hora_modificacion=date('H:i:s');
$fecha_modificacion=date('Y/m/d');

$actualizar_cargado= mysqli_query($conexion, "UPDATE detalle_examenes SET  resultado='$resultado', descripcion='$descripcion', id_usuario=$id_usuario, fecha_modificacion='$fecha_modificacion',hora_modificacion='$hora_modificacion'  WHERE id_detalle_examen=$id_detalle_examen");

if ($actualizar_cargado) {
  $alert = '<p class="msg_save"> Actualizado</p>';

  header("Location: cargar_resultados_reportes.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: cargar_resultados_reportes.php?codigo_formulario=$codigo_formulario");
}
}


?>



<?php
//==============================================================================================================

// cargamos los resultados del formulario de orina completa

 if(isset($_POST['cargar_orina_completa']))
        {

       $codigo_formulario=$_POST['codigo_formulario'];

       $id_examen_creado=$_POST['id_examen_creado'];



        $color=$_POST['color'];
         $aspecto=$_POST['aspecto'];
           $sangre=$_POST['sangre'];
            $bilirrubina=$_POST['bilirrubina'];
            $urobilinogeno=$_POST['urobilinogeno'];
            $cetonas=$_POST['cetonas'];
            $glucosa=$_POST['glucosa'];
            $proteinas=$_POST['proteinas'];
            $nitritos=$_POST['nitritos'];
            $leucocitos=$_POST['leucocitos'];
            $ph=$_POST['ph'];
            $densidad=$_POST['densidad'];
            $celulas_epiteliales=$_POST['celulas_epiteliales'];
            $leucocitos_2=$_POST['leucocitos_2'];
                $eritrocitos=$_POST['eritrocitos'];
                                $moco=$_POST['moco'];
                $cristales=$_POST['cristales'];
                 $cilindros=$_POST['cilindros'];
                  $bacterias=$_POST['bacterias'];
                   $levaduras=$_POST['levaduras'];
                    $parasitos=$_POST['parasitos'];
                        $observaciones=$_POST['observaciones'];






      
        date_default_timezone_set('America/Guatemala');
     $fecha_cargado=date('Y-m-d');  //FECHA cargado el resultado
          $hora_cargado=date('H:i:s');  //horacargado el resultado

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 


$actualizar = mysqli_query($conexion, "UPDATE detalles_orina SET fecha_cargado='$fecha_cargado',hora_cargado='$hora_cargado',color='$color', aspecto='$aspecto',sangre='$sangre', bilirrubina='$bilirrubina',urobilinogeno='$urobilinogeno',cetonas='$cetonas',glucosa='$glucosa',proteinas='$proteinas',nitritos='$nitritos',leucocitos='$leucocitos',ph='$ph',densidad='$densidad',celulas_epiteliales='$celulas_epiteliales', leucocitos_2='$leucocitos_2',eritrocitos='$eritrocitos', moco='$moco',cristales='$cristales', cilindros='$cilindros', bacterias='$bacterias',levaduras='$levaduras',parasitos='$parasitos',observaciones='$observaciones',id_usuario=$id_usuario  WHERE id_examen_creado=$id_examen_creado");




$id_usuario=$_SESSION['id_usuario'];

$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');

echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=0,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  fecha_modificacion='$fecha_modificacion', hora_modificacion='$hora_modificacion', id_usuario=$id_usuario,estado_examen_cargado=0 WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalles_orina SET  estado_examen_cargado=0 WHERE id_examen_creado=$id_examen_creado");


mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");
}

}
?>



<?php

//==============================================================================================================

//REGISTRAR LOS DETALLES DEL EXAMEN DE CULTIVO GENERAL, Y EL SIGUIENTE BOTÓN ES PARA AGREGAR LOS ANTIBIÓTICOS
        if(isset($_POST['guardar_campos_cultivos']))
        {



     echo $codigo_formulario=$_POST['codigo_formulario'];

     $id_examen_creado = $_POST['id_examen_creado'];
   
    $id_antibiotico=$_POST['id_antibiotico'];
echo $muestra=$_POST['muestra'];
echo $microorganismo=$_POST['microorganismo'];

$resistente="";
$intermedio="";
$sensible="";
 
 $llave_cultivo=$codigo_formulario.$id_antibiotico; 
       

$query_insert = mysqli_query($conexion, "INSERT INTO detalles_cultivo(muestra,microorganismo,codigo_formulario,id_examen_creado,id_antibiotico,llave_cultivo,resistente,intermedio,sensible) values ('$muestra','$microorganismo','$codigo_formulario',$id_examen_creado,$id_antibiotico,'$llave_cultivo','$resistente','$intermedio','$sensible')");




            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Agregado con éxito.
                        </div>';

  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                     // header("Location: registro_de_clientes.php");
            }
        

  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");

    

}


?>

<?php  

//==============================================================================================================
//CARGAMOS LOS RESULTADOS EN LOS CAMPOS QUE CORRESPONDE POR MEDIO DEL ID

if(isset($_POST['cargar_resultados_cultivos']))
{

$codigo_formulario=$_POST['codigo_formulario'];
$id_examen_creado=$_POST['id_examen_creado'];
$muestra=$_POST['muestra'];
$microorganismo=$_POST['microorganismo'];
$observaciones=$_POST['observaciones'];
$contar=0;

$query = mysqli_query($conexion, "SELECT * FROM detalles_cultivo WHERE codigo_formulario='$codigo_formulario'");
                                               
while ($data = mysqli_fetch_assoc($query)) { 

$contar=$contar+1;
//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $id_examen_cultivo=$data['id_examen_cultivo'];

        $resistente=$_POST['resistente'.$contar];
        $intermedio=$_POST['intermedio'.$contar];
         $sensible=$_POST['sensible'.$contar];


$actualizar_cargado= mysqli_query($conexion, "UPDATE detalle_examenes SET estado_examen_cargado=1   WHERE id_examen_creado=$id_examen_creado");

$id_usuario=$_SESSION['id_usuario'];

date_default_timezone_set('America/Guatemala');
$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');

echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=0,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");



    $sql_update = mysqli_query($conexion, "UPDATE detalles_cultivo SET muestra='$muestra',microorganismo='$microorganismo',resistente = '$resistente', intermedio='$intermedio', sensible='$sensible',observaciones='$observaciones' WHERE id_examen_cultivo = $id_examen_cultivo");
  
   $sql_update2 = mysqli_query($conexion, "UPDATE examen_cultivo SET estado_examen_cargado=0 WHERE id_examen_creado = $id_examen_creado");
     }

       if($sql_update)
   {
        header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario"); 
   }
}
 
 
      
  


?>






<?php
//==============================================================================================================

// cargamos los resultados del formulario de orina completa

 if(isset($_POST['cargar_resultados_heces']))
        {

      

     
  $codigo_formulario=$_POST['codigo_formulario'];

  $id_examen_creado=$_POST['id_examen_creado'];

$color=$_POST['color'];
$consistencia=$_POST['consistencia'];
$ph=$_POST['ph'];
$sangre=$_POST['sangre'];
$moco=$_POST['moco'];
$restos_alimenticios=$_POST['restos_alimenticios'];
$celulas_vegetales=$_POST['celulas_vegetales'];
$almidones=$_POST['almidones'];
$jabones=$_POST['jabones'];
$grasas=$_POST['grasas'];
$levaduras=$_POST['levaduras'];
$leucocitos=$_POST['leucocitos'];
$eritrocitos=$_POST['eritrocitos'];
$parasitos=$_POST['parasitos'];
$observaciones=$_POST['observaciones'];








      
        date_default_timezone_set('America/Guatemala');
     $fecha_cargado=date('Y-m-d');  //FECHA cargado el resultado
          $hora_cargado=date('H:i:s');  //horacargado el resultado

      $id_usuario=$_SESSION['id_usuario'];  // ID USARIO 




$actualizar = mysqli_query($conexion, "UPDATE detalles_heces SET color='$color',consistencia='$consistencia',ph='$ph',sangre='$sangre',moco='$moco',restos_alimenticios='$restos_alimenticios',celulas_vegetales='$celulas_vegetales', almidones='$almidones',jabones='$jabones',grasas='$grasas',levaduras='$levaduras',leucocitos='$leucocitos',eritrocitos='$eritrocitos',parasitos='$parasitos',observaciones='$observaciones'  WHERE id_examen_creado=$id_examen_creado");

$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');



echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=0,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  fecha_modificacion='$fecha_modificacion', hora_modificacion='$hora_modificacion', id_usuario=$id_usuario,estado_examen_cargado=0 WHERE id_examen_creado=$id_examen_creado");

mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");
}

}
?>






<?php

//==============================================================================================================

// CARGAMOS LOS RESULTADOS DE HEMATOLOGÍA

 if(isset($_POST['cargar_resultados_hematologia']))
        {
$id_examen_creado=$_POST['id_examen_creado'];
$id_examen=$_POST['id_examen'];

$codigo_formulario=$_POST['codigo_formulario'];


$id_usuario=$_SESSION['id_usuario'];


$wbc=$_POST['wbc'];
$lym=$_POST['lym'];
$lym_2=$_POST['lym_2'];
$mid=$_POST['mid'];
$mid_2=$_POST['mid_2'];
$gra=$_POST['gra'];
$gra_2=$_POST['gra_2'];
$hgb=$_POST['hgb'];
$mch=$_POST['mch'];
$mchc=$_POST['mchc'];
$rbc=$_POST['rbc'];
$mcv=$_POST['mcv'];
$hct=$_POST['hct'];
$rdwa=$_POST['rdwa'];
$rdw=$_POST['rdw'];
$plt=$_POST['plt'];
$mpv=$_POST['mpv'];
$pdwa=$_POST['pdwa'];
$pdw=$_POST['pdw'];
$ptc=$_POST['ptc'];
$p_lcr=$_POST['p_lcr'];
$p_lcc=$_POST['p_lcc'];
$observaciones=$_POST['observaciones'];

$actualizar = mysqli_query($conexion, "UPDATE detalle_examenes_hematologia SET wbc ='$wbc', lym='$lym',lym_2='$lym_2',mid='$mid',mid_2='$mid_2',gra='$gra',gra_2='$gra_2',hgb='$hgb',mch='$mch',mchc='$mchc',rbc='$rbc',mcv='$mcv',hct='$hct',rdwa='$rdwa',rdw='$rdw',plt='$plt',mpv='$mpv',pdwa='$pdwa',pdw='$pdw',ptc='$ptc',p_lcr='$p_lcr',p_lcc='$p_lcc',observaciones='$observaciones',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");



date_default_timezone_set('America/Guatemala');

$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');

echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=0,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion' WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  fecha_modificacion='$fecha_modificacion', hora_modificacion='$hora_modificacion', id_usuario=$id_usuario,estado_examen_cargado=0 WHERE id_examen_creado=$id_examen_creado and id_examen=$id_examen");


$actualizar= mysqli_query($conexion, "UPDATE detalle_examenes_hematologia SET  estado_examen_cargado=0 WHERE id_examen_creado=$id_examen_creado");


mysqli_close($conexion);
if ($actualizar) {
  $alert = '<p class="msg_save">Actualizado con éxito!</p>';
  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
  header("Location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario");
}

}
?>




<?php

//==============================================================================================================

// FINALIZAR CARGADO CAMBIANDO EL ESTADO del exámen agregado 

 if(isset($_POST['finalizar_agregado_formulario'])) //FINALIZAR AGREGADO DE EXÁMENES
        {
$codigo_formulario=$_POST['codigo_formulario'];
$id_examen_creado=$_POST['id_examen_creado'];
$id_usuario_tecnico=$_POST['id_usuario_tecnico'];
$observaciones_generales=$_POST['observaciones_generales'];

session_start();
$id_usuario=$_SESSION['id_usuario'];

$id_usuario=$_SESSION['id_usuario'];

date_default_timezone_set('America/Guatemala');
$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');

echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_creado=1,id_usuario_tecnico=$id_usuario_tecnico,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  estado_detalle=1,  id_usuario_tecnico=$id_usuario_tecnico,fecha_modificacion='$fecha_modificacion',hora_modificacion='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");


$actualizar_agregado_3= mysqli_query($conexion, "UPDATE detalle_examenes_hematologia SET  estado_detalle=1,  id_usuario_tecnico=$id_usuario_tecnico,fecha_modificacion='$fecha_modificacion',hora_modificacion='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");


mysqli_close($conexion);
if ($actualizar_agregado) {
  $alert = '<p class="msg_save"> Actualizado</p>';

  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: agregar_examenes.php?codigo_formulario=$codigo_formulario");
}
}


?>





<?php

//==============================================================================================================

// FINALIZAR CARGADO CAMBIANDO EL ESTADO del exámen CON RESULTADOS CARGADOS

 if(isset($_POST['finalizar_cargado_modificado'])) //FINALIZAR cargado de resultados DE EXÁMENES
        {
 $codigo_formulario=$_POST['codigo_formulario'];
 $id_examen_creado=$_POST['id_examen_creado'];
$observaciones_generales_cargado=$_POST['observaciones_generales_cargado'];

$id_usuario=$_SESSION['id_usuario'];

date_default_timezone_set('America/Guatemala');
$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');

echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=1,observaciones_generales_cargado='$observaciones_generales_cargado',fecha_cargado='$fecha_modificacion',hora_cargado='$hora_modificacion',id_usuario=$id_usuario WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  estado_examen_cargado=1 WHERE id_examen_creado=$id_examen_creado");

mysqli_close($conexion);
if ($actualizar_agregado) {
  $alert = '<p class="msg_save"> Actualizado</p>';

  header("Location: cargar_resultados_reportes.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: cargar_resultados_reportes.php?codigo_formulario=$codigo_formulario");
}
}


?>





<?php

//==============================================================================================================

// FINALIZAR CARGADO CAMBIANDO EL ESTADO del exámen agregado 

 if(isset($_POST['finalizar_agregado_formulario_cotizacion'])) //FINALIZAR AGREGADO DE EXÁMENES
        {
$codigo_formulario=$_POST['codigo_formulario'];
$id_examen_creado=$_POST['id_examen_creado'];
$id_usuario_tecnico=$_POST['id_usuario_tecnico'];


$actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_creado=1, id_usuario_tecnico=$id_usuario_tecnico, tipo_cotizacion=1 WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  estado_detalle=1,  id_usuario_tecnico=$id_usuario_tecnico,tipo_cotizacion=1 WHERE id_examen_creado=$id_examen_creado");

mysqli_close($conexion);
if ($actualizar_agregado) {
  $alert = '<p class="msg_save"> Actualizado</p>';

  header("Location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario");
}
}


?>

<?php

//==============================================================================================================

// FINALIZAR CARGADO CAMBIANDO EL ESTADO del exámen CON RESULTADOS CARGADOS

 if(isset($_POST['finalizar_cargado'])) //FINALIZAR cargado de resultados DE EXÁMENES
        {
 $codigo_formulario=$_POST['codigo_formulario'];
 $id_examen_creado=$_POST['id_examen_creado'];

$observaciones_generales_cargado=$_POST['observaciones_generales_cargado'];
echo $id_usuario=$_SESSION['id_usuario'];


date_default_timezone_set('America/Guatemala');
$fecha_modificacion=date('Y-m-d');

$hora_modificacion=date('H:i:s');

echo $actualizar_agregado= mysqli_query($conexion, "UPDATE examenes_creados SET  estado_examen_cargado=1, id_usuario=$id_usuario,fecha_cargado='$fecha_modificacion', hora_cargado='$hora_modificacion',observaciones_generales_cargado='$observaciones_generales_cargado' WHERE id_examen_creado=$id_examen_creado");

$actualizar_agregado_2= mysqli_query($conexion, "UPDATE detalle_examenes SET  estado_examen_cargado=1 WHERE id_examen_creado=$id_examen_creado");

$actualizar_heces= mysqli_query($conexion, "UPDATE detalles_heces SET  estado_examen_cargado=1 WHERE id_examen_creado=$id_examen_creado");
$actualizar_hamatologia= mysqli_query($conexion, "UPDATE detalle_examenes_hematologia SET  estado_examen_cargado=1 WHERE id_examen_creado=$id_examen_creado");

$actualizar_hamatologia= mysqli_query($conexion, "UPDATE detalles_orina SET  estado_examen_cargado=1 WHERE id_examen_creado=$id_examen_creado");

$actualizar_hamatologia= mysqli_query($conexion, "UPDATE examen_cultivo SET  estado_examen_cargado=1 WHERE id_examen_creado=$id_examen_creado");

mysqli_close($conexion);
if ($actualizar_agregado) {
  $alert = '<p class="msg_save"> Actualizado</p>';

  header("Location: cargar_resultados.php?codigo_formulario=$codigo_formulario");


} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';


  header("Location: cargar_resultados.php?codigo_formulario=$codigo_formulario");
}
}


?>














<?php

//==============================================================================================================

// Editamos los datos del cliente

 if(isset($_POST['editar_cliente']))
        {

$alert = '';
$id_cliente= $_POST['id_cliente'];
$nit_cliente= $_POST['nit_cliente'];
$nombre_cliente = $_POST['nombre_cliente'];
$telefono_cliente = $_POST['telefono_cliente'];
$correo_cliente= $_POST['correo_cliente'];


$actualizar_empresa = mysqli_query($conexion, "UPDATE clientes SET nit_cliente = $nit_cliente, nombre_cliente = '$nombre_cliente', telefono_cliente = '$telefono_cliente', correo_cliente = '$correo_cliente'  WHERE id_cliente=$id_cliente");
mysqli_close($conexion);
if ($actualizar_empresa) {
  $alert = '<p class="msg_save"> Actualizado</p>';
  header("Location: registro_de_clientes.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
    header("Location: registro_de_clientes.php");
}

}
?>


<?php

//==============================================================================================================

// ACTUALIZAMOS LOS DATOS DE LA COMPRA PARA FINALIZAR

 if(isset($_POST['realizar_venta']))
        {

$alert = '';
 $id_venta= $_POST['id_venta'];
date_default_timezone_set('America/Guatemala');
$fecha_venta= date('Y/m/d');
$hora_venta= date('H:i:s');
 $id_caja = $_POST['id_caja'];

$id_cliente= $_POST['id_cliente'];
$id_personal= $_POST['id_personal'];
  $nit_cliente = $_POST['nit_cliente']; // valor VARCHAR PUES SI NO HAY NIT SERÍA CF
 $nombre_cliente= $_POST['nombre_cliente'];

$forma_de_pago = $_POST['forma_de_pago'];

 $pagado = $_POST['pagado'];
 $descuento= $_POST['descuento'];

//EL ESTADO 1 ES CUANDO LA VENTA FUE PROCESADO CON ÉXITO


//Guardamos el código de la venta creada para tener un código de barras
//$fecha_codigo=date('d/m/y H:i:s');
$codigo_venta=$id_venta.date('s');

$actualizar= mysqli_query($conexion, "UPDATE ventas_creadas SET codigo_venta='$codigo_venta',hora_venta='$hora_venta',fecha_venta = '$fecha_venta', id_caja = $id_caja, id_cliente = $id_cliente,nit_cliente='$nit_cliente', nombre_cliente = '$nombre_cliente', forma_de_pago=$forma_de_pago, pagado=$pagado,descuento=$descuento,id_personal=$id_personal, estado_venta=1  WHERE id_venta=$id_venta");

if (isset($actualizar)) 
{
   //actualizamos el estado de los detalles
  $actualizar_detalle= mysqli_query($conexion, "UPDATE detalle_ventas SET estado_detalle=1, id_caja=$id_caja WHERE id_venta=$id_venta ");


$id_usuario=$_SESSION['id_usuario'];
//Una vez realizado con éxito, eliminamos las ventas creadas que nunca se finalizaron de nuestro usuario.
      $query_delete = mysqli_query($conexion, "DELETE  FROM ventas_creadas WHERE estado_venta=0 and id_usuario=$id_usuario"); //eliminamos
//una vez realizado con éxito eliminamos los detalles que se agregaron a las ventas que no se con cluyeron
    $query_delete2= mysqli_query($conexion, "DELETE  FROM detalle_ventas WHERE estado_detalle=0 and id_usuario=$id_usuario"); //eliminamos


    //Obtenemos la cantidad de los productos para luego ser restados por medio de la actualización
$query_detalles = mysqli_query($conexion,"SELECT * FROM detalle_ventas WHERE id_venta=$id_venta");

$result = mysqli_num_rows($query_detalles);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query_detalles)) { 

       $id_producto=$data['id_producto'];
      $cantidad_producto=$data['cantidad_producto']; //cantidad de producto vendido

$query_stock = mysqli_query($conexion,"SELECT * FROM productos WHERE id_producto=$id_producto");
while($data_stock= mysqli_fetch_assoc($query_stock))
{
 
 echo $id_producto=$data_stock['id_producto'];
 echo $stock_local=$data_stock['stock_local'];  //cantidad de stock en el local

//realizamos la resta de local menos los vendidos
 $operacion_stock=$stock_local-$cantidad_producto;

 //actualizamos el stock
 $actualizar_stock= mysqli_query($conexion, "UPDATE productos SET stock_local=$operacion_stock WHERE id_producto=$id_producto");


}


     }
    

     if(isset($actualizar_stock))
     {

  $alert = '<p class="msg_save"> Actualizado</p>';
    header("location: agregar_productos_venta.php?id_venta=$id_venta"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO por medio del id  de la venta creado
     }
     else{
       header("Location: agregar_productos_venta.php?id_venta=$id_venta");


   }
     }
   }

   } 



?>

<?php
// editar empleado por markos sanchez
if(isset($_POST['editar_personal']))
{

    
    $id_personal=$_POST['id_personal'];
    $nombre_personal=$_POST['nombre_personal'];
    $direccion_personal=$_POST['direccion_personal'];
    $dpi_personal=$_POST['dpi_personal'];
    $telefono_personal=$_POST['telefono_personal'];
    $puesto_personal=$_POST['puesto_personal'];
    $pago_diario=$_POST['pago_diario'];
    $correo_personal=$_POST['correo_personal'];

    $id_usuario=$_SESSION['id_usuario'];  // ID USARIO
    
    $actualizar_empleado = mysqli_query($conexion, "UPDATE mi_personal SET 
                                                    nombre_personal='$nombre_personal',
                                                    direccion_personal='$direccion_personal',
                                                    dpi_personal='$dpi_personal',
                                                    telefono_personal='$telefono_personal',
                                                    puesto_personal='$puesto_personal',
                                                    pago_diario='$pago_diario',
                                                    correo_personal='$correo_personal',
                                              
                                                    id_usuario='$id_usuario'
                                                    WHERE id_personal='$id_personal';");
    mysqli_close($conexion);
    if ($actualizar_empleado) {
       echo "actualización correcta";
        header("Location:lista_personal.php"); 
     }else{
       echo"error";
       echo $id_usuario;
       //header("Location:lista_personal.php"); 
     }
  }


?>

<?php

// editar empleado por markos sanchez

if(isset($_POST['editar_foto_personal']))
{

    
    $id_personal=$_POST['id_personal'];
   
 $imagen_personal= addslashes(file_get_contents($_FILES['imagen_personal']['tmp_name']));
    $id_usuario=$_SESSION['id_usuario'];  // ID USARIO
    
    $actualizar_foto = mysqli_query($conexion, "UPDATE mi_personal SET imagen_personal='$imagen_personal' WHERE id_personal='$id_personal';");
    mysqli_close($conexion);
    if ($actualizar_foto) {
       echo "actualización correcta";
       header("Location:lista_personal.php"); 
     }else{
       echo"error";
       echo $id_usuario;
       //header("Location:lista_personal.php"); 
     }
  }


?>

<?php
//==============================================================================================================

// Actualizar los datos de la salida del personal

 if(isset($_POST['actualizar_salida']))
        {

$alert = '';
$id_personal2= $_POST['id_personal2'];



        $dpi_personal2=$_POST['dpi_personal2'];
 date_default_timezone_set('America/Guatemala');
          $fecha_ingreso=date('Y/m/d');
        $hora_egreso=date('H:i:s');
    




       $codigo_asistencia=$fecha_ingreso.$dpi_personal2."1"; // un uno al final para referencia del ingreso y un cero al final para referencia de efreso.


    


$actualizar_empresa = mysqli_query($conexion, "UPDATE asistencia_personal SET  hora_egreso = '$hora_egreso'  WHERE codigo_asistencia='$codigo_asistencia'");
mysqli_close($conexion);
if ($actualizar_empresa) {
  $alert = '<p class="msg_save"> Actualizado</p>';
       header("Location: registro_ingreso_egreso_personal.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
     //header("Location: registro_ingreso_egreso_personal.php");
}

}
?>


<?php
//==============================================================================================================

// actualizamos la hora finalizada de la tarea asignada

 if(isset($_POST['finalizar_tareas']))
        {

$alert = '';
$id_tarea= $_POST['id_tarea'];
$dpi_personal=$_POST['dpi_personal'];


    
 date_default_timezone_set('America/Guatemala');
       
        $hora_finalizado=date('H:i:s');
 

 $query = mysqli_query($conexion,"SELECT * FROM tareas_asignadas WHERE id_tarea=$id_tarea"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 
$id_personal=$data['id_personal'];

}
$id_personal;
} 

 $query = mysqli_query($conexion,"SELECT * FROM mi_personal WHERE id_personal=$id_personal"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 
$dpi_personal_encontrado=$data['dpi_personal'];

}
$dpi_personal_encontrado;
}  
   
if($dpi_personal_encontrado==$dpi_personal)
{

$actualizar_empresa = mysqli_query($conexion, "UPDATE tareas_asignadas SET  hora_finalizado = '$hora_finalizado'  WHERE id_tarea=$id_tarea");
mysqli_close($conexion);
if ($actualizar_empresa) {
  $alert = '<p class="msg_save"> Actualizado</p>';
       header("Location: tareas_asignadas.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
     //header("Location: tareas_asignadas.php");
}

}
else
{
        header("Location: tareas_asignadas.php");
 
}
}
?>



<?php
//==============================================================================================================

// Actualizar los datos de la salida del personal

 if(isset($_POST['editar_motorista']))
        {


          $id_motorista=$_POST['id_motorista'];
       $placa_motorista=$_POST['placa_motorista'];

        
          $nombre_motorista=$_POST['nombre_motorista'];
          $telefono_motorista=$_POST['telefono_motorista'];

           $id_usuario=$_SESSION['id_usuario'];
     


$actualizar_motorista = mysqli_query($conexion, "UPDATE motorista SET  placa_motorista = '$placa_motorista', nombre_motorista='$nombre_motorista',telefono_motorista='$telefono_motorista', id_usuario=$id_usuario  WHERE id_motorista=$id_motorista");
mysqli_close($conexion);
if ($actualizar_motorista) {
  $alert = '<p class="msg_save"> Actualizado</p>';
       header("Location: registro_motorista.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar</p>';
     //header("Location: registro_ingreso_egreso_personal.php");
}

}
?>