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
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Asignar Técnico</h1>
        
    </div>

    <!-- Content Row -->
    <div class="row">
       


     <div class="col-lg-6">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
          Técnicos Registrados
                        
                    </div>
                    <div class="card-body" >


<!--Enlistar los usuarios para visualización-->


<div class="table-responsive">
  <table class="table" style="color:black;">
    <thead style="font-size:13px;">
       <tr>
        <th>No.</th>
         <th>Usuario</th>
           <th>Rol</th>
            <th>Activar</th>
              <th></th>
          


       </tr>
    </thead>
<tbody>



    <?php // OBTENEMOS LOS DATOS QUE ESTAN EN EL ARRAY DESPUÉS DE ALMACENAR PARA QUE ENLISTE
                           $fila=0; 
                           if(isset($usuarios_tecnicos))
                           {
                           foreach ($usuarios_tecnicos as $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr>
                                    <td><?php echo $fila?></td>
                             




                                     <td> <?php echo $encontrados['usuario']; ?></td>



                                    <td><?php echo $encontrados['nombre_rol']?></td>

                                    

                               
                                     <td ><i class="fas fa-key" style="color:   #00ae2d   ;" data-toggle="modal" data-target="#exampleModal<?php echo $encontrados['id_usuario']; ?>"></i></td>
                           
                           
                                    <td>

</td>






<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $encontrados['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
    <br>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar Técnico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 

<form method="post" action="modelo_guardar.php">
   <center>
<?php echo "Técnico: ". $encontrados['usuario']; ?>
<br>
<?php
//fecha a español
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Guatemala');
$mi_fecha = date('Y/m/d');
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
echo $fecha_esp = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));
  ?>


<br>
<input type="hidden" name="id_usuario_tecnico" value="<?php echo $id_usuario_tecnico=$encontrados['id_usuario']; ?>">

<button class="btn btn-primary" type="submit" name="asignar_tecnico">Confirmar</button>

</center> 
</form>


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


<div class="col-lg-6">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
          Técnicos Asingado
                        
                    </div>
                    <div class="card-body" >


<!--Enlistar los usuarios para visualización-->


<div class="table-responsive">
  <table class="table" style="color:black;">
    <thead style="font-size:13px;">
       <tr>
         <th>Usuario</th>
            <th>Desactivar</th>
          


       </tr>
    </thead>
<tbody>



    <?php // OBTENEMOS LOS DATOS QUE ESTAN EN EL ARRAY DESPUÉS DE ALMACENAR PARA QUE ENLISTE
                           $fila=0; 
                           if(isset($tecnico_asignado))
                           {
                           foreach ($tecnico_asignado as $encontrados_a)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr>
                          




                                     <td> <?php echo $encontrados_a['usuario']; ?></td>




                                    

                               
                                     <td ><i class="fas fa-minus-circle" style="color:   red  ;" data-toggle="modal" data-target="#exampleModal_DESACTIVAR<?php echo $encontrados_a['id_usuario']; ?>"></i></td>
                           
                           





<!-- Modal -->
<div class="modal fade" id="exampleModal_DESACTIVAR<?php echo $encontrados_a['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
    <br>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Desactivar Técnico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 

<form method="post" action="modelo_update.php">
   <center>
<?php echo "Técnico: ". $encontrados_a['usuario']; ?>
<br>
<?php
//fecha a español
setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Guatemala');
$mi_fecha = date('Y/m/d');
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
echo $fecha_esp = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));
  ?>


<br>
<input type="hidden" name="id_tecnico_asignado" value="<?php echo $id_tecnico_asignado=$encontrados_a['id_tecnico_asignado']; ?>">

<button class="btn btn-primary" type="submit" name="desactivar_tecnico_asignado">Confirmar</button>

</center> 
</form>


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
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>