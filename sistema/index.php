<?php include_once "includes/header.php"; ?>

<?php include_once "modelo_consulta.php";?>
<style type="text/css">
	
label{
	color: black;

}

</style>


<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Panel Principal</h1>


		<?php 
		error_reporting(0);



?>

<?php  $contar ?>

	</div>

	<!-- Content Row -->
	<div class="row">


	

		<!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="registro_de_pacientes.php">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs  text--primary text-uppercase mb-1 "><strong style="font-size:15px;font-family: sans-serif;">Pacientes</strong></div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $contar_pacientes?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</a>


		<!-- Pending Requests Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="formularios_cargados.php">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><strong style="font-size:15px;font-family: sans-serif;">Resultados Guardados</strong></div>
							<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 "> </div>
						</div>
						<div class="col-auto">
							<i class="fas fa-microscope fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</a>



		<!-- Earnings (Monthly) Card Example -->
		<a class="col-xl-3 col-md-6 mb-4" href="cotizaciones_realizadas.php">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><strong style="font-size:15px;font-family: sans-serif;">Cotización de Laboratorios</strong></div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-notes-medical fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
		</a>


		





	</div>




	
		






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>