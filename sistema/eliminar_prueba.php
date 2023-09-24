
<?php include "../conexion.php"; //ubiación de la conexión?>
<?php
session_start();

$id_usuario=$_SESSION['id_usuario'];
//Una vez realizado con éxito, eliminamos las ventas creadas que nunca se finalizaron de nuestro usuario.
      $query_delete = mysqli_query($conexion, "DELETE  FROM ventas_creadas WHERE estado_venta=0 and id_usuario=$id_usuario"); //eliminamos

?>