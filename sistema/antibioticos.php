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
        <h1 class="h3 mb-0 text-gray-800">Listado de Antibióticos</h1>

              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background:    #06383e    ">
  + <i class="fas fa-pump-medical" style="color: white;font-size: 30px;"></i>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Antibiótico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     


 <div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                        Datos del Antibiótico
                    </div>
                    <div class="card-body" >
            <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          

              <div class="form-group">
                    <label for="nombre">Código Antibiótico <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Código" name="codigo_antibiotico" id="codigo_antibiotico" autocomplete="" required="">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre del Antibiótico<i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Nombre Antibiótico" name="nombre_antibiotico" id="nombre_antibiotico" autocomplete="" required="">
                </div>
            
              
                 

             
                <button  type="submit" value="" class="btn btn-primary" name="guardar_antibiotico"><i class="fas fa-save"></i> Guardar</button>
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
                              
                                <th>Código Antibiótico</th>
                                
                                <th>Nombre del Antibiótico</th>
                                
                                                              
                                <th></th>

                              
                                             
                                 
                         
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
                              

                                 <td><?php  echo $codigo_antibiotico= $encontrados['codigo_antibiotico']; ?></td>
                                <td><?php  echo $nombre_antibiotico= $encontrados['nombre_antibiotico']; ?></td>
               
                                   
                              
                                <td>
                                
    <div class="form-group row"> 
  <div class="col-md-3" > 
                    <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal_EDITAR_AREA<?php echo $encontrados['id_antibiotico']; ?>" style="font-size: 30px; color: green;"></i>

                </div>



</div>

</div>


                </td>





<!--MODAL EDITAR PACIENTE--->
<!-- Modal -->
<div class="modal fade" id="exampleModal_EDITAR_AREA<?php echo $encontrados['id_antibiotico']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
       <br>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Antibiótico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



<div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                        Datos del Antibiótico
                    </div>
                    <div class="card-body" >
            <form action="modelo_update.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          
                              <input type="hidden" class="form-control" placeholder="id_area" name="id_antibiotico" id="id_antibiotico" autocomplete="" required="" value="<?php echo $encontrados['id_antibiotico']; ?>">

                <div class="form-group">
                    <label for="nombre">Código del Antibiótico</label>
                    <input type="text" class="form-control" placeholder="Ingrese código " name="codigo_antibiotico"  autocomplete="" value="<?php echo $encontrados['codigo_antibiotico']; ?>" required>
                </div>
       

                <div class="form-group">
                    <label for="nombre">Nombre del Antibiótico<i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre del Antibiótico" name="nombre_antibiotico"  autocomplete="" required="" value="<?php echo $encontrados['nombre_antibiotico']; ?>">
                </div>
        
                

                <button  type="submit" value="" class="btn btn-primary" name="editar_antibiotico"><i class="fas fa-save"></i> Guardar Cambios</button>
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