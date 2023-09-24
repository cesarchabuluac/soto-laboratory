
<?php //include "../../conexion.php"; //para pruebas internas desde este archivo consultas.php activar Y Desactivar el otro?> 
<?php include "../conexion.php"; //para pruebas internas desde este archivo registros_usuarios.php activar Y Desactivar el otro?>
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



