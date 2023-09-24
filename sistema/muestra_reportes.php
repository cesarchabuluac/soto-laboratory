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
        <h1 class="h3 mb-0 text-gray-800">Muestras con Reportes</h1>



 


    </div>

    <!-- Content Row -->
    <div class="row">
       <div class="col-lg-12">
 <!-- MODAL PARA REGISTAR CLIENTES---> 



 <div class="card">

     <div class="col-lg-12">

                    <div class="table-responsive">  

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 15px;font-family: inherit;">
                        <thead style="font-size: 12px;">
                            <tr>
                                <th>#</th>
                               
                          
                                
                                <th>Nombre & Apellidos</th>
                                
                                <th>Teléfono</th>
                                <th>Género</th>
                               <th>Fecha</th>
                            <th>Hora</th>
                            <th>Referido</th>

                            <th>Muestra</th>

                             <th>Observación</th>
                              
                                             
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                           <?php 
                           $fila=0; 
                           if(isset($pacientes_reportes))
                           {
                           foreach ($pacientes_reportes as  $encontrados)
                            {
                                $fila++
                         
                            
                                ?>
                                <tr><td><?php  echo $fila?></td>
                              
                              <td><?php  echo $encontrados['nombre_paciente']?></td>               

                                                        <td><?php  echo $encontrados['telefono_paciente']?></td>               
              
                                                        <td><?php  echo $encontrados['nombre_genero']?></td>               
                                     <td><?php  echo $encontrados['fecha_reporte']?></td>               
                                            <td><?php  echo $encontrados['hora_reporte']?></td>               
               
                    <td><?php  echo $encontrados['nombre_medico']?></td>               
        <td><?php  echo $encontrados['nombre_muestra']?></td>               

                     <td><?php  echo $encontrados['observaciones_muestra_reporte']?></td>               
                                                   
              



                                



                                </tr>
                              

                            <?php

                              }  // fin  if

                          }    //fin foreach 


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