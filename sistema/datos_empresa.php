

<?php include "../conexion.php"; //ubiación de la conexión


?>



<?php

// datos Empresa
$nit = '';
$nombre = '';
$razon = '';
$telefono= '';
$correo = '';
$direccion = '';
$iva= '';

$query_empresa = mysqli_query($conexion, "SELECT * FROM empresa");
$row_empresa = mysqli_num_rows($query_empresa);
if ($row_empresa > 0) {
  if ($infoEmpresa = mysqli_fetch_assoc($query_empresa)) {
    $nit_empresa = $infoEmpresa['nit'];
    $nombre_empresa= $infoEmpresa['nombre'];
    $razon_empresa = $infoEmpresa['razon'];
    $telefono_empresa = $infoEmpresa['telefono'];
    $correo_empresa = $infoEmpresa['correo'];
    $direccion_empresa = $infoEmpresa['direccion'];
    $iva = $infoEmpresa['iva'];
  }
}

?>

