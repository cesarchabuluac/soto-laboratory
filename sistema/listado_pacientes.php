<?php include "../conexion.php"; //ubiación de la conexión

$sLimit = "";
$searchValue = $_GET['search']['value']; // Search value
$searchQuery = "";

if ( isset( $_GET['start'] ) && $_GET['length'] != '-1' )
{
  $sLimit = "LIMIT ".$conexion->real_escape_string( $_GET['start'] ).", ".$conexion->real_escape_string( $_GET['length'] );
}

if($searchValue != ''){
  $searchQuery .= " WHERE (p.nombre_paciente like '%".$searchValue."%' or 
  p.dpi_paciente like '%".$searchValue."%'
  ) ";
}

## Fetch records
$query = mysqli_query(
  $conexion,
  "SELECT p.id_paciente,p.dpi_paciente,p.nombre_paciente,
  p.id_genero,p.telefono_paciente,p.correo_paciente,
  p.id_usuario, p.direccion_paciente,p.fecha_nacimiento_paciente,
  p.edad_paciente,
  (SELECT IF(EXISTS(SELECT id_genero 
  FROM pacientes 
  WHERE id_genero = 1 AND id_paciente = p.id_paciente),'Masculino','Femenino')) as nombre_genero,
  (SELECT count(id_examen_creado) 
  FROM examenes_creados 
  where estado_examen_creado=1 and estado_examen_cargado=0 and
   id_paciente=p.id_paciente and tipo_cotizacion <> 1) as examen_c 
   FROM pacientes p ".$searchQuery." ORDER BY p.id_paciente DESC ".$sLimit); 

$recordsFiltered = mysqli_num_rows($query);

$queryTotal = mysqli_query(
  $conexion,
  "SELECT count(id_paciente) as total 
   FROM pacientes p ".$searchQuery);
$records = mysqli_fetch_assoc($queryTotal);
$recordsTotal = intval($records['total']); 

/*$result = mysqli_num_rows($query);*/

if ($recordsFiltered > 0) {
  $i=1;
    while ($encontrados = mysqli_fetch_assoc($query)) { 
        $pacientes[]= array(
        'id' => $i++,  
        'id_paciente' => $encontrados['id_paciente'],
        'nombre_paciente' => $encontrados['nombre_paciente'],
        'dpi_paciente' => $encontrados['dpi_paciente'],
        'id_genero' => $encontrados['id_genero'],
        'nombre_genero' => $encontrados['nombre_genero'],
        'telefono_paciente' => $encontrados['telefono_paciente'],
        'correo_paciente' => $encontrados['correo_paciente'],
        'direccion_paciente' => $encontrados['direccion_paciente'],
        'fecha_nacimiento_paciente' => $encontrados['fecha_nacimiento_paciente'],
        'edad_paciente' => $encontrados['edad_paciente'],
        'examen_c' => $encontrados['examen_c'],
      );    
    }

    /*echo json_encode(["data" => $pacientes, 'total' => $result]);*/
    echo json_encode([
      "draw" =>  intval($_GET["draw"]),
      "data" => $pacientes, 
      'recordsTotal' => $recordsTotal,
      'recordsFiltered' => $recordsTotal 
    ]);
}
?>