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
        <h1 class="h3 mb-0 text-gray-800">Médicos Referidos</h1>

              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background:    #06383e    ">
  + <i class="fas fa-user-md" style="color: white;font-size: 30px;"></i>
</button>

 


    </div>

    <!-- Content Row -->
    <div class="row">
       <div class="col-lg-12">
 <!-- MODAL PARA REGISTAR CLIENTES---> 

<!-- Modal Para registrar el cliente -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
    <br>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Médico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     


 <div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                        Datos del Médico
                    </div>
                    <div class="card-body" >
            <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
             <div class="form-group row"> 

      <input type="hidden" class="form-control" placeholder="codigo_formulario" name="codigo_formulario" id="codigo_formulario" autocomplete="" required="" value="<?php echo $_GET['codigo_formulario'] ?>">
 
    <div class="col-md-6" >
                    <label for="nombre">Nombre y Apellidos <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre y Apellidos" name="nombre_medico" id="nombre_medico" autocomplete="" required="">
                </div>

              
    <div class="col-md-6" >
                    <label for="nombre">Teléfono</label>
                    <input type="text" class="form-control" placeholder="Ingrese Teléfono" name="telefono_medico" id="telefono_medico" autocomplete="">
                </div>
               
    <div class="col-md-6" >
                    <label for="nombre">Institución Referido</label>
                    <input type="text" class="form-control" placeholder="Institución Referido" name="institucion_referido" id="institucion_referido" autocomplete="off">
                </div>

                 <div class="col-md-6" >
                   <br>
                <button  type="submit" value="" class="btn btn-primary" name="guardar_medico"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </div>
            </form>
        </div>
    </div>

   </div>









      </div>
   
    </div>
  </div>
</div>


 <div class="card">

     <div class="col-lg-12">

                    <div class="table-responsive">  

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 15px;font-family: inherit;">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>#</th>
                              
                                
                                <th>Nombre & Apellidos</th>
                                
                                <th>Teléfono</th>
                                <th>Institución Referido</th>
                                
                             
                                <th></th>
                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                           <?php 
                           $fila=0; 
                           if(isset($medicos))
                           {
                           foreach ($medicos as  $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr><td><?php  echo $fila?></td>
                              

                                <td><?php  echo $nombre_medico= $encontrados['nombre_medico']; ?></td>
                                <td><?php  echo $telefono_medico= $encontrados['telefono_medico']; ?></td>
                     <td><?php  echo $institucion_referido= $encontrados['institucion_referido']; ?></td>
                                   
                              
                                <td>
                                
    <div class="form-group row"> 
  <div class="col-md-2" > 
    <!--
                    <i class="fas fa-user-edit" data-toggle="modal" data-target="#exampleModal_EDITAR_MEDICO<?php echo $encontrados['id_medico']; ?>" style="font-size: 20px; color: green;"></i>
-->
                </div>

  <?php            



if(isset($_GET['codigo_formulario']))
{
    
$codigo_formulario=$_GET['codigo_formulario'];

  ?>
  <form method="post" action="modelo_update.php">
    <div class="col-md-3" > 
    <input type="hidden" name="id_medico" value="<?php echo $encontrados['id_medico']; ?>">
    <input type="hidden" name="codigo_formulario" value="<?php echo $codigo_formulario ?>">


    <button type="submit" name="asignar_medico" class="btn btn-primary" style="background: #1a4a6d " ><i class="fas fa-user-check" style="font-size: 20px; color:    #e0da1a  ;"></i></button>

    </div>

</form>

                <?php 

}
                 ?>

</div>




                </td>





<!--MODAL EDITAR PACIENTE--->
<!-- Modal -->
<div class="modal fade" id="exampleModal_EDITAR_MEDICO<?php echo $encontrados['id_medico']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
       <br>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Médico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



<div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                        Datos del Médico
                    </div>
                    <div class="card-body" >
            <form action="modelo_update.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          
                              <input type="hidden" class="form-control" placeholder="id_medico" name="id_medico" id="id_medico" autocomplete="" required="" value="<?php echo $encontrados['id_medico']; ?>">

                 <input type="hidden" class="form-control" placeholder="codigo_formulario" name="codigo_formulario" id="codigo_formulario" autocomplete="" required="" value="<?php echo $_GET['codigo_formulario'] ?>">




                <div class="form-group">
                    <label for="nombre">Nombre y Apellidos <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre y Apellidos" name="nombre_medico" id="nombre_medico" autocomplete="" required="" value="<?php echo $encontrados['nombre_medico']; ?>">
                </div>
           
       
                  <div class="form-group">
                    <label for="nombre">Teléfono</label>
                    <input type="text" class="form-control" placeholder="Ingrese Teléfono" name="telefono_medico" id="telefono_medico" autocomplete=""  value="<?php  echo $encontrados['telefono_medico'] ?>">
                </div>
               
               <div class="form-group">
                    <label for="nombre">Institución Referido</label>
                    <input type="text" class="form-control" placeholder="Ingrese correo" name="institucion_referido" id="institucion_referido" autocomplete="off"  value="<?php  echo $encontrados['institucion_referido'] ?>">
                </div>

                <button  type="submit" value="" class="btn btn-primary" name="editar_medico"><i class="fas fa-save"></i> Guardar Cambios</button>
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
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>