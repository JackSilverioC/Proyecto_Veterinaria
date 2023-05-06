<?php

use Sabberworm\CSS\Value\Size;

ob_start(); ?>


<?php require_once './conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte Pedidos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php

    $sql_pro = "SELECT pc.id_pcomp, p.nompro,s.nomprove,c.tipoc,p.preciC,pc.canti,p.preciC*pc.canti as monto FROM compra c join productos_comprados pc on c.id_compra=pc.id_compra join products p on p.id_prod = pc.id_prod join supplier s on s.id_prove=pc.id_prove order by pc.id_pcomp";
    $result_pro = mysqli_query($conex, $sql_pro);
    ?>

    <header>
        <div style="font-family: 'bebas neue', sans-serif;font-size: 40px;text-align: center;margin-top: -40px;">
            REPORTE PEDIDOS
        </div>
    </header>

    <hr>

    <section>
        <div>
            <table class="table table-striped table-borderless" style="margin: auto;font-size: 14px;">
                <thead class="thead-dark" style="text-align: center;font-weight: bold;">
                    <tr>
                        <th>Nº</th>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Comprobante</th>
                        <th>P. Compra</th>
                        <th>Cantidad</th>
                        <th>Monto Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_array($result_pro)) {
                    ?>
                        <tr style="border: none!important;text-align: center;">
                            <td><?php echo $row["id_pcomp"]; ?></td>
                            <td><?php echo $row["nompro"]; ?></td>
                            <td><?php echo $row["nomprove"]; ?></td>
                            <td><?php echo $row["tipoc"]; ?></td>
                            <td>s/.<?php echo $row["preciC"]; ?></td>
                            <td><?php echo $row["canti"]; ?> unid.</td>
                            <td>s/.<?php echo $row["monto"]; ?></td>

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
            $x = 740;
            $x2 = 35;
            $y = 540;
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
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$canvas = $dompdf->getCanvas();


$dompdf->stream("reporte_compras.pdf", array("Attachment" => false));


?>