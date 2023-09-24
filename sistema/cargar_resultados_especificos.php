<?php include_once "includes/header.php";?>



<?php include_once "modelo_guardar.php";?>
<?php include_once "modelo_consulta.php";?>
  <!-- datatables JS  DATA TABLES INTEGRADO-->


<!--BOOSTRAP ONLINE-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>




    <script type="text/javascript">
        //bloquear ENTER
            document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
        $(document).ready(function(){   
            var inputs = $("form :text"),
            length = inputs.length,
            i = 0;
     
            inputs.on("keydown", function(event) {
                var code = event.keyCode || event.which; 
                    console.log(code);
                if (code == 9) {
                    console.log('tab presionado');  
                    event.preventDefault();
     
                    $('#idDeTuForm').submit();
                }
            });
        });
    </script>

 



 
 
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Content Row -->
    <div class="row">



<?php echo "No. Formulario: ". $codigo_formulario=$_GET['codigo_formulario']; ?>
</h1>

   <div class="form-group row"> 


             
                  

 <?php

              foreach ($paciente_formulario as $paciente_encontrado) {
               $id_paciente=$paciente_encontrado['id_paciente'];
             $nombre_paciente=$paciente_encontrado['nombre_paciente'];
                          $nombre_genero=$paciente_encontrado['nombre_genero'];
              $observaciones_generales_cargado=$paciente_encontrado['observaciones_generales_cargado'];


              
               } 


               ?>


<?php foreach ($tecnicos as $tec_encontrados) {
  
$id_tecnico=$tec_encontrados['id_usuario'];
$nombre_tecnico=$tec_encontrados['nombre'];
}
?>

<?php 
    //Si existe el código
     if(isset($examenes_agregados_2))
              {
                                      foreach ($examenes_agregados_2 as $examenes_encontrados) {
                                      
                                  $codigo_examen=$examenes_encontrados['codigo_examen'];
                                      $nombre_examen=$examenes_encontrados['nombre_examen'];
                                     $id_usuario_tecnico=$examenes_encontrados['id_usuario_tecnico']; // técnico que realizó el analisis.


                                  }
                              }
                              ?>



  
  <?php 
    //Si existe el código 
     if(isset($examenes_orina))
              {
                                      foreach ($examenes_orina as $examenes_encontrados) {
                                      
                                    $codigo_examen=$examenes_encontrados['codigo_examen'];
                                      $nombre_examen=$examenes_encontrados['nombre_examen'];
                                      $id_examen=$examenes_encontrados['id_examen'];
                                     $id_usuario_tecnico=$examenes_encontrados['id_usuario_tecnico']; // técnico que realizó el analisis.


                                  }
                              }
                              ?>

                                <?php 
    //Si existe el código 501
     if(isset($examenes_heces))
              {
                                      foreach ($examenes_heces as $examenes_encontrados) {
                                      
                                    $codigo_examen=$examenes_encontrados['codigo_examen'];
                                      $nombre_examen=$examenes_encontrados['nombre_examen'];
                                      $id_examen=$examenes_encontrados['id_examen'];
                                     $id_usuario_tecnico=$examenes_encontrados['id_usuario_tecnico']; // técnico que realizó el analisis.


                                  }
                              }
                              ?>


                                <?php 
    //Si existe el código 
     if(isset($examenes_cultivo))
              {
                                      foreach ($examenes_cultivo as $examenes_encontrados) {
                                      
                                    $codigo_examen=$examenes_encontrados['codigo_examen'];
                                      $nombre_examen=$examenes_encontrados['nombre_examen'];
                                      $id_examen=$examenes_encontrados['id_examen'];
                                     $id_usuario_tecnico=$examenes_encontrados['id_usuario_tecnico']; // técnico que realizó el analisis.


                                  }
                              }
                              ?>



 <?php $codigo_examen ?>
  
       <div class="form-group row"> 
 
    <div class="col-md-3" >

</div>

    <div class="col-md-3" >

   <a href="cargar_resultados.php?codigo_formulario=<?php echo $codigo_formulario ?>" class="btn btn-primary" style="background:   #0e6dd9  ;"><i class="fas fa-arrow-circle-left" ></i> Regresar
 </a>  

     
    </div>

<div class="col-md-3">

 <?php  
if(isset($codigo_examen))
{
if($codigo_examen==501||$codigo_examen==601||$codigo_examen==301||$codigo_examen==801)  // DESACTIVAR SI SON ESOS CÓDIGOS DE EXAMEN
{

}
else  //DE LO CONTRARIO ACTIVAR SI ES EXÁMEN GENERAL
{


?>

 <form method="post" action="modelo_update.php">


 
 
     
       
<input type="hidden" name="id_examen_creado" required="" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" required="" value="<?php echo $codigo_formulario ?>">

                                
<input type="hidden" name="medico_asignado" required="" value="<?php echo (isset($nombre_medico)? $nombre_medico:''); ?>">
<input type="hidden" name="observaciones_generales_cargado" id="observaciones_generales_cargado" value="">



<button class="btn btn-primary" type="submit" name="finalizar_cargado" style="background: #5b0532 " onclick="pasar_observaciones()"><i class="fas fa-genderless"></i> Constancia</button>




</form> 


<?php 

} 
}// FIN SI ES CÓDIGO 501
?>



</div>

    </div>            
 
    <div class="col-md-6" >
           Paciente: <label for="nombre" style="font-family: monospace;"> <b> <?php echo $nombre_paciente; ?></b></label>
   
    </div>
        <div class="col-md-4" >
               Género: <label for="nombre" style="font-family: monospace;"> <?php echo $nombre_genero; ?></label>
</div>




 <?php $id_examen_creado;?>
<?php $id_area;?>

                    




  

          <div class="col-md-6" >
 Referido: <label for="nombre" style="font-family: monospace;"><?php  echo (isset($nombre_medico)? $nombre_medico:"No")?>
</label>
</div>

            <div class="col-md-6" >
                Técnico: <label for="nombre" style="font-family: monospace;">
<?php  $id_usuario_tecnico?>

<?php
//buscamos el usuario que modificó de último el formulario creado
$query = mysqli_query($conexion, "SELECT *FROM usuario WHERE id_usuario=$id_usuario_tecnico ");
                                               

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query)) { 
    $tecnico_proceso=$data['usuario'];

}
}

if($estado_examen_cargado==1)
{
echo $tecnico_proceso;
}
else
{
    echo $nombre_tecnico; // técno actual
}

?>



</label>
</div>


</div>

                   
             
   
          
  

 




    <!-- Content Row -->
    <div class="row">
    


  <div class="col-lg-12">
 <div class="card">
    

<?php  if($codigo_examen!=501||$codigo_examen!=601||$codigo_examen!=301||$codigo_examen!=801)

{

}

else
  {  
?>
   

                    <div class="table-responsive">  

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 12px;font-family: inherit;text-align: center;">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>Código</th>
                                <th>Prueba</th>
                                                     
                                <th>Resultado</th>
                                                                <th>Cargar</th>

                                <th>Valor de Referencia</th>
                             <th>Observaciones</th>
                            <th>última Modificación</th>





                             
                     

                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px;">

                                     <?php 


              if(isset($examenes_agregados))
              {
                                      foreach ($examenes_agregados as $examenes_encontrados) {
                                      
                                      $id_detalle_examen=$examenes_encontrados['id_detalle_examen'];
                                    ?>        
                                <tr>
                                    <td><?php echo $codigo_examen=$examenes_encontrados['codigo_examen'] ?></td>


     
                                <td><?php echo $nombre_examen=$examenes_encontrados['nombre_examen'] ?></td>

                           
                            <td><?php echo $resultado=$examenes_encontrados['resultado'] ?></td>
                    <td>






<i class="fas fa-flask" style="font-size:30px;color:  #1d6376 ;" data-toggle="modal" data-target="#exampleModal<?php echo  $examenes_encontrados['id_examen'] ?>"></i>


 </td>



      <td><?php  echo $valor_referencia=$examenes_encontrados['valor_referencia']."-".$examenes_encontrados['valor_referencia2']. " ".$examenes_encontrados['nombre_nomenclatura'] ?></td>
                                  
 <td><?php echo $descripcion=$examenes_encontrados['descripcion'] ?></td>


<?php
setlocale(LC_TIME, "spanish");
$mi_fecha =  $examenes_encontrados['fecha_modificacion'];
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
$fecha_esp = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));
?>


<?php

 $usuario=$examenes_encontrados['usuario'];

?>

 <td><?php echo $fecha_esp." ".$examenes_encontrados['hora_modificacion'] ." ( ".$usuario. " )" ?></td>



<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $id_examen= $examenes_encontrados['id_examen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
        <br>
  <div class="modal-dialog" role="document" style="max-width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     


<div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:   #052427  ;">
                   <center>Agregar Resultados</center>
                    </div>
                    <div class="card-body" >
            <form action="modelo_update.php" method="post" autocomplete="off" style="color:black">
                <?php echo isset($alert) ? $alert : ''; ?>
          
          <!-- OBTENEMOS EL ID QUE NO SERVIRÁ PARA ALMACENAR-->

              <!-- OBTENEMOS EL ID DEL ÁREA-->
        <input type="hidden" class="form-control" placeholder="CODIGO FORMULARIO" name="codigo_formulario" id="codigo_formulario" autocomplete="" required="" value="<?php  echo $codigo_formulario?>">
        <input type="hidden" class="form-control" placeholder="ID AREA" name="id_area" id="id_area" autocomplete="" required="" value="<?php  echo $id_area?>">
         <input type="hidden" class="form-control" placeholder="ID PACIENTE" name="id_paciente" id="id_paciente" autocomplete="" required="" value="<?php  echo $id_paciente?>">
          <input type="hidden" class="form-control" placeholder="ID EXAMEN CREADO" name="id_examen_creado" id="id_examen_creado" autocomplete="" required="" value=" <?php echo $id_examen_creado?>">
       
       <input type="hidden" class="form-control"  name="id_examen" id="id_examen" autocomplete="" required="" readonly="" value="<?php echo $id_examen ?>">
          <input type="hidden" class="form-control"  name="id_detalle_examen" id="id_detalle_examen" autocomplete="" required="" readonly="" value="<?php echo $id_detalle_examen ?>">                       
   

<div class="form-group row"> 
 
   
     
       
            <div class="col-md-3" >


                    <label for="nombre">Prueba</label>
                    <input type="text" class="form-control" placeholder="Nombre del Examen" name="nombre_examen" id="nombre_examen" autocomplete="" required="" value="<?php echo $nombre_examen ?>" readonly>
                </div>



                     <div class="col-md-2" >


                    <label for="nombre">Resultado <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Resultado" name="resultado" id="resultado" autocomplete="" value="<?php echo $examenes_encontrados['resultado']?>" required="">
                </div>
                      <div class="col-md-2" >


                    <label for="nombre">Valor de Referencia</label>
                    <input type="text" class="form-control" placeholder="Valor de Referencia" name="valor_referencia" id="valor_referencia" autocomplete=""  required="" readonly="" value="<?php echo $examenes_encontrados['valor_referencia']." - ". $examenes_encontrados['valor_referencia2']. " ".$examenes_encontrados['nombre_nomenclatura'] ?>">
                </div>

                                <div class="col-md-5" >


                    <label for="nombre">Observación</label>
                    <!-- DESCRIPCIÓN ES LA OBSERVACIÓN DESDE LA TABLA EXAMEN DETALLES-->
                    <input tyoe="text" class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion" value="<?php echo $examenes_encontrados['descripcion']?>" autocomplete="">
                </div>
            
                    <div class="col-md-2" >
                             </div>


                <br>
<center>
      <br>
                <button  type="submit" value="" class="btn btn-primary" name="cargar_resultado"><i class="fas fa-vial"></i> Agregar</button>
          
           
</center>
       
     

             
              
            </form>
        </div>
    </div>

   </div>







      </div>
 
    </div>
  </div>
</div>

                                </tr>

                                <?php  
                                 } 

                             }
                                 ?>
                              

                     


                            

                        </tbody>        
                       </table>  

                    </div>

                    <?php

} //FIN examen general
                    ?>
  


                </div>

                <?php 
if($codigo_examen==501)
{




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


<center>
<?php  echo $nombre_examen ?>
<br>
<form method="post" action="modelo_update.php" autocomplete="off" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">
    <input type="hidden" name="codigo_formulario" value="<?php echo $codigo_formulario ?>">

  <input type="hidden" name="id_examen_creado" value="<?php echo $id_examen_creado ?>">
    <div class="table-responsive">
               <table width="100%" border="1" style="border-collapse: collapse;">

  <thead>
<tr>

  
<th bgcolor="    #0c6de8 "  style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Prueba: Orina Completa</th>
<th bgcolor="  #0c6de8  " style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Resultado</th>
<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Dimensional</th>

<th bgcolor="    #0c6de8 "   style="font-size: 12px;font-family: sans-serif;text-align: center;"><font color="white">Valor Referencia</th>

</tr>
</thead>
<tbody >
   
<tr>
<td style="font-size:14px"><b>Macroscópico</b></td><td></td><td></td><td></td></tr>

</tr>

<tr><td>Color</td><td><input type="text" name="color" placeholder="Color" value="<?php  echo $color?>"></td><td>- - -</td><td>Amarillo</td></tr>
<tr><td>Aspecto</td><td><input type="text" name="aspecto" placeholder="Aspecto" value="<?php  echo $aspecto?>"></td><td>- - -</td><td>Limpido</td></tr>

<tr>
<td style="font-size:14px"><b>Químico</b></td><td></td><td></td><td></td></tr>

<tr><td>Sangre</td><td><input type="text" name="sangre" placeholder="Sangre" value="<?php  echo $sangre?>"></td><td>- - -</td><td>Negativo</td></tr>
<tr><td>Bilirrubina</td><td><input type="text" name="bilirrubina" placeholder="Bilirrubina" value="<?php  echo $bilirrubina?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Urobilinógeno</td><td><input type="text" name="urobilinogeno" placeholder="Urobilinógeno" value="<?php  echo $urobilinogeno?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Cetonas</td><td><input type="text" name="cetonas" placeholder="Cetonas" value="<?php  echo $cetonas?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Glucosa</td><td><input type="text" name="glucosa" placeholder="Glucosa" value="<?php  echo $glucosa?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Protenias</td><td><input type="text" name="proteinas" placeholder="Proteinas" value="<?php  echo $proteinas?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Nitritos</td><td><input type="text" name="nitritos" placeholder="Nitritos" value="<?php  echo $nitritos?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Leucocitos</td><td><input type="text" name="leucocitos" placeholder="Leucocitos"  value="<?php  echo $leucocitos?>"></td><td>mg/dl</td><td>Negativo</td></tr>
<tr><td>Ph</td><td><input type="text" name="ph" placeholder="Ph"  value="<?php  echo $ph?>"></td><td>- - -</td><td>6 - 7</td></tr>
<tr><td>Densidad</td><td><input type="text" name="densidad" placeholder="Densidad"  value="<?php  echo $densidad?>"></td><td>- -</td><td>1.010 - 1.025</td></tr>


<tr>
<td style="font-size:14px"><b>Microscópico</b></td><td></td><td></td><td></td></tr>
<tr><td>Células Epiteliales</td><td><input type="text" name="celulas_epiteliales" placeholder="Células Epiteliales"  value="<?php  echo $celulas_epiteliales?>"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Leucocitos</td><td><input type="text" name="leucocitos_2" placeholder="Leucocitos"  value="<?php  echo $leucocitos_2?>"></td><td>/campo</td><td>No se observaron</td></tr>
<tr><td>Eritrocitos</td><td><input type="text" name="eritrocitos" placeholder="Eritrocitos"  value="<?php  echo $eritrocitos?>"></td><td>/campo</td><td>No se observaron</td></tr>
<tr><td>Moco</td><td><input type="text" name="moco" placeholder="Moco"  value="<?php  echo $moco?>"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Cristales</td><td><input type="text" name="cristales" placeholder="Cristales"  value="<?php  echo $cristales?>"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Cilindros</td><td><input type="text" name="cilindros" placeholder="Cilindros" value="<?php  echo $cilindros?>"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Bacterias</td><td><input type="text" name="bacterias" placeholder="Bacterias"  value="<?php  echo $bacterias?>"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Levaduras</td><td><input type="text" name="levaduras" placeholder="Levaduras" value="<?php  echo $levaduras?>"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Parásitos</td><td><input type="text" name="parasitos" placeholder="Parásitos" value="<?php  echo $parasitos?>"></td><td>- - -</td><td>No se observaron</td></tr>


                
                </tbody>


<style type="text/css">
  
td.pie_table{
   border:none;
}



table td {

  text-align: center;

  /* Alto de las celdas */
  height: 4px;
  font-size: 13px;
  font-family: sans-serif;
}

</style>          



  <tfoot style="text-align:center;">
    
            </tfoot>




</table>
<div class="input-group mb-3">

  Observaciones &nbsp;<input type="text" class="form-control" placeholder="Observaciones" aria-label="Username" aria-describedby="basic-addon1" name="observaciones" value="<?php echo $observaciones ?>">
</div>
<center>

 <!-- CARGAR RESULTADOS DESDE MODELO UPDATE-->

<input type="hidden" name="id_examen_creado" required="" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" required="" value="<?php echo $codigo_formulario ?>">

                                
<input type="hidden" name="medico_asignado" required="" value="<?php echo (isset($nombre_medico)? $nombre_medico:''); ?>">
<input type="hidden" name="observaciones_generales_cargado" id="observaciones_generales_cargado" value="">


<!-- ACTULIZAR EL FORMULARIO YA CON RESULTADOS-->
<button type="submit" class="btn btn-primary" name="cargar_orina_completa">Guardar</button>
</center>

</form>

<?php
}
?>

<?php

if($codigo_examen==601)
{

?>

<?php

foreach ($detalles_hematologia as $detalles_hematol) {
          $id_examen=$detalles_hematol['id_examen'];
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

<form method="post" action="modelo_update.php" >
<input type="hidden" name="id_examen" value="<?php echo $id_examen ?>">

<input type="hidden" name="id_examen_creado" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" value="<?php echo $codigo_formulario ?>">

  <div class="table-responsive">  

<table id="example"  cellspacing="0" width="100%" style="color:black;font-size: 12px;font-family: inherit;text-align: center;">
                        <thead style="font-size: 12px;">
                            <tr>
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
<td>WBC</td><td><input type="text" name="wbc" autocomplete="off" placeholder="WBC" style="text-align:center;" value="<?php echo $wbc ?>"></td><td>10x10'9/uL</td><td>5.0-10.0</td></tr>



<tr><td>Lym</td><td><input type="text" name="lym" autocomplete="off" placeholder="Lym" style="text-align:center;" value="<?php echo $lym ?>"></td><td>10x10'9/uL</td><td>0.9-5.0</td></tr>

<tr><td>Lym%</td><td><input type="text" name="lym_2" autocomplete="off" placeholder="Lym%" style="text-align:center;" value="<?php echo $lym_2 ?>"></td><td>%</td><td>15.0-35.0</td></tr>

<tr>
<td>Mid</td><td><input type="text" name="mid" autocomplete="off" placeholder="Mid" style="text-align:center;" value="<?php echo $mid ?>"></td><td>10x10'9/uL</td><td>0.1-1.5</td></tr>

<tr><td>Mid%</td><td><input type="text" name="mid_2" autocomplete="off" placeholder="Mid%" style="text-align:center;" value="<?php echo $mid_2 ?>"></td><td>%</td><td>1.0-10.0</td></tr>

<tr><td>Gra</td><td><input type="text" name="gra" autocomplete="off" placeholder="Gra" style="text-align:center;" value="<?php echo $gra ?>"></td><td>10x10'9/uL</td><td>1.2-8.0</td></tr>

<tr><td>Gra%</td><td><input type="text" name="gra_2" autocomplete="off" placeholder="Gra%" style="text-align:center;" value="<?php echo $gra_2 ?>"></td><td>%</td><td>35.0-70.0</td></tr>



<tr><td>HGB</td><td><input type="text" name="hgb" autocomplete="off" placeholder="HGB" style="text-align:center;" value="<?php echo $hgb ?>"></td><td>g/dL</td><td>12.0-17.0</td></tr>

<tr><td>MCH</td><td><input type="text" name="mch" autocomplete="off" placeholder="MCH" style="text-align:center;" value="<?php echo $mch ?>"></td><td>pg</td><td>25.0- 35.0</td></tr>

<tr><td>MCHC</td><td><input type="text" name="mchc" autocomplete="off" placeholder="MCHC" style="text-align:center;" value="<?php echo $mchc ?>"></td><td>d/dl</td><td>31.0-38.0</td></tr>

<tr><td>RBC</td><td><input type="text" name="rbc" autocomplete="off" placeholder="RBC" style="text-align:center;"value="<?php echo $rbc ?>"></td><td>10x10'12/uL</td><td>3.50-6.00</td></tr>

<tr><td>MCV</td><td><input type="text" name="mcv" autocomplete="off" placeholder="MCV" style="text-align:center;" value="<?php echo $mcv ?>"></td><td>fL</td><td>75.0-100.0</td></tr>

<tr><td>HCT</td><td><input type="text" name="hct" autocomplete="off" placeholder="HCT" style="text-align:center;" value="<?php echo $hct ?>"></td><td>%</td><td>36-55</td></tr>

<tr><td>RDWa</td><td><input type="text" name="rdwa" autocomplete="off" placeholder="RDWa" style="text-align:center;" value="<?php echo $rdwa ?>"></td><td>fL</td><td>.1 - 250.0</td></tr>

<tr><td>RDW%</td><td><input type="text" name="rdw" autocomplete="off" placeholder="RDW%" style="text-align:center;" value="<?php echo $rdw ?>"></td><td>%</td><td>11.0 - 16.0</td></tr>




<tr>
<td>PLT</b></td><td><input type="text" name="plt" autocomplete="off" placeholder="PLT" style="text-align:center;" value="<?php echo $plt ?>"></td><td>10x10'9/uL</td><td>150-500</td></tr>

<tr><td>MPV</td><td><input type="text" name="mpv" autocomplete="off" placeholder="MPV" style="text-align:center;" value="<?php echo $mpv ?>"></td><td>fL</td><td>6.5-11.0</td></tr>

<tr><td>PDWa</td><td><input type="text" name="pdwa" autocomplete="off" placeholder="   PDWa" style="text-align:center;" value="<?php echo $pdwa ?>"></td><td>fL</td><td>0.1-30.0</td></tr>

<tr><td>PDW%</td><td><input type="text" name="pdw" autocomplete="off" placeholder="PDW%" style="text-align:center;" value="<?php echo $pdw ?>"></td><td>%</td><td>.1-99.9</td></tr>

<tr><td>PTC</td><td><input type="text" name="ptc" autocomplete="off" placeholder="PTC" style="text-align:center;" value="<?php echo $ptc ?>"></td><td>%</td><td>0.01-9.99</td></tr>

<tr><td>P-LCR</td><td><input type="text" name="p_lcr" autocomplete="off" placeholder="P-LCR" style="text-align:center;" value="<?php echo $p_lcr ?>"></td><td>%</td><td>0.1-99.9</td></tr>

<tr><td>P-LCC</td><td><input type="text" name="p_lcc" autocomplete="off" placeholder="P-LCC" style="text-align:center;" value="<?php echo $p_lcc ?>"></td><td>10X10'9/uL</td><td>1-1999</td></tr>



                
                </tbody>


<style type="text/css">
  
td.pie_table{
   border:none;
}



table td {

  text-align: center;

  /* Alto de las celdas */
  height: 4px;
  font-size: 15px;
  font-family: sans-serif;
}

</style>          



  <tfoot style="text-align:center;">

            </tfoot>




</table>
<div class="input-group mb-3">

   Observaciones &nbsp;<input type="text" class="form-control" placeholder="Observaciones" aria-label="Username" aria-describedby="basic-addon1" name="observaciones" value="<?php echo $observaciones ?>">
</div>
<center>

        <button type="submit" class="btn btn-primary" name="cargar_resultados_hematologia">Guardar</button> 


</center>


</form>



<?php
}  // fin si es código 601


?>



<?php

// NO FUNCIONÓ EN MODAL CONSULTA Y REALICE UNA CONSULTA CLÁSICA

// OBTENEMOS LOS EXÁMENES DE HECES PARA LUEGO SER MODIFICADOS
 $codigo_formulario=$_GET['codigo_formulario'];
$query = mysqli_query($conexion, "SELECT * FROM detalles_heces WHERE codigo_formulario='$codigo_formulario'");
$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query)) { 

$color=$data['color'];
$consistencia=$data['consistencia'];
$ph=$data['ph'];
$sangre=$data['sangre'];
$moco=$data['moco'];
$restos_alimenticios=$data['restos_alimenticios'];
$celulas_vegetales=$data['celulas_vegetales'];

$almidones=$data['almidones'];
$jabones=$data['jabones'];
$grasas=$data['grasas'];
$levaduras=$data['levaduras'];
$leucocitos=$data['leucocitos'];
$eritrocitos=$data['eritrocitos'];
$parasitos=$data['parasitos'];
$observaciones=$data['observaciones'];




}
}
?>





<?php
// RESULTADOS DE EXÁMENES DE HECES completo
if($codigo_examen==301)
{

?>



<form method="post" action="modelo_update.php" autocomplete="off" onKeyPress="if(event.keyCode == 13) event.returnValue = false;">

<input type="hidden" name="id_examen_creado" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" value="<?php echo $codigo_formulario ?>">

  <div class="table-responsive">  

  
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
<td>color</td><td><input type="text" name="color" value="<?php echo $color ?>" placeholder="Color"></td><td>- - -<td>Café</td></tr>

</tr>

<tr><td>Consistencia</td><td><input type="text" name="consistencia" value="<?php echo $consistencia ?>" placeholder="Constancia"></td><td></td><td>Pastoso/Formado</td></tr>
<tr><td>Ph</td><td><input type="text" name="ph" value="<?php echo $ph ?>" placeholder="Ph"></td><td>- - -</td><td>6.-7</td></tr>

<tr>
<td>Sangre</td><td><input type="text" name="sangre" value="<?php echo $sangre ?>" placeholder="Sangre" ></td><td>- - -</td><td>No se observó</td></tr>

<tr>
<td>Moco</td><td><input type="text" name="moco" value="<?php echo $moco ?>" placeholder="Moco"></td><td>- - -</td><td>No se observó</td></tr>

<tr><td>Restos Alimenticios</td><td><input type="text" name="restos_alimenticios"  value="<?php echo $restos_alimenticios ?>" placeholder="Restos Alimenticios"></td><td> - - -</td><td>Escasos / +</td></tr>

<tr>
    <td><b>Microscópico<b></td><td><td></td><td></td></tr>


<tr><td>Células Vegetales</td><td><input type="text" name="celulas_vegetales" value="<?php echo $celulas_vegetales ?>" placeholder="Células Vegetales"></td><td>- - -</td><td>Escasos / +</td></tr>

<tr><td>Almidones</td><td><input type="text" name="almidones" value="<?php echo $almidones ?>" placeholder="Almidones"></td><td>- - -</td><td>Escasos / +</td></tr>
<tr><td></td><td></td><td></td><td></td></tr>

<tr><td>Jabones</td><td><input type="text" name="jabones" value="<?php echo $jabones ?>" placeholder="Jabones"></td><td> - - -</td><td>Escasos / +</td></tr>
<tr><td>Grasas</td><td><input type="text" name="grasas" value="<?php echo $grasas ?>" placeholder="Grasas"></td><td> - - </td><td>Escasos / +</td></tr>
<tr><td>Levaduras</td><td><input type="text" name="levaduras" value="<?php echo $levaduras ?>" placeholder="Levaduras"></td><td> - - </td><td>Escasos / +</td></tr>
<tr><td>Leucocitos</td><td><input type="text" name="leucocitos" value="<?php echo $leucocitos ?>" placeholder="Leucocitos"></td><td>- - - </td><td>No se observaron</td></tr>
<tr><td>Eritrocitos</td><td><input type="text" name="eritrocitos" value="<?php echo $eritrocitos ?>" placeholder="Eritrocitos"></td><td>- - -</td><td>No se observaron</td></tr>
<tr><td>Parásitos</td><td><input type="text" name="parasitos" value="<?php echo $parasitos ?>" placeholder="Parásitos"></td><td>- - -</td><td>No se observaron</td></tr>
                
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



<div class="input-group mb-3">

   Observaciones &nbsp;<input type="text" class="form-control" placeholder="Observaciones" aria-label="Username" aria-describedby="basic-addon1" name="observaciones" value="<?php echo $observaciones ?>">
</div>
<center>

<button type="submit" class="btn btn-primary" name="cargar_resultados_heces" id="cargar_resultados_heces">Guardar</button> 


</center>


</form>



<?php
} // FIN CODIGO 301
//============================================================================
?>


<?php  
if($codigo_examen==801)
{


?>

<!-- estilo de borde al td del resultado-->
<style type="text/css">
    
  #uno{
border: solid 1px black;
}  
</style>

<form method="post" autocomplete="off" action="modelo_update.php" >
<div class="table-responsive">  


<input type="hidden" name="id_examen_creado" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" value="<?php echo $codigo_formulario ?>">

<table id="example"  cellspacing="1" width="100%" style="color:black;font-size: 12px;font-family: inherit;text-align: center;"><tr><td id="uno"><b>Prueba</b></td><td colspan="4" ><b>Resultado</b></td></td></tr>
<tr><td id="uno">Muestra</td><td colspan="4"><input type="text" name="muestra" id="muestra" class="form-control" placeholder="Escriba la Muestra" value="<?php echo (isset($muestra))? $muestra:"" ?>"></td></tr>
    <tr><td id="uno">Microorganismo</td><td colspan="4"><input type="text" name="microorganismo" id="microorganismo"class="form-control" placeholder="Escriba el Microorganismo" value="<?php echo (isset($microorganismo))? $microorganismo:"" ?>"></td></tr>


<tr><td rowspan="18" id="uno">ANTIBIOGRAMA</td>

    <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="pasa_muestra_micro()">
  Agregar Antibiótico
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
        <br>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Antibiótico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   
   <script type="text/javascript">
       

function pasa_muestra_micro()
{
 for(i=1;i<=5;i++)
 {
document.getElementById("muestra_"+i).value = document.getElementById("muestra").value;
document.getElementById("microorganismo_"+i).value = document.getElementById("microorganismo").value;
}
}

   </script>
 

 <div class="table-responsive">  

                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 15px;font-family: inherit;" onclick="pasa_muestra_micro()">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>#</th>
                                                              
                              
                                <th>Código Antibiótico</th>
                                
                                <th>Nombre del Antibiótico</th>
                                                        
                                                              
                                <th>Agregar</th>
                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                           <?php 
                           $fila=0; 
                           if(isset($antibioticos))
                           {
                           foreach ($antibioticos as  $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr><td><?php  echo $fila?></td>
                              
                        <td><?php  echo $encontrados['codigo_antibiotico']; ?></td>
                       <td><?php  echo $encontrados['nombre_antibiotico']; ?></td>


                                <td>

                                    <!-- FORMULARIO QUE GUARDARÁ LOS ANTIBIÓTICOS SELECCIONADOS-->
                                    <!-- DESDE MODELO UPDATE ================================================-->

                        <form method="post" action="modelo_update.php" onclick="pasa_muestra_micro()">




        <input type="hidden" name="muestra" id="muestra_<?php echo $fila?>" value="">
                <input type="hidden" name="microorganismo"  id="microorganismo_<?php echo $fila?>" value="">           


    <input type="hidden" name="id_antibiotico" value="<?php echo  $encontrados['id_antibiotico']?>">
    <input type="hidden" name="codigo_formulario" value="<?php echo  $codigo_formulario?>">

         <input type="hidden" name="id_examen_creado" value="<?php echo  $id_examen_creado?>">





                <button type="submit" class="btn btn-primary" style="background:inherit;" name="guardar_campos_cultivos" onclick="pasa_muestra_micro()"><i class="fas fa-plus-circle" style="font-size:25px;color:green" onclick="pasa_muestra_micro()"></i></button> 
                                </form> 
                                <!-- ==============================-->
                            </td>
                            </tr>
                            <?php 
}
}
                            ?>
                        </tbody>
                    </table>
                </div>
                                



      </div>
      <div class="modal-footer">
    
      </div>
    </div>
  </div>
</div></td><td id="uno">Resistente</td><td id="uno">Intermedio</td><td id="uno">Sensible</td></tr>

<?php

$f=0;
if(isset($detalles_cultivos))
{
foreach ($detalles_cultivos as $encontrados) {
 
 $f=$f+1;

    ?>
 <tr><td><?php  echo $encontrados['nombre_antibiotico']?></td><td><input type="text" name="resistente<?php echo $f ?>" class="form-control" value="<?php echo $encontrados['resistente']?>" style="text-align: center;"></td><td><input type="text" name="intermedio<?php echo $f ?>" class="form-control" style="text-align: center;" value="<?php echo $encontrados['intermedio']?>"></td><td><input type="text" name="sensible<?php echo $f ?>" class="form-control" style="text-align: center;" value="<?php echo $encontrados['sensible']?>"></td>


<td><a href="modelo_eliminar.php?id_examen_cultivo=<?php echo $encontrados['id_examen_cultivo'] ?>"><i class="fas fa-backspace" style="color:red;font-size:15px"></i></a></td>

 </tr>
<?php
}
}
?>




 <tr><td>Observaciones</td><td colspan="4"></td></tr>

</table>

<div class="input-group mb-3">

   Observaciones &nbsp;<input type="text" class="form-control" placeholder="Observaciones" aria-label="Username" aria-describedby="basic-addon1" name="observaciones" value="<?php echo (isset($observaciones))? $observaciones:"" ?>">
</div>
<!-- DESDE EL MODELO UPDATE-->
<center>
    <?php
if($f>=1)
{
     ?>

<button type="submit" name="cargar_resultados_cultivos" id="cargar_resultados_cultivos"class="btn btn-primary" onclick="pasa_muestra_micro()">Guardar Cambios</button></center>
<?php 
}
else
{

}
?>
</form>





<?php
} // fin código 801

?>





</div>
</div>





<?php 
if($codigo_examen!=501||$codigo_examen!=601||$codigo_examen!=301||$codigo_examen!=801)
{
}
else
{
?>
<strong>Observaciones Generales</strong>
<textarea name="observaciones_generales_cargado" id="observaciones_generales_cargado_pasa" placeholder="Observaciones Generales" onkeyup="pasar_observaciones();"><?php echo $observaciones_generales_cargado?></textarea> 


<script type="text/javascript">
    
function pasar_observaciones(){

   document.getElementById("observaciones_generales_cargado").value = document.getElementById("observaciones_generales_cargado_pasa").value;
}


</script>
 

<?php
}
?>



</div>
</div>






  


<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>