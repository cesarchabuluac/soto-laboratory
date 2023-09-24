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
        <h1 class="h3 mb-0 text-gray-800">Registro de usuarios</h1>
        
    </div>

    <!-- Content Row -->
    <div class="row">
       <div class="col-lg-5">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                        Datos del usuario
                    </div>
                    <div class="card-body" >
            <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre" autocomplete="">
                </div>

                   <div class="form-group">
                    <label>Rol</label>
                    <select class="browser-default custom-select" name="id_rol" style="background:  #ffffff   ;color:  #1a222e ;
        color:  #1a222e ;font-family: sans-serif;" required>
        <option value="" selected>Seleccione una rol</option>

        <?php 
//Obtenemos los roles mediante el array
foreach ($roles as $encontrados){

?>
 <option value="<?php echo $encontrados['id_rol'] ?>"><?php echo $encontrados['nombre_rol'] ?></option>
<?php
  }  
  ?>

</select></div>






                

                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" placeholder="Ingrese Usuario" name="usuario" id="usuario" autocomplete="">
                </div>
                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="clave" id="clave">
                </div>
             
                <input type="submit" value="Guardar" class="btn btn-primary" name="guardar_usuario">
            </form>
        </div>
    </div>

   </div>
   



     <div class="col-lg-6">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;" data-toggle="modal" data-target="#exampleModalLongREPORTE">
                        Reporte
                        
                        <i class="fas fa-file-download" data-toggle="modal" data-target="#exampleModalLongREPORTE"></i>
                        
                    </div>
                    <div class="card-body" >


<!--Enlistar los usuarios para visualización-->


<div class="table-responsive">
  <table class="table" style="color:black;">
    <thead style="font-size:13px;">
       <tr>
        <th>No.</th>
        <th></th>
         <th>Usuario</th>
           <th>Rol</th>
            <th></th>
              <th></th>
          


       </tr>
    </thead>
<tbody>



    <?php // OBTENEMOS LOS DATOS QUE ESTAN EN EL ARRAY DESPUÉS DE ALMACENAR PARA QUE ENLISTE
                           $fila=0; 
                           foreach ($usuarios as $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr>
                                    <td><?php echo $fila?></td>
                                    <td><a href="editar_usuario.php?id_usuario=<?php echo $encontrados['id_usuario']; ?>"><i class="fas fa-edit"></i></a></td>




                                     <td> <?php echo $encontrados['usuario']; ?></td>



                                    <td><?php echo $encontrados['nombre_rol']?></td>

                                    

                                    <td><a href="modelo_eliminar.php?id_usuario=<?php echo $encontrados['id_usuario']; ?>"><i class="fas fa-backspace" style="color: red;"></i></a></td>
                                     <td ><a href="cambiar_clave_usuario.php?id_usuario=<?php echo $encontrados['id_usuario']; ?>"><i class="fas fa-key" style="color:   #00ae2d   ;"></i></a></td>
                           
                           



                                </tr>
                              

                            <?php

                              }

                          


                            ?>



</tbody>
</table>
</div>





<!--MODAL EN DODE ESTÁ EL DATATABLE CON LOS DATOS DE LOS USUARIOS REGISTRADOS-->

 <div class="modal fade " id="exampleModalLongREPORTE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="true" data-keyboard="true">
        <!--DEJAMOS ESPACIO PARA ACOPLAR AL MOVIL-->
          <br>
            <br>
            <br>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"><!-- REPORTE EN DATATABLE-->



<!--lista de usuarios  EN LA  DataTables-->





    
    

















 
<title>Registro Usuarios</title>

      <div class="col-lg-12">

                    <div class="table-responsive">  



                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 13px;font-family: inherit;">
                        <thead style="font-size: 13px;">
                            <tr>
                                <th>#</th>
                                 <th>Nombre</th>
                                   <th>Usuario</th>
                                <th>rol</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $fila=0; 
                           foreach ($usuarios as  $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr>
                                    <td><?php echo $fila?></td>
                                     <td><?php echo $encontrados['nombre']?></td>
                                    <td><?php echo $encontrados['usuario']?></td>
                                    <td><?php echo $encontrados['nombre_rol']?></td>



                                </tr>
                              

                            <?php

                              }

                          


                            ?>
                            

                        </tbody>        
                       </table>  

                    </div>
                </div>
        </div>  
    </div>  









                               
                </div>
            </div>
        </div>
    </div>












 


</div>


</div>
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>