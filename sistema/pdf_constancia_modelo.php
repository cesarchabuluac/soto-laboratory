
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





th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background:  #0b438a;color: gray ;
  border-color:  #0b438a ;border-width: 0px;
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

<table width="100%" border="0" style="border-collapse: collapse;">
  <tr><td></td></tr>
</table>

<?php   //DATOS DEL paciente
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.edad_paciente,p.id_usuario, p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales_cargado,exc.fecha_cargado,exc.hora_cargado FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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
                'edad_paciente' => $encontrados['edad_paciente'],

                'id_examen_creado' => $encontrados['id_examen_creado'],
                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                        'observaciones_generales_cargado' => $encontrados['observaciones_generales_cargado'],

                              'usuario' => $encontrados['usuario'],




        
       
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

  $observaciones_generales_cargado=$paciente_encontrado['observaciones_generales_cargado'];
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

$query = mysqli_query($conexion,"SELECT d.id_detalle_examen,d.id_examen_creado,d.resultado,d.id_area,d.id_paciente,d.descripcion,d.estado_detalle,e.id_examen,e.nombre_examen,e.valor_referencia,e.valor_referencia2,e.nombre_nomenclatura,e.subarea,e.codigo_examen FROM detalle_examenes d INNER JOIN examenes e ON d.id_examen=e.id_examen  WHERE d.id_examen_creado=$id_examen_creado ORDER by e.nombre_examen desc"); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_agregados[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],

        'id_examen' => $encontrados['id_examen'],
                'codigo_examen' => $encontrados['codigo_examen'],

         'nombre_examen' => $encontrados['nombre_examen'],

        'id_area' => $encontrados['id_area'],
                'valor_referencia' => $encontrados['valor_referencia'],
                                'valor_referencia2' => $encontrados['valor_referencia2'],

                 'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],
                'descripcion' => $encontrados['descripcion'],
                                'estado_detalle' => $encontrados['estado_detalle'],



        'resultado' => $encontrados['resultado'] ) ;

}

}


   








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






<table width="100%" border="0" style="border-collapse: collapse;">
  <thead>
<tr>
<th bgcolor="    #0c6de8 "  style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">#</th>
  
<th bgcolor="    #0c6de8 "  style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Prueba</th>
<th bgcolor="  #0c6de8  " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Resultado</th>
<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Valor de Referencia</th>


<?php
$texto_observaciones=0;
// si existe la descripción activar columna de lo contrario ocultar
foreach ($examenes_agregados as $agregado) {

$descripcion=$agregado['descripcion'];
if($descripcion!="")
{
$texto_observaciones=$texto_observaciones+1;  // si hay más de una observación entonces crear la columna
}
  }
?>

<?php

if($texto_observaciones==0)
{

}
else
{

 ?>



<th bgcolor="   #0c6de8   " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Observaciones</th>
<?php } ?>

</tr>
</thead>
<tbody style="text-align:center;" >
    <?php
    $fila=0;
 foreach ($examenes_agregados as $agregado) {
if($agregado['codigo_examen']==501||$agregado['codigo_examen']==301||$agregado['codigo_examen']==601||$agregado['codigo_examen']==801)
    // si es el código 501,301,601,801 de ORINA entonces ya no mostrar.
{
}
else
{
  ?>
  
<tr>
  <td style="font-size: 13px;font-family: sans-serif;text-align: center;padding: 4px"><?php echo $fila=$fila+1;  ?>
    
<?php 
if($agregado['codigo_examen']==779)
{
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
}
?>


  </td>
      <td style="font-size: 13px;font-family: sans-serif;text-align: center;"><?php echo $agregado['nombre_examen'] ?>
        
<?php 
if($agregado['codigo_examen']==779)
{
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
}
?>




      </td>



<?php

  if($agregado['resultado']>$agregado['valor_referencia'] and $agregado['resultado']<$agregado['valor_referencia2']  )  // si el resultado es  mayor o menor entonces
 
{
$color="Black";
}
else
{
$color="black";//red

}

if (is_numeric($agregado['valor_referencia']))
 {

 }
 else
 {
  $color="Black";

 }

?>

<?php   if($agregado['resultado']==$agregado['valor_referencia'] || $agregado['resultado']==$agregado['valor_referencia2']  )  // si el resultado es  mayor o menor entonces
 
{
$color="black";
}





?>
  
      <td style="font-size: 13px;font-family: sans-serif;text-align: center;color: <?php  echo $color?>;padding-top: 10px;"><?php echo $agregado['resultado']." ".$agregado['nombre_nomenclatura'] ?>
        
<?php 
if($agregado['codigo_examen']==779)
{
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
}
?>
      </td>



      <td style="font-size: 13px;font-family: sans-serif;text-align: center;">


<?php 
//===============================================================================================================================
// ESTA RAFERENCIA SE AGREGÓ EL 28 DE FEBRERO 2023 PARA NOMENCLATURA, 

if($agregado['codigo_examen']==783)// código específico para ESTRADIOL EN HORMONOAS
{
?>


<table width="100%" style="border:1px;border-color: #96D4D4;border-collapse:collapse" border=1>

<tbody style="text-align: center;font-size: 10px;">
  <tr><td colspan=2 style="text-align:left">&nbsp;&nbsp;&nbsp; Hombre</td></td><td> < 75 </td><td>pg/mL</td></tr>
  
<tr><td rowspan=7>Mujeres</td><td>Fase folicular</td><td> 24-200 </td><td>pg/mL</td></tr>
<tr><td>Fase ovulatoria</td><td> 60-400 </td><td>pg/mL</td></tr>
<tr><td>Fase lútea</td><td> 40-260 </td><td>pg/mL</td></tr>
<tr><td>Primer trimestre</td><td>780-3000 </td><td>pg/mL</td></tr>
<tr><td>Segundo trimestre</td><td>2700-13600</td><td>pg/mL</td></tr>
<tr><td>Tercer trimestre</td><td>14000-21000</td><td>pg/mL</td></tr>
<tr><td>Menopausia</td><td> < 60</td><td>pg/mL</td></tr>
</tbody>

</table>
<?php

} //FIN DEL CÓDIGO 783
//======================================================================================================================

?>


<?php 
//===============================================================================================================================
// ESTA RAFERENCIA SE AGREGÓ EL 28 DE FEBRERO 2023 PARA NOMENCLATURA, 

if($agregado['codigo_examen']==784)// código específico para ESTRADIOL EN HORMONOAS
{
?>


<table width="100%" style="border:1px;border-color: #96D4D4;border-collapse:collapse" border=1>

<tbody style="text-align: center;font-size: 10px;">
  <tr><td colspan=2 style="text-align:left">&nbsp;&nbsp;&nbsp; Hombre</td></td><td> 1.5--12.4 </td><td>mIU/mL</td></tr>
  
<tr><td rowspan=4>Mujeres</td><td>Fase folicular</td><td>4.4--13.4 </td><td>mIU/mL</td></tr>
<tr><td>Fase ovulatoria</td><td> 4.8--20.9 </td><td>mIU/mL</td></tr>
<tr><td>Fase lútea</td><td> 1.9--8.0 </td><td>mIU/mL</td></tr>
<tr><td>Menopausia</td><td>20.0--98.6</td><td>mIU/mL</td></tr>
</tbody>

</table>
<?php

} //FIN DEL CÓDIGO 784
//======================================================================================================================

?>



<?php 
//===============================================================================================================================
// ESTA RAFERENCIA SE AGREGÓ EL 28 DE FEBRERO 2023 PARA NOMENCLATURA, 

if($agregado['codigo_examen']==785)// código específico para ESTRADIOL EN HORMONOAS
{
?>


<table width="100%" style="border:1px;border-color: #96D4D4;border-collapse:collapse" border=1>

<tbody style="text-align: center;font-size: 10px;">
  <tr><td colspan=2 style="text-align:left">&nbsp;&nbsp;&nbsp; Hombre</td></td><td> 2--12 </td><td>mIU/mL</td></tr>
  
<tr><td rowspan=4>Mujeres</td><td>Fase folicular</td><td>2--15 </td><td>mIU/mL</td></tr>
<tr><td>Fase ovulatoria</td><td> 20--105 </td><td>mIU/mL</td></tr>
<tr><td>Fase lútea</td><td> 0.6--19</td><td>mIU/mL</td></tr>
<tr><td>Post Menopausia</td><td>16--64</td><td>mIU/mL</td></tr>
</tbody>

</table>
<?php

} //FIN DEL CÓDIGO 785
//======================================================================================================================

?>


<?php 

if($agregado['codigo_examen']==779)
{
?>


<table width="100%">
  <thead>
    <tr>



      <th style="font-size:10px;text-align: center;background: white;color: black;">Mujeres Embarazadas (Semana de Amenorrea)</th><th style="font-size:10px;text-align: center;background: white;color: black;">Nivel de B-HCG Total (mlU/ml)</th></tr>
  </thead>
<tbody style="text-align: center;font-size: 10px;">
  <tr><td></td><td>Rango</td></tr>
    <tr><td>3</td><td>5-50</td></tr>
    <tr><td>4</td><td>5-426</td></tr>
    <tr><td>5</td><td>18-7,340</td></tr>
    <tr><td>6</td><td>1,080-56,500</td></tr>
    <tr><td>7-8</td><td>7,650-229,000</td></tr>
    <tr><td>9-12</td><td>25,700-288,000</td></tr>
    <tr><td>13-16</td><td>13,300-254,000</td></tr>
    <tr><td>17-24</td><td>4,060-165,400</td></tr>
    <tr><td>25-40</td><td>3,640-117,000</td></tr>

</tbody>

</table>
<?php

}

else
{
    if($agregado['codigo_examen']!=783 and $agregado['codigo_examen']!=779 and $agregado['codigo_examen']!=784 and $agregado['codigo_examen']!=785)
{
?>

        <?php echo $agregado['valor_referencia']." - ". $agregado['valor_referencia2']." ".$agregado['nombre_nomenclatura'] ?></td>

<?php
}
}
?>


<?php 

// si existe la descripción activar campo de lo contrario ocultar

if($agregado['descripcion']=="")
{

}
else
{

 ?>

      <td style="font-size: 13px;font-family: sans-serif;text-align: center;"><?php echo $agregado['descripcion'] ?></td>
  <?php 
   }

}

}// FIN IF
   ?>
</tr>
                
                </tbody>


<style type="text/css">
  
td.pie_table{
   border:none;
}



table td {

  text-align: center;

  /* Alto de las celdas */
  height: 5px;
  font-size: 10px;
}

</style>          



  <tfoot style="text-align:center;">
    
            </tfoot>




</table>
   <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones_generales_cargado ?></strong>

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
