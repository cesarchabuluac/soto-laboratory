
<?php include_once "datos_empresa.php";?>

    <?php include "../conexion.php"; //ubiación de la conexión?> 

    <?php $id_examen_creado=$_GET['id_examen_creado']; ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

     <link rel="stylesheet" href="https://labsoto.com/sistema/css/estilo_factura.css" type="text/css" media="all">
</head>
<style>
  @page {
    margin-left: 1.5cm;
    margin-right: 1.5cm;
  }
</style>
<body>

<style type="text/css">





th{     font-size: 13px;     font-weight: normal;     padding: 8px;      ;
  border-color:  white ;border-width: 1px;
    }

</style>



<div class="imagen">
<img src="img/logoj.jpg" width="200" height="75">
</div>
<div class="cuadro">

<h1>
<!-- DATOS DE LA EMPRESA-->
<?php echo $nombre_empresa?></h1>
</div>      


<div class="cuadro2">
<!-- DATOS DE LA EMPRESA-->
       
        <h3><?php echo $direccion_empresa?></h3>
       
</div>

<div class="cuadro3">
<!-- DATOS DE LA EMPRESA-->
      
        <h3>Teléfono:<?php echo $telefono_empresa?></h3>
        
</div>

<div class="cuadro4">
<!-- DATOS DE LA EMPRESA-->
  
        <h3 class="separador">Email:<?php echo $correo_empresa?></h3>
  
</div>


<?php   //DATOS DEL paciente
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.edad_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario, p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $pacientes[]= array(
        'id_paciente' => $encontrados['id_paciente'],
                'codigo_unico_paciente' => $encontrados['codigo_unico_paciente'],

        'nombre_paciente' => $encontrados['nombre_paciente'],
         'dpi_paciente' => $encontrados['dpi_paciente'],
         'id_genero' => $encontrados['id_genero'],
          'nombre_genero' => $encontrados['nombre_genero'],

      
                'fecha_creado' => $encontrados['fecha_creado'],
                'hora_creado' => $encontrados['hora_creado'],
                'id_examen_creado' => $encontrados['id_examen_creado'],
                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                        'observaciones_generales' => $encontrados['observaciones_generales'],

                              'usuario' => $encontrados['usuario'],




                'edad_paciente' => $encontrados['edad_paciente'],
        
       
        'telefono_paciente' => $encontrados['telefono_paciente'],
        'correo_paciente' => $encontrados['correo_paciente'],
        'direccion_paciente' => $encontrados['direccion_paciente'],

        'fecha_nacimiento_paciente' => $encontrados['fecha_nacimiento_paciente'],
         'usuario' => $encontrados['usuario']

      );
   
              
    }
}

//DATOS DEL PACIENTE SEGÚN EL FORMULARIO CREADO Y EXÁMENES AGREGADOS

foreach ($pacientes as $paciente_encontrado) {
 
  $fecha_creado=$paciente_encontrado['fecha_creado'];
   $hora_creado=$paciente_encontrado['hora_creado'];

 $nombre_paciente=$paciente_encontrado['nombre_paciente'];
 $dpi_paciente=$paciente_encontrado['dpi_paciente'];
 $fecha_nacimiento_paciente=$paciente_encontrado['fecha_nacimiento_paciente'];
 $id_examen_creado=$paciente_encontrado['id_examen_creado'];
  $usuario=$paciente_encontrado['usuario'];
  $id_usuario_tecnico=$paciente_encontrado['id_usuario_tecnico'];
$edad_paciente=$$paciente_encontrado['edad_paciente'];

  $observaciones_generales=$paciente_encontrado['observaciones_generales'];
  $codigo_unico_paciente=$paciente_encontrado['codigo_unico_paciente'];

}


// OBTENEMOS EL nombre del técnico por medio del id_usuario_tecnico
//================================================================================================

$query_tec = mysqli_query($conexion,"SELECT * FROM usuario WHERE id_usuario=$id_usuario_tecnico");


$result = mysqli_num_rows($query_tec);
                        if ($result > 0) {
while ($data_tec = mysqli_fetch_assoc($query_tec)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $id_usuario=$data_tec['id_usuario'];

                $nombre_tecnico=$data_tec['usuario']; //usuario registrado como técnico

              
    }
}


?>
<?php
 $fecha_nacimiento_paciente;

//EDAD DEL PACIENTE
$fecha_nacimiento = new DateTime($fecha_nacimiento_paciente);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento);
$edad->y;  


//fecha a español
setlocale(LC_TIME, "spanish");
$mi_fecha = $fecha_creado;
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
$fecha_esp = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));
  ?>



<?php

//================================================================================================

// OBTENER pruebas agregados del paciente

$id_examen_creado;

$query = mysqli_query($conexion,"SELECT d.id_detalle_examen,d.id_examen_creado,d.resultado,d.id_area,d.id_paciente,d.descripcion,d.estado_detalle,e.id_examen,e.nombre_examen,e.valor_referencia,e.nombre_nomenclatura,e.subarea FROM detalle_examenes d INNER JOIN examenes e ON d.id_examen=e.id_examen  WHERE d.id_examen_creado=$id_examen_creado"); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_agregados[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],

        'id_examen' => $encontrados['id_examen'],
         'nombre_examen' => $encontrados['nombre_examen'],

        'id_area' => $encontrados['id_area'],
                'valor_referencia' => $encontrados['valor_referencia'],
                 'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],
                'descripcion' => $encontrados['descripcion'],
                                'estado_detalle' => $encontrados['estado_detalle'],



        'resultado' => $encontrados['resultado'] ) ;

}

}


   








?>



<div class="caja">
<?php echo "Usuario:".$usuario. " ".$hora_creado ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>





<table width="100%">

<tr><td style="font-size: 12px;font-family: sans-serif;text-align: left;"><b>Nombre:</b><?php echo $nombre_paciente?></td><td style="font-size: 12px;font-family: sans-serif;"><b>DPI:</b><?php echo $dpi_paciente ?></td>

</tr>
<tr><td style="font-size: 12px;font-family: sans-serif;text-align: left;"><b>Edad:</b><?php

if($fecha_nacimiento_paciente===0||$fecha_nacimiento_paciente=="0000-00-00")
{


  echo $edad_paciente?></td><td style="font-size: 12px;font-family: sans-serif;">

<?php
}

else
{

  echo $edad->y." Años";}?></td><td style="font-size: 12px;font-family: sans-serif;"><b>Fecha:</b><?php echo $fecha_esp?></td><td style="font-size: 12px;font-family: sans-serif;">


</td></tr>
</table>





<table width="100%" border="1" style="border-collapse: collapse;">
  <thead>
<tr>

  
<th bgcolor="    #0c6de8 "  style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Prueba: Heces Completo</th>
<th bgcolor="  #0c6de8  " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Resultado</th>
<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Dimensional</th>

<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Valor Referencia</th>

</tr>
</thead>
<tbody" >
   
<tr>
    <td><b>Macroscópico<b></td><td><td></td><td></td></tr>
<tr>
<td>color</td><td><td>- - -</td><td>Café</td></tr>

</tr>

<tr><td>Consistencia</td><td></td><td>- - -</td><td>Pastoso/Formado</td></tr>
<tr><td>Ph</td><td></td><td>- - -</td><td>6.-7</td></tr>

<tr>
<td>Sangre</td><td></td><td>- - -</td><td>No se observó</td></tr>
<tr><td>Moco</td><td></td><td>- - -</td><td>No se observó</td></tr>


<tr><td>Restos Alimenticios</td><td></td><td> - - -</td><td>Escasos / +</td></tr>

<tr>
    <td><b>Microscópico<b></td><td><td></td><td></td></tr>


<tr><td>Células Vegetales</td><td></td><td>- - -</td><td>Escasos / +</td></tr>

<tr><td>Almidones</td><td></td><td>- - -</td><td>Escasos / +</td></tr>
<tr><td></td><td></td><td></td><td></td></tr>

<tr><td>Jabones</td><td></td><td> - - -</td><td>Escasos / +</td></tr>
<tr><td>Grasas</td><td></td><td> - - </td><td>Escasos / +</td></tr>
<tr><td>Levaduras</td><td></td><td> - - </td><td>Escasos / +</td></tr>
<tr><td>Leucocitos</td><td></td><td>- - - </td><td>No se observaron</td></tr>
<tr><td>Eritrocitos</td><td></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Parásitos</td><td></td><td>- - -</td><td>No se observaron</td></tr>
                
                </tbody>


<style type="text/css">
  
td.pie_table{
   border:none;
}



table td {

  text-align: center;

  /* Alto de las celdas */
  height: 4px;
  font-size: 12px;
  font-family: sans-serif;
}

</style>          



  <tfoot style="text-align:center;">
    
            </tfoot>




</table>



        <br>
           <br>
            <br>
           <br>
            <br>
           <br>

           <table style="text-align:center;font-family: sans-serif;" width="100%">
            <tbody">
               <tr><td style="font-size:15px">Técnico:__________________________________</td></tr>
                <tr><td style="font-size:15px"><?php  echo $nombre_tecnico?></td></tr>
</tbody>
           </table>

   <br>
<br>

   <strong style="font-family:monospace;font-size: 13px;">Cód.Paciente:<?php  echo $codigo_unico_paciente ?></strong>
<br>
   <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones_generales ?></strong>



</body>
</html>
