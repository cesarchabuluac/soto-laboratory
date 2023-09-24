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
        <h1 class="h3 mb-0 text-gray-800">Pruebas Vendidas</h1>


</div>


<form method="post">
    <input type="submit" class="btn btn-primary" name="enviar" value="Visualizar">
    <input type="date" name="fecha_inicio" required="">
    <input type="date" name="fecha_final" required="">


<?php  
if(isset($_POST['enviar']))
{
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_final=$_POST['fecha_final'];
 

  setlocale(LC_TIME, "spanish");
$mi_fecha =  $_POST['fecha_inicio'];
$mi_fecha = str_replace("/", "-", $mi_fecha);     
$Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));       
$fecha_inicio_es = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha));


$mi_fecha2 =  $_POST['fecha_final'];
$mi_fecha2 = str_replace("/", "-", $mi_fecha2);     
$Nueva_Fecha2 = date("d-m-Y", strtotime($mi_fecha2));       
$fecha_final_es = strftime("%d/%m/%Y ", strtotime($Nueva_Fecha2));
}
?>
 <div class="card">

     <div class="col-lg-12">

                    <div class="table-responsive">  

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;font-size: 15px;font-family: inherit;">
                        <thead style="font-size: 12px;">
                            <tr>
             
                              
              
                                <th>Código</th>
                                <th><?php if(isset($_POST['enviar']))
                                {

                                echo $fecha_inicio_es." Al ".$fecha_final_es;

 }
                                 ?></th>
                                
                                <th>cantidad</th>
                                <th>precio</th>
                                 <th>Total</th>
                                            
                                 
                         
                            </tr>
                        </thead>
                        <tbody style="font-size:13px">
                           <?php 
                        
                           if(isset($examenes2))
                           {
                           foreach ($examenes2 as  $encontrados)
                            {
                            
                         
                            
                                ?>
     
                              <tr>

                                <td><?php  echo $codigo_examen= $encontrados['codigo_examen']; ?></td>
                                <td><?php  echo $nombre_examen= $encontrados['nombre_examen']; ?></td>
                            <td>
                                
<?php
//================================================================================================

// preubas vendidas

 //  obtenemos las pruebas vendidas
 
 if(isset($_POST['enviar']))
 {



   $contar=0;                                            


$query = mysqli_query($conexion, "SELECT  d.id_examen,d.fecha_agregado,e.id_examen,e.codigo_examen,e.precio_examen,e.nombre_examen FROM detalle_examenes d INNER JOIN examenes e ON d.id_examen=e.id_examen WHERE fecha_agregado>='$fecha_inicio' and fecha_agregado<='$fecha_final' and estado_examen_cargado=1 and e.codigo_examen=$codigo_examen");

while ($data = mysqli_fetch_assoc($query)) { 
$contar=$contar+1;
//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $precio_examen=$data['precio_examen'];
       
        
    }
    $precio_examen;
   





echo $contar;
        
    }
?>




                            </td>

                            <td><?php  echo $precio_examen= $encontrados['precio_examen']; ?></td>




         <td>
             
<?php
if(isset($_POST['enviar']))
{
echo number_format($contar*$precio_examen,2);
}
?>



         </td>
                              










        


                                  

                                



                                </tr>
                              

                            <?php

                              }

                          }


                            ?>
                            

                        </tbody>
                        <tfoot>
                            
                        <tr><td></td><td></td><td></td><td></td><td></td></tr>    
                        </tfoot>        
                       </table>  

                    </div>
                </div>






 


</form>



</div>


</div>
</div>


<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>