
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
     $fecha_cargado=$paciente_encontrado['fecha_cargado'];
   $hora_cargado=$paciente_encontrado['hora_cargado'];

 $nombre_paciente=$paciente_encontrado['nombre_paciente'];
 $dpi_paciente=$paciente_encontrado['dpi_paciente'];
$fecha_nacimiento_paciente=$paciente_encontrado['fecha_nacimiento_paciente'];
$edad_paciente=$paciente_encontrado['edad_paciente'];


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



$query= mysqli_query($conexion, "SELECT * FROM detalle_examenes_hematologia WHERE id_examen_creado=$id_examen_creado");

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $detalles_hematologia[]= array(
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


?>


<?php
foreach ($detalles_hematologia as $detalles_hematol) {

        $wbc=$detalles_hematol['wbc'];
         $lym=$detalles_hematol['lym'];
         $lym_2=$detalles_hematol['lym_2'];
        
          $mid = $detalles_hematol['mid'];
          $mid_2 = $detalles_hematol['mid_2'];
          $gra = $detalles_hematol['gra'];
        $gra_2 = $detalles_hematol['gra_2'];
        $hgb = $detalles_hematol['hgb'];
        $mch = $detalles_hematol['mch'];
            $mchc = $detalles_hematol['mchc'];
        $rbc = $detalles_hematol['rbc'];
        $mcv =$detalles_hematol['mcv'];
        $hct =$detalles_hematol['hct'];
        $rdwa = $detalles_hematol['rdwa'];
        $rdw = $detalles_hematol['rdw'];
         $plt = $detalles_hematol['plt'];
         $mpv = $detalles_hematol['mpv'];
        $pdwa = $detalles_hematol['pdwa'];
        $pdw = $detalles_hematol['pdw'];
            $ptc = $detalles_hematol['ptc'];
                $p_lcr = $detalles_hematol['p_lcr'];
                $p_lcc = $detalles_hematol['p_lcc'];
                $observaciones=$detalles_hematol['observaciones'];
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
<?php echo "Usuario:".$usuario. " ".$hora_cargado ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>





<table width="100%">

<tr><td style="font-size: 12px;font-family: sans-serif;text-align: left;"><b>Nombre:</b><?php echo $nombre_paciente?></td><td style="font-size: 12px;font-family: sans-serif;"><b>DPI:</b><?php echo $dpi_paciente ?></td>

</tr>
<tr><td style="font-size: 12px;font-family: sans-serif;text-align: left;"><b>Edad:</b><?php

if($fecha_nacimiento_paciente==0||$fecha_nacimiento_paciente=="0000-00-00")
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

<!--TABLA MARCO BORDE GENERAL-->
<table border="1" width="100%">
    <tr><td>

<table width="100%" border="0" style="border-collapse: collapse;">
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
<td>WBC</td><td id="uno"><?php  echo $wbc ?><td>1x10^3/uL</td><td>5.0-10.0</td></tr>

</tr>

<tr><td>Lym</td><td id="uno"><?php  echo $lym ?></td><td>1x10^3/uL</td><td>0.9-5.0</td></tr>
<tr><td>Lym%</td><td id="uno"><?php  echo $lym_2 ?></td><td>%</td><td>15.0-35.0</td></tr>

<tr>
<td>Mid</td><td id="uno"><?php  echo $mid ?></td><td>1x10^3/uL</td><td>0.1-1.5</td></tr>

<tr><td>Mid%</td><td id="uno"><?php  echo $mid_2 ?></td><td>%</td><td>1.0-10.0</td></tr>

<tr><td>Gra</td><td id="uno"><?php  echo $gra ?></td><td>1x10^3/uL</td><td>1.2-8.0</td></tr>

<tr><td>Gra%</td><td id="uno"><?php  echo $gra_2 ?></td><td>%</td><td>35.0-70.0</td></tr>
<tr><td></td><td></td><td></td><td></td></tr>

<tr><td>HGB</td><td id="uno"> <?php  echo $hgb ?></td><td>g/dL</td><td>12.0-17.0</td></tr>
<tr><td>MCH</td><td id="uno"><?php  echo $mch ?></td><td>pg</td><td>25.0- 35.0</td></tr>
<tr><td>MCHC</td><td id="uno"><?php  echo $mchc ?></td><td>g/dL</td><td>31.0-38.0</td></tr>
<tr><td>RBC</td><td id="uno"><?php  echo $rbc ?></td><td>1x10^6/uL</td><td>3.50-6.00</td></tr>
<tr><td>MCV</td><td id="uno"><?php  echo $mcv ?></td><td>fL</td><td>75.0-100.0</td></tr>
<tr><td>HCT</td><td id="uno"><?php  echo $hct ?></td><td>%</td><td>36-55</td></tr>
<tr><td>RDWa</td><td id="uno"><?php  echo $rdwa ?></td><td>fL</td><td>.1 - 250.0</td></tr>
<tr><td>RDW%</td><td id="uno"><?php  echo $rdw ?></td><td>%</td><td>11.0 - 16.0</td></tr>

<tr><td></td><td></td><td></td><td></td></tr>


<tr>
<td>PLT</td><td id="uno"><?php  echo $plt ?></td><td>1x10^3/uL</td><td>150-500</td></tr>
<tr><td>MPV</td><td id="uno"><?php  echo $mpv?></td><td>fL</td><td>6.5-11.0</td></tr>
<tr><td>PDWa</td><td id="uno"><?php  echo $pdwa ?></td><td>fL</td><td>0.1-30.0</td></tr>
<tr><td>PDW%</td><td id="uno"><?php  echo $pdw ?></td><td>%</td><td>.1-99.9</td></tr>
<tr><td>PTC</td><td id="uno"><?php  echo $ptc ?></td><td>%</td><td>0.01-9.99</td></tr>
<tr><td>P-LCR</td><td id="uno"><?php  echo $p_lcr ?></td><td>%</td><td>0.1-99.9</td></tr>
<tr><td>P-LCC</td><td id="uno"><?php  echo $p_lcc ?></td><td>1x10^3/uL</td><td>1-1999</td></tr>



                
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

</tr></td>
</table><!-- CIERRE DE LA TABLE BORDE MARCO GENERAL-->
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
  



</body>
</html>
