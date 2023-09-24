<?php
   require("../conexion.php");?>



<?php
//===========================================================================================================
//ELIMINAR USUARIO
//OBTENEMOS EL ID DEL USUARIO QUE QUEREMOS ELIMINAR
if (!empty($_GET['id_usuario'])) {
 
    $id_usuario = $_GET['id_usuario'];





    $query_delete = mysqli_query($conexion, "DELETE FROM usuario WHERE id_usuario = $id_usuario");
    mysqli_close($conexion);
    header("location: registro_usuario.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>



<?php
//===========================================================================================================
//ELIMINAR el examen agregado
//OBTENEMOS EL ID DEL examen, buscamos el codigo del formulario antes de elimninar para que regrese al formulario que es.

if (!empty($_GET['id_detalle_examen'])) {
 
    echo $id_detalle_examen = $_GET['id_detalle_examen'];

$query_delete = mysqli_query($conexion, "SELECT d.id_detalle_examen,d.id_examen_creado,e.id_examen_creado,e.codigo_formulario FROM detalle_examenes d INNER JOIN examenes_creados e ON d.id_examen_creado=e.id_examen_creado WHERE d.id_detalle_examen=$id_detalle_examen");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

echo $codigo_formulario=$data['codigo_formulario'];
echo $id_examen_creado=$data['id_examen_creado'];


}
$codigo_formulario;
  

}



    $query_delete = mysqli_query($conexion, "DELETE FROM detalle_examenes WHERE id_detalle_examen = $id_detalle_examen");

 $query_delete_2 = mysqli_query($conexion, "DELETE FROM detalles_cultivo WHERE codigo_formulario='$codigo_formulario'"); //Eliminamos los cultimos del formulario si se elimina el id del detalle examen


  $query_delete_3 = mysqli_query($conexion, "DELETE FROM examen_cultivo WHERE id_examen_creado =$id_examen_creado");

  $query_delete_4 = mysqli_query($conexion, "DELETE FROM detalles_orina WHERE id_examen_creado =$id_examen_creado");


  $query_delete_5 = mysqli_query($conexion, "DELETE FROM detalles_heces WHERE id_examen_creado =$id_examen_creado");

    $query_delete_6 = mysqli_query($conexion, "DELETE FROM detalle_examenes_hematologia WHERE id_examen_creado =$id_examen_creado");

    mysqli_close($conexion);
    header("location: agregar_examenes.php?codigo_formulario=$codigo_formulario"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>




<?php
//===========================================================================================================
//ELIMINAR el detalle del cultivo agregado
//  antes obtenemos el código de formulario para poder regresar

if (!empty($_GET['id_examen_cultivo'])) {
 
$id_examen_cultivo = $_GET['id_examen_cultivo'];

$query_delete = mysqli_query($conexion, "SELECT * FROM detalles_cultivo WHERE id_examen_cultivo=$id_examen_cultivo");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

$codigo_formulario=$data['codigo_formulario'];


}
$codigo_formulario;
  

}



    $query_delete = mysqli_query($conexion, "DELETE FROM detalles_cultivo WHERE id_examen_cultivo =$id_examen_cultivo");


    mysqli_close($conexion);
    header("location: cargar_resultados_especificos.php?codigo_formulario=$codigo_formulario"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>




<?php
//===========================================================================================================
//ELIMINAR el examen agregado
//OBTENEMOS EL ID DEL examen, buscamos el codigo del formulario antes de elimninar para que regrese al formulario que es.

if (!empty($_GET['id_detalle_examen_cotizacion'])) {
 
    echo $id_detalle_examen = $_GET['id_detalle_examen_cotizacion'];

$query_delete = mysqli_query($conexion, "SELECT d.id_detalle_examen,d.id_examen_creado,e.id_examen_creado,e.codigo_formulario FROM detalle_examenes d INNER JOIN examenes_creados e ON d.id_examen_creado=e.id_examen_creado WHERE d.id_detalle_examen=$id_detalle_examen");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

echo $codigo_formulario=$data['codigo_formulario'];


}
$codigo_formulario;
  

}



    $query_delete = mysqli_query($conexion, "DELETE FROM detalle_examenes WHERE id_detalle_examen = $id_detalle_examen");
    mysqli_close($conexion);
    header("location: agregar_examenes_cotizacion.php?codigo_formulario=$codigo_formulario"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>





<?php
//===========================================================================================================
//ELIMINAR COLOR
//OBTENEMOS EL ID DEL color
if (!empty($_GET['id_color'])) {


 
    $id_color = $_GET['id_color'];



    $query_delete = mysqli_query($conexion, "SELECT * FROM productos WHERE id_color=$id_color");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

$id_color_encontrado=$data['id_color'];


}
  

}

 echo isset($id_color_encontrado)? $id_color_encontrado:$ver=0;


   
if(isset($ver))  //SI NO EXISTE EL CODIGO DEL PRODUCTO EN ALGUNA VENTA ENTONCES SI ELIMINAR
{
    echo "procede a eliminar";
   $query_delete = mysqli_query($conexion, "DELETE  FROM color WHERE id_color=$id_color ");
   mysqli_close($conexion);
  header("location: reporte_de_colores.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
else

{ //DE LO CONTRARIO SI EL CODIGO YA EXISTE EN ALGUNA VENTA NO ELIMINAR Y SOLO REGRESAR
    echo " NO procede a eliminar";
    header("location: reporte_de_colores.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO

}


    
}
?>

<?php
//===========================================================================================================
//ELIMINAR MARCA
//OBTENEMOS EL ID 
if (!empty($_GET['id_marca'])) {
 
    $id_marca = $_GET['id_marca'];


$query_delete = mysqli_query($conexion, "SELECT * FROM productos WHERE id_marca=$id_marca");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

$id_marca_encontrado=$data['id_marca'];


}
  

}

 echo isset($id_marca_encontrado)? $id_marca_encontrado:$ver=0;


   
if(isset($ver))  //SI NO EXISTE EL CODIGO DEL PRODUCTO EN ALGUNA VENTA ENTONCES SI ELIMINAR
{
    $query_delete = mysqli_query($conexion, "DELETE FROM marca WHERE id_marca= $id_marca");
    mysqli_close($conexion);
    header("location: reporte_marcas.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
else

{ //DE LO CONTRARIO SI EL CODIGO YA EXISTE EN ALGUNA VENTA NO ELIMINAR Y SOLO REGRESAR
    echo " NO procede a eliminar";
   header("location: reporte_marcas.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO

}


    
}
?>




}
?>

<?php
//===========================================================================================================
//ELIMINAR MODELO
//OBTENEMOS EL ID 
if (!empty($_GET['id_modelo'])) {
 
    $id_modelo = $_GET['id_modelo'];


$query_delete = mysqli_query($conexion, "SELECT * FROM productos WHERE id_modelo=$id_modelo");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

$id_modelo_encontrado=$data['id_modelo'];


}
  

}

 echo isset($id_modelo_encontrado)? $id_modelo_encontrado:$ver=0;


   
if(isset($ver))  //SI NO EXISTE EL CODIGO DEL PRODUCTO EN ALGUNA VENTA ENTONCES SI ELIMINAR
{
    $query_delete = mysqli_query($conexion, "DELETE FROM modelo WHERE id_modelo= $id_modelo");
    mysqli_close($conexion);
    header("location: reporte_modelos.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
else

{ //DE LO CONTRARIO SI EL CODIGO YA EXISTE EN ALGUNA VENTA NO ELIMINAR Y SOLO REGRESAR
    echo " NO procede a eliminar";
 header("location: reporte_modelos.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO

}



}
?>

<?php
//===========================================================================================================
//ELIMINAR tipo
//OBTENEMOS EL ID 
if (!empty($_GET['id_tipo'])) {
 
    $id_tipo = $_GET['id_tipo'];


$query_delete = mysqli_query($conexion, "SELECT * FROM productos WHERE id_tipo=$id_tipo");
    $result = mysqli_num_rows($query_delete);
                        if ($result > 0) {
while ($data = mysqli_fetch_assoc($query_delete)) {

$id_tipo_encontrado=$data['id_tipo'];


}
  

}

 echo isset($id_tipo_encontrado)? $id_tipo_encontrado:$ver=0;


   
if(isset($ver))  //SI NO EXISTE EL CODIGO DEL PRODUCTO EN ALGUNA VENTA ENTONCES SI ELIMINAR
{
    $query_delete = mysqli_query($conexion, "DELETE FROM tipo WHERE id_tipo= $id_tipo");
    mysqli_close($conexion);
    header("location: reporte_tipos.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
else

{ //DE LO CONTRARIO SI EL CODIGO YA EXISTE EN ALGUNA VENTA NO ELIMINAR Y SOLO REGRESAR
    echo " NO procede a eliminar";
    header("location: reporte_tipos.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO

}



    
}
?>

<?php
//===========================================================================================================
//ELIMINAR categoría
//OBTENEMOS EL ID 
if (!empty($_GET['id_categoria'])) {


 
    $id_categoria= $_GET['id_categoria'];
    $query_delete = mysqli_query($conexion, "DELETE  FROM categoria WHERE id_categoria=$id_categoria ");
      $query_delete2 = mysqli_query($conexion, "DELETE  FROM medida WHERE id_categoria=$id_categoria ");

    mysqli_close($conexion);
    header("location: registro_de_nomenclaturas.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>



<?php
//===========================================================================================================
//ELIMINAR MODELO
//OBTENEMOS EL ID 
if (!empty($_GET['id_talla'])) {


 
    $id_talla= $_GET['id_talla'];
    $query_delete = mysqli_query($conexion, "DELETE  FROM medida WHERE id_talla=$id_talla ");
    mysqli_close($conexion);
    header("location: registro_de_nomenclaturas.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>

<?php
//===========================================================================================================
//ELIMINAR producto si aun no hay ventas de ese código de productos.
//OBTENEMOS EL ID 
if (!empty($_GET['id_producto'])) {


 
   echo  $id_producto= $_GET['id_producto'];
   $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id_producto=$id_producto");
            $result = mysqli_num_rows($query);
            
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) {
                echo $id_local=$data['id_local'];



              }
          }

   $query = mysqli_query($conexion, "SELECT * FROM detalle_ventas WHERE id_producto=$id_producto");
            $result = mysqli_num_rows($query);
            
            if ($result > 0) {
              while ($data = mysqli_fetch_assoc($query)) {
                $id_producto_encontrado=$data['id_producto'];

      

              

              }
          }

         

    echo isset($id_producto_encontrado)? $id_producto_encontrado:$verificado=0;

   
if(isset($verificado))  //SI NO EXISTE EL CODIGO DEL PRODUCTO EN ALGUNA VENTA ENTONCES SI ELIMINAR
{
    echo "procede a eliminar";
   $query_delete = mysqli_query($conexion, "DELETE  FROM productos WHERE id_producto=$id_producto ");
   mysqli_close($conexion);
  header("location: registro_de_productos.php?id_local=$id_local"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
else

{ //DE LO CONTRARIO SI EL CODIGO YA EXISTE EN ALGUNA VENTA NO ELIMINAR Y SOLO REGRESAR
    echo " NO procede a eliminar";
      header("location: registro_de_productos.php?id_local=$id_local"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO

}
 
}
?>

<?php
//===========================================================================================================
//ELIMINAR producto del detalle de ventas y regresar agregar_productos_venta.php
//OBTENEMOS EL ID 
if (!empty($_GET['id_detalle'])) {


 
    $id_detalle= $_GET['id_detalle'];

    $query = mysqli_query($conexion,"SELECT * FROM detalle_ventas WHERE id_detalle=$id_detalle"); // antes de eliminar hacemos una consulta para que nos devuelta el número de venta creado 
    $result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 

    $id_venta=$data['id_venta']; //obtenemos la venta creado para continuar
}
}


    $query_delete = mysqli_query($conexion, "DELETE  FROM detalle_ventas WHERE id_detalle=$id_detalle "); //eliminamos los detalle
    mysqli_close($conexion);




    header("location: agregar_productos_venta.php?id_venta=$id_venta"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO por medio del id  de la venta creado
}
?>


<?php 
//=======================================================================================================
//ELIMINAR PERSONAL POR MARKOS SANCHEZ
if(isset($_GET['id_personal'])){

    $id_personal=$_GET['id_personal'];



    $query = mysqli_query($conexion,"SELECT * FROM imagenes_personal WHERE id_personal=$id_personal"); // antes de eliminar hacemos una consulta para que nos devuelta el id del personal para luego regresa
    $result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 

    $id_personal=$data['id_personal']; //obtenemos la venta creado para continuar
     $nombre_imagen_personal=$data['nombre_imagen_personal'];
     $id_imagen_personal=['id_imagen_personal'];
}
}

$query_delete = mysqli_query($conexion, "DELETE  FROM imagenes_personal WHERE id_imagen_personal=$id_imagen_personal");

    header("location: agregar_foto_personal.php?id_personal=$id_personal"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
        unlink("imagenes/$nombre_imagen_personal");





    $query_delete_2=mysqli_query($conexion, "DELETE FROM mi_personal WHERE id_personal=$id_personal");
  
    
    header("Location:lista_personal.php");
}
?>




<?php
//===========================================================================================================
//ELIMINAR MODELO
//OBTENEMOS EL ID 
if (!empty($_GET['id_planilla_creado'])) {


 
    $id_planilla_creado= $_GET['id_planilla_creado'];
    $query_delete = mysqli_query($conexion, "DELETE  FROM crear_planilla WHERE id_planilla_creado=$id_planilla_creado ");
    mysqli_close($conexion);
    header("location: crear_planilla.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>




<?php
//===========================================================================================================
//ELIMINAR REGISTRO DE MOTORISTA
//OBTENEMOS EL ID 
if (!empty($_GET['id_motorista'])) {


 
    $id_motorista= $_GET['id_motorista'];
    $query_delete = mysqli_query($conexion, "DELETE  FROM motorista WHERE id_motorista=$id_motorista");
    mysqli_close($conexion);
    header("location: registro_motorista.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>

<?php
//===========================================================================================================
//ELIMINAR REGISTRO DEl pedido express
//OBTENEMOS EL ID 
if (!empty($_GET['id_pedido'])) {


 
    $id_pedido= $_GET['id_pedido'];
    $query_delete = mysqli_query($conexion, "DELETE  FROM pedido_express WHERE id_pedido=$id_pedido");
    mysqli_close($conexion);
    header("location: registro_express.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
}
?>


<?php
//===========================================================================================================
//ELIMINAR la foto de perfil del personal por medio del ID
//OBTENEMOS EL ID 
if (!empty($_GET['id_imagen_personal'])) {



    $id_imagen_personal= $_GET['id_imagen_personal'];



    $query = mysqli_query($conexion,"SELECT * FROM imagenes_personal WHERE id_imagen_personal=$id_imagen_personal"); // antes de eliminar hacemos una consulta para que nos devuelta el id del personal para luego regresa
    $result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 

    $id_personal=$data['id_personal']; //obtenemos la venta creado para continuar
     $nombre_imagen_personal=$data['nombre_imagen_personal'];
}
}





    $query_delete = mysqli_query($conexion, "DELETE  FROM imagenes_personal WHERE id_imagen_personal=$id_imagen_personal");
    mysqli_close($conexion);
    header("location: agregar_foto_personal.php?id_personal=$id_personal"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
        unlink("imagenes/$nombre_imagen_personal");
}
?>

<?php

    if (!empty($_GET['id_imagen_producto'])) {



    $id_imagen_producto= $_GET['id_imagen_producto'];



    $query = mysqli_query($conexion,"SELECT * FROM imagenes_productos WHERE id_imagen_producto=$id_imagen_producto"); // antes de eliminar hacemos una consulta para que nos devuelta el id del personal para luego regresa
    $result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 

    $id_producto=$data['id_producto']; //obtenemos la venta creado para continuar
     $nombre_imagen_producto=$data['nombre_imagen_producto'];
}
}





    $query_delete = mysqli_query($conexion, "DELETE  FROM imagenes_productos WHERE id_imagen_producto=$id_imagen_producto");
    mysqli_close($conexion);
    header("location: agregar_foto_producto.php?id_producto=$id_producto"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
        unlink("imagenes_productos/$nombre_imagen_producto");
}
?>


<?php
//===========================================================================================================
//ELIMINAR REGISTRO DEl pedido express
//OBTENEMOS EL ID 
if (!empty($_GET['id_documento'])) {
$id_documento=$_GET['id_documento'];

$query = mysqli_query($conexion,"SELECT * FROM documentos WHERE id_documento=$id_documento");
$result = mysqli_num_rows($query);
                        if ($result > 0) {
while ($data= mysqli_fetch_assoc($query)) { 
$nombre_documento=$data['nombre_documento'];
    }
}

 
    $id_documento= $_GET['id_documento'];
    $query_delete = mysqli_query($conexion, "DELETE  FROM documentos WHERE id_documento=$id_documento");
    mysqli_close($conexion);
    header("location: mis_documentos.php"); //REGRESAMOS AL FORMULARIO UNA VEZ ELIMINADO
            unlink("documentos/$nombre_documento");

}
?>