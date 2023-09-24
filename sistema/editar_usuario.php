<?php
include "includes/header.php";?>

<?php include_once "modelo_consulta.php";?>




<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Usuario</h1>
        <a href="registro_usuario.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left" ></i> Regresar</a>
    </div>


  <div class="row">
    <div class="col-lg-6 m-auto">
       <!--OBTENEMOS DEL ID USUARIO Y LO ADJUNTAMOS CON INNER JOIN CON TABLA ROL Y CAJA PARA OBTENER EL REGISTRO ALMACENADO ACTUAL DE ESTE ID-->
      <form class="" action="modelo_update.php" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario=$_GET['id_usuario']; ?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>" autocomplete="off">

        </div>

<div class="form-group">
          <label for="rol">Rol</label>
          <select class="browser-default custom-select"  style="background:  #ffffff   ;color:  #1a222e ;
        color:  #1a222e ;font-family: sans-serif;" required   name="id_rol">
        <!--OBTENEMOS DEL ID USUARIO Y LO ADJUNTAMOS CON INNER JOIN CON TABLA ROL Y CAJA PARA OBTENER EL REGISTRO ALMACENADO ACTUAL DE ESTE ID-->
        <option value="<?php echo $id_rol ?>" selected><?php echo $nombre_rol ?></option>

        <?php 
//Obtenemos los roles mediante el array
foreach ($roles as $encontrados){

?>
 <option value="<?php echo $encontrados['id_rol'] ?>"><?php echo $encontrados['nombre_rol'] ?></option>
<?php
  }  
  ?>

</select>
        </div>


        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" placeholder="Ingrese usuario" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario; ?>" autocomplete="off">

        </div>
        
        <button type="submit" class="btn btn-primary" name="editar_usuario"><i class="fas fa-save"></i> Guardar Cambios</button>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>