<?php

use Sabberworm\CSS\Value\Size;

ob_start(); ?>


<?php require_once './conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte Proveedores</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php

    $sql_sup = "select * from supplier ";
    $result_sup = mysqli_query($conex, $sql_sup);
    ?>

    <header>
        <div style="font-family: 'bebas neue', sans-serif;font-size: 40px;text-align: center;margin-top: -40px;">
            REPORTE PROVEEDORES
        </div>
    </header>

    <hr>

    <section>
        <div>
            <table class="table table-striped table-borderless" style="margin: auto;font-size: 14px;">
                <thead class="thead-dark" style="text-align: center;font-weight: bold;">
                    <tr>
                        <th>Nº</th>
                        <th>Ruc</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>País/Ciudad</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_array($result_sup)) {
                    ?>
                        <tr style="border: none!important;">
                            <td id="td"><?php echo $row["id_prove"]; ?></td>
                            <td id="td"><?php echo $row["ruc"]; ?></td>
                            <td id="td"><?php echo $row["nomprove"]; ?></td>
                            <td id="td"><?php echo $row["corre"]; ?></td>
                            <td id="td"><?php echo $row["direcc"]; ?></td>
                            <td id="td"><?php echo $row["pais"]; ?></td>
                            <td id="td"><?php if ($row["estado"] == 1) {
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
            $x = 910;
            $x2 = 35;
            $y = 570;
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
$dompdf->setPaper('legal', 'landscape');

$dompdf->render();

$canvas = $dompdf->getCanvas();


$dompdf->stream("reporte_proveedores.pdf", array("Attachment" => false));


?>