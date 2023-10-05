<?php 
// Guardamos el contenido de contenido.php en la variable html
ob_start();
require "estadisticas_quimica_html.php"; //nombre del archivo que queremos imprimri en PDF
$html = ob_get_clean();

// Jalamos las librerias de dompdf
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Crea una instancia de DOMPDF
$options = new Options();
$options->set('isPhpEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('isCssFloatEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

// Le pasamos el html a dompdf
$dompdf->loadHtml($html);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("letter", "landscape");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream('Estadisticas-Examenes-Químicas');
?>