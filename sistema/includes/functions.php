<?php
date_default_timezone_set('America/Guatemala');

function fechaGT()
{
	$mes = array(
		"", "Enero",
		"Febrero",
		"Marzo",
		"Abril",
		"Mayo",
		"Junio",
		"Julio",
		"Agosto",
		"Septiembre",
		"Octubre",
		"Noviembre",
		"Diciembre"
	);
	return date('d') . " de " . $mes[date('n')] . " de " . date('Y');
}

function crearLogs($mensaje, $nombreArchivo = 'my-logs.txt')
{
	// Abre o crea el archivo de registro en modo "a" (apéndice)
	$archivo = fopen($nombreArchivo, 'a');

	if ($archivo) {
		// Obtiene la fecha y hora actual
		$fechaHora = date('Y-m-d H:i:s');
		// Formatea el mensaje con la fecha y hora
		$mensajeFormateado = "[$fechaHora] $mensaje" . PHP_EOL;

		// Escribe el mensaje en el archivo
		fwrite($archivo, $mensajeFormateado);

		// Cierra el archivo
		fclose($archivo);
	} else {
		echo "No se pudo abrir el archivo de registro.";
	}
}

function groupedByField($data, $field, $withMonth = true)
{
	$groupedData = [];

	foreach ($data as $item) {
		$key = $item[$field];
		$month = $item['mes'];

		if (!isset($groupedData[$key])) {
			$groupedData[$key] = [];
		}

		//Virificar si se quiere agrupar igual por mes y si el grupo por mes no existe, crea uno nuevo
		if ($withMonth) {
			if (!isset($groupedData[$key][$month])) {
				$groupedData[$key][$month] = [];
			}
			// Agrega el item al grupo adecuado
			$groupedData[$key][$month][] = $item;
		} else {
			$groupedData[$key][] = $item;
		}
	}

	return $groupedData;
}

/**
 * Funcion para obtener la suma de por examen y mes
 */
function obtenerSumaPorNombreYMes($collecion, $nombreExamen, $mes, $genero = null)
{
	$groupedData = array();
	if (!empty($genero) && ($genero == 1 || $genero == 2)) {
		$resultadosFiltrados = array_filter($collecion, function ($item) use ($genero) {
			return $item["id_genero"] == $genero;
		});
		$groupedData = groupedByField($resultadosFiltrados, "nombre_examen", true);
	} else {
		$groupedData = groupedByField($collecion, "nombre_examen", true);
	}


	if (isset($groupedData[$nombreExamen][$mes])) {
		$examenes = $groupedData[$nombreExamen][$mes];
		$suma = array_sum(array_column($examenes, 'cantidad'));
		return $suma;
	}
	return 0; // Retorna 0 si no se encontraron datos para ese nombre de examen y mes.
}

/**
 * Funcion para encontrar la suma global por nombre del examen
 */
function obtenerGranTotalPorNombreExamen($collecion, $nombreExamen, $genero = null)
{
	$groupedData = array();
	if (!empty($genero) && ($genero == 1 || $genero == 2)) {
		$resultadosFiltrados = array_filter($collecion, function ($item) use ($genero) {
			return $item["id_genero"] == $genero;
		});
		$groupedData = groupedByField($resultadosFiltrados, "nombre_examen", true);
	} else {
		$groupedData = groupedByField($collecion, "nombre_examen", true);
	}

	$granTotal = 0;

	if (isset($groupedData[$nombreExamen])) {
		foreach ($groupedData[$nombreExamen] as $mesExamenes) {
			$granTotal += array_sum(array_column($mesExamenes, 'cantidad'));
		}
	}

	return $granTotal;
}

/**
 * Funcion para obtener el grand total por meses
 */
function obtenerGranTotalPorMes($collecion, $mes, $genero = null)
{
	$groupedData = array();
	if (!empty($genero) && ($genero == 1 || $genero == 2)) {
		$resultadosFiltrados = array_filter($collecion, function ($item) use ($genero) {
			return $item["id_genero"] == $genero;
		});
		$groupedData = groupedByField($resultadosFiltrados, "nombre_examen", true);
	} else {
		$groupedData = groupedByField($collecion, "nombre_examen", true);
	}

	$granTotal = 0;

	foreach ($groupedData as $nombreExamen => $meses) {
		if (isset($meses[$mes])) {
			$granTotal += array_sum(array_column($meses[$mes], 'cantidad'));
		}
	}
	return $granTotal;
}


function getMonths()
{
	$meses = array();
	$locale = 'es_ES'; // Establece la localización a español de España

	for ($mes = 1; $mes <= 12; $mes++) {
		$fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE, null, null, 'MMMM');
		$meses[] = ucfirst($fmt->format(mktime(0, 0, 0, $mes, 1)));
	}

	return $meses;
}
