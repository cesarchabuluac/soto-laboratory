<?php include "../conexion.php"; //ubiación de la conexión

$sLimit = "";
$fecha_actual = date('Y/m/d');
//$fecha_restado=date('Y/m/d',strtotime($fecha_actual."- 0 days")); 
$searchValue = $_GET['search']['value']; // Search value
$searchQuery = "";
$formularios_cc = [];
if ( isset( $_GET['start'] ) && $_GET['length'] != '-1' ){  
  $sLimit = "LIMIT ".$conexion->real_escape_string( $_GET['start'] ).", ".$conexion->real_escape_string( $_GET['length'] );
}

if($searchValue != ''){
  $searchQuery .= " and (p.nombre_paciente like '%".$searchValue."%' or 
  exc.codigo_formulario like '%".$searchValue."%'
  or exc.hora_creado like '%".$searchValue."%'
  ) ";
}


## Fetch records
$query = mysqli_query(
  $conexion, 
  "SELECT u.id_usuario, u.nombre, u.id_rol, u.usuario, ul.usuario as usuario_l,
   r.id_rol,r.nombre_rol,p.id_paciente,p.nombre_paciente,exc.id_examen_creado,exc.id_paciente,
   exc.codigo_formulario,exc.fecha_creado,exc.hora_creado,exc.fecha_cargado,exc.hora_cargado,
   exc.id_medico_referido,exc.id_usuario_tecnico,exc.id_usuario,exc.id_area,exc.estado_examen_creado,
   exc.tipo_cotizacion, m.id_medico,m.nombre_medico,a.id_area,a.nombre_area  
   FROM examenes_creados exc INNER JOIN usuario u ON exc.id_usuario_tecnico=u.id_usuario 
   INNER JOIN usuario ul ON exc.id_usuario=ul.id_usuario 
   INNER JOIN rol r ON u.id_rol = r.id_rol 
   INNER JOIN pacientes p ON p.id_paciente=exc.id_paciente 
   INNER JOIN medicos m ON exc.id_medico_referido=m.id_medico 
   INNER JOIN areas a ON a.id_area=exc.id_area 
   WHERE exc.id_paciente>0 and exc.estado_examen_creado=1 
   and exc.tipo_cotizacion=0 and estado_examen_creado=1
   and estado_examen_cargado=1".$searchQuery."
   ORDER BY fecha_cargado DESC, hora_cargado desc ".$sLimit);

$recordsFiltered = mysqli_num_rows($query);

$queryTotal = mysqli_query(
  $conexion, "SELECT count(id_examen_creado) as total 
  FROM examenes_creados exc 
  INNER JOIN usuario u ON exc.id_usuario_tecnico=u.id_usuario 
  INNER JOIN usuario ul ON exc.id_usuario=ul.id_usuario 
  INNER JOIN rol r ON u.id_rol = r.id_rol 
  INNER JOIN pacientes p ON p.id_paciente=exc.id_paciente 
  INNER JOIN medicos m ON exc.id_medico_referido=m.id_medico
  INNER JOIN areas a ON a.id_area=exc.id_area 
  WHERE exc.id_paciente>0 and exc.estado_examen_creado=1 
  and exc.tipo_cotizacion=0 and estado_examen_creado=1 
  and estado_examen_cargado=1  " .$searchQuery);

$records = mysqli_fetch_assoc($queryTotal);
$recordsTotal = intval($records['total']);
if ($recordsFiltered > 0) {
  $i=1;
    while ($encontrados = mysqli_fetch_assoc($query)) { 
        $formularios_cc[]= array(
        'id' => $i++, 
        'id_usuario' => $encontrados['id_usuario'],
        'id_examen_creado' => $encontrados['id_examen_creado'],
        'nombre' => $encontrados['nombre'],
        'usuario' => $encontrados['usuario'],
        'usuario_l' => $encontrados['usuario_l'],
        'nombre_rol' => $encontrados['nombre_rol'],
        'nombre_paciente' => $encontrados['nombre_paciente'],
        'codigo_formulario' => $encontrados['codigo_formulario'],
        'nombre_area' => $encontrados['nombre_area'],
        'tipo_cotizacion' => $encontrados['tipo_cotizacion'],
        'fecha_creado' => $encontrados['fecha_creado'],
        'hora_creado' => $encontrados['hora_creado'],
        'fecha_cargado' => $encontrados['fecha_cargado'], 
        'hora_cargado' => $encontrados['hora_cargado'],
        'nombre_medico' => $encontrados['nombre_medico'],
        'id_rol' => $encontrados['id_rol'],  
      );
    }
  }

echo json_encode([
  "draw" =>  intval($_GET["draw"]),
  "data" => $formularios_cc, 
  'recordsTotal' => $recordsTotal,
  'recordsFiltered' => $recordsTotal 
]);
?>