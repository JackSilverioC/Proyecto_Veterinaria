<?php

use Sabberworm\CSS\Value\Size;

ob_start(); ?>


<?php require_once './conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte Citas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php

    $sql_pro = "SELECT quotes.id, veterinarian.id_vet, veterinarian.dnivet, veterinarian.nomvet, veterinarian.apevet, pet_type.id_tiM, pet_type.noTiM, service.id_servi, service.nomser, quotes.title, quotes.nommas, quotes.dueno, quotes.color, quotes.start, quotes.end, quotes.estado FROM quotes INNER JOIN veterinarian ON quotes.id_vet = veterinarian.id_vet INNER JOIN pet_type ON quotes.id_tiM = pet_type.id_tiM INNER JOIN service ON quotes.id_servi = service.id_servi";
    $result_pro = mysqli_query($conex, $sql_pro);
    ?>

    <header>
        <div style="font-family: 'bebas neue', sans-serif;font-size: 40px;text-align: center;margin-top: -40px;">
            REPORTE CITAS
        </div>
    </header>

    <hr>

    <section>
        <div>
            <table class="table table-striped table-borderless" style="margin: auto;font-size: 14px;">
                <thead class="thead-dark" style="text-align: center;font-weight: bold;">
                    <tr>
                        <th style="width: 3%;">Nº</th>
                        <th style="width: 10%;">Dueño</th>
                        <th style="width: 10%;">Veterinario</th>
                        <th style="width: 12%;">Cita</th>
                        <th style="width: 5%;">Mascota</th>
                        <th style="width: 5%;">Tipo</th>
                        <th style="width: 10%;">Servicio</th>
                        <th style="width: 10%;">Inicio</th>
                        <th style="width: 10%;">Fin</th>
                        <th style="width: 5%;">Estado</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_array($result_pro)) {
                    ?>
                        <tr style="border: none!important;text-align: center;vertical-align: middle;">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['dueno']; ?></td>
                            <td><?php echo $row['nomvet']; ?>&nbsp;<?php echo $row['apevet']; ?></td>
                            <td><?php echo $row["title"]; ?></td>
                            <td><?php echo $row["nommas"]; ?></td>
                            <td><?php echo $row["noTiM"]; ?></td>
                            <td><?php echo $row["nomser"]; ?></td>
                            <td><?php echo $row["start"]; ?></td>
                            <td><?php echo $row["end"]; ?></td>
                            <td><?php if ($row["estado"] == 1) {
                                    echo '<div class="px-2  pb-1" style="font-weight:bold;color: #00864e;background-color: #ccf6e4;border: 0px solid transparent;border-color: #c3e6cb;border-radius: 6px;">Activo</div>';
                                } else {
                                    echo '<div class="px-2  pb-1" style="font-weight:bold;color: #932338;background-color: #fad7dd;border: 0px solid transparent;border-color: #c3e6cb;border-radius: 6px;">Inactivo</div>';
                                } ?></td>

                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>


    <footer>
        <style>
            #td {
                vertical-align: middle;
                text-align: center;
            }
        </style>

        <script type="text/php">
            if ( isset($pdf) ) {
            $x = 1080;
            $x2 = 35;
            $y = 790;
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $text2 = "Veterinaria Pet Shop Entre Patas";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 10;
            $color = array(0.565, 0.565, 0.565);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            $pdf->page_text($x2, $y, $text2, $font, $size, $color, $word_space, $char_space, $angle);
            
        }
    </script>
    </footer>
</body>

</html>
<?php

$html = ob_get_clean();
//echo $html;

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set('isPhpEnabled', TRUE);
$options->set(array('isRemoteEnabled' => true));

$dompdf->setOptions($options);

$dompdf->loadHtml($html);

//$dompdf->setPaper('letter');
$dompdf->setPaper('A3', 'landscape');

$dompdf->render();

$canvas = $dompdf->getCanvas();


$dompdf->stream("reporte_compras.pdf", array("Attachment" => false));


?>