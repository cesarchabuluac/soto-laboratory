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
        <h1 class="h3 mb-0 text-gray-800">Exámenes - Área de   <?php  echo $nombre_area ?>





</h1>
      <a href="lista_de_areas.php?id_area=<?php echo $id_area=$_GET['id_area'] ?>"><button type="button" class="btn btn-primary" style="background: #122c41 "><i class="fas fa-long-arrow-alt-left"></i></i> Regresar</button></a>

              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background:    #06383e    ">
  + <i class="fas fa-flask" style="color: white;font-size: 30px;"></i>
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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Examen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     


 <div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                   <center> Datos del Examen</center>
                    </div>
                    <div class="card-body" >
            <form action="modelo_guardar.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          
          <!-- OBTENEMOS EL ID DEL ÁREA-->
        <input type="hidden" class="form-control" placeholder="ID AREA" name="id_area" id="id_area" autocomplete="" required="" value="<?php  echo $id_area?>">


<div class="form-group row"> 
 
    <div class="col-md-6" >
                        <label for="nombre">Código del examen <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Código" name="codigo_examen" id="codigo_examen" autocomplete="" required="">
                </div>
            <div class="col-md-6" >


                    <label for="nombre">Nombre del examen <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Nombre del Examen" name="nombre_examen" id="nombre_examen" autocomplete="" required="">
                </div>



<div class="col-md-6" >


                    <label for="nombre">Género Referencia <i class="fas fa-lock" style="color:red"></i></label>
                    <select class="form-select" aria-label="Default select example" placeholder="Género de Referencia" name="id_genero_referencia" id="id_genero_referencia" autocomplete="" required="">
<?php 

foreach ($genero_referencia as $genero_ref) {



 ?>
<option value="<?php echo  $genero_ref['id_genero_referencia'] ?>"><?php echo  $genero_ref['genero_referencia'] ?></option>
<?php  

}
?>

</select>

                </div>



                     <div class="col-md-6" >


                    <label for="nombre">Valor de Referencia <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Mínimo" name="valor_referencia" id="valor_referencia" autocomplete="off"  required="">
                        <input type="text" class="form-control" placeholder="Máximo" name="valor_referencia2" id="valor_referencia2" autocomplete=""  required="">


                </div>

                 

                                <div class="col-md-6" >


                    <label for="nombre">Nombre Nomenclatura <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Nombre de nomenclatura" name="nombre_nomenclatura" id="G´nero de Referencia" autocomplete="" required="">
                </div>
            

                                <div class="col-md-6" >


                    <label for="nombre">Subárea </label>
                    <input type="text" class="form-control" placeholder="Ingrese Subárea" name="subarea" id="subarea" autocomplete="" >
                </div>


                                <div class="col-md-6" >


                    <label for="nombre">Precio </label>
                    <input type="text" class="form-control" placeholder="Precio" name="precio_examen" id="precio_examen" autocomplete="" >
                </div>
                                              <div class="col-md-6" >

                <br>
                <button  type="submit" value="" class="btn btn-primary" name="guardar_examen"><i class="fas fa-save"></i> Guardar</button>
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
                                                                <th>Área</th>
                                                               <th>Subárea</th>

                              
                                <th>Código Examen</th>
                                
                                <th>Nombre del Examen</th>
                                <th>Género Referencia</th>

                                <th>Valor de Referencia</th>

                                <th>Nomenclatura</th>
                        
                                <th>Precio</th>


                                
                                                              
                                <th></th>
                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                           <?php 
                           $fila=0; 
                           if(isset($examenes))
                           {
                           foreach ($examenes as  $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr><td><?php  echo $fila?></td>
                              
                        <td><?php  echo $nombre_area= $encontrados['nombre_area']; ?></td>
                       <td><?php  echo $subarea= $encontrados['subarea']; ?></td>


                                 <td><?php  echo $codigo_examen= $encontrados['codigo_examen']; ?></td>
                                <td><?php  echo $nombre_examen= $encontrados['nombre_examen']; ?></td>
             <td><?php  echo $genero_referencia=$encontrados['genero_referencia']; ?></td>

                        <td><?php  echo $encontrados['valor_referencia']. " - ".$encontrados['valor_referencia2']; ?>
                           </td>


                            <td><?php  echo $nombre_nomenclatura= $encontrados['nombre_nomenclatura']; ?></td>

                            <td><?php  echo $precio_examen= $encontrados['precio_examen']; ?></td>


               
                                   
                              
                                <td>
                                
    <div class="form-group row"> 
  <div class="col-md-2" > 
                    <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal_EDITAR_EXAMEN<?php echo $encontrados['id_examen']; ?>" style="font-size: 20px; color: green;"></i>

                </div>

</div>




                </td>





<!--MODAL EDITAR PACIENTE--->
<!-- Modal -->
<div class="modal fade" id="exampleModal_EDITAR_EXAMEN<?php echo $encontrados['id_examen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
       <br>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Examen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



<div class="col-lg-12">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #042246 ;">
                        Datos del Examen
                    </div>
                    <div class="card-body" >
            <form action="modelo_update.php" method="post" autocomplete="off" style="color:black ">
                <?php echo isset($alert) ? $alert : ''; ?>
          
            <input type="hidden" class="form-control" placeholder="id_area" name="id_area" id="id_area" autocomplete="" required="" value="<?php echo $encontrados['id_area']; ?>">

              <input type="hidden" class="form-control" placeholder="ID EXAMEN" name="id_examen" id="id_examen" autocomplete="" required="" value="<?php  echo $encontrados['id_examen'];?>">

               <div class="form-group row"> 
 
    <div class="col-md-6" >
                        <label for="nombre">Código del examen <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Código" name="codigo_examen" id="codigo_examen" autocomplete="" required="" value="<?php echo $encontrados['codigo_examen']?>">


                </div>
            <div class="col-md-6" >


                    <label for="nombre">Nombre del examen <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Nombre del Examen" name="nombre_examen" id="nombre_examen" autocomplete="" required="" value="<?php echo $encontrados['nombre_examen']?>">
                </div>


  <div class="col-md-6" >


         
           <label for="nombre">Género Referencia <i class="fas fa-lock" style="color:red"></i></label>
      




                          <select class="form-select" aria-label="Default select example" placeholder="Género de Referencia" name="id_genero_referencia" id="id_genero_referencia" autocomplete="" required="">
                                     <?php 
     
$id_genero_referencia=$encontrados['id_genero_referencia'];

$query = mysqli_query($conexion, "SELECT * FROM genero_referencia ");
                                               


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query)) { 


?>
<option value="<?php echo  $id_genero_ref=$data['id_genero_referencia'] ?>" 


<?php echo (($id_genero_referencia==$id_genero_ref)? "selected":"") ?>


    ><?php echo  $data['genero_referencia'] ?></option>
<?php  

}
}
?>

</select>

                </div>




                     <div class="col-md-6" >


                    <label for="nombre">Valor de Referencia <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Mínimo" name="valor_referencia" id="valor_referencia" autocomplete=""  required="" value="<?php echo $encontrados['valor_referencia']?>">

                      <input type="text" class="form-control" placeholder="Máximo" name="valor_referencia2" id="valor_referencia" autocomplete=""  required="" value="<?php echo $encontrados['valor_referencia2']?>">


                </div>







                                <div class="col-md-6" >


                    <label for="nombre">Nombre Nomenclatura <i class="fas fa-lock" style="color:red"></i></label>
                    <input type="text" class="form-control" placeholder="Nombre de nomenclatura" name="nombre_nomenclatura" id="nombre_nomenclatura" autocomplete="" required="" value="<?php echo $encontrados['nombre_nomenclatura']?>">
                </div>
            

                                <div class="col-md-6" >


                    <label for="nombre">Subárea</i></label>
                    <input type="text" class="form-control" placeholder="Ingrese Subárea" name="subarea" id="subarea" autocomplete=""  value="<?php echo $encontrados['subarea']?>">
                </div>

              <div class="col-md-6" >


                    <label for="nombre">Precio</label>
                    <input type="text" class="form-control" placeholder="Ingrese Precio" name="precio_examen" id="precio_examen" autocomplete=""  value="<?php echo $encontrados['precio_examen']?>">
                </div>



                                              <div class="col-md-6" >

                <br>
                <button  type="submit" value="" class="btn btn-primary" name="editar_examen">Guardar Cambios</button>
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