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
    </div>

 <div class="col-lg-12">

             
                  

 <?php

              foreach ($paciente_formulario as $paciente_encontrado) {
               $id_paciente=$paciente_encontrado['id_paciente'];
             $nombre_paciente=$paciente_encontrado['nombre_paciente'];
                         $id_genero=$paciente_encontrado['id_genero'];

                          $nombre_genero=$paciente_encontrado['nombre_genero'];


              
               } 


               ?>


             
 
    <div class="col-md-5" >
           <label for="nombre" style="font-family: monospace;">Paciente: <?php echo $nombre_paciente; ?></label>
   
    </div>
        <div class="col-md-3" >
               <label for="nombre" style="font-family: monospace;">Género: <?php echo $nombre_genero; ?></label>

 
  </div>
  <?php 
if($estado_examen_creado==0)
{

}
else{

//obtenemos el examen creado
$id_examen_creado;

   ?>


<div class="col-md-4 alert alert-success" >
    <a href="pdf_formulario_cotizacion.php?id_examen_creado=<?php echo $id_examen_creado ?>"><button class="btn btn-primary" type="submit" name="pdf_constancia" style="background:   #e8f4f8;color: black;   "><i class="far fa-file-pdf" style="color:black;font-size: 20px;"></i> Cotizacion</button></a>

   Creado con éxito!
</div>

<?php 
}
 ?>
                   
             
   
          
  

 
</div>
</div>
 </div>




    <!-- Content Row -->
    <div class="row">
    


  <div class="col-lg-5">
 <div class="card">

   

                    <div class="table-responsive">  

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 12px;font-family: inherit;text-align: center;">
                        <thead style="font-size: 12px;">
                            <tr>
                                                                <th>Área</th>
                                                              <th>Subárea</th>


                                <th>Código</th>
                                <th>Prueba</th>
                                                     
                           
                             
                                <th>Agregar</th>
                                                             

                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px;">
                                     <?php 


              if(isset($examenes_cotizacion))
              {
                                      foreach ($examenes_cotizacion as $examenes_encontrados) {
                                    

            
                                      if($examenes_encontrados['id_genero_referencia']==$id_genero||$examenes_encontrados['id_genero_referencia']==0)
                                      {

                                 
                                    ?>  

       
                                <tr>

                                     <td><?php echo $nombre_area=$examenes_encontrados['nombre_area'] ?></td>
                               <td><?php echo $nombre_subarea=$examenes_encontrados['subarea'] ?></td>

                                    <td><?php echo $codigo_examen=$examenes_encontrados['codigo_examen'] ?></td>

                               

                                <td><?php echo $nombre_examen=$examenes_encontrados['nombre_examen'] ?></td>

                                <?php  $valor_referencia=$examenes_encontrados['valor_referencia'] ?>
                                   <?php $nombre_nomenclatura=$examenes_encontrados['nombre_nomenclatura'] ?>
                                   <?php $precio_examen=$examenes_encontrados['precio_examen'] ?>

<td>

<?php
 if(($estado_examen_creado==1))
{

}
else
{
    ?>

<i class="fas fa-plus-circle" style="font-size:30px;color:  #1d6376 ;" data-toggle="modal" data-target="#exampleModal<?php echo  $examenes_encontrados['id_examen'] ?>"></i></td>
    <?php
}


 ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $id_examen= $examenes_encontrados['id_examen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
        <br>
  <div class="modal-dialog" role="document">
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
                   <center>Prueba Seleccionada</center>
                    </div>
                    <div class="card-body" >
            <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          
          <!-- OBTENEMOS EL ID QUE NO SERVIRÁ PARA ALMACENAR-->

              <!-- OBTENEMOS EL ID DEL ÁREA-->
        <input type="hidden" class="form-control" placeholder="CODIGO FORMULARIO" name="codigo_formulario" id="codigo_formulario" autocomplete="" required="" value="<?php  echo $codigo_formulario?>">
        <input type="hidden" class="form-control" placeholder="ID AREA" name="id_area" id="id_area" autocomplete="" required="" value="<?php  echo $id_area?>">
         <input type="hidden" class="form-control" placeholder="ID PACIENTE" name="id_paciente" id="id_paciente" autocomplete="" required="" value="<?php  echo $id_paciente?>">
          <input type="hidden" class="form-control" placeholder="ID EXAMEN CREADO" name="id_examen_creado" id="id_examen_creado" autocomplete="" required="" value=" <?php echo $id_examen_creado?>">
       
       <input type="hidden" class="form-control"  name="id_examen" id="id_examen" autocomplete="" required="" readonly="" value="<?php echo $id_examen ?>">                      
   

<div class="form-group row"> 
 
   
     
       
            <div class="col-md-12" >
<center>
                <strong style="font-size:30px"><?php echo $nombre_examen ?></strong></center>


                    <input type="hidden" class="form-control" placeholder="Nombre del Examen" name="nombre_examen" id="nombre_examen" autocomplete="" required="" value="<?php echo $nombre_examen ?>" readonly>
                </div>



                     <div class="col-md-2" >


                    <input type="hidden" class="form-control" placeholder="Ingrese Resultado" name="resultado" id="resultado" autocomplete=""  >
                </div>
                      <div class="col-md-2" >


                    <input type="hidden" class="form-control" placeholder="Valor de Referencia" name="valor_referencia" id="valor_referencia" autocomplete=""  required="" readonly="" value="<?php echo $valor_referencia. " ".$nombre_nomenclatura ?>">
                </div>

                                <div class="col-md-5" >


                    <input type="hidden" class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion" autocomplete="">
                </div>

                       


<input type="text" class="form-control" placeholder="precio" name="precio_examen" id="precio_examen" autocomplete="" value="<?php echo $precio_examen ?>" readonly style="text-align: center;font-size: 25px;">
            
            
                    <div class="col-md-2" >
                             </div>


                <br>
<center>
      <br>
                <button  type="submit" value="" class="btn btn-primary" name="agregar_examenes_formulario_cotizacion"><i class="fas fa-vial"></i> Confirmar</button>
          
           
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

                              } //CIERRE DEL IF GÉNERO
                                 ?>
                              

                     


                            

                        </tbody>        
                       </table>  

                    </div>
                </div>






 






</div>


 <div class="col-lg-7">
                <div class="card">
                
                       <?php $id_examen_creado;?>
                     <?php $id_area;?>

 
                
                    <div class="card-body" >


<form method="post" action="modelo_update.php">
<div class="form-group row"> 
  


<!-- //PARA SELECCIONAR MÉDICO Y TÉCNCIO ACTIVAMOS ESTE CÓDIGO
    =============================================================================================
                    <a href="medicos_referidos_asignado.php?codigo_formulario=<?php  echo $codigo_formulario ?>"> <strong style="font-size:15px;font-family:monospace;color: white;">Referido</strong> <i class="fas fa-user-md"  style="font-size:20px;color:   #e0da1a   ;"></i> </a><?php echo (isset($nombre_medico)? $nombre_medico:''); ?> </div>


                     <div class="col-md-4" >

<select class="form-select" aria-label="Default select example" required="" name="id_usuario_tecnico">
  <option selected value="">Selecione Técnico</option>
  <?php 

foreach ($tecnicos as $tec_encontrados) {
  
if($tec_encontrados['id_rol']!=3)
{

}
else
{

   ?>
-->
   <!-- tomamos el id del usuario técnico
  <option value="<?php  echo $tec_encontrados['id_usuario'] ?>"><?php  echo $tec_encontrados['usuario'] ?></option>
<?php

  }
}

  ?>
</select>
=============================================================================================
-->


                     
<?php 

foreach ($tecnicos as $tec_encontrados) {
  
$id_tecnico=$tec_encontrados['id_usuario'];
$nombre_tecnico=$tec_encontrados['nombre'];
}
?>

<input type="hidden" name="id_examen_creado" required="" value="<?php echo $id_examen_creado ?>">
<input type="hidden" name="codigo_formulario" required="" value="<?php echo $codigo_formulario ?>">

                                
<input type="hidden" name="id_usuario_tecnico" required="" value="<?php echo $id_tecnico?>">
            <div class="col-md-3" >


 <?php
 // SI EXISTE EL NOMBRE DEL MÉDICO
  if(isset($nombre_medico) and isset($examenes_agregados))
 {

// SI YA ESTA ACTUALIZADO AL ESTADO FINALIZADO, APARECER EL PDF Y OCULTAR EL BOTÓN FINALIZAR
 if(($estado_examen_creado==1))
{
   
}
else{

    ?>   
<button class="btn btn-primary" type="submit" name="finalizar_agregado_formulario_cotizacion" style="background: #5b0532 "><i class="fas fa-save"></i> Finalizar</button>
<?php
}
}  
?>
</div>

            <div class="col-md-5" >
<?php   "Referido: ". (isset($nombre_medico)? $nombre_medico:"No")?>

</div>

            <div class="col-md-3" >
<?php "Técnico: ".$nombre_tecnico?>

</div>
</div>

</form> 


            <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">

          
                <div class="form-group row"> 
 
                    
 <div class="table-responsive">
                <table class="table table-striped " id="table" style="text-align:center;">
  <thead style="font-size:12px">
    <tr>
      <th scope="col" >#</th>
      <th scope="col">Prueba</th>
      <th scope="col">Precio</th>
                <th></th>

    </tr>
  </thead>
  <tbody style="font-size:13px">

    <?php

$fila=0;

       if(isset($examenes_agregados))
       {
      foreach ($examenes_agregados as $agregado) {

  ?>
<tr>
  <td><?php echo $fila=$fila+1;  ?></td>
      <td><?php echo $agregado['nombre_examen'] ?></td>

  
      <td><?php echo $agregado['precio_examen'] ?></td>
      <td>

       <?php if($agregado['estado_detalle']==1)
{

}
else
{
        ?>
        <a href="modelo_eliminar.php?id_detalle_examen_cotizacion=<?php echo $agregado['id_detalle_examen'] ?>"><i class="fas fa-backspace" style="color:red"></i></a>

        <?php 
}

         ?></td>
</tr>

<?php  

    }

}

     ?>




</tbody>

</table>
</div>
   
            </form>
  

  </div>
</div>
</div>





</div>
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer_tabla.php"; ?>