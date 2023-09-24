<?php include_once "includes/header.php"; ?>

<?php include_once "modelo_consulta.php";?>

<?php include_once "datos_empresa.php";?>


<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		


	</div>

<style type="text/css">
/*  PONEMOS COLOR A LA LETRA DESDE ESTE CSS */
strong{
	color: black;

}


</style>



	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Datos del Laboratorio</h1>
	</div>

	<div class="row">
		 

		<!-- VISUALIZAR DATOS DE LA EMPRESA-->
<div class="col-lg-6 m-auto">
				<div class="card">
					<div class="card-header  text-white" style="background:  #265873 ;" data-toggle="modal" data-target="#exampleModalLong">
						Editar



						
						<i class="fas fa-edit" data-toggle="modal" data-target="#exampleModalLong"></i>
					</div>
					<div class="card-body">
						<div class="p-3">
							<div class="form-group">
								<strong>Nit</strong>
								<h6><?php echo $nit_empresa; ?></h6>
							</div>
							<div class="form-group">
								<strong>Nombre:</strong>
								<h6><?php echo $nombre_empresa ?></h6>
							</div>
							<div class="form-group">
								<strong>Razon Social:</strong>
								<h6><?php echo $razon_empresa ?></h6>
							</div>
							<div class="form-group">
								<strong>Teléfono:</strong>
								<h6><?php echo $telefono_empresa; ?></h6>
							</div>
							<div class="form-group">
								<strong>Correo Electrónico:</strong>
								<h6><?php echo $correo_empresa; ?></h6>
							</div>
							<div class="form-group">
								<strong>Dirección:</strong>
								<h6><?php echo $direccion_empresa; ?></h6>
							</div>

							<!--
							<div class="form-group">
								<strong>IVA (%):</strong>
								<h6><?php  $iva; ?></h6>
							</div>-->

</div>
</div>
</div>
</div>

   	<br>

 
         
   

  

  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="true" data-keyboard="true">
  	    <!--DEJAMOS ESPACIO PARA ACOPLAR AL MOVIL-->
  	      <br>
        	<br>
        	<br>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	

<!-- DATOS DE LA EMPRESA-->
			<div class="col-lg-12 m-auto">
				<div class="card">
					<div class="card-header  text-white" style="background:  #042246 ;">
						Datos del Laboratorio
					</div>
					<div class="card-body" >
						
						 
      <form class="" action="modelo_update.php" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id_empresa" value="<?php echo $id_empresa; ?>">
        
    <div class="form-group">
          <label for="nit">NIT</label>
          <input type="text" placeholder="Ingrese NIT" class="form-control" name="nit" id="nit" value="<?php echo $nit_empresa; ?>" required="" autocomplete="off" style="color:black">
        </div>



        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre_empresa; ?>" autocomplete="off" style="color:black">
        </div>



  <div class="form-group">
          <label for="razon">Razón Social</label>
          <input type="text" placeholder="Ingrese Razón Social" class="form-control" name="razon" id="razon" value="<?php echo $razon_empresa; ?>" required autocomplete="off" style="color:black">

        </div>

       


           <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="text" placeholder="Ingrese teléfono" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono_empresa; ?>" autocomplete="off" style="color:black">

        </div>

 <div class="form-group">
          <label for="correo">Correo</label>
          <input type="text" placeholder="Ingrese correo" class="form-control" name="correo" id="correo" value="<?php echo $correo_empresa; ?>" autocomplete="off" style="color:black">

        </div>


        <div class="form-group">
          <label for="direccion">Dirección</label>
          <input type="text" placeholder="Ingrese direccion" class="form-control" name="direccion" id="direccion" value="<?php echo $direccion_empresa; ?>" autocomplete="off" style="color:black">

        </div>

           
          <input type="hidden" placeholder="Ingrese IVA" class="form-control" name="iva" id="iva" value="<?php echo $iva; ?>" required autocomplete="off" style="color:black">

   

  
     
          <div> 
        <button type="submit" class="btn btn-primary" style="background:    #075c71"  name="editar_empresa" ><i class="fas fa-save"></i> Guardar Cambios</button>
      </div>
      </form>
   


					</div>
				</div>
			</div>
		




        </div>
    
      </div>
    </div>
  </div>
</div>



				

		
			
		




</div>
<!-- /.container-fluid -->


<?php include_once "includes/footer.php"; ?>