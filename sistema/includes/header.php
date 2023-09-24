<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../');

}


?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>www.labsoto.com</title>

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">






    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

      
  </head>






</head>

<body id="page-top" >

	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php include_once "includes/menu.php"; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light  text-white topbar mb-4 static-top shadow"  style="background: #143c50 ">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="background: #025a85    ">
						<i class="fa fa-bars" style="color:white"></i>
					</button>
					<div class="input-group">
						<h6></h6><!--- texto de titulo-->
						<p class="ml-auto"><strong></p><!--algun texto-->
					</div>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto" style="background: #143c50 "><!--COLOR ICONO ADMIN-->

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i><span class="mr-2 d-none d-lg-inline small text-white"><?php echo $_SESSION['usuario']; ?></span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<!--
								<a class="dropdown-item" href="#">
									
									<?php/* echo $_SESSION['nombre']; */?>
								</a>-->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="salir.php" style="background: #0f70a1 ">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="background: #0e3f58 "></i>
									<label style="color:white">Salir</label>
								</a>
							</div>
						</li>

					</ul>

				</nav>
