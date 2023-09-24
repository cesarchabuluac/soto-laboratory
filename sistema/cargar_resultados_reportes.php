<?php include_once "includes/header.php";?>



<?php include_once "modelo_guardar.php";?>
<?php include_once "modelo_consulta.php";?>
  <!-- datatables JS  DATA TABLES INTEGRADO-->


<!--BOOSTRAP ONLINE-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

 
 
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Content Row -->
    <div class="row">
    
   

<?php $codigo_formulario=$_GET['codigo_formulario']; ?>
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


  

   <a href="formularios_cargados.php" class="btn btn-primary" style="background:  #0e7180 ;"><i class="fas fa-arrow-circle-left" ></i> Regresar
 </a>  

        
                
 
    <div class="col-md-6" >
           Paciente: <label for="nombre" style="font-family: monospace;"> <b> <?php echo $nombre_paciente; ?></b></label>
   
    </div>
        <div class="col-md-4" >
               Género: <label for="nombre" style="font-family: monospace;"> <?php echo $nombre_genero; ?></label>
</div>




 <?php $id_examen_creado;?>
                     <?php $id_area;?>
            <div class="col-md-2" >

 <form method="post" action="modelo_update.php">


 
 
     
       
<input type="hidden" name="id_examen_creado" required="" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" required="" value="<?php echo $codigo_formulario ?>">

                                
<input type="hidden" name="medico_asignado" required="" value="<?php echo (isset($nombre_medico)? $nombre_medico:''); ?>">
<input type="hidden" name="observaciones_generales_cargado" id="observaciones_generales_cargado" value="">

  
<button class="btn btn-primary" type="submit" name="finalizar_cargado_modificado" style="background: #5b0532 "><i class="fas fa-save"></i> Finalizar</button>




</form> 

</div>



    <div class="col-md-2" >

<?php

              if(isset($examenes_agregados))
              {
                                      foreach ($examenes_agregados as $examenes_encontrados) {
                                      
                                      $codigo_examen=$examenes_encontrados['codigo_examen'];

}
}

if($codigo_examen==501)
{

}
else
{
?>
    <a href="pdf_constancia.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Constancia</button></a>

        <div class="spinner-grow text-success" role="status">
  <span class="sr-only"></span>
<?php   
}

?>
</div>


 </div>




          <div class="col-md-6" >
 Referido: <label for="nombre" style="font-family: monospace;"><?php  echo (isset($nombre_medico)? $nombre_medico:"No")?>
</label>
</div>

            <div class="col-md-6" >
                Técnico: <label for="nombre" style="font-family: monospace;">
<?php  echo $nombre_tecnico?>
</label>
</div>


</div>

                   
             
   
          
  

 




    <!-- Content Row -->
    <div class="row">
    


  <div class="col-lg-12">
 <div class="card">

   

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
                             <th>Última modificación</th>




                             
                     

                              
                                             
                                 
                         
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



<?php 
 //SI ES CÓDIGO 501 ENTONCES MOSTRAR OTRO ENLACE
if($codigo_examen=501)
  { 

    ?>

<a href="cargar_resultados.php?codigo_formulario=<?php echo $codigo_formulario  ?>">
<i class="fas fa-flask" style="font-size:30px;color:  #1d6376 ;" data-toggle="modal" data-target="#exampleModal<?php echo  $examenes_encontrados['id_examen'] ?>"></i>
</a>


    <?php

  }

  else 
  {
 ?>

<i class="fas fa-flask" style="font-size:30px;color:  #1d6376 ;" data-toggle="modal" data-target="#exampleModal<?php echo  $examenes_encontrados['id_examen'] ?>"></i>




<?php  

}
?>
 </td>



      <td><?php  echo $valor_referencia=$examenes_encontrados['valor_referencia'].$examenes_encontrados['nombre_nomenclatura'] ?></td>
                                  
 <td><?php echo $descripcion=$examenes_encontrados['descripcion'] ?></td>

<?php
setlocale(LC_TIME, "spanish");
$mi_fecha =  $examenes_encontrados['fecha_modificacion'];
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
$fecha_esp = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));
?>

<?php $usuario=$examenes_encontrados['usuario']?>

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
            <form action="modelo_update.php" method="post" autocomplete="off" style="color:black ">
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
                    <input type="text" class="form-control" placeholder="Ingrese Resultado" name="resultado" id="resultado" autocomplete=""  required="">
                </div>
                      <div class="col-md-2" >


                    <label for="nombre">Valor de Referencia</label>
                    <input type="text" class="form-control" placeholder="Valor de Referencia" name="valor_referencia" id="valor_referencia" autocomplete=""  required="" readonly="" value="<?php echo $examenes_encontrados['valor_referencia']. " ".$examenes_encontrados['nombre_nomenclatura'] ?>">
                </div>

                                <div class="col-md-5" >


                    <label for="nombre">Observación</label>
                    <input tyoe="text" class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion" autocomplete="">
                </div>
            
                    <div class="col-md-2" >
                             </div>


                <br>
<center>
      <br>
                <button  type="submit" value="" class="btn btn-primary" name="cargar_resultado_modificado"><i class="fas fa-vial"></i> Agregar</button>
          
           
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
                </div>





 





</div>
</div>
<?php  

if($codigo_examen==501)
{
}
else
{

?>
<strong>Observaciones Generales</strong>
<textarea name="observaciones_generales_cargado" value="" id="observaciones_generales_cargado_pasa" placeholder="Observaciones Generales" onkeyup="pasar_observaciones();"><?php  echo $observaciones_generales_cargado?></textarea> 
<?php 
}
?>

<script type="text/javascript">
    
function pasar_observaciones(){

   document.getElementById("observaciones_generales_cargado").value = document.getElementById("observaciones_generales_cargado_pasa").value;
}


</script>
 



</div>
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer_tabla.php"; ?>