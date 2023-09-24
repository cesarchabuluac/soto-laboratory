


<?php include "../conexion.php"; //ubiación de la conexión?>

<?php


 //HACEMOS LA CONSULTA EN LA TABLA USUARIOS JUNTO CON EL ROL POR MEDIO DE INNER JOIN
                                
$query = mysqli_query($conexion,"SELECT u.id_usuario, u.nombre, u.caja, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");


$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        $valores[]= array(
        'id_usuario' => $encontrados['id_usuario'],
        'nombre' => $encontrados['nombre'],
        'usuario' => $encontrados['usuario'],
        'caja' => $encontrados['caja'],
        'rol' => $encontrados['rol'],
    );
        
    }
}
//codigo para verifcar si la consulta está funcionando
//foreach ($valores as $encontrados){
//echo   $encontrados['nombre'];
//}



?>

<?php


// guardamos los datos de la empresa si presionamos el botón guardar empresa .

 if(isset($_POST['guardar_empresa']))
        {
//GUARDAR DATOS DE LA EMPRESA
$alert = '';
$nit= $_POST['nit'];
$nombre = $_POST['nombre'];
$razon = $_POST['razon'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$iva = $_POST['iva'];

$actualizar_empresa = mysqli_query($conexion, "UPDATE empresa SET nit = $nit, nombre = '$nombre', razon = '$razon', telefono = $telefono, correo = '$correo', direccion = '$direccion', iva = $iva WHERE id_empresa=1");
mysqli_close($conexion);
if ($actualizar_empresa) {
  $alert = '<p class="msg_save">Configuración de empresa Actualizado</p>';
  header("Location: ../cadi_empresa.php");
} else {
  $alert = '<p class="msg_error">Error al Actualizar la Configuración de empresa</p>';
    header("Location: ../cadi_empresa.php");
}

}



//REGISTRAR USUARIO
        if(isset($_POST['guardar_usuario']))
        {
            if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['caja']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre = $_POST['nombre'];
        $caja = $_POST['caja'];
        $user = $_POST['usuario'];
        $clave = md5($_POST['clave']);
        $rol = $_POST['rol'];

        $query = mysqli_query($conexion, "SELECT * FROM usuario where usuario = '$user'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El usuario ya existe.
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO usuario(nombre,caja,usuario,clave,rol) values ('$nombre', '$caja', '$user', '$clave', '$rol')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado.
                        </div>';

  header("Location: ../registro_usuario.php");

            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar.
                    </div>';
                      header("Location: ../registro_usuario.php");
            }
        }
        header("Location: ../registro_usuario.php");

    }

}
}


?>


<?php  


//EDITAR USUARIO
// OBTENER LOS VALORES DEL USARIO POR MEDIO DEL ID que posteriormente se va a editar

if (empty($_REQUEST['id_usuario'])) {
  header("Location: registro_usuario.php");
}
$id_usuario = $_REQUEST['id_usuario'];
$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = $id_usuario");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: registro_usuario.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $id_usuario = $data['id_usuario'];
    $nombre = $data['nombre'];
    
    $usuario = $data['usuario'];
    $caja = $data['caja'];
    $rol = $data['rol'];
  }
}

//EDITAR USUARIO SI PRESIONAMOS EL BOTÓN EDITAR USAURIO
if(isset($editar_usuario))
{
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['rol'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idusuario = $_GET['id'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['correo'];
    $caja= $_POST['usuario'];
    $rol = $_POST['rol'];

    $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre', caja = '$caja' , usuario = '$usuario', rol = $rol WHERE idusuario = $idusuario");
    $alert = '<p>Usuario Actualizado</p>';
  }
}


  }


?>
