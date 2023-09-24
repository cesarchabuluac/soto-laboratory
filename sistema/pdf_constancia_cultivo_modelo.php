
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
<br>
<div class="cuadro4">
<!-- DATOS DE LA EMPRESA-->
  <center>
      </br>Químico Biólgo: Luis Alonso García Yas
              <br>Col. 5,130

</center>
  
</div>

<?php   //DATOS DEL paciente
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.edad_paciente,p.correo_paciente,p.id_usuario, p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.fecha_cargado,exc.hora_cargado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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

 'fecha_cargado' => $encontrados['fecha_cargado'],
                'hora_cargado' => $encontrados['hora_cargado'],

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

   $fecha_cargado=$paciente_encontrado['fecha_cargado'];
   $hora_cargado=$paciente_encontrado['hora_cargado'];
   $edad_paciente=$paciente_encontrado['edad_paciente'];

 $nombre_paciente=$paciente_encontrado['nombre_paciente'];
 $dpi_paciente=$paciente_encontrado['dpi_paciente'];
 $fecha_nacimiento_paciente=$paciente_encontrado['fecha_nacimiento_paciente'];
 $id_examen_creado=$paciente_encontrado['id_examen_creado'];
  $usuario=$paciente_encontrado['usuario'];
  $id_usuario_tecnico=$paciente_encontrado['id_usuario_tecnico'];

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
$mi_fecha = $fecha_cargado;
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

<?php 




$query = mysqli_query($conexion, "SELECT  c.id_examen_cultivo,c.id_antibiotico,c.resistente,c.intermedio,c.sensible,a.id_antibiotico,a.nombre_antibiotico FROM detalles_cultivo c INNER JOIN antibioticos a ON c.id_antibiotico=a.id_antibiotico WHERE id_examen_creado=$id_examen_creado  ORDER BY id_examen_cultivo");
                                               
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $detalles_cultivos[]= array(
        'id_examen_cultivo' => $encontrados['id_examen_cultivo'],
        'id_antibiotico' => $encontrados['id_antibiotico'],
                'nombre_antibiotico' => $encontrados['nombre_antibiotico'],

         'resistente' => $encontrados['resistente'],
              'intermedio' => $encontrados['intermedio'],
         'sensible' => $encontrados['sensible']

          );    
        

        
    }


?>



<?php



$query = mysqli_query($conexion, "SELECT * FROM detalles_cultivo WHERE id_examen_creado=id_examen_creado");
                                               
while ($data = mysqli_fetch_assoc($query)) { 

//obtenemos la muestra y microorganismo
        $muestra=$data['muestra'];
        $microorganismo=$data['microorganismo'];

     $observaciones=$data['observaciones'];
        
    }
    $muestra;
    $microorganismo;
    $observaciones;



?>


<div class="caja">
<?php echo "Usuario:".$usuario. " ".$hora_cargado ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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



<?php
$f2=0;
foreach ($detalles_cultivos as $encontrados) {
 if($encontrados['resistente']=="" and $encontrados['intermedio']=="" and $encontrados['sensible']=="")
{

}
else
{
 $f2=$f2+1;
}
//contamos cuantos espacios para el rowspan
}
    ?>
    <!-- ESTILO DE LOS TD INDIVIDUALES-->
<style type="text/css">
  #uno{
border: solid 1px black;
}  

</style>

<table width="100%" border="1" style="border-collapse: collapse;">
 
<tr><td>

<table width="100%" border="0" style="border-collapse: collapse;">
<tr><td><b>Prueba:</b></td><td colspan="4"><b>Resultado</b></td></td></tr>
<tr><td>Muestra:</td><td colspan="4" style="text-align:left"><?php echo $muestra ?></td></tr>
    <tr><td>Microorganismo:</td><td colspan="4" style="text-align:left"><?php echo $microorganismo ?></td></tr>


<tr><td rowspan="<?php echo $f2+1 ?>">ANTIBIOGRAMA</td><td style="background: #0e80d9;color:white">Antibiótico</td><td style="background: #0e80d9;color:white">Resistente</td><td style="background: #0e80d9;color:white">Intermedio</td><td style="background: #0e80d9;color:white">Sensible</td></tr>

<?php

$f=0;
foreach ($detalles_cultivos as $encontrados) {
 
 $f=$f+1;

    ?>

  <?php 
if($encontrados['resistente']=="" and $encontrados['intermedio']=="" and $encontrados['sensible']=="")
{
}
else
{
  ?>  
 <tr><td id="uno"><?php echo $encontrados['nombre_antibiotico']?></td><td><?php echo $encontrados['resistente']?></td><td><?php echo $encontrados['intermedio']?></td><td><?php echo $encontrados['sensible']?></td></tr>
<?php
}
}
?>



</table>

<br>

</td></tr>
</table>
   <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones ?></strong>







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




</body>
</html>
