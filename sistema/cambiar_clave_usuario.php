<?php
include "includes/header.php";?>

<?php include_once "modelo_consulta.php";?>
<?php include_once "modelo_consulta.php";?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cambiar Contraseña</h1>
        <a href="registro_usuario.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left" ></i> Regresar</a>
    </div>

  <div class="row">
    <div class="col-lg-6 m-auto">
      <!-- OBTENEMOS EL ID DESDE EL MODELO CONSULTA DE LA TABLA USUARIO-->
      <form class="" action="modelo_update.php" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario=$_GET['id_usuario'];?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" disabled  style="font-weight: bold; color:black;">

        </div>
     
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" placeholder="Ingrese usuario" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario; ?>" disabled style="font-weight: bold; color:black;">

        </div>

         <div class="form-group">
          <label for="clave">Nueva Clave</label>
          <input type="password" placeholder="Escribir Nuevo Password" class="form-control" name="clave" id="clave" value="" style="font-weight: bold; color:black;">

        </div>
        
        <button type="submit" class="btn btn-primary" name="cambiar_clave_usuario"><i class="fas fa-key" style="color:  #e7cd2d  "></i> Confirmar Cambio</button>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>