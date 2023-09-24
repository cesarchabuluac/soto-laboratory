<?php
include "includes/header.php";?>

<?php include_once "modelo_consulta.php";?>

<?php
if(isset($paciente_editar))
{
foreach ($paciente_editar as  $encontrados)
                            {
                            
                            //OTRA FORMA DE EXTRER REGISTROS CON FOREACH

                            }
                        }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cotización</h1>
        <a href="registro_de_pacientes.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left" ></i> Regresar</a>
    </div>


  <div class="row">
  
 <?php  foreach ($areas as $encontrados_a) {
     ?>



     <?php  }  ?>
<div class="col-lg-3">
                <div class="card">
                    <div class="card-header  text-white" style="background:  #1d6376;text-align: center;">
                        <form method="post" action="modelo_guardar.php">




                <input type="hidden" name="id_paciente" value="<?php echo $encontrados['id_paciente']; ?>">


                    <input type="hidden" name="id_area" value="<?php echo $encontrados_a['id_area']; ?>">

    
                     <input type="hidden" name="id_medico_referido" value="<?php echo $id_medico_referido=$_SESSION['id_medico_referido'] ?>">

            <input type="hidden" name="id_muestra" value="<?php echo $id_muestra=$_SESSION['id_muestra'] ?>">

    <input type="hidden" name="observaciones_muestra" value="<?php echo $observaciones_muestra=$_SESSION['observaciones_muestra'] ?>">





      <button type="submit" class="btn btn-primary-outline" style="color:white" name="crear_examen_cotizacion"><?php echo " Crear Formulario" ?></button>  

   


                </form>
                    </div>

</div>



</div>




 </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>