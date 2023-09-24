<?php include_once "includes/header.php"; ?>
<?php include_once "../conexion.php"; ?>

<?php

$meses = array();
$locale = 'es_ES'; // Establece la localización a español de España

for ($mes = 1; $mes <= 12; $mes++) {
    $fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE, null, null, 'MMMM');
    $meses[] = ucfirst($fmt->format(mktime(0, 0, 0, $mes, 1)));
}

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

//Ahora necesitamos la consulta para obtener los detalles de los examenes de tipo Química
$currentYear = date('Y');
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


function crearLog($mensaje, $nombreArchivo = 'log.txt')
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
        crearLog(json_encode($groupedData));
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


// echo "<pre>";
// print_r(json_encode($consolidated));
// exit();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Estadísticas de examenes del área Química del Año Actual (<?= date('Y') ?>)</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Consolidado</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td colspan="2"></td>
                                <?php foreach ($meses as $key => $mes) {
                                ?>
                                    <td><?= $mes ?></td>
                                <?php
                                } ?>
                                <td>TOTAL</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($exams as $key => $exam) {
                                if ($key === 0) {
                            ?>
                                    <tr>
                                        <td rowspan="<?= count($exams) ?>">CONSOLIDADO</td>
                                        <td><?= $exam['nombre_examen'] ?></td>
                                        <?php foreach ($meses as $index => $mes) {
                                        ?>
                                            <td>
                                                <?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1), 2) ?>
                                            </td>
                                        <?php
                                        } ?>
                                        <td><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $exam['nombre_examen']), 2) ?></td>

                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td><?= $exam['nombre_examen'] ?></td>
                                        <?php foreach ($meses as $index => $mes) {
                                        ?>
                                            <td><?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1), 2) ?></td>
                                        <?php
                                        } ?>
                                        <td><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $index + 1), 2) ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;">Gran Total</td>
                                <?php $grandTotal = 0 ?>
                                <?php foreach ($meses as $index => $mes) {
                                    $grandTotalPorMes = obtenerGranTotalPorMes($consolidated, $index + 1);
                                    $grandTotal = $grandTotal + $grandTotalPorMes;
                                ?>
                                    <td><?= number_format($grandTotalPorMes, 2)  ?></td>
                                <?php
                                } ?>
                                <td><?= number_format($grandTotal, 2) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Femenino -->
    <div class="card mt-3">
        <div class="card-header">
            <h3>Femenino</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td colspan="2"></td>
                                <?php foreach ($meses as $key => $mes) {
                                ?>
                                    <td><?= $mes ?></td>
                                <?php
                                } ?>
                                <td>TOTAL</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($exams as $key => $exam) {
                                if ($key === 0) {
                            ?>
                                    <tr>
                                        <td rowspan="<?= count($exams) ?>">FEMENINO</td>
                                        <td><?= $exam['nombre_examen'] ?></td>
                                        <?php foreach ($meses as $index => $mes) {
                                        ?>
                                            <td>
                                                <?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1, 2), 2) ?>
                                            </td>
                                        <?php
                                        } ?>
                                        <td><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $exam['nombre_examen'], 2), 2) ?></td>

                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td><?= $exam['nombre_examen'] ?></td>
                                        <?php foreach ($meses as $index => $mes) {
                                        ?>
                                            <td><?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1, 2), 2) ?></td>
                                        <?php
                                        } ?>
                                        <td><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $index + 1, 2), 2) ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;">Gran Total</td>
                                <?php $grandTotal = 0 ?>
                                <?php foreach ($meses as $index => $mes) {
                                    $grandTotalPorMes = obtenerGranTotalPorMes($consolidated, $index + 1, 2);
                                    $grandTotal = $grandTotal + $grandTotalPorMes;
                                ?>
                                    <td><?= number_format($grandTotalPorMes, 2)  ?></td>
                                <?php
                                } ?>
                                <td><?= number_format($grandTotal, 2) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Masculino -->
    <div class="card mt-3">
        <div class="card-header">
            <h3>Masculino</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td colspan="2"></td>
                                <?php foreach ($meses as $key => $mes) {
                                ?>
                                    <td><?= $mes ?></td>
                                <?php
                                } ?>
                                <td>TOTAL</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($exams as $key => $exam) {
                                if ($key === 0) {
                            ?>
                                    <tr>
                                        <td rowspan="<?= count($exams) ?>">MASCULINO</td>
                                        <td><?= $exam['nombre_examen'] ?></td>
                                        <?php foreach ($meses as $index => $mes) {
                                        ?>
                                            <td>
                                                <?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1, 1), 2) ?>
                                            </td>
                                        <?php
                                        } ?>
                                        <td><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $exam['nombre_examen'], 1), 2) ?></td>

                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td><?= $exam['nombre_examen'] ?></td>
                                        <?php foreach ($meses as $index => $mes) {
                                        ?>
                                            <td><?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1, 1), 2) ?></td>
                                        <?php
                                        } ?>
                                        <td><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $index + 1, 1), 2) ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;">Gran Total</td>
                                <?php $grandTotal = 0 ?>
                                <?php foreach ($meses as $index => $mes) {
                                    $grandTotalPorMes = obtenerGranTotalPorMes($consolidated, $index + 1, 1);
                                    $grandTotal = $grandTotal + $grandTotalPorMes;
                                ?>
                                    <td><?= number_format($grandTotalPorMes, 2)  ?></td>
                                <?php
                                } ?>
                                <td><?= number_format($grandTotal, 2) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- End div header -->
</div>

<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>