<?php
//conectarse con la BD
require_once './conexion/conexion.php';
//sentencia SQL
$query = "select * from compra";
$result = mysqli_query($conex, $query);
?>
<!DOCTYPE html>
<html lang="es">
<title>Pedido</title>
        <?php 
        include_once("./includes/1_head.php");
        ?>
        <body class="d-flex flex-column min-vh-100">
        <?php 
        include_once("./includes/2_header.php");
        ?>
        <section class="container">
                <div class="bg-white shadow rounded-4 p-3 my-3">
                <div class="row mt-3 py-3 justify-content-center align-items-center">
                        <div class="col-12 col-md-7 text-center-md-s mb-4 mb-md-0">
                                <p class="h3 mb-0">Listado - Tabla Pedido</p>
                        </div> 
                        <div class="col-12 col-md-4 text-center-md-e align-items-center">
                                <a class="btn btn-success" href="pedido_add.php">
                                        Agregar <i class="fa fa-plus-circle"></i>
                                </a>
                        </div>
                </div>
                <div class="row py-3 justify-content-center">
                        <div class="col col-11 table-responsive" id="no-more-tables">
                        <table class="table align-middle">
                                <thead class="table-dark">
                                        <tr>
                                                <th>ID</th>
                                                <th>Fecha Pedido</th>
                                                <th>Fecha Entrega</th>
                                                <th>Subtotal</th>
                                                <th>IGV</th>
                                                <th>Monto Total</th>
                                                <th>Estado</th>
                                                <th>Cliente</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr scope="row">
                                                        <td data-title="ID" id="p"><?php echo $row[0]; ?></td>
                                                        <td data-title="Fecha Pedido"><?php echo $row[1]; ?></td>
                                                        <td data-title="Fecha Entrega"><?php echo $row[2]; ?></td>
                                                        <td data-title="Subtotal"><?php echo $row[3]; ?></td>                                                        
                                                        <td data-title="IGV"><?php echo $row[4]; ?></td>
                                                        <td data-title="Monto Total"><?php echo $row[5]; ?></td>
                                                        <td data-title="Estado"><?php echo $row[6]; ?></td>                                                        
                                                        <td data-title="Cliente"><?php echo $row[7]; ?></td>
                                                </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                                </table>
                        </div>
                        </div>
                </div>
        </section>
        <?php
        include_once("./includes/3_footer.php");
        ?>
</body>

</html>