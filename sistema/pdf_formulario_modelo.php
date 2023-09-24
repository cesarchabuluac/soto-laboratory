


<?php include_once "datos_empresa.php";?>

    <?php include "../conexion.php"; //ubiación de la conexión?> 

    <?php $id_examen_creado=$_GET['id_examen_creado']; 


//CONSULTA EXÁMEN DE ORINA
$query_orina = mysqli_query($conexion,"SELECT o.id_examen,e.id_examen,e.codigo_examen FROM detalles_orina o INNER JOIN examenes e ON o.id_examen=e.id_examen WHERE id_examen_creado=$id_examen_creado"); 


$result = mysqli_num_rows($query_orina);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_orina)) { 

 $examen_orina[]= array(
        'codigo_examen' => $data['codigo_examen']);
}

}

if(isset($examen_orina))
{
foreach ($examen_orina as $orina) {
$codigo_examen=$orina['codigo_examen'];
}
}

//CONSULTA EXÁMEN DE HECES
$query_heces = mysqli_query($conexion,"SELECT d.id_examen,e.id_examen,e.codigo_examen FROM detalles_heces d INNER JOIN examenes e ON d.id_examen=e.id_examen WHERE id_examen_creado=$id_examen_creado"); 


$result_2 = mysqli_num_rows($query_heces);
                        if ($result_2 > 0) {
while ($data_2 = mysqli_fetch_assoc($query_heces)) { 

 $examen_heces[]= array(
        'codigo_examen' => $data_2['codigo_examen']);
}

}
if(isset($examen_heces))
{
foreach ($examen_heces as $heces) {
$codigo_examen_2=$heces['codigo_examen'];
}
}

?>
<!-- SI SE QUITA EL ECHO NO FUNCIONA, POR LO TANTO SE AGREGO ECHO con strong de 0 pixeles-->
<strong style="font-size:0px">
<?php echo $codigo_examen_2;?></strong>




<?php

//CONSULTA EXÁMEN DE hematología
$query_hematologia= mysqli_query($conexion,"SELECT h.id_examen,e.id_examen,e.codigo_examen FROM detalle_examenes_hematologia h INNER JOIN examenes e ON h.id_examen=e.id_examen WHERE id_examen_creado=$id_examen_creado"); 


$result_3 = mysqli_num_rows($query_hematologia);
                        if ($result_3 > 0) {
while ($data_3 = mysqli_fetch_assoc($query_hematologia)) { 

 $examen_hematologia[]= array(
        'codigo_examen' => $data_3['codigo_examen']);
}

}
if(isset($examen_hematologia))
{
foreach ($examen_hematologia as $hematologia) {
$codigo_examen_3=$hematologia['codigo_examen'];
}
}

?>



<?php

//CONSULTA EXÁMEN DE cultivo Microbiología
$query_microbiologia= mysqli_query($conexion,"SELECT c.id_examen,e.id_examen,e.codigo_examen FROM examen_cultivo c INNER JOIN examenes e ON c.id_examen=e.id_examen WHERE id_examen_creado=$id_examen_creado"); 


$result_4 = mysqli_num_rows($query_microbiologia);
                        if ($result_4 > 0) {
while ($data_4 = mysqli_fetch_assoc($query_microbiologia)) { 

 $examen_microbiologia[]= array(
        'codigo_examen' => $data_4['codigo_examen']);
}

}
if(isset($examen_microbiologia))
{
foreach ($examen_microbiologia as $microbiologia) {
$codigo_examen_4=$microbiologia['codigo_examen'];
}
}

?>


 

 <?php 
 
 if(isset($codigo_examen))
 {
if($codigo_examen==501)  //CÓDIGO DE ORINA
 {

  

 ?>   


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

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
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario,p.edad_paciente, p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.fecha_cargado,exc.hora_cargado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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

                      'edad_paciente' => $encontrados['edad_paciente'],

                'fecha_creado' => $encontrados['fecha_creado'],
                'hora_creado' => $encontrados['hora_creado'],

       'fecha_cargado' => $encontrados['fecha_cargado'],
                'hora_cargado' => $encontrados['hora_cargado'],

                'id_examen_creado' => $encontrados['id_examen_creado'],
                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                        'observaciones_generales' => $encontrados['observaciones_generales'],

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

    $edad_paciente=$paciente_encontrado['edad_paciente'];


    $fecha_cargado=$paciente_encontrado['fecha_cargado'];
   $hora_cargado=$paciente_encontrado['hora_cargado'];

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
$query = mysqli_query($conexion,"SELECT * FROM detalles_orina WHERE id_examen_creado=id_examen_creado "); 




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


//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}
?>

<?php

foreach ($examenes_orina_detalles as $orina_detalles) {

 $color=$orina_detalles['color'];
 $aspecto=$orina_detalles['aspecto'];
 $sangre=$orina_detalles['sangre'];
 $bilirrubina=$orina_detalles['bilirrubina'];
 $urobilinogeno=$orina_detalles['urobilinogeno'];
 $cetonas=$orina_detalles['cetonas'];
 $glucosa=$orina_detalles['glucosa'];
 $proteinas=$orina_detalles['proteinas'];
 $nitritos=$orina_detalles['nitritos'];
 $leucocitos=$orina_detalles['leucocitos'];
 $ph=$orina_detalles['ph'];
 $densidad=$orina_detalles['densidad'];
 $celulas_epiteliales=$orina_detalles['celulas_epiteliales'];
 $leucocitos_2=$orina_detalles['leucocitos_2'];
  $eritrocitos=$orina_detalles['eritrocitos'];
  $moco=$orina_detalles['moco'];
  $cristales=$orina_detalles['cristales'];
   $cilindros=$orina_detalles['cilindros'];
    $bacterias=$orina_detalles['bacterias'];
     $levaduras=$orina_detalles['levaduras'];
      $parasitos=$orina_detalles['parasitos'];
            $observaciones=$orina_detalles['observaciones'];




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

<!-- estilo de borde al td del resultado-->
<style type="text/css">
    
  #uno{
border: solid 1px black;
}  
</style>

<table border="1" width="100%">
<tr><td>
<table width="100%" style="border-collapse: collapse;">
  <thead>
<tr>

  
<th bgcolor="    #0c6de8 "  style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Prueba: Orina Completa</th>
<th bgcolor="  #0c6de8  " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Resultado</th>
<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Dimensional</th>

<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Valor Referencia</th>

</tr>
</thead>
<tbody" >
   
<tr>
<td style="font-size:14px"><b>Macroscópico</b></td><td></td><td></td><td></td></tr>

</tr>

<tr><td>Color</td><td id="uno"><?php echo $color ?></td><td>- - -</td><td>Amarillo</td></tr>
<tr><td>Aspecto</td><td id="uno"><?php echo $aspecto ?></td><td>- - -</td><td>Limpido</td></tr>

<tr>
<td style="font-size:14px"><b>Químico</b></td><td></td><td></td><td></td></tr>

<tr><td>Sangre</td><td id="uno"><?php echo $sangre ?></td><td>- - -</td><td>Negativo</td></tr>
<tr><td>Bilirrubina</td><td id="uno"><?php echo $bilirrubina ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Urobilinógeno</td><td id="uno"><?php echo $urobilinogeno ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Cetonas</td><td id="uno"><?php echo $cetonas ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Glucosa</td><td id="uno"><?php echo $glucosa ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Protenias</td><td id="uno"><?php echo $proteinas ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Nitritos</td><td id="uno"><?php echo $nitritos ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Leucocitos</td><td id="uno"><?php echo $leucocitos ?></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Ph</td><td id="uno"><?php echo $ph ?></td><td>- - -</td><td>6 - 7</td></tr>
<tr><td>Densidad</td><td id="uno"><?php echo $densidad ?></td><td>- -</td><td>1.010 - 1.025</td></tr>


<tr>
<td style="font-size:14px"><b>Microscópico</b></td><td></td><td></td><td></td></tr>
<tr><td>Células Epiteliales</td><td id="uno"><?php echo $celulas_epiteliales ?></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Leucocitos</td><td id="uno"><?php echo $leucocitos_2 ?></td><td>/campo</td><td>No se observaron</td></tr>
<tr><td>Eritrocitos</td><td id="uno"><?php echo $eritrocitos ?></td><td>/campo</td><td>No se observaron</td></tr>
<tr><td>Moco</td><td id="uno"><?php echo $moco ?></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Cristales</td><td id="uno"><?php echo $cristales ?></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Cilindros</td><td id="uno"><?php echo $cilindros ?></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Bacterias</td><td id="uno"><?php echo $bacterias ?></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Levaduras</td><td id="uno"><?php echo $levaduras ?></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Parásitos</td><td id="uno"><?php echo $parasitos ?></td><td>- - -</td><td>No se observaron</td></tr>


                
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
</td></tr><!-- FIN DE LA TABLA MARCO ALREDEDOR GENERAL-->
</table>
  <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones ?></strong>
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
 


  <br>
  <br>
  <br>
    <br>
  <p></p> 
  <p></p> 
<hr style="color:transparent;"></hr>


<?php

}

}
//==================================================================================

//FIN DEL CÓDIGO 501  ORINA
?>





 <?php 
 
 if(isset($codigo_examen_2))
 {
if($codigo_examen_2==301)  //CÓDIGO DE heces
 {

?>



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
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario, p.edad_paciente,p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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
          'edad_paciente' => $encontrados['edad_paciente'],

      
                'fecha_creado' => $encontrados['fecha_creado'],
                'hora_creado' => $encontrados['hora_creado'],
                'id_examen_creado' => $encontrados['id_examen_creado'],
                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                        'observaciones_generales' => $encontrados['observaciones_generales'],

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

 $nombre_paciente=$paciente_encontrado['nombre_paciente'];
  $edad_paciente=$paciente_encontrado['edad_paciente'];
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
   <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones_generales ?></strong>


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
<p style="font-size:1px;color:white">a</p>
  


</body>
</html>






<?php

}

}
//==================================================================================

//FIN DEL CÓDIGO 301  heces
?>












<?php 
 
 if(isset($codigo_examen_3))
 {
if($codigo_examen_3==601)  //CÓDIGO DE ORINA
 {

  

 ?>   



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
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario,p.edad_paciente, p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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

                'edad_paciente' => $encontrados['edad_paciente'],

                'fecha_creado' => $encontrados['fecha_creado'],
                'hora_creado' => $encontrados['hora_creado'],
                'id_examen_creado' => $encontrados['id_examen_creado'],
                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                        'observaciones_generales' => $encontrados['observaciones_generales'],

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

 $nombre_paciente=$paciente_encontrado['nombre_paciente'];
 $edad_paciente=$paciente_encontrado['edad_paciente'];


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

  
<th bgcolor="    #0c6de8 "  style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Prueba: Hematología</th>
<th bgcolor="  #0c6de8  " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Resultado</th>
<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Dimensional</th>

<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Valor Referencia</th>

</tr>
</thead>
<tbody" >
   
<tr>
<td>WBC</td><td><td>10x10'9/uL</td><td>5.0-10.0</td></tr>

</tr>

<tr><td>Lym</td><td></td><td>10x10'9/uL</td><td>0.9-5.0</td></tr>
<tr><td>Lym%</td><td></td><td>%</td><td>15.0-35.0</td></tr>

<tr>
<td>Mid</td><td></td><td>10x10'9/uL</td><td>0.1-1.5</td></tr>

<tr><td>Mid%</td><td></td><td>%</td><td>1.0-10.0</td></tr>

<tr><td>Gra</td><td></td><td>10x10'9/uL</td><td>1.2-8.0</td></tr>

<tr><td>Gra%</td><td></td><td>%</td><td>35.0-70.0</td></tr>
<tr><td></td><td></td><td></td><td></td></tr>

<tr><td>HGB</td><td></td><td>g/dL</td><td>12.0-17.0</td></tr>
<tr><td>MCH</td><td></td><td>pg</td><td>25.0- 35.0</td></tr>
<tr><td>MCHC</td><td></td><td>d/dl</td><td>31.0-38.0</td></tr>
<tr><td>RBC</td><td></td><td>10x10'12/uL</td><td>3.50-6.00</td></tr>
<tr><td>MCV</td><td></td><td>fL</td><td>75.0-100.0</td></tr>
<tr><td>HCT</td><td></td><td>%</td><td>36-55</td></tr>
<tr><td>RDWa</td><td></td><td>fL</td><td>.1 - 250.0</td></tr>
<tr><td>RDWa%</td><td></td><td>%</td><td>11.0 - 16.0</td></tr>

<tr><td></td><td></td><td></td><td></td></tr>


<tr>
<td>PLT</b></td><td></td><td>10x10'9/uL</td><td>150-500</td></tr>
<tr><td>MPV</td><td></td><td>fL</td><td>6.5-11.0</td></tr>
<tr><td>PDWa</td><td></td><td>fL</td><td>0.1-30.0</td></tr>
<tr><td>PDW%</td><td></td><td>%</td><td>.1-99.9</td></tr>
<tr><td>PTC</td><td></td><td>%</td><td>0.01-9.99</td></tr>
<tr><td>P-LCR</td><td></td><td>%</td><td>0.1-99.9</td></tr>
<tr><td>P-LCC</td><td></td><td>10X10'9/uL</td><td>1-1999</td></tr>



                
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
   <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones_generales ?></strong>



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

<br>
<br>
<br>
<br>
<br>
<strong style="font-size: 1px;color: white;">a</strong> 


</body>
</html>







<?php

}

}
//==================================================================================

//FIN DEL CÓDIGO 601  Hematología
?>






 <?php 
 
 if(isset($codigo_examen_4))
 {
if($codigo_examen_4==801)  //CÓDIGO DE ORINA
 {

  

 ?>   



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
        

$query = mysqli_query($conexion,"SELECT p.id_paciente,p.codigo_unico_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario,p.edad_paciente, p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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

                'edad_paciente' => $encontrados['edad_paciente'],

                'fecha_creado' => $encontrados['fecha_creado'],
                'hora_creado' => $encontrados['hora_creado'],
                'id_examen_creado' => $encontrados['id_examen_creado'],
                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                        'observaciones_generales' => $encontrados['observaciones_generales'],

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
<tr><td><b>Prueba</b></td><td colspan="4"><b>Resultado</b></td></td></tr>
<tr><td>Muestra</td><td colspan="4"></td></tr>
    <tr><td>Microorganismo</td><td colspan="4"></td></tr>


<tr><td rowspan="18">ANTIBIOGRAMA</td><td>Antibiótico</td><td>Resistente</td><td>Intermedio</td><td>Sensible</td></tr>
<?php
for($fila=1;$fila<=17;$fila=$fila+1)
{ 
?>
 <tr><td><font color= white>.</font></td><td></td><td></td><td></td></tr>

 <?php  
}
 ?>
 <tr><td>Observaciones</td><td colspan="4"></td></tr>

</table>











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
              <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones_generales ?></strong>

   <br>
<br>

   <strong style="font-family:monospace;font-size: 13px;">Cód.Paciente:<?php  echo $codigo_unico_paciente ?></strong>
<br>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<strong></strong>

</body>
</html>






<?php

}

}
//==================================================================================

//FIN DEL CÓDIGO 801  CULTIVO MICROBIOLOGÍA
?>





<?php 


//================================================================================================

// OBTENER pruebas agregados del paciente

$id_examen_creado;

$query = mysqli_query($conexion,"SELECT d.id_detalle_examen,d.id_examen_creado,d.resultado,d.id_area,d.id_paciente,d.descripcion,d.estado_detalle,e.id_examen,e.nombre_examen,e.valor_referencia,e.nombre_nomenclatura,e.subarea,e.codigo_examen FROM detalle_examenes d INNER JOIN examenes e ON d.id_examen=e.id_examen WHERE d.id_examen_creado=$id_examen_creado"); 

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $examenes_agregados_o[]= array(
                  'id_detalle_examen' => $encontrados['id_detalle_examen'],

        'id_examen' => $encontrados['id_examen'],
                'codigo_examen' => $encontrados['codigo_examen'],

         'nombre_examen' => $encontrados['nombre_examen'],

        'id_area' => $encontrados['id_area'],
                'valor_referencia' => $encontrados['valor_referencia'],
                 'nombre_nomenclatura' => $encontrados['nombre_nomenclatura'],
                'descripcion' => $encontrados['descripcion'],
                                'estado_detalle' => $encontrados['estado_detalle'],



        'resultado' => $encontrados['resultado'] ) ;

}

}


   


 foreach ($examenes_agregados_o as $agregado) {

$codigo_examen_f=$agregado['codigo_examen'];
 }

 if($codigo_examen_f==501||$codigo_examen_f==301||$codigo_examen_f==601||$codigo_examen_f==801)
{
}
else
{
  ?>







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
<table width="100%" border="0" style="border-collapse: collapse;">
  <tr><td></td></tr>
</table>

<?php   //DATOS DEL paciente
        

$query = mysqli_query($conexion,"SELECT p.codigo_unico_paciente,p.id_paciente,p.dpi_paciente,p.nombre_paciente,p.id_genero,p.telefono_paciente,p.correo_paciente,p.id_usuario, p.edad_paciente,p.direccion_paciente,p.fecha_nacimiento_paciente, u.id_usuario,u.usuario,g.id_genero,g.nombre_genero,exc.id_paciente,exc.id_examen_creado,exc.fecha_creado,exc.hora_creado,exc.id_usuario_tecnico,exc.observaciones_generales FROM pacientes p INNER JOIN usuario u ON p.id_usuario=u.id_usuario INNER JOIN genero g ON g.id_genero=p.id_genero INNER JOIN examenes_creados exc ON exc.id_paciente=p.id_paciente WHERE exc.id_examen_creado=$id_examen_creado"); 




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
          'edad_paciente' => $encontrados['edad_paciente'],

          
                'fecha_creado' => $encontrados['fecha_creado'],
                'hora_creado' => $encontrados['hora_creado'],
                'id_examen_creado' => $encontrados['id_examen_creado'],
                                'observaciones_generales' => $encontrados['observaciones_generales'],

                              'id_usuario_tecnico' => $encontrados['id_usuario_tecnico'],
                              'usuario' => $encontrados['usuario'],




        
       
        'telefono_paciente' => $encontrados['telefono_paciente'],
        'correo_paciente' => $encontrados['correo_paciente'],
        'direccion_paciente' => $encontrados['direccion_paciente'],

        'fecha_nacimiento_paciente' => $encontrados['fecha_nacimiento_paciente'],
                'codigo_unico_paciente' => $encontrados['codigo_unico_paciente'],

         'usuario' => $encontrados['usuario']

      );
   
              
    }
}

//DATOS DEL PACIENTE SEGÚN EL FORMULARIO CREADO Y EXÁMENES AGREGADOS

foreach ($pacientes as $paciente_encontrado) {
 
  $fecha_creado=$paciente_encontrado['fecha_creado'];
   $hora_creado=$paciente_encontrado['hora_creado'];
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
$mi_fecha = $fecha_creado;
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
$fecha_esp = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));
  ?>







<div class="caja">
<?php echo "Usuario:".$usuario. " ".$hora_creado ?>&nbsp;&nbsp;&nbsp;&nbsp;

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
<th bgcolor="  #0c6de8  " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Resultado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Valor de Referencia</th>


<?php
// si existe la descripción activar columna de lo contrario ocultar
foreach ($examenes_agregados_o as $agregado) {

$descripcion=$agregado['descripcion'];
 



}
  

if($descripcion=="")
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
 foreach ($examenes_agregados_o as $agregado) {
if($agregado['codigo_examen']==501||$agregado['codigo_examen']==301||$agregado['codigo_examen']==601||$agregado['codigo_examen']==801)
    // si es el código 501,301,601,801 de ORINA entonces ya no mostrar.
{
}
else
{
  ?>


<tr>

  <td style="font-size: 13px;font-family: sans-serif;text-align: center;padding: 11px"><?php echo $fila=$fila+1;  ?></td>
      <td style="font-size: 13px;font-family: sans-serif;text-align: center;"><?php echo $agregado['nombre_examen'] ?></td>

  
      <td style="font-size: 13px;font-family: sans-serif;text-align: center;"><?php echo "_______________ ".$agregado['nombre_nomenclatura'] ?></td>
      <td style="font-size: 13px;font-family: sans-serif;text-align: center;"><?php echo $agregado['valor_referencia']." ".$agregado['nombre_nomenclatura'] ?></td>

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

   ?>

</tr>
    <?php 
} //FIN IF
}
    ?>         
                </tbody>

        



  <tfoot style="text-align:center;">
    
            </tfoot>




</table>
   <strong style="font-family:monospace;font-size: 13px;">Observaciones Generales:<?php  echo $observaciones_generales ?></strong>

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


   <strong style="font-family:monospace;font-size: 13px;">Cód. Paciente:<?php  echo $codigo_unico_paciente ?></strong>
<br>



</body>
</html>

<?php  


}
//FIN si es diferente a 301, 501, 701 ,801
?>

</body>
</html>
