
<?php include "../conexion.php"; //ubiación de la conexión ?>
<?php 




//================================================================================================
//ESTAS CONSULTAS LAS AGREGAMOS A NUESTROS ARCHIVOS PHP PARA HACER USO DE ELLO PERO POR MEDIO DE INCLUDE_ONCE


 //HACEMOS LA CONSULTA EN LA TABLA empresa JUNTO CON la tabla rol POR MEDIO DE INNER JOIN
                                
$query = mysqli_query($conexion, "SELECT m.id_categoria, c.id_categoria FROM categoria AS c INNER JOIN medida m ON m.id_categoria=c.id_categoria");
                                               

$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($encontrados = mysqli_fetch_assoc($query)) { 

//creamos un array donde guardamos los registros para luego ser utilizados en el foreach
        echo $encontrados['id_categoria'];
   
   
        
        

        
    }
}

