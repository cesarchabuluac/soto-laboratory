<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background:    #08263e   ;">

	<?php include_once "modelo_consulta.php"; ?>

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-0">
			<img src="img/logo.png" width="70" height="50">
		</div>
		<div class="sidebar-brand-text mx-3"></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		<!--<a href="www.cadi.com" style="color:white">www.scriptrj45.com </a>-->
	</div>


	<style type="text/css">
		.navbar {
			margin-bottom: 0;
			background-color: #f4511e;
			z-index: 9999;
			border: 0;
			font-size: 12px !important;
			line-height: 1.42857143 !important;
			letter-spacing: 4px;
			border-radius: 0;
			font-family: Montserrat, sans-serif;
		}

		.navbar li a,
		.navbar .navbar-brand {
			color: #fff !important;
		}

		.navbar-nav li a:hover,
		.navbar-nav li.active a {
			color: white !important;
			background-color: #1746ad !important;
		}

		.navbar-default .navbar-toggle {
			border-color: transparent;
			color: #fff !important;
		}

		.dropdown li a {
			color: #f4511e !important;
		}

		.navbar-default .navbar-nav>.open>a.dropdown-toggle {
			background-color: #f4511e !important;
		}
	</style>



	<!-- Nav Item - Pages Collapse Menu -->



	<li class="nav-item" href="" data-toggle="collapse" data-target="#collapseTwo_MENU" aria-expanded="true" aria-controls="collapseTwo_MENU">
		<a class="nav-link collapsed" href="index.php">
			<i class="fas fa-window-maximize"></i>
			<span>Panel Principal</span>
		</a>
	</li>











	<li class="nav-item" href="#" data-toggle="collapse" data-target="#collapseTwo_empresa" aria-expanded="true" aria-controls="collapseTwo_empresa">
		<a class="nav-link collapsed" href="#">
			<i class="fas fa-store-alt"></i>
			<span>Laboratorio</span>
		</a>
		<div id="collapseTwo_empresa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

			<?php if ($_SESSION['id_rol'] != 1)  //solo para administrador activar registro de usuarios
			{
			} else {

			?>

				<div class="bg-gradient-primary py-2 collapse-inner rounded">
					<a class="collapse-item" href="empresa.php" style="color:white">Configuración</a>

				</div>



				<div class="bg-gradient-primary py-2 collapse-inner rounded">

					<a class="collapse-item" href="registro_usuario.php" style="color:white">Registrar Usuarios</a>

				</div>

			<?php

			}

			?>
			<!--
						<div class="bg-gradient-primary py-2 collapse-inner rounded">
				<a class="collapse-item" href="asignar_tecnico.php" style="color:white">Asignar Técnico</a>

			</div>		-->


		</div>
	</li>



	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item" href="#" data-toggle="collapse" data-target="#collapseTwo_PRODUCTOS" aria-expanded="true" aria-controls="collapseTwo_PRODUCTOS">
		<a class="nav-link collapsed" href="medicos_referidos.php">
			<i class="fas fa-user-md"></i>
			<span>Médicos Referidos</span>
		</a>

	</li>





	<!-- Nav Item - Clientes Collapse Menu -->
	<li class="nav-item" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
		<a class="nav-link collapsed" href="registro_de_pacientes.php">
			<i class="fas fa-users"></i>
			<span>Pacientes</span>
		</a>

	</li>




	<?php if ($_SESSION['id_rol'] != 1)  //solo para administrador activar registro de usuarios
	{
	} else {

	?>
		<!-- Nav Item - Clientes Collapse Menu -->
		<li class="nav-item" href="#" data-toggle="collapse" data-target="#collapseTwo_LABORATORIOS" aria-expanded="true" aria-controls="collapseUtilities">
			<a class="nav-link collapsed" href="#">
				<i class="fas fa-microscope"></i>
				<span>Configurar Exámenes</span>
			</a>

			<div id="collapseTwo_LABORATORIOS" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-gradient-primary py-2 collapse-inner rounded ">

					<a class="collapse-item" href="lista_de_areas.php" style="color:white">Configuración</a>

				</div>

				<div class="bg-gradient-primary py-2 collapse-inner rounded ">

					<a class="collapse-item" href="antibioticos.php" style="color:white">Antibióticos</a>

				</div>






		</li>

	<?php

	}
	?>


	<!-- Nav Item - Clientes Collapse Menu -->
	<li class="nav-item" href="#" data-toggle="collapse" data-target="#collapseTwo_INVENTARIO" aria-expanded="true" aria-controls="collapseUtilities">
		<a class="nav-link collapsed" href="#">
			<i class="fas fa-th"></i>
			<span>Reportes</span>
		</a>
		<div id="collapseTwo_INVENTARIO" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			
			<div class="bg-gradient-primary py-2 collapse-inner rounded">
				<a class="collapse-item" href="estadisticas_quimica.php" style="color:white">Estadisticas</a>
			</div>

			<div class="bg-gradient-primary py-2 collapse-inner rounded">
				<a class="collapse-item" href="cotizaciones_realizadas.php" style="color:white">Cotizaciones Realizadas</a>
			</div>
			<div class="bg-gradient-primary py-2 collapse-inner rounded">

				<a class="collapse-item" href="formularios_cargados.php" style="color:white">Resultados Guardados</a>
			</div>

			<div class="bg-gradient-primary py-2 collapse-inner rounded">

				<a class="collapse-item" href="pruebas_vendidas.php" style="color:white">Pruebas Vendidas</a>
			</div>


			<div class="bg-gradient-primary py-2 collapse-inner rounded">

				<a class="collapse-item" href="muestra_reportes.php" style="color:white">Muestras No Procesados</a>
			</div>


		</div>
	</li>





</ul>