<?php 
include_once "functions.php";
include_once "../conexion.php";
setlocale(LC_TIME, 'es_ES'); // Establece el idioma en español

$meses = getMonths();

//Consulta para obtener los examenes de id_area = 1 que es de Química.
$sqlString = "SELECT * FROM examenes WHERE id_area = 1";
$query = mysqli_query($conexion, $sqlString);

$exams = array(); // Inicializa un array para almacenar los resultados.
if ($query) {

    while ($row = mysqli_fetch_assoc($query)) {
        $exams[] = $row; // Agrega cada fila al array.
    }

    // Ahora $exams contiene todos los registros que cumplen la consulta.

} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

$StrQuery = "SELECT YEAR(de.fecha_agregado) as anio from detalle_examenes de GROUP BY YEAR(de.fecha_agregado)";
$query = mysqli_query($conexion, $StrQuery);
$customYears = array();
if ($query) {
    while ($rows = mysqli_fetch_assoc($query)) {
        $customYears[] = $rows['anio']; // Agrega cada fila al array.
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
// print_r(json_encode($customYears));
// exit();

//Ahora necesitamos la consulta para obtener los detalles de los examenes de tipo Química
$currentYear = isset($_GET['year']) ? $_GET['year'] : date('Y');

$StrQuery = "SELECT e.nombre_examen, e.id_examen, p.id_genero, MONTH(de.fecha_agregado) AS mes, COUNT(de.id_examen) AS cantidad
    FROM detalle_examenes de
    JOIN examenes e ON de.id_examen = e.id_examen 
    JOIN pacientes p ON de.id_paciente = p.id_paciente
    WHERE e.id_area = 1 AND YEAR(de.fecha_agregado) = {$currentYear} 
    GROUP BY e.nombre_examen, e.id_examen, p.id_genero, MONTH(de.fecha_agregado)";
$query = mysqli_query($conexion, $StrQuery);

$consolidated = array();
if ($query) {

    while ($rows = mysqli_fetch_assoc($query)) {
        $consolidated[] = $rows; // Agrega cada fila al array.
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

//Consulta para obtener por genero masculino

// Cerrando la conexión a la base de datos.
mysqli_close($conexion);

// echo "<pre>";
// print_r(json_encode($consolidated));
// exit();
