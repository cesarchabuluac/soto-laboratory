

<?php include "../conexion.php"; //ubiación de la conexión


?>




<?php
//================================================================================================
//ESTAS CONSULTAS LAS AGREGAMOS A NUESTROS ARCHIVOS PHP PARA HACER USO DE ELLO PERO POR MEDIO DE INCLUDE_ONCE


 //  SELEECIONARMOS EL PACIENTE CON EXÁMENES CREADOS LISTAR PARA SER CARGADOS SUS RESULTADOS
 
 if(isset($_GET['id_paciente']))
 {
  $id_paciente=$_GET['id_paciente'];

$query = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol,p.id_paciente,p.nombre_paciente,exc.id_examen_creado,exc.id_paciente,exc.codigo_formulario,exc.fecha_creado,exc.hora_creado,exc.id_medico_referido,exc.id_usuario_tecnico,exc.id_area,exc.estado_examen_creado,exc.tipo_cotizacion,exc.estado_examen_cargado, m.id_medico,m.nombre_medico,a.id_area,a.nombre_area  FROM examenes_creados exc INNER JOIN usuario u ON exc.id_usuario_tecnico=u.id_usuario INNER JOIN rol r ON u.id_rol = r.id_rol  INNER JOIN   pacientes p ON p.id_paciente=exc.id_paciente INNER JOIN medicos m ON exc.id_medico_referido=m.id_medico INNER JOIN areas a ON a.id_area=exc.id_area WHERE exc.id_paciente=$id_paciente and exc.estado_examen_creado=1 and exc.tipo_cotizacion=0 and exc.estado_examen_cargado=0 ORDER BY codigo_formulario DESC");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $formularios_creados[]= array(
        'id_usuario' => $encontrados['id_usuario'],
         'nombre' => $encontrados['nombre'],
         'usuario' => $encontrados['usuario'],
         'nombre_rol' => $encontrados['nombre_rol'],
                  'nombre_paciente' => $encontrados['nombre_paciente'],
                'codigo_formulario' => $encontrados['codigo_formulario'],
                                'nombre_area' => $encontrados['nombre_area'],
                                    'tipo_cotizacion' => $encontrados['tipo_cotizacion'],


                                    'estado_examen_cargado' => $encontrados['estado_examen_cargado'],

               'fecha_creado' => $encontrados['fecha_creado'],
               'hora_creado' => $encontrados['hora_creado'],
                'nombre_medico' => $encontrados['nombre_medico'],





         'id_rol' => $encontrados['id_rol']  );
        
        

        
    }
}
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>





<?php
//================================================================================================

// CONSULTA DEL FORMULARIO DE CULTIVO

 //  obtenemos los resultados de cultivos de un formulario
 
 if(isset($_GET['codigo_formulario']))
 {
  $codigo_formulario=$_GET['codigo_formulario'];

$query = mysqli_query($conexion, "SELECT  c.id_examen_cultivo,c.id_antibiotico,c.resistente,c.intermedio,c.sensible,c.codigo_formulario,a.id_antibiotico,a.nombre_antibiotico FROM detalles_cultivo c INNER JOIN antibioticos a ON c.id_antibiotico=a.id_antibiotico WHERE codigo_formulario='$codigo_formulario' ORDER BY id_examen_cultivo ");
                                               
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $detalles_cultivos[]= array(
                        'codigo_formulario' => $encontrados['codigo_formulario'],

        'id_examen_cultivo' => $encontrados['id_examen_cultivo'],
        'id_antibiotico' => $encontrados['id_antibiotico'],
                'nombre_antibiotico' => $encontrados['nombre_antibiotico'],
                      


         'resistente' => $encontrados['resistente'],
              'intermedio' => $encontrados['intermedio'],
         'sensible' => $encontrados['sensible']

          );    
        

        
    }
}

?>




<?php

$query = mysqli_query($conexion, "SELECT * FROM examenes ");
                                               
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes2[]= array(
                        'codigo_examen' => $encontrados['codigo_examen'],
                        'nombre_examen' => $encontrados['nombre_examen'],
                      'precio_examen' => $encontrados['precio_examen']



          );    
        

        
    }


?>




<?php
// SI EXISTE DETALLES DE CULTIVO ENTONCES HACER LA CONSULTA CON  EL CÓDIGO DE FORMULARIO
 if(isset($_GET['codigo_formulario']))
 {
  $codigo_formulario=$_GET['codigo_formulario'];

$query = mysqli_query($conexion, "SELECT * FROM detalles_cultivo WHERE codigo_formulario='$codigo_formulario'");
                                               
while ($data = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $muestra=$data['muestra'];
        $microorganismo=$data['microorganismo'];

     $observaciones=$data['observaciones'];
        
    }
    $muestra;
    $microorganismo;
    $observaciones;
}


?>

<?php
// SELECCIONAMOS LOS ANTIBIOTICOS QUE EXISTEN

                                               
$query = mysqli_query($conexion, "SELECT * FROM antibioticos ORDER BY codigo_antibiotico ASC");
                                               
$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array 
        $antibioticos[]= array(
        'id_antibiotico' => $encontrados['id_antibiotico'],
         'codigo_antibiotico' => $encontrados['codigo_antibiotico'],
         'nombre_antibiotico' => $encontrados['nombre_antibiotico']  );
   
        
        
    }

}



?>



<?php
//================================================================================================
//


 //  cotizaciones realizadas
 


$query = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol,p.id_paciente,p.nombre_paciente,exc.id_examen_creado,exc.id_paciente,exc.codigo_formulario,exc.fecha_creado,exc.hora_creado,exc.id_medico_referido,exc.id_usuario_tecnico,exc.id_area,exc.estado_examen_creado,exc.tipo_cotizacion, m.id_medico,m.nombre_medico,a.id_area,a.nombre_area  FROM examenes_creados exc INNER JOIN usuario u ON exc.id_usuario_tecnico=u.id_usuario INNER JOIN rol r ON u.id_rol = r.id_rol  INNER JOIN   pacientes p ON p.id_paciente=exc.id_paciente INNER JOIN medicos m ON exc.id_medico_referido=m.id_medico INNER JOIN areas a ON a.id_area=exc.id_area WHERE exc.id_paciente>0 and exc.estado_examen_creado=1 and exc.tipo_cotizacion=1 ORDER BY fecha_creado,hora_creado DESC");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $cotizaciones_creadas[]= array(
        'id_usuario' => $encontrados['id_usuario'],
         'id_examen_creado' => $encontrados['id_examen_creado'],
         'nombre' => $encontrados['nombre'],
         'usuario' => $encontrados['usuario'],
         'nombre_rol' => $encontrados['nombre_rol'],
                  'nombre_paciente' => $encontrados['nombre_paciente'],
                'codigo_formulario' => $encontrados['codigo_formulario'],
                                'nombre_area' => $encontrados['nombre_area'],
                                    'tipo_cotizacion' => $encontrados['tipo_cotizacion'],



               'fecha_creado' => $encontrados['fecha_creado'],
               'hora_creado' => $encontrados['hora_creado'],
                'nombre_medico' => $encontrados['nombre_medico'],





         'id_rol' => $encontrados['id_rol']  );
        
        

        
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>

<?php
//FORMULARIOS CREADOS Y FINALIZADOS
date_default_timezone_set('America/Guatemala');

$fecha_actual = date('Y/m/d');

$fecha_restado=date('Y/m/d',strtotime($fecha_actual."- 50 days")); 

$query = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol,p.id_paciente,p.nombre_paciente,exc.id_examen_creado,exc.id_paciente,exc.codigo_formulario,exc.fecha_creado,exc.hora_creado,exc.fecha_cargado,exc.hora_cargado,exc.id_medico_referido,exc.id_usuario_tecnico,exc.id_usuario,exc.id_area,exc.estado_examen_creado,exc.tipo_cotizacion, m.id_medico,m.nombre_medico,a.id_area,a.nombre_area  FROM examenes_creados exc INNER JOIN usuario u ON exc.id_usuario_tecnico=u.id_usuario INNER JOIN rol r ON u.id_rol = r.id_rol  INNER JOIN   pacientes p ON p.id_paciente=exc.id_paciente INNER JOIN medicos m ON exc.id_medico_referido=m.id_medico INNER JOIN areas a ON a.id_area=exc.id_area WHERE exc.id_paciente>0 and exc.estado_examen_creado=1 and exc.tipo_cotizacion=0 and estado_examen_creado=1 and estado_examen_cargado=1 and exc.fecha_cargado>='$fecha_restado' ORDER BY fecha_cargado DESC, hora_cargado desc");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $formularios_creadas_cargadas[]= array(
        'id_usuario' => $encontrados['id_usuario'],
         'id_examen_creado' => $encontrados['id_examen_creado'],
         'nombre' => $encontrados['nombre'],
         'usuario' => $encontrados['usuario'],
         'nombre_rol' => $encontrados['nombre_rol'],
                  'nombre_paciente' => $encontrados['nombre_paciente'],
                'codigo_formulario' => $encontrados['codigo_formulario'],
                                'nombre_area' => $encontrados['nombre_area'],
                                    'tipo_cotizacion' => $encontrados['tipo_cotizacion'],



               'fecha_creado' => $encontrados['fecha_creado'],
               'hora_creado' => $encontrados['hora_creado'],
               'fecha_cargado' => $encontrados['fecha_cargado'], 
               'hora_cargado' => $encontrados['hora_cargado'],
                'nombre_medico' => $encontrados['nombre_medico'],






         'id_rol' => $encontrados['id_rol']  );
        
        

        
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>



<?php
//================================================================================================
//ESTAS CONSULTAS LAS AGREGAMOS A NUESTROS ARCHIVOS PHP PARA HACER USO DE ELLO PERO POR MEDIO DE INCLUDE_ONCE


 //HACEMOS LA CONSULTA de usuarios
                                
$query = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol  FROM usuario u INNER JOIN rol r ON u.id_rol = r.id_rol ");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $usuarios[]= array(
        'id_usuario' => $encontrados['id_usuario'],
         'nombre' => $encontrados['nombre'],
         'usuario' => $encontrados['usuario'],
         'nombre_rol' => $encontrados['nombre_rol'],
         'id_rol' => $encontrados['id_rol']  );
        
        

        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>




<?php
//================================================================================================



 //Género de referencia ,general, hombre, mujer
                                
$query = mysqli_query($conexion, "SELECT * FROM genero_referencia ");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $genero_referencia[]= array(
        'id_genero_referencia' => $encontrados['id_genero_referencia'],
         'genero_referencia' => $encontrados['genero_referencia']
        );
        
        

        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>







<?php
//================================================================================================


 //HACEMOS LA CONSULTA de usuarios técnicos registrados
                                
$query = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol  FROM usuario u INNER JOIN rol r ON u.id_rol = r.id_rol WHERE r.id_rol=3 ");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $usuarios_tecnicos[]= array(
        'id_usuario' => $encontrados['id_usuario'],
         'nombre' => $encontrados['nombre'],
         'usuario' => $encontrados['usuario'],
         'nombre_rol' => $encontrados['nombre_rol'],
         'id_rol' => $encontrados['id_rol']  );
        
        

        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}


?>


<?php
//================================================================================================


 //HACEMOS LA CONSULTA de usuario técnico asignado
  date_default_timezone_set('America/Guatemala');
  $fecha_asignado=date('Y/m/d');     

$query = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol,t.id_usuario_tecnico,t.fecha_asignado,t.estado_tecnico,t.id_tecnico_asignado  FROM usuario u INNER JOIN rol r ON u.id_rol = r.id_rol INNER JOIN asignar_tecnico t ON t.id_usuario_tecnico=u.id_usuario WHERE t.estado_tecnico=1 and r.id_rol=3 and t.fecha_asignado='$fecha_asignado'");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $tecnico_asignado[]= array(
        'id_usuario' => $encontrados['id_usuario'],
        'id_tecnico_asignado' => $encontrados['id_tecnico_asignado'],
                'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],

         'nombre' => $encontrados['nombre'],
         'usuario' => $encontrados['usuario'],
         'nombre_rol' => $encontrados['nombre_rol'],
         'id_rol' => $encontrados['id_rol']  );
        
        

        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}


?>









<?php



//================================================================================================

// OBTENER LOS VALORES DEL USARIO POR MEDIO DEL ID que posteriormente se va a editar
if(isset($_GET['id_usuario'])) // SI EXISTE EL USUARIO ENTONCES QUE REALICE ESTA CONSULTA
{
if (empty($_REQUEST['id_usuario'])) {
  //header("Location: registro_usuario.php");
}
$id_usuario = $_REQUEST['id_usuario'];
$sql = mysqli_query($conexion, "SELECT  u.id_usuario,u.nombre,u.usuario, u.id_rol, r.nombre_rol FROM usuario u INNER JOIN rol r ON u.id_rol=r.id_rol and u.id_usuario=$id_usuario  WHERE u.id_usuario!=0");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  //header("Location: registro_usuario.php");
} else {
  if ($data_2 = mysqli_fetch_array($sql)) {
    $id_usuario = $data_2['id_usuario'];
    $nombre = $data_2['nombre'];
    $usuario = $data_2['usuario'];
    
    $id_rol = $data_2['id_rol'];
     $nombre_rol = $data_2['nombre_rol'];
 

  }
}
}
?>





<?php
//================================================================================================
//ENLISTAMOS LA LISTA DE TÉCNICOS


 //HACEMOS LA CONSULTA de usuarios
                                
$query_tec = mysqli_query($conexion, "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, r.id_rol,r.nombre_rol  FROM usuario u INNER JOIN rol r  WHERE u.id_rol=3");
                                               


$result = mysqli_num_rows($query_tec);
                        if ($result > 0) {
while ($encontrados_2 = mysqli_fetch_assoc($query_tec)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $tecnicos[]= array(
        'id_usuario' => $encontrados_2['id_usuario'],
         'nombre' => $encontrados_2['nombre'],
         'usuario' => $encontrados_2['usuario'],
         'nombre_rol' => $encontrados_2['nombre_rol'],
         'id_rol' => $encontrados_2['id_rol']  );
        
        

        
    }
}
?>








<?php
//================================================================================================
// OBTENEMOS EL LISTADO DE ROLES

$query = mysqli_query($conexion,"SELECT * FROM rol");


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $roles[]= array(
        'id_rol' => $encontrados['id_rol'],
        'nombre_rol' => $encontrados['nombre_rol']);
   
              
    }
}


?>










<?php
//================================================================================================
// OBTENEMOS EL LISTADO DE PACIENTES

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario, p.direccion_paciente,p.fecha_nacimiento_paciente,p.edad_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero WHERE p.id_paciente>4300  ORDER BY p.id_paciente DESC"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $pacientes[]= array(
        'id_paciente' => $encontrados['id_paciente'],
        'nombre_paciente' => $encontrados['nombre_paciente'],
         'dpi_paciente' => $encontrados['dpi_paciente'],
         'id_genero' => $encontrados['id_genero'],
          'nombre_genero' => $encontrados['nombre_genero'],

      
        
       
        'telefono_paciente' => $encontrados['telefono_paciente'],
        'correo_paciente' => $encontrados['correo_paciente'],
        'direccion_paciente' => $encontrados['direccion_paciente'],
        'fecha_nacimiento_paciente' => $encontrados['fecha_nacimiento_paciente'],
          'edad_paciente' => $encontrados['edad_paciente'],

         'usuario' => $encontrados['usuario']

      );
   
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>


<?php
//================================================================================================
// OBTENEMOS EL LISTADO DE PACIENTES con reportes

$query = mysqli_query($conexion,"SELECT r.id_paciente,r.id_muestra,r.id_medico_referido,r.observaciones_muestra_reporte,r.fecha_reporte,r.hora_reporte,p.id_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,g.id_genero, g.nombre_genero,m.id_medico,m.nombre_medico,mu.id_muestra,mu.nombre_muestra  FROM reporte_pacientes r INNER JOIN pacientes p ON p.id_paciente=r.id_paciente INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN medicos m ON m.id_medico=r.id_medico_referido INNER JOIN muestra mu ON mu.id_muestra=r.id_muestra"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $pacientes_reportes[]= array(
        'id_paciente' => $encontrados['id_paciente'],
        'nombre_paciente' => $encontrados['nombre_paciente'],
                'telefono_paciente' => $encontrados['telefono_paciente'],

                'fecha_reporte' => $encontrados['fecha_reporte'],
                                 'hora_reporte' => $encontrados['hora_reporte'],



         'id_genero' => $encontrados['id_genero'],
          'nombre_genero' => $encontrados['nombre_genero'],

                'nombre_medico' => $encontrados['nombre_medico'],
                                'nombre_muestra' => $encontrados['nombre_muestra'],

                                'observaciones_muestra_reporte' => $encontrados['observaciones_muestra_reporte']


      );
   
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>




<?php
//================================================================================================
// OBTENEMOS EL ID DEL PACIENTE PARA EDITAR

if(isset($_GET['id_paciente']))
{

  $id_paciente=$_GET['id_paciente'];
$query = mysqli_query($conexion,"SELECT p.id_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario, p.direccion_paciente,p.fecha_nacimiento_paciente,p.edad_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero WHERE id_paciente=$id_paciente"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $paciente_editar[]= array(
        'id_paciente' => $encontrados['id_paciente'],
        'nombre_paciente' => $encontrados['nombre_paciente'],
         'dpi_paciente' => $encontrados['dpi_paciente'],
         'id_genero' => $encontrados['id_genero'],
          'nombre_genero' => $encontrados['nombre_genero'],

      
        
       
        'telefono_paciente' => $encontrados['telefono_paciente'],
        'correo_paciente' => $encontrados['correo_paciente'],
        'direccion_paciente' => $encontrados['direccion_paciente'],
        'fecha_nacimiento_paciente' => $encontrados['fecha_nacimiento_paciente'],
          'edad_paciente' => $encontrados['edad_paciente'],

         'usuario' => $encontrados['usuario']

      );
   
              
    }
}
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>




<?php
//================================================================================================
// OBTENEMOS EL LISTADO  de Médicos

$query = mysqli_query($conexion,"SELECT * FROM medicos ORDER BY nombre_medico ASC"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $medicos[]= array(
        'id_medico' => $encontrados['id_medico'],
        'nombre_medico' => $encontrados['nombre_medico'],
       
                  'telefono_medico' => $encontrados['telefono_medico'],

     
          'institucion_referido' => $encontrados['institucion_referido'],

         'id_usuario' => $encontrados['id_usuario']

      );
   
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>







<?php
//================================================================================================
// OBTENEMOS EL LISTADO  de ÁREAS

$query = mysqli_query($conexion,"SELECT * FROM areas ORDER BY nombre_area ASC"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $areas[]= array(
        'id_area' => $encontrados['id_area'],
        'codigo_area' => $encontrados['codigo_area'],
        'nombre_area' => $encontrados['nombre_area'],
  

         'id_usuario' => $encontrados['id_usuario']

      );
   
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>



<?php
//================================================================================================
// OBTENEMOS EL área según el id del examen, para el titulo en otras referencias

if(isset($_GET['id_examen']))
{

        $id_examen=$_GET['id_examen'];
$query = mysqli_query($conexion,"SELECT e.id_examen, e.nombre_examen,e.id_area,a.id_area,a.nombre_area FROM examenes e INNER JOIN areas a ON e.id_area=a.id_area WHERE e.id_examen=$id_examen"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $areas_titulo[]= array(
        'id_area' => $encontrados['id_area'],
  
                'nombre_examen' => $encontrados['nombre_examen'],

         'nombre_area' => $encontrados['nombre_area']

      );
   
              
    }
}

}
?>



<?php
//================================================================================================
// obtenemos el NOMBRE DEL ÁREA POR MEDIO DEL ID
if(isset($_GET['id_area']))
{
$id_area=$_GET['id_area'];

$query = mysqli_query($conexion,"SELECT * FROM areas WHERE  id_area=$id_area"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 


$id_area=$data['id_area'];
$nombre_area=$data['nombre_area'];
}
}

}
?>

<?php
//================================================================================================
// obtenemos el NOMBRE DEL ÁREA POR MEDIO DEL ID


$query_titulo = mysqli_query($conexion,"SELECT * FROM titulos_multiples"); 


$result = mysqli_num_rows($query_titulo);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query_titulo)) { 


//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $titulos[]= array(
        'id_titulo' => $encontrados['id_titulo'],
        'nombre_titulo' => $encontrados['nombre_titulo']);
        

   
              
    }
}
?>

<?php
//================================================================================================
// OBTENEMOS EL LISTADO  de ÁREAS


if(isset($_GET['id_area']))
{
$id_area=$_GET['id_area'];


$query = mysqli_query($conexion,"SELECT a.id_area,a.nombre_area,e.id_area,e.id_examen,e.codigo_examen,e.nombre_examen,e.precio_examen,e.valor_referencia,e.valor_referencia2,e.nombre_nomenclatura, e.subarea,gr.id_genero_referencia,gr.genero_referencia FROM examenes e INNER JOIN areas a ON e.id_area=a.id_area INNER JOIN genero_referencia gr ON gr.id_genero_referencia=e.id_genero_referencia WHERE e.id_area=$id_area ORDER BY nombre_examen ASC"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes[]= array(
        'id_examen' => $encontrados['id_examen'],
        'id_area' => $encontrados['id_area'],
          'nombre_area' => $encontrados['nombre_area'],

        'codigo_examen' => $encontrados['codigo_examen'],
        'nombre_examen' => $encontrados['nombre_examen'],
                            'precio_examen' => $encontrados['precio_examen'],


'id_genero_referencia' => $encontrados['id_genero_referencia'],
'genero_referencia' => $encontrados['genero_referencia'],
        'valor_referencia' => $encontrados['valor_referencia'],
                'valor_referencia2' => $encontrados['valor_referencia2'],

          'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],
           'subarea' => $encontrados['subarea'] );
   
              
    }
}

}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>


<?php

if(isset($_GET['codigo_formulario']))
{
$id_area=$_GET['codigo_formulario']; //REVISAR LINEA 1599 


$query = mysqli_query($conexion,"SELECT a.id_area,a.nombre_area,e.id_area,e.id_examen,e.codigo_examen,e.nombre_examen,e.precio_examen,e.valor_referencia,e.nombre_nomenclatura, e.subarea,e.id_genero_referencia FROM examenes e INNER JOIN areas a ON e.id_area=a.id_area  WHERE e.id_examen>0 ORDER BY nombre_examen ASC"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_cotizacion[]= array(
        'id_examen' => $encontrados['id_examen'],
        'id_area' => $encontrados['id_area'],
          'nombre_area' => $encontrados['nombre_area'],

        'codigo_examen' => $encontrados['codigo_examen'],
        'nombre_examen' => $encontrados['nombre_examen'],
                            'precio_examen' => $encontrados['precio_examen'],

        'valor_referencia' => $encontrados['valor_referencia'],
          'valor_referencia' => $encontrados['valor_referencia'],
                    'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],

          'id_genero_referencia' => $encontrados['id_genero_referencia'],
           'subarea' => $encontrados['subarea'] );
   
              
    }
}

}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>



<?php

if(isset($_GET['codigo_formulario']))
{

$codigo_formulario=$_GET['codigo_formulario'];

$query = mysqli_query($conexion,"SELECT * FROM detalles_orina WHERE codigo_formulario=$codigo_formulario "); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_orina_detalles[]= array(
        'color' => $encontrados['color'],
         'aspecto' => $encontrados['aspecto'],
          'sangre' => $encontrados['sangre'],
           'bilirrubina' => $encontrados['bilirrubina'],
           'urobilinogeno' => $encontrados['urobilinogeno'],
           'cetonas' => $encontrados['cetonas'],
           'glucosa' => $encontrados['glucosa'],
           'proteinas' => $encontrados['proteinas'],
           'nitritos' => $encontrados['nitritos'],
           'leucocitos' => $encontrados['leucocitos'],
           'ph' => $encontrados['ph'],
           'densidad' => $encontrados['densidad'],
           'celulas_epiteliales' => $encontrados['celulas_epiteliales'],
           'leucocitos_2' => $encontrados['leucocitos_2'],
           'eritrocitos' => $encontrados['eritrocitos'],
           'moco' => $encontrados['moco'],
           'cristales' => $encontrados['cristales'],
           'cilindros' => $encontrados['cilindros'],
           'bacterias' => $encontrados['bacterias'],
           'levaduras' => $encontrados['levaduras'],
           'parasitos' => $encontrados['parasitos'],
           'observaciones' => $encontrados['observaciones']




    );
   
              
    }
}

}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>

<?php
// OBTENER LOS VALORES DEL USARIO POR MEDIO DEL ID que posteriormente se va a editar
if(isset($_GET['codigo_formulario'])) // SI EXISTE EL USUARIO ENTONCES QUE REALICE ESTA CONSULTA
{

$codigo_formulario = $_GET['codigo_formulario'];
$query= mysqli_query($conexion, "SELECT * FROM detalle_examenes_hematologia WHERE codigo_formulario='$codigo_formulario'");

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $detalles_hematologia[]= array(
                 'id_examen' => $encontrados['id_examen'],

        'wbc' => $encontrados['wbc'],
         'lym' => $encontrados['lym'],
         'lym_2' => $encontrados['lym_2'],
        
          'mid' => $encontrados['mid'],
          'mid_2' => $encontrados['mid_2'],
          'gra' => $encontrados['gra'],
        'gra_2' => $encontrados['gra_2'],
        'hgb' => $encontrados['hgb'],
        'mch' => $encontrados['mch'],
            'mchc' => $encontrados['mchc'],
        'rbc' => $encontrados['rbc'],
        'mcv' => $encontrados['mcv'],
        'hct' => $encontrados['hct'],
        'rdwa' => $encontrados['rdwa'],
        'rdw' => $encontrados['rdw'],
         'plt' => $encontrados['plt'],
         'mpv' => $encontrados['mpv'],
        'pdwa' => $encontrados['pdwa'],
        'pdw' => $encontrados['pdw'],
            'ptc' => $encontrados['ptc'],
                'p_lcr' => $encontrados['p_lcr'],
                'p_lcc' => $encontrados['p_lcc'],
                'observaciones' => $encontrados['observaciones']
        );
        
        
}
        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>


<?php
// CARGAR LOS RESULTADOS DE HECES EN EL FORMULARIO 
if(isset($_GET['codigo_formulario'])) // SI EXISTE EL USUARIO ENTONCES QUE REALICE ESTA CONSULTA
{

$codigo_formulario = $_GET['codigo_formulario'];
$query= mysqli_query($conexion, "SELECT * FROM detalles_heces WHERE codigo_formulario='$codigo_formulario'");

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $detalles_heces[]= array(
        'color' => $encontrados['color'],
                'observaciones' => $encontrados['observaciones']
        );
        
        
}
        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}

?>




<?php
//================================================================================================
// Seleccionamos el género del paciente



$query = mysqli_query($conexion,"SELECT * FROM genero"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $generos[]= array(
        'id_genero' => $encontrados['id_genero'],
        
         'nombre_genero' => $encontrados['nombre_genero']);

      
}
}


?>


<?php

//================================================================================================

// OBTENER el código del formualrio
if(isset($_GET['codigo_formulario'])) 
{

$codigo_formulario = $_REQUEST['codigo_formulario'];
$query = mysqli_query($conexion,"SELECT p.id_paciente,p.nombre_paciente,p.id_genero,g.id_genero,g.nombre_genero,ec.id_paciente,ec.codigo_formulario,ec.observaciones_generales_cargado FROM pacientes p INNER JOIN examenes_creados ec ON p.id_paciente=ec.id_paciente INNER JOIN genero g ON g.id_genero=p.id_genero WHERE ec.codigo_formulario='$codigo_formulario'"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $paciente_formulario[]= array(
        'id_paciente' => $encontrados['id_paciente'],
        'nombre_paciente' => $encontrados['nombre_paciente'],
         'id_genero' => $encontrados['id_genero'],
         'observaciones_generales_cargado' => $encontrados['observaciones_generales_cargado'],
          'nombre_genero' => $encontrados['nombre_genero']
      ) ;

}

}
echo "asunto";

$query_2 = mysqli_query($conexion,"SELECT * FROM examenes_creados WHERE codigo_formulario='$codigo_formulario'"); 

$result = mysqli_num_rows($query_2);
                        if ($result > 0) {
while ($data_2 = mysqli_fetch_assoc($query_2)) { 

 $id_area=$data_2['id_area'];
  $id_examen_creado=$data_2['id_examen_creado'];
    $id_medico_referido=$data_2['id_medico_referido'];
        $estado_examen_creado=$data_2['estado_examen_creado'];
                $estado_examen_cargado=$data_2['estado_examen_cargado'];




}
$id_area;
$id_examen_creado;
  $id_medico_referido;
  echo $estado_examen_creado;
    echo $estado_examen_cargado;

}

$query_3 = mysqli_query($conexion,"SELECT * FROM medicos WHERE id_medico=$id_medico_referido"); 

$result = mysqli_num_rows($query_3);
                        if ($result > 0) {
                          while ($data = mysqli_fetch_assoc($query_3)) { 

                            $nombre_medico=$data['nombre_medico'];

                          }
                        }


$query = mysqli_query($conexion,"SELECT * FROM examenes WHERE id_area=$id_area"); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_formulario[]= array(
        'id_examen' => $encontrados['id_examen'],
        'codigo_examen' => $encontrados['codigo_examen'],
                'id_genero_referencia' => $encontrados['id_genero_referencia'],

        'valor_referencia' => $encontrados['valor_referencia'],
                'valor_referencia2' => $encontrados['valor_referencia2'],

          'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],




        'nombre_examen' => $encontrados['nombre_examen'] ) ;

}

}


   

}






?>




<?php





//================================================================================================

// OBTENER pruebas agregados al formulario de CARGARS ESPECÍFICAS Hematología
if(isset($_GET['codigo_formulario'])) 
{

$codigo_formulario = $_REQUEST['codigo_formulario'];


$query = mysqli_query($conexion,"SELECT d.id_usuario,d.codigo_formulario,d.id_usuario_tecnico,d.id_detalle_examen,d.id_examen_creado,d.resultado,d.estado_examen_cargado,d.id_area,d.id_paciente,d.descripcion,d.estado_detalle,d.fecha_modificacion,d.hora_modificacion,d.precio_examen,e.id_examen,e.codigo_examen,e.nombre_examen,e.valor_referencia,e.valor_referencia2,e.nombre_nomenclatura,e.subarea,u.id_usuario,u.usuario FROM detalle_examenes_hematologia d INNER JOIN examenes e ON d.id_examen=e.id_examen INNER JOIN usuario u ON u.id_usuario=d.id_usuario  WHERE d.id_examen_creado=$id_examen_creado ORDER BY e.nombre_examen desc "); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_agregados_2[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],

        'id_examen' => $encontrados['id_examen'],
                'codigo_examen' => $encontrados['codigo_examen'],
                                'usuario' => $encontrados['usuario'],


         'nombre_examen' => $encontrados['nombre_examen'],
                  'precio_examen' => $encontrados['precio_examen'],

                  'estado_examen_cargado' => $encontrados['estado_examen_cargado'],
                  'codigo_formulario' => $encontrados['codigo_formulario'],

        'id_area' => $encontrados['id_area'],
                'valor_referencia' => $encontrados['valor_referencia'],
                                'valor_referencia2' => $encontrados['valor_referencia2'],

                                'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],

                'descripcion' => $encontrados['descripcion'],
                                'estado_detalle' => $encontrados['estado_detalle'],




        'resultado' => $encontrados['resultado'],
        'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],

        'fecha_modificacion' => $encontrados['fecha_modificacion'],

        'hora_modificacion' => $encontrados['hora_modificacion'] ) ;

}

}


   

}






?>

<?php

// OBTENER pruebas agregados al formulario de CARGARS ESPECÍFICAS ORINA
if(isset($_GET['codigo_formulario'])) 
{

$codigo_formulario = $_REQUEST['codigo_formulario'];


$query = mysqli_query($conexion,"SELECT o.id_examen_orina,o.id_examen,o.estado_examen_cargado,o.id_examen_creado,e.codigo_examen,e.id_examen,e.nombre_examen,d.id_examen_creado,d.id_usuario_tecnico FROM detalles_orina o INNER JOIN examenes e ON o.id_examen=e.id_examen INNER JOIN detalle_examenes d ON d.id_examen_creado=o.id_examen_creado WHERE codigo_formulario='$codigo_formulario' "); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_orina[]= array(
                  'id_examen_orina' => $encontrados['id_examen_orina'],
                   'codigo_examen' => $encontrados['codigo_examen'],
                                      'nombre_examen' => $encontrados['nombre_examen'],
                                      'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],


                                      'estado_examen_cargado' => $encontrados['estado_examen_cargado'],

        'id_examen' => $encontrados['id_examen']);


}

}


   

}


?>

<?php

// OBTENER pruebas agregados al formulario de CARGARS ESPECÍFICAS HECES
if(isset($_GET['codigo_formulario'])) 
{

$codigo_formulario = $_REQUEST['codigo_formulario'];


$query = mysqli_query($conexion,"SELECT o.id_detalle_examen,o.id_examen,o.id_examen_creado,e.codigo_examen,e.id_examen,e.nombre_examen,d.id_examen_creado,d.id_usuario_tecnico,d.estado_examen_cargado FROM detalles_heces o INNER JOIN examenes e ON o.id_examen=e.id_examen INNER JOIN detalle_examenes d ON d.id_examen_creado=o.id_examen_creado WHERE codigo_formulario='$codigo_formulario' "); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_heces[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],
                   'codigo_examen' => $encontrados['codigo_examen'],
                                      'nombre_examen' => $encontrados['nombre_examen'],
                                'estado_examen_cargado' => $encontrados['estado_examen_cargado'],

                                      'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],



        'id_examen' => $encontrados['id_examen']);


}

}

}


?>


<?php

// OBTENER pruebas agregados al formulario de CARGARS ESPECÍFICAS HECES
if(isset($_GET['codigo_formulario'])) 
{

$codigo_formulario = $_REQUEST['codigo_formulario'];


$query = mysqli_query($conexion,"SELECT o.id_detalle_examen,o.estado_examen_cargado,o.id_examen,o.id_examen_creado,e.codigo_examen,e.id_examen,e.nombre_examen,d.id_examen_creado,d.id_usuario_tecnico FROM examen_cultivo o INNER JOIN examenes e ON o.id_examen=e.id_examen INNER JOIN detalle_examenes d ON d.id_examen_creado=o.id_examen_creado WHERE codigo_formulario='$codigo_formulario' "); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_cultivo[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],
                   'codigo_examen' => $encontrados['codigo_examen'],
                                      'nombre_examen' => $encontrados['nombre_examen'],

                                      'estado_examen_cargado' => $encontrados['estado_examen_cargado'],


                                      'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],



        'id_examen' => $encontrados['id_examen']);


}

}

}


?>

<?php

//================================================================================================

// OBTENER pruebas agregados al formulario de CARGARS ESPECÍFICAS GENERAL (de todos los pequeños exámens)
if(isset($_GET['codigo_formulario'])) 
{

$codigo_formulario = $_REQUEST['codigo_formulario'];


$query = mysqli_query($conexion,"SELECT d.id_usuario,d.id_usuario_tecnico,d.id_detalle_examen,d.id_examen_creado,d.resultado,d.estado_examen_cargado,d.id_area,d.id_paciente,d.descripcion,d.estado_detalle,d.fecha_modificacion,d.hora_modificacion,d.precio_examen,e.id_examen,e.codigo_examen,e.nombre_examen,e.valor_referencia,e.valor_referencia2,e.nombre_nomenclatura,e.subarea,u.id_usuario,u.usuario FROM detalle_examenes d INNER JOIN examenes e ON d.id_examen=e.id_examen INNER JOIN usuario u ON u.id_usuario=d.id_usuario  WHERE d.id_examen_creado=$id_examen_creado ORDER BY e.nombre_examen desc "); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_agregados[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],

        'id_examen' => $encontrados['id_examen'],
                'codigo_examen' => $encontrados['codigo_examen'],
                                'usuario' => $encontrados['usuario'],


         'nombre_examen' => $encontrados['nombre_examen'],
                  'precio_examen' => $encontrados['precio_examen'],
                  'estado_examen_cargado' => $encontrados['estado_examen_cargado'],


        'id_area' => $encontrados['id_area'],
                'valor_referencia' => $encontrados['valor_referencia'],
                                'valor_referencia2' => $encontrados['valor_referencia2'],

                                'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],

                'descripcion' => $encontrados['descripcion'],
                                'estado_detalle' => $encontrados['estado_detalle'],




        'resultado' => $encontrados['resultado'],
        'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],

        'fecha_modificacion' => $encontrados['fecha_modificacion'],

        'hora_modificacion' => $encontrados['hora_modificacion'] ) ;

}

}


   

}






?>






<?php
//================================================================================================
// OBTENEMOS EL LISTADO  de Médicos

$query = mysqli_query($conexion,"SELECT * FROM muestra"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $muestras[]= array(
        'id_muestra' => $encontrados['id_muestra'],
        'nombre_muestra' => $encontrados['nombre_muestra']
      );
   
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>






<?php
//================================================================================================
// Seleccionamos los productos habilitados



$query = mysqli_query($conexion,"SELECT * FROM productos WHERE producto_habilitado=0"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $productos_en_venta[]= array(
        'id_producto' => $encontrados['id_producto'],
        
         'codigo_producto' => $encontrados['codigo_producto'],
      
        'nombre_producto' => $encontrados['nombre_producto']);    
}
}


?>


<?php
//================================================================================================
// obtenemos el id de la venta creada

$id_usuario=$_SESSION['id_usuario'];

$query = mysqli_query($conexion,"SELECT * FROM ventas_creadas WHERE codigo_venta=0 and id_usuario=$id_usuario"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 

$id_venta=$data['id_venta'];
$id_usuario=$data['id_usuario'];
$estado_venta=$data['estado_venta'];
}
}


?>



<?php
//================================================================================================
// obtenemos el id de la venta creada y buscamos su estado si es mayor acero entonces venta procesada con éxito
if(isset($_GET['id_venta']))
{
$id_venta=$_GET['id_venta'];

$query = mysqli_query($conexion,"SELECT * FROM ventas_creadas WHERE  id_venta=$id_venta"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 


$estado_venta=$data['estado_venta'];
}
}

}
?>




<?php
//================================================================================================
// OBTENEMOS EL id de la venta creada para enlistar los detalles de las ventas



if(isset($_GET['id_venta']))
{
$id_venta=$_GET['id_venta'];

$query = mysqli_query($conexion,"SELECT d.id_detalle,d.cantidad_producto,d.nombre_producto,d.precio_venta,d.subtotal_venta,d.id_producto, p.id_producto,p.stock_local FROM detalle_ventas d INNER JOIN productos p ON p.id_producto=d.id_producto WHERE id_venta=$id_venta"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$detalles[]= array(

 'stock_local' => $encontrados['stock_local'],
   'id_producto' => $encontrados['id_producto'],

        'cantidad_producto' => $encontrados['cantidad_producto'],
        
         'nombre_producto' => $encontrados['nombre_producto'],
      
        'precio_venta' => $encontrados['precio_venta'], 

        'id_detalle' => $encontrados['id_detalle'],

        'subtotal_venta' => $encontrados['subtotal_venta']); 

}
}
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}


?>





<?php
//================================================================================================
// OBTENEMOS EL el subtotal acumulado de los detalles agreados a la venta creada
//NOTA: EL SUBTOTAL SE GUARDA PARA REFERENCIA EN ESTOS MOMENTOS, DESPUÉS EL SUBTOTAL REAL PROVIENE
// DE CANTIDAD POR PRODUCTO, porque si hay devoluciones de algo, se reflejará desde esa operación 
// y no desde el subtotal de referencia o temportal que solo se usa en la venta de productos.



if(isset($_GET['id_venta']))
{
$id_venta=$_GET['id_venta'];

$result= mysqli_query($conexion,"SELECT SUM(subtotal_venta) AS subtotal_acumulado FROM detalle_ventas WHERE id_venta=$id_venta"); 
$row= mysqli_fetch_assoc($result); 
$suma_subtotales= $row['subtotal_acumulado'];




}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}


?>

<?php
//================================================================================================
// OBTENEMOS las ventas de hoy


date_default_timezone_set("America/Guatemala");
$fecha_hoy=date('Y/m/d');

$ventas= mysqli_query($conexion,"SELECT v.id_venta,v.codigo_venta,v.nit_cliente,v.nombre_cliente,v.fecha_venta,v.hora_venta,v.estado_venta,v.id_usuario,u.id_usuario,u.usuario,e.id_estado,e.nombre_estado FROM ventas_creadas v INNER JOIN usuario u ON v.id_usuario=u.id_usuario INNER JOIN estados_venta e ON v.estado_venta=e.id_estado  WHERE v.fecha_venta='$fecha_hoy' ORDER BY v.fecha_venta,v.hora_venta  DESC"); 

$result = mysqli_num_rows($ventas);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($ventas)) { 
$ventas_hoy[]= array(
        'id_venta' => $encontrados['id_venta'],
        'codigo_venta' => $encontrados['codigo_venta'],
       
         'fecha_venta' => $encontrados['fecha_venta'],
         'hora_venta' => $encontrados['hora_venta'],
         'nit_cliente' => $encontrados['nit_cliente'],
         'nombre_cliente' => $encontrados['nombre_cliente'],
         'estado_venta' => $encontrados['estado_venta'],
         'nombre_estado' => $encontrados['nombre_estado'],
         'usuario' => $encontrados['usuario'],
      
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}




?>



<?php
//================================================================================================
// OBTENEMOS las ventas generales por vendedor


if(isset($_POST['visualizar_ventas_generales']) and !empty($_POST['fecha_inicio']) and !empty($_POST['fecha_final']))
{
date_default_timezone_set("America/Guatemala");

$fecha_inicio=$_POST['fecha_inicio'];
$fecha_final=$_POST['fecha_final'];


$ventas= mysqli_query($conexion,"SELECT v.id_venta,v.codigo_venta,v.nit_cliente,v.nombre_cliente,v.fecha_venta,v.hora_venta,v.estado_venta,v.id_usuario,v.id_personal,u.id_usuario,u.usuario,e.id_estado,e.nombre_estado,p.id_personal,p.nombre_personal FROM ventas_creadas v INNER JOIN usuario u ON v.id_usuario=u.id_usuario INNER JOIN estados_venta e ON v.estado_venta=e.id_estado INNER JOIN mi_personal p ON p.id_personal=v.id_personal WHERE v.fecha_venta>='$fecha_inicio' and v.fecha_venta<='$fecha_final' ORDER BY v.fecha_venta,v.hora_venta  DESC"); 

$result = mysqli_num_rows($ventas);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($ventas)) { 
$ventas_generales_vendedor[]= array(
        'id_venta' => $encontrados['id_venta'],
        'codigo_venta' => $encontrados['codigo_venta'],
       
         'fecha_venta' => $encontrados['fecha_venta'],
         'hora_venta' => $encontrados['hora_venta'],
         'nit_cliente' => $encontrados['nit_cliente'],
         'nombre_cliente' => $encontrados['nombre_cliente'],
         'estado_venta' => $encontrados['estado_venta'],
         'nombre_estado' => $encontrados['nombre_estado'],
          'id_personal' => $encontrados['id_personal'],
          'nombre_personal' => $encontrados['nombre_personal'],

         'usuario' => $encontrados['usuario'],
      
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}
}



?>



<?php
//================================================================================================
// OBTENEMOS las ventas generales por vendedor



date_default_timezone_set("America/Guatemala");

$fecha_hoy=date('Y/m/d');

$ventas= mysqli_query($conexion,"SELECT v.id_venta,v.codigo_venta,v.nit_cliente,v.nombre_cliente,v.fecha_venta,v.hora_venta,v.estado_venta,v.id_usuario,v.id_personal,u.id_usuario,u.usuario,e.id_estado,e.nombre_estado,p.id_personal,p.nombre_personal FROM ventas_creadas v INNER JOIN usuario u ON v.id_usuario=u.id_usuario INNER JOIN estados_venta e ON v.estado_venta=e.id_estado INNER JOIN mi_personal p ON p.id_personal=v.id_personal WHERE v.fecha_venta='$fecha_hoy'  ORDER BY v.fecha_venta,v.hora_venta  DESC"); 

$result = mysqli_num_rows($ventas);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($ventas)) { 
$ventas_generales_hoy[]= array(
        'id_venta' => $encontrados['id_venta'],
        'codigo_venta' => $encontrados['codigo_venta'],
       
         'fecha_venta' => $encontrados['fecha_venta'],
         'hora_venta' => $encontrados['hora_venta'],
         'nit_cliente' => $encontrados['nit_cliente'],
         'nombre_cliente' => $encontrados['nombre_cliente'],
         'estado_venta' => $encontrados['estado_venta'],
         'nombre_estado' => $encontrados['nombre_estado'],
          'id_personal' => $encontrados['id_personal'],
          'nombre_personal' => $encontrados['nombre_personal'],

         'usuario' => $encontrados['usuario'],
      
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}



?>




<?php
// OBTENEMOS EL LISTADO de tipo de movimiento, que actualmente es entrante y salida.
//================================================================================================

$query = mysqli_query($conexion,"SELECT * FROM tipo_movimiento");


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $tipo_movimientos[]= array(
        'id_tipo_movimiento' => $encontrados['id_tipo_movimiento'],
        'nombre_tipo_movimiento' => $encontrados['nombre_tipo_movimiento']);
     
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>



<?php

// Enlistamos los movimientos de caja registrados

$query = mysqli_query($conexion,"SELECT  m.id_tipo_movimiento,m.id_caja,m.fecha_movimiento,m.hora_movimiento,m.monto_movimiento,m.motivo_movimiento,m.id_usuario,t.id_tipo_movimiento,t.nombre_tipo_movimiento,c.id_caja,c.nombre_caja,u.id_usuario,u.usuario FROM movimiento_de_caja m INNER JOIN tipo_movimiento t ON m.id_tipo_movimiento=t.id_tipo_movimiento INNER JOIN caja c ON m.id_caja=c.id_caja INNER JOIN usuario u ON m.id_usuario=u.id_usuario  ORDER BY  fecha_movimiento DESC" );


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $movimientos_realizados[]= array(
        'id_caja' => $encontrados['id_caja'],
        'fecha_movimiento' => $encontrados['fecha_movimiento'],
         'hora_movimiento' => $encontrados['hora_movimiento'],
        'id_tipo_movimiento' => $encontrados['id_tipo_movimiento'],
        'monto_movimiento' => $encontrados['monto_movimiento'],
        'motivo_movimiento' => $encontrados['motivo_movimiento'],
        'nombre_tipo_movimiento' => $encontrados['nombre_tipo_movimiento'],
        'nombre_caja' => $encontrados['nombre_caja'],
        'usuario' => $encontrados['usuario'],
        'id_usuario' => $encontrados['id_usuario']);
     
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>

<?php

// Enlistamos los movimientos de caja registrados

$query = mysqli_query($conexion,"SELECT  m.id_tipo_movimiento,m.id_caja,m.fecha_movimiento,m.hora_movimiento,m.monto_movimiento,m.motivo_movimiento,m.id_usuario,t.id_tipo_movimiento,t.nombre_tipo_movimiento,c.id_caja,c.nombre_caja,u.id_usuario,u.usuario FROM movimiento_de_caja m INNER JOIN tipo_movimiento t ON m.id_tipo_movimiento=t.id_tipo_movimiento INNER JOIN caja c ON m.id_caja=c.id_caja INNER JOIN usuario u ON m.id_usuario=u.id_usuario and m.id_tipo_movimiento=3 ORDER BY  fecha_movimiento DESC" );


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $movimientos_realizados_gastos[]= array(
        'id_caja' => $encontrados['id_caja'],
        'fecha_movimiento' => $encontrados['fecha_movimiento'],
         'hora_movimiento' => $encontrados['hora_movimiento'],
        'id_tipo_movimiento' => $encontrados['id_tipo_movimiento'],
        'monto_movimiento' => $encontrados['monto_movimiento'],
        'motivo_movimiento' => $encontrados['motivo_movimiento'],
        'nombre_tipo_movimiento' => $encontrados['nombre_tipo_movimiento'],
        'nombre_caja' => $encontrados['nombre_caja'],
        'usuario' => $encontrados['usuario'],
        'id_usuario' => $encontrados['id_usuario']);
     
              
    }
}

//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>




<?php

/*
 //HACEMOS LA CONSULTA EN LA TABLA productos PARA EL INVENTARIO GENERAL

    date_default_timezone_set('America/Guatemala');
     $fecha_hoy=date('Y-m-d');  //FECHA DE REGISTRO DEL PRODUCTO                            

$query = mysqli_query($conexion, "SELECT p.id_producto,p.codigo_producto,p.nombre_producto,p.stock_minimo,p.stock_local,p.stock_almacen,p.precio_venta,p.id_talla,p.ultima_actualizacion,p.hora_actualizacion,p.id_local,p.id_talla,p.id_usuario,l.id_local,l.nombre_local,l.codigo_local FROM productos p INNER JOIN local l ON p.id_local=l.id_local WHERE id_producto>0");
                  //INNER JOIN caja AS c ON u.id_caja=c.id_caja                             


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $productos_ingresados_general[]= array(
          'id_producto' => $encontrados['id_producto'],
          'id_local' => $encontrados['id_local'],
        'codigo_producto' => $encontrados['codigo_producto'],
         'nombre_producto' => $encontrados['nombre_producto'],
          'stock_minimo' => $encontrados['stock_minimo'],
          'stock_local' => $encontrados['stock_local'],
          'stock_almacen' => $encontrados['stock_almacen'],
         
          'precio_venta' => $encontrados['precio_venta'],
          
          'id_talla' => $encontrados['id_talla'],
            'ultima_actualizacion' => $encontrados['ultima_actualizacion'],
            'hora_actualizacion' => $encontrados['hora_actualizacion'],
           'id_usuario' => $encontrados['id_usuario']   );       
        
}
        
    }

*/
?>



<?php


 //HACEMOS LA CONSULTA EN LA TABLA productos PARA EL INVENTARIO en productos agotados

    date_default_timezone_set('America/Guatemala');
     $fecha_hoy=date('Y-m-d');  //FECHA DE REGISTRO DEL PRODUCTO                            

$query = mysqli_query($conexion, "SELECT * FROM productos WHERE stock_minimo<=5");
                  //INNER JOIN caja AS c ON u.id_caja=c.id_caja                             


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $productos_ingresados_general[]= array(
          'id_producto' => $encontrados['id_producto'],
          'id_local' => $encontrados['id_local'],
        'codigo_producto' => $encontrados['codigo_producto'],
         'nombre_producto' => $encontrados['nombre_producto'],
          'stock_minimo' => $encontrados['stock_minimo'],
          'stock_local' => $encontrados['stock_local'],
          'stock_almacen' => $encontrados['stock_almacen'],
         
          'precio_venta' => $encontrados['precio_venta'],
          'id_color' => $encontrados['id_color'],
          'id_marca' => $encontrados['id_marca'],
          'id_modelo' => $encontrados['id_modelo'],
          'id_tipo' => $encontrados['id_tipo'],
          'id_categoria' => $encontrados['id_categoria'],
          'id_talla' => $encontrados['id_talla'],
          'fecha_registro' => $encontrados['fecha_registro'],
            'ultima_actualizacion' => $encontrados['ultima_actualizacion'],
           'id_usuario' => $encontrados['id_usuario']   );       
        
}
        
    }


?>



<?php 
//================================================================================================
// OBTENEMOS el listado de categorías para tenerlo de referencia dentro de un td en la tabla de nomenclaturas





$query = mysqli_query($conexion,"SELECT * FROM categoria"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$categorias_registradas[]= array(
        'id_categoria' => $encontrados['id_categoria'],
        
         'nombre_categoria' => $encontrados['nombre_categoria']); 

}
}



?>

<?php 
//================================================================================================
// OBTENEMOS el listado de las medidas registradas desde la tabla nomenclaturas


$query = mysqli_query($conexion,"SELECT * FROM medida"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$medidas_registradas[]= array(
        'id_talla' => $encontrados['id_talla'],  //AQUI SE PONE TALLA EN LAS VISTAS ES MEDIDA, TALLA ES PARA ROPA
        
         'nombre_talla' => $encontrados['nombre_talla']); 

}
}



?>

<?php 
//================================================================================================
// OBTENEMOS el listado de las medidas registradas desde la tabla nomenclaturas


$query = mysqli_query($conexion,"SELECT * FROM color"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$colores_registradas[]= array(
        'id_color' => $encontrados['id_color'],  
        
         'nombre_color' => $encontrados['nombre_color']); 

}
}



?>

<?php 
//================================================================================================
// OBTENEMOS el listado de las marcas registradas desde la tabla nomenclaturas


$query = mysqli_query($conexion,"SELECT * FROM marca"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$marcas_registradas[]= array(
        'id_color' => $encontrados['id_marca'],  
        
         'nombre_marca' => $encontrados['nombre_marca']); 

}
}



?>

<?php 
//================================================================================================
// OBTENEMOS el listado de los modelos registradas desde la tabla nomenclaturas


$query = mysqli_query($conexion,"SELECT * FROM modelo"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$modelo_registradas[]= array(
        'id_color' => $encontrados['id_modelo'],  
        
         'nombre_modelo' => $encontrados['nombre_modelo']); 

}
}



?>

<?php 
//================================================================================================
// OBTENEMOS el listado de los tipos de productos registradas desde la tabla nomenclaturas


$query = mysqli_query($conexion,"SELECT * FROM tipo"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$tipos_registradas[]= array(
        'id_tipo' => $encontrados['id_tipo'],  
        
         'nombre_tipo' => $encontrados['nombre_tipo']); 

}
}



?>

<?php

 //productos vendidos, son los que están en detalle ventas con estado vendido o finalizado


if(isset($_GET['id_local']))   
{
$id_local=$id_local;                         

$query = mysqli_query($conexion, "SELECT DISTINCT d.id_producto,d.nombre_producto,d.id_local,l.id_local,l.codigo_local,l.nombre_local   FROM detalle_ventas d INNER JOIN local l ON d.id_local=l.id_local WHERE d.id_local=$id_local");
                                            


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $productos_vendidos[]= array(
          'id_producto' => $encontrados['id_producto'],
          'nombre_producto' => $encontrados['nombre_producto'],
          'id_local' => $encontrados['id_local'],
          
          'codigo_local' => $encontrados['codigo_local'],
          'nombre_local' => $encontrados['nombre_local']);       
        
}
        
    }
}

?>

<?php 
//================================================================================================
// OBTENEMOS el listado de los modelos registradas desde la tabla nomenclaturas

if(isset($_POST['visualizar_articulos']) and !empty($_POST['inicio']) and !empty($_POST['final']))
{

$inicio=$_POST['inicio'];
$final=$_POST['final'];


$query = mysqli_query($conexion,"SELECT  d.id_venta,d.id_local,d.id_producto,d.cantidad_producto,d.nombre_producto,v.id_venta,v.fecha_venta,v.hora_venta,d.precio_venta FROM detalle_ventas d INNER JOIN ventas_creadas v ON d.id_venta=v.id_venta WHERE d.id_local>0 and v.fecha_venta>='$inicio' and v.fecha_venta<='$final'"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$articulos_vendidos[]= array(
        'id_venta' => $encontrados['id_venta'],
        'hora_venta' => $encontrados['hora_venta'],   
        
         'id_local' => $encontrados['id_local'],
         'id_producto' => $encontrados['id_producto'], 
                  'precio_venta' => $encontrados['precio_venta'], 

         'cantidad_producto' => $encontrados['cantidad_producto'],
      
           'fecha_venta' => $encontrados['fecha_venta'],   
         'nombre_producto' => $encontrados['nombre_producto']); 

}
}

}

?>


<?php 
//================================================================================================
// Consultamos las asistencias de hoy

date_default_timezone_set('America/Guatemala');
$fecha_hoy=date('Y/m/d');

$query = mysqli_query($conexion,"SELECT a.id_asistencia,a.codigo_asistencia,a.fecha_ingreso,a.id_personal,a.hora_ingreso,a.hora_egreso,a.id_usuario, p.id_personal,p.dpi_personal,p.nombre_personal,u.id_usuario,u.usuario FROM asistencia_personal a INNER JOIN mi_personal p ON a.id_personal=p.id_personal INNER JOIN usuario u ON a.id_usuario=u.id_usuario WHERE id_asistencia>0 and fecha_ingreso='$fecha_hoy'"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$asistencias_hoy[]= array(
        'id_personal' => $encontrados['id_personal'],
        'fecha_ingreso' => $encontrados['fecha_ingreso'],

     
         'id_personal' => $encontrados['id_personal'],
        'hora_ingreso' => $encontrados['hora_ingreso'],
        'hora_egreso' => $encontrados['hora_egreso'],
         'usuario' => $encontrados['usuario'],
         'dpi_personal' => $encontrados['dpi_personal'],
          'nombre_personal' => $encontrados['nombre_personal'],
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}



?>




<?php 
//================================================================================================
// Consultamos las asistencias por fechas

if(isset($_POST['ver_asistencias']))
{
  $fecha_inicio=$_POST['fecha_inicio'];
  $fecha_cierre=$_POST['fecha_cierre'];


$query = mysqli_query($conexion,"SELECT a.id_asistencia,a.codigo_asistencia,a.fecha_ingreso,a.id_personal,a.hora_ingreso,a.hora_egreso,a.id_usuario, p.id_personal,p.dpi_personal,p.nombre_personal,u.id_usuario,u.usuario FROM asistencia_personal a INNER JOIN mi_personal p ON a.id_personal=p.id_personal INNER JOIN usuario u ON a.id_usuario=u.id_usuario WHERE id_asistencia>0 and fecha_ingreso>='$fecha_inicio' and  fecha_ingreso<='$fecha_cierre' "); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$asistencias_generales[]= array(
        'id_personal' => $encontrados['id_personal'],
        'fecha_ingreso' => $encontrados['fecha_ingreso'],

     
         'id_personal' => $encontrados['id_personal'],
        'hora_ingreso' => $encontrados['hora_ingreso'],
        'hora_egreso' => $encontrados['hora_egreso'],
         'usuario' => $encontrados['usuario'],
         'dpi_personal' => $encontrados['dpi_personal'],
          'nombre_personal' => $encontrados['nombre_personal'],
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}

}

?>








<?php 
//================================================================================================
// Consultamos las tareas asignadas hoy

date_default_timezone_set('America/Guatemala');
$fecha_hoy=date('Y/m/d');

$query = mysqli_query($conexion,"SELECT t.id_tarea,t.id_personal,t.fecha_tarea,t.descripcion_tarea,t.hora_inicio,t.hora_finalizado,t.id_usuario,p.id_personal,p.nombre_personal,p.dpi_personal,u.id_usuario,u.usuario FROM tareas_asignadas t INNER JOIN mi_personal p ON t.id_personal=p.id_personal  INNER JOIN usuario u ON t.id_usuario=u.id_usuario WHERE id_tarea>0 and fecha_tarea='$fecha_hoy' ORDER BY hora_inicio DESC"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$tareas_hoy[]= array(
  'id_tarea' => $encontrados['id_tarea'],
        'id_personal' => $encontrados['id_personal'],
        'fecha_tarea' => $encontrados['fecha_tarea'],
 'dpi_personal' => $encontrados['dpi_personal'],
     'nombre_personal' => $encontrados['nombre_personal'],
         'descripcion_tarea' => $encontrados['descripcion_tarea'],
        'hora_inicio' => $encontrados['hora_inicio'],
        'hora_finalizado' => $encontrados['hora_finalizado'],
         'usuario' => $encontrados['usuario'],
      
          'usuario' => $encontrados['usuario'],
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}



?>


<?php 
//================================================================================================
// CONSULTAMOS LOS PERMISOS REGISTRADOS


$query = mysqli_query($conexion,"SELECT p.id_permisos,p.id_personal,p.fecha_permiso,p.pago_diario_permiso,p.motivo_permiso,p.motivo_permiso,p.id_usuario,u.id_usuario,u.usuario,m.id_personal,m.dpi_personal,m.nombre_personal,m.puesto_personal  FROM permisos_personal p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN mi_personal m ON p.id_personal=m.id_personal"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$permisos_registrados[]= array(
  'id_permisos' => $encontrados['id_permisos'],
        'id_personal' => $encontrados['id_personal'],
        'fecha_permiso' => $encontrados['fecha_permiso'],
          'dpi_personal' => $encontrados['dpi_personal'],
          'nombre_personal' => $encontrados['nombre_personal'],
          'puesto_personal' => $encontrados['puesto_personal'],
 'usuario' => $encontrados['usuario'],
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}



?>


<?php 
//================================================================================================
// Consultamos las faltas del personal

date_default_timezone_set('America/Guatemala');
$fecha_hoy=date('Y/m/d');

$query = mysqli_query($conexion,"SELECT f.id_faltas,f.id_personal,f.fecha_falta,f.id_usuario, p.id_personal,p.dpi_personal,p.nombre_personal,p.puesto_personal,u.id_usuario,u.usuario FROM faltas_personal f INNER JOIN mi_personal p ON f.id_personal=p.id_personal INNER JOIN usuario u ON f.id_usuario=u.id_usuario  "); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$faltas_personal[]= array(
        'id_personal' => $encontrados['id_personal'],
        'fecha_falta' => $encontrados['fecha_falta'],

            'puesto_personal' => $encontrados['puesto_personal'],
         'usuario' => $encontrados['usuario'],
         'dpi_personal' => $encontrados['dpi_personal'],
          'nombre_personal' => $encontrados['nombre_personal'],
        'id_usuario' => $encontrados['id_usuario'] ); 

}
}



?>

<?php 
//================================================================================================
// Consultamos los motoristas registrados


$query = mysqli_query($conexion,"SELECT * FROM motorista"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$motoristas_registrados[]= array(
        'id_motorista' => $encontrados['id_motorista'],  
        'telefono_motorista' => $encontrados['telefono_motorista'],
        'placa_motorista' => $encontrados['placa_motorista'],    
        
         'nombre_motorista' => $encontrados['nombre_motorista']); 


}
}



?>

<?php 
//================================================================================================
// Consultamos los motoristas y obtenes el ID para editar 

if(isset($_GET['id_motorista']))
{
$id_motorista=$_GET['id_motorista'];


$query = mysqli_query($conexion,"SELECT * FROM motorista WHERE id_motorista=$id_motorista"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 

$id_motorista=$data['id_motorista'];
$placa_motorista=$data['placa_motorista'];
$nombre_motorista=$data['nombre_motorista'];
$telefono_motorista=$data['telefono_motorista'];


}
}
}


?>

<?php 
//================================================================================================
// Consultamos los PEDIDOS EXPRESS REGISTRADOS HOY

date_default_timezone_set('America/Guatemala');

$fecha_hoy=date('Y/m/d');

$query = mysqli_query($conexion,"SELECT p.id_pedido,p.id_venta,p.fecha_pedido,p.hora_pedido,p.id_motorista,p.direccion_entrega,p.persona_receptor,p.telefono_receptor,p.id_usuario,m.id_motorista,m.nombre_motorista,m.placa_motorista,u.id_usuario,u.usuario FROM pedido_express p INNER JOIN motorista m ON p.id_motorista=m.id_motorista INNER JOIN usuario u ON p.id_usuario=u.id_usuario WHERE fecha_pedido='$fecha_hoy' ORDER BY hora_pedido DESC"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$pedidos_hoy[]= array(
          'id_pedido' => $encontrados['id_pedido'], 
        'id_motorista' => $encontrados['id_motorista'], 
        'placa_motorista' => $encontrados['placa_motorista'],  
        'nombre_motorista' => $encontrados['nombre_motorista'],
        'fecha_pedido' => $encontrados['fecha_pedido'], 
         'hora_pedido' => $encontrados['hora_pedido'], 
          'direccion_entrega' => $encontrados['direccion_entrega'],
           'persona_receptor' => $encontrados['persona_receptor'],
            'telefono_receptor' => $encontrados['telefono_receptor'],
             'usuario' => $encontrados['usuario'], 
        
         'nombre_motorista' => $encontrados['nombre_motorista']); 






}
}


?>

<?php 
//================================================================================================
// Consultamos los PEDIDOS EXPRESS REGISTRADOS de fecha inicio a fecha final

if(isset($_POST['visualizar_pedidos']))
{

$fecha_inicio=$_POST['fecha_inicio'];
$fecha_final=$_POST['fecha_final'];

$query = mysqli_query($conexion,"SELECT p.id_pedido,p.id_venta,p.fecha_pedido,p.hora_pedido,p.id_motorista,p.direccion_entrega,p.persona_receptor,p.telefono_receptor,p.id_usuario,m.id_motorista,m.nombre_motorista,m.placa_motorista,u.id_usuario,u.usuario FROM pedido_express p INNER JOIN motorista m ON p.id_motorista=m.id_motorista INNER JOIN usuario u ON p.id_usuario=u.id_usuario WHERE fecha_pedido>='$fecha_inicio' and fecha_pedido<='$fecha_final' ORDER BY hora_pedido DESC"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$pedidos_registrados[]= array(
          'id_pedido' => $encontrados['id_pedido'], 
        'id_motorista' => $encontrados['id_motorista'], 
        'placa_motorista' => $encontrados['placa_motorista'],  
        'nombre_motorista' => $encontrados['nombre_motorista'],
        'fecha_pedido' => $encontrados['fecha_pedido'], 
         'hora_pedido' => $encontrados['hora_pedido'], 
          'direccion_entrega' => $encontrados['direccion_entrega'],
           'persona_receptor' => $encontrados['persona_receptor'],
            'telefono_receptor' => $encontrados['telefono_receptor'],
             'usuario' => $encontrados['usuario'], 
        
         'nombre_motorista' => $encontrados['nombre_motorista']); 



}


}
}


?>



<?php 
//================================================================================================
// Enlistamos los vendedores para colocar su record en el card


$query = mysqli_query($conexion,"SELECT * FROM mi_personal WHERE puesto_personal='Vendedor'"); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$personal_vendedor[]= array(
          'id_personal' => $encontrados['id_personal'], 
        'nombre_personal' => $encontrados['nombre_personal'], 
        'puesto_personal' => $encontrados['puesto_personal'],  
        'dpi_personal' => $encontrados['dpi_personal']); 

}
}



?>


<?php
// OBTENEMOS LA CANTIDAD DE USUARIOS REGISTRADOS
//================================================================================================

$query= mysqli_query($conexion,"SELECT * FROM usuario");


$contar_usuarios = mysqli_num_rows($query);
                     


?>



<?php
// OBTENEMOS LA CANTIDAD DE CLIENTES REGISTRADOS
//================================================================================================

$query= mysqli_query($conexion,"SELECT * FROM pacientes");


$contar_pacientes = mysqli_num_rows($query);
                     

?>

<?php
// OBTENEMOS LA CANTIDAD DE CLIENTES REGISTRADOS
//================================================================================================

$query= mysqli_query($conexion,"SELECT * FROM productos");


$contar_productos = mysqli_num_rows($query);
                     

?>


<?php
// OBTENEMOS LA CANTIDAD DE CLIENTES REGISTRADOS
//================================================================================================

$query= mysqli_query($conexion,"SELECT * FROM ventas_creadas WHERE estado_venta=1");

$contar_ventas=0;
$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 
$contar_ventas=$contar_ventas+1;
              
    }
}
                     


?>

<?php
// OBTENEMOS LA CANTIDAD DE CLIENTES REGISTRADOS
//================================================================================================

$query= mysqli_query($conexion,"SELECT * FROM local WHERE estado_local=0");


$contar_locales=0;
$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 
$contar_locales=$contar_locales+1;
              
    }
}

?>

<?php
// OBTENEMOS LA CANTIDAD DE CLIENTES REGISTRADOS
//================================================================================================

$query= mysqli_query($conexion,"SELECT * FROM pedido_express");


$contar_pedidos=0;
$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 
$contar_pedidos=$contar_pedidos+1;
              
    }
}
                     


?>


<?php

if(isset($_GET['id_venta']))
{
$id_venta=$_GET['id_venta'];

$query = mysqli_query($conexion,"SELECT d.id_detalle,d.cantidad_producto,d.nombre_producto,d.precio_venta,d.subtotal_venta,d.id_producto,d.id_caja,c.id_caja, c.nombre_caja, p.id_producto,p.stock_local FROM detalle_ventas d INNER JOIN productos p ON p.id_producto=d.id_producto INNER JOIN caja c ON d.id_caja=c.id_caja WHERE id_venta=$id_venta"); 


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados= mysqli_fetch_assoc($query)) { 
$detalles_devolucion[]= array(

 'stock_local' => $encontrados['stock_local'],
   'id_producto' => $encontrados['id_producto'],
    'id_caja' => $encontrados['id_caja'],
    'nombre_caja' => $encontrados['nombre_caja'],
        'cantidad_producto' => $encontrados['cantidad_producto'],
        
         'nombre_producto' => $encontrados['nombre_producto'],
      
        'precio_venta' => $encontrados['precio_venta'], 

        'id_detalle' => $encontrados['id_detalle'],

        'subtotal_venta' => $encontrados['subtotal_venta']); 

}
}
}


  ?>