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
        <h1 class="h3 mb-0 text-gray-800">Laboratorios Realizados</h1>


</div>




 <div class="card">

     <div class="col-lg-12">

                    <div class="table-responsive">  

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 15px;font-family: inherit;">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>#</th>
                              
                                
                                <th>Nombre & Apellidos</th>
                                
                                <th>Código Formulario</th>
                                <th>Fecha</th>
                                 <th>hora</th>

                                <th>Referido</th>
                                 <th>Técnico</th>
                                 <th>Área</th>



                                
                             
                                <th>Ingresar Resultados</th>
                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                           <?php 
                           $fila=0; 
                           if(isset($formularios_creados))
                           {
                           foreach ($formularios_creados as  $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr><td><?php  echo $fila?></td>
                              

                                <td><?php  echo $nombre_paciente= $encontrados['nombre_paciente']; ?></td>
                                <td><?php  echo $codigo_formulario= $encontrados['codigo_formulario']; ?></td>
                     <td><?php  echo $fecha_creado= $encontrados['fecha_creado']; ?></td>
                                          <td><?php  echo $hora_creado= $encontrados['hora_creado']; ?></td>


     <td><?php  echo $nombre_medico= $encontrados['nombre_medico']; ?></td>

     <td><?php  echo $nombre_tecnico= $encontrados['usuario']; ?></td>

         <td><?php  echo $nombre_area= $encontrados['nombre_area']; ?></td>

                              
                                <td>
    
       
                           
    <div class="form-group row"> 
  <div class="col-md-4" > 
    <a href="cargar_resultados.php?codigo_formulario=<?php  echo $codigo_formulario= $encontrados['codigo_formulario']; ?>">
                    <i class="fas fa-flask" style="font-size: 30px; color: green;"></i></a>

                </div>

  
</div>



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






 






</div>


</div>
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>