<?php 
// Guardamos el contenido de contenido.php en la variable html
ob_start();
require "pdf_formulario_cultivo_modelo.php"; //nombre del archivo que queremos imprimri en PDF
$html = ob_get_clean();
// Jalamos las librerias de dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
// Le pasamos el html a dompdf
$dompdf->loadHtml($html);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("letter");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream('Cultivo');
?>