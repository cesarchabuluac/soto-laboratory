<?php
include_once "includes/reportChemicals.php";
include_once "./datos_empresa.php";
?>

<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 2cm 2cm 2cm;
        }

        /* .header { */
        /* position: fixed;
            top: 1cm;
            left: 0cm;
            right: 0cm;
            height: 5cm; */
        /* background-color: #2a0927; */
        /* color: white; */
        /* text-align: center; */
        /* line-height: 30px; */
        /* } */
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            background-color: #333;
            color: #fff;
            text-align: center;
            /* padding: 10px; */
        }

        /* footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        } */

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="14">
                    <table>
                        <tr>
                            <td colspan="2" class="title" style="text-align: center!important;">
                                <img src="./img/logo.png" style="height: 100px;" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center!important;">
                                <?= $nombre_empresa ?>.<br />
                                <?= $direccion_empresa ?><br />
                                <?= $telefono_empresa ?><br>
                                <?= $correo_empresa ?><br>
                                Químico Biólgo: Luis Alonso García Yas<br>
                                Col. 5,130
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

           

            <tr class="heading">
                <td colspan="14">Consolidado</td>
            </tr>
            <tr class="heading" style="font-size: 12px!important;">
                <td></td>
                <?php foreach ($meses as $key => $mes) {
                ?>
                    <td><?= $mes ?></td>
                <?php
                } ?>
                <td>TOTAL</td>
            </tr>

            <?php
            foreach ($exams as $key => $exam) {
            ?>
                <tr class="item" style="font-size: 12px!important;">
                    <td><?= $exam['nombre_examen'] ?></td>
                    <?php foreach ($meses as $index => $mes) {
                    ?>
                        <td>
                            <?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1), 2) ?>
                        </td>
                    <?php
                    } ?>
                    <td><strong><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $exam['nombre_examen']), 2) ?></strong></td>
                </tr>
            <?php
            }
            ?>
            <tr class="total" style="font-size: 12px!important;">
                <td style="text-align: right;"><strong>Gran Total</strong></td>
                <?php $grandTotal = 0 ?>
                <?php foreach ($meses as $index => $mes) {
                    $grandTotalPorMes = obtenerGranTotalPorMes($consolidated, $index + 1);
                    $grandTotal = $grandTotal + $grandTotalPorMes;
                ?>
                    <td><strong><?= number_format($grandTotalPorMes, 2)  ?></strong></td>
                <?php
                } ?>
                <td><strong><?= number_format($grandTotal, 2) ?></strong></td>
            </tr>
        </table>

        <div class="page-break"></div>
        <!-- Femenino -->
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td colspan="14">Femenino</td>
            </tr>
            <tr class="heading" style="font-size: 12px!important;">
                <td></td>
                <?php foreach ($meses as $key => $mes) {
                ?>
                    <td><?= $mes ?></td>
                <?php
                } ?>
                <td>TOTAL</td>
            </tr>

            <?php
            foreach ($exams as $key => $exam) {
            ?>
                <tr class="item" style="font-size: 12px!important;">
                    <td><?= $exam['nombre_examen'] ?></td>
                    <?php foreach ($meses as $index => $mes) {
                    ?>
                        <td>
                            <?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1, 2), 2) ?>
                        </td>
                    <?php
                    } ?>
                    <td><strong><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $exam['nombre_examen'], 2), 2) ?></strong></td>
                </tr>
            <?php
            }
            ?>
            <tr class="total" style="font-size: 12px!important;">
                <td style="text-align: right;"><strong>Gran Total</strong></td>
                <?php $grandTotal = 0 ?>
                <?php foreach ($meses as $index => $mes) {
                    $grandTotalPorMes = obtenerGranTotalPorMes($consolidated, $index + 1, 2);
                    $grandTotal = $grandTotal + $grandTotalPorMes;
                ?>
                    <td><strong><?= number_format($grandTotalPorMes, 2)  ?></strong></td>
                <?php
                } ?>
                <td><strong><?= number_format($grandTotal, 2) ?></strong></td>
            </tr>
        </table>

        <div class="page-break"></div>
        <!-- Masculino -->
        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td colspan="14">Masculino</td>
            </tr>
            <tr class="heading" style="font-size: 12px!important;">
                <td></td>
                <?php foreach ($meses as $key => $mes) {
                ?>
                    <td><?= $mes ?></td>
                <?php
                } ?>
                <td>TOTAL</td>
            </tr>

            <?php
            foreach ($exams as $key => $exam) {
            ?>
                <tr class="item" style="font-size: 12px!important;">
                    <td><?= $exam['nombre_examen'] ?></td>
                    <?php foreach ($meses as $index => $mes) {
                    ?>
                        <td>
                            <?= number_format(obtenerSumaPorNombreYMes($consolidated, $exam['nombre_examen'], $index + 1, 1), 2) ?>
                        </td>
                    <?php
                    } ?>
                    <td><strong><?= number_format(obtenerGranTotalPorNombreExamen($consolidated, $exam['nombre_examen'], 1), 2) ?></strong></td>
                </tr>
            <?php
            }
            ?>
            <tr class="total" style="font-size: 12px!important;">
                <td style="text-align: right;"><strong>Gran Total</strong></td>
                <?php $grandTotal = 0 ?>
                <?php foreach ($meses as $index => $mes) {
                    $grandTotalPorMes = obtenerGranTotalPorMes($consolidated, $index + 1, 1);
                    $grandTotal = $grandTotal + $grandTotalPorMes;
                ?>
                    <td><strong><?= number_format($grandTotalPorMes, 2)  ?></strong></td>
                <?php
                } ?>
                <td><strong><?= number_format($grandTotal, 2) ?></strong></td>
            </tr>
        </table>
    </div>
</body>

</html>