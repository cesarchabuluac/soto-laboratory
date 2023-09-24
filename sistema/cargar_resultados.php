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
    //Si existe el código 501 || 601
     if(isset($examenes_agregados))
              {
                                      foreach ($examenes_agregados as $examenes_encontrados) {
                                      
                                      $codigo_examen=$examenes_encontrados['codigo_examen'];
                                      $nombre_examen=$examenes_encontrados['nombre_examen'];
                                     $id_usuario_tecnico=$examenes_encontrados['id_usuario_tecnico']; // técnico que realizó el analisis.


                                  }
                              }
                              ?>

  
       <div class="form-group row"> 
 
    <div class="col-md-3" >

  <a href="formularios_cargados.php" class="btn btn-primary" style="background:    #10bd83  ;"><i class="fas fa-arrow-circle-left" ></i> Resultados Guardados
 </a> 
</div>

    <div class="col-md-3" >

   <a href="registro_de_pacientes.php" class="btn btn-primary" style="background:  #0e7180 ;"><i class="fas fa-arrow-circle-left" ></i> Pacientes
 </a>  
     
    </div>

<div class="col-md-3">

 <?php  

if($codigo_examen==501 and$codigo_examen==601 and $codigo_examen==301 and$codigo_examen==801)  // DESACTIVAR SI SON ESOS CÓDIGOS DE EXAMEN
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

} // FIN SI ES CÓDIGO 501
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

                    




  <?php 
if($estado_examen_cargado==0)
{
?>
<?php



}
else{

//obtenemos el examen creado
$id_examen_cargado;

   ?>
    <div class="col-md-2" >

<?php 

if($codigo_examen==501)
{
 ?>
 
 <a href="pdf_constancia_orina.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Constancia</button></a>
 <?php   
}

else

if($codigo_examen==601)
{
 ?>
 
 <a href="pdf_constancia_hermatologia.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Constancia</button></a>
 <?php   
}
else
if($codigo_examen==301)
{
 ?>
 
 <a href="pdf_constancia_heces.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Constancia</button></a>
 <?php   
}

else
if($codigo_examen==801)
{
 ?>
 
<a href="pdf_constancia.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Resultados</button></a>
 <?php   
}
else
{
?>


    <a href="pdf_constancia.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Resultados</button></a>
<?php 
}
?>
        <div class="spinner-grow text-success" role="status">
  <span class="sr-only"></span>
</div>


 </div>

<?php 
}
 ?> 
 


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

                           
                            <td>

<?php 
 if($codigo_examen==301) 
{
if(isset($examenes_heces))
{
foreach ($examenes_heces as $existe) {
   
   $estado_pdf=$existe['estado_examen_cargado'];
}

if($estado_pdf==1)
{


    ?>
     <a href="pdf_constancia_heces.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Heces</button></a>
           <div class="spinner-grow text-success" role="status">
  <span class="sr-only"></span>

    <?php
}
}
}
 ?>

<?php 
 if($codigo_examen==601) //HEMATOLOGÍA 
{
if(isset($examenes_agregados_2))
{
foreach ($examenes_agregados_2 as $existe2) {
   
$estado_pdf2=$existe2['estado_examen_cargado'];

}

if($estado_pdf2==1)
{


    ?>
     <a href="pdf_constancia_hermatologia.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Hematología</button></a>
           <div class="spinner-grow text-success" role="status">
  <span class="sr-only"></span>

    <?php
}
}
}
 ?>

 <?php 
 if($codigo_examen==501) //orina 
{
if(isset($examenes_orina))
{
foreach ($examenes_orina as $existe3) {
   
$estado_pdf3=$existe3['estado_examen_cargado'];

}

if($estado_pdf3==1)
{


    ?>
     <a href="pdf_constancia_orina.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Orina</button></a>
           <div class="spinner-grow text-success" role="status">
  <span class="sr-only"></span>

    <?php
}
}
}
 ?>
 <?php 
 if($codigo_examen==801) //orina 
{
if(isset($examenes_cultivo))
{
foreach ($examenes_cultivo as $existe4) {
   
$estado_pdf4=$existe4['estado_examen_cargado'];

}

if($estado_pdf4==1)
{

if(isset($detalles_cultivos))  // SI EXISTE ANTIBIÓTICO DEL FORMULARIO DE MICROBIOLOGÍA
{
foreach ($detalles_cultivos as $antibioticos) {
  $codigo_formulario_c=$antibioticos['codigo_formulario'];
}
if($codigo_formulario_c==$codigo_formulario)  // SI EXISTE UN ANTIBIOTICO CON ESE CÓDIGO DE FORMULARIO
{
    ?>

   <a href="pdf_constancia_cultivo.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Cultivo</button></a>
           <div class="spinner-grow text-success" role="status">
  <span class="sr-only"></span>


    <?php
}
}

    ?>
  

    <?php
}
}
}
 ?>



                                <?php echo $resultado=$examenes_encontrados['resultado'] ?>
                                


                            </td>
                    <td>





<?php
 if($codigo_examen==301) 
{
    ?>
<a href="cargar_resultados_especificos.php?codigo_formulario=<?php echo $codigo_formulario ?>"><i class="fas fa-flask" style="font-size:30px;color:   #0e6dd9  ;" ></i></a>

    <?php

}

 if($codigo_examen==601) 
{
    ?>
<a href="cargar_resultados_especificos.php?codigo_formulario=<?php echo $codigo_formulario ?>"><i class="fas fa-flask" style="font-size:30px;color:   #0e6dd9  ;" ></i></a>

    <?php

}

 if($codigo_examen==501) 
{
    ?>
<a href="cargar_resultados_especificos.php?codigo_formulario=<?php echo $codigo_formulario ?>"><i class="fas fa-flask" style="font-size:30px;color:   #0e6dd9  ;" ></i></a>

    <?php

}

 if($codigo_examen==801) 
{
    ?>
<a href="cargar_resultados_especificos.php?codigo_formulario=<?php echo $codigo_formulario ?>"><i class="fas fa-flask" style="font-size:30px;color:   #0e6dd9  ;" ></i></a>

    <?php

}


?>


<?php 
if($codigo_examen!=301 and $codigo_examen!=601 and $codigo_examen!=501 and $codigo_examen!=801) 
{
?>
<i class="fas fa-flask" style="font-size:30px;color:  #1d6376 ;" data-toggle="modal" data-target="#exampleModal<?php echo  $examenes_encontrados['id_examen'] ?>"></i>
<?php

}
?>




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

                             
                                 ?>
                              

                     


                            

                        </tbody>        
                       </table>  

                    </div>

                    <?php

} //FIN examen general
                    ?>
  


                </div>



<?php 
if($codigo_examen==501||$codigo_examen==601||$codigo_examen==301||$codigo_examen==801)
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