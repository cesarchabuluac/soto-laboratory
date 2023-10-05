<?php
include_once "includes/header.php";
// include_once "includes/functions.php";
include_once "includes/reportChemicals.php"
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Estadísticas de examenes del área Química del Año Actual (<?= $currentYear ?>)</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Consolidado</h3>
        </div>
        <div class="card-body">
            <form action="./estadisticas_quimica.php" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="year">Año</label>
                            <select id="year" name="year" class="form-control ml-2">
                                <?php
                                foreach ($customYears as $key => $year) {
                                ?>
                                    <option <?= $year === $currentYear ? 'selected' : '' ?> value="<?= $year ?>"><?= $year ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <button class="btn btn-primary mt-3 ml-3" type="submit">Buscar</button>
                    </div>
                    <div class="col-md-6 mt-3 text-right">
                        <!-- <button id="downloadPDFButton" class="btn btn-info mt-3" type="button">Descargar en PDF</button> -->
                        <a href="estadisticas_quimica_pdf.php?year=2023" type="button" target="_blank" class="btn btn-info mt-3">Descargar en PDF</a>
                        <button id="exportToExcel" class="btn btn-secondary mt-3" type="button">Descargar en Excel</button>
                    </div>
                </div>

                <div id="table-rows">
                    <div class="row mt-3">
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
            </form>
        </div>
    </div>
</div>

<!-- End div header -->
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3/dist/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>


<script type="text/javascript">
    document.getElementById('exportToExcel').addEventListener('click', function() {
        // Obtiene la tabla
        var table = document.querySelector('#table-rows');

        // Crea un objeto de trabajo de Excel
        var wb = XLSX.utils.table_to_book(table, {
            sheet: "Sheet 1"
        });

        // Exporta el libro a un archivo Excel
        XLSX.writeFile(wb, 'Examenes-Químicas.xlsx');
    });

    function convertHTMLtoPDF() {
        const {
            jsPDF
        } = window.jspdf;

        const content = document.querySelector('#table-rows');
        // Crea un elemento Canvas para dibujar el contenido
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        canvas.width = content.clientWidth;
        canvas.height = content.clientHeight;

        // Dibuja el contenido en el Canvas
        html2canvas(content, {
            scale: 1, // Aumenta el tamaño en un 200%
            backgroundColor: "#fff", // Fondo blanco
            logging: true, // Habilita registros en la consola
            allowTaint: true, // Permite imágenes con orígenes cruzados
            useCORS: true, // Utiliza solicitudes CORS para imágenes de orígenes cruzados
            // scrollX: 0, // No hay desplazamiento horizontal
            // scrollY: -window.scrollY // Simula desplazamiento vertical
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');

            // Crea un objeto PDF con el tamaño del Canvas
            const pdf = new jsPDF({
                format: 'letter', // Tamaño de papel (por ejemplo, 'letter', 'a4', o { width, height })
                orientation: 'landscape', // Orientación de la página ('portrait' o 'landscape')
                unit: 'pt', // Unidad de medida ('mm', 'cm', 'in', 'pt')
                // lineHeight: 1.2, // Espaciado entre líneas
                fontSize: 12, // Tamaño de fuente predeterminado

            });
            pdf.addImage(imgData, 'PNG', 0, 0, canvas.width / 2, canvas.height / 2);

            // Descarga el PDF
            pdf.save('mi_documento.pdf');
        });

        // let doc = new jsPDF({
        // format: 'letter', // Tamaño de papel (por ejemplo, 'letter', 'a4', o { width, height })
        // orientation: 'landscape', // Orientación de la página ('portrait' o 'landscape')
        // unit: 'mm', // Unidad de medida ('mm', 'cm', 'in', 'pt')
        // lineHeight: 1.2, // Espaciado entre líneas
        // fontSize: 2, // Tamaño de fuente predeterminado
        // compress: true, // Habilitar compresión
        // hotfixes: {}, // Correcciones de errores específicas (ver documentación)
        // });
        // let pdfjs = document.querySelector('#table-rows');


        // doc.html(pdfjs, {
        //     callback: function(doc) {
        //         // Personaliza las propiedades del documento aquí
        //         doc.setFontSize(2);
        //         doc.setFont("courier", "normal");
        //         // doc.setMargins(10, 10, 10, 10);
        //         // Maneja la paginación manualmente si es necesario
        //         // Genera múltiples páginas si el contenido es extenso
        //         // Ajusta las posiciones y el estilo del contenido
        //         doc.save("Estadisticas-De-Examenes-Quimica.pdf");
        //     },
        // });
    }
</script>

<!-- FIN ROW-->
<?php include_once "includes/footer.php"; ?>