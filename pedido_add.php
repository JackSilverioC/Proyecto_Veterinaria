<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo</title>
    <?php
    include_once('includes/1_head.php');
    include_once('sesion.php');
    ?>
</head>

<body>
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <?php
            include_once('includes/2_header.php'); //nav
            ?>
            <div class="content">
                <?php
                include_once('includes/nav.php');

                include_once('conexion/conexion.php');


                $sql_sup = "select * from supplier";
                $result_sup = mysqli_query($conex, $sql_sup);

                $sql_pro = "select * from products";
                $result_pro = mysqli_query($conex, $sql_pro);



                if (isset($_POST['add'])) {
                    if (isset($_POST["product_price"])) {

                    $precios=$_POST["product_price"];
                    $cantidades=$_POST["product_qty"];
                    $prove = $_POST['prove'];
                    $idprove = $_POST['id_prove'];
                
                    $total=0;
                
                    for ($i=0; $i < count($precios); $i++) { 
                        $total+=$precios[$i]*$cantidades[$i];
                    }
                    $estado = $_POST['estado'];

                    $tipoc = $_POST['tipoc'];
                    $tipopa = $_POST['tipopa'];

                    //compra
                    $sql = "insert into compra (estado,total,tipoc,tipopa)  values (?,?,?,?)";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('idss',$estado, $total, $tipoc, $tipopa);

                    $statement->execute();

                    
                    //detalle

                    $sql2="SELECT id_compra FROM compra ORDER BY fecha DESC LIMIT 1";
                    $result=mysqli_query($conex,$sql2);
                    $row7 = mysqli_fetch_array($result);

                    $idcompra=$row7["id_compra"];

                    $productos=$_POST["product_name"];
                
                    $sql3 = "insert into productos_comprados (id_prod, canti, id_compra,id_prove) values(?,?,?,?)";
                
                    for ($i=0; $i < count($idprove); $i++) { 
                        //preparar la sentencia
                        $statement2 = $conex->prepare($sql3);
                        $statement2->bind_param('iiii',$productos[$i], $cantidades[$i], $idcompra, $idprove[$i]);
                        $statement2->execute();
                    }
                    $conex->close();

                    if ($statement)

                        echo ' <div class="alert alert-success alert-dismissible fade show mt-0 mb-2">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             Datos Registrados </div>';
                    else
                        echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             Error </div>';
                }
                }

                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                                <a href="pedido_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Pedido</h5>
                            </div>
                        </div>
                    </div>


                    <div class="card-body  bg-light">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <!-- <div class="col-lg-4 mb-3">
                                    <label class="form-label">Proveedor del producto</label>
                                    <input class="form-control" type="text" id="prove" disabled>
                                </div> -->

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Tipo de Comprobante</label>
                                    <select class="form-select" name="tipoc" aria-label="Default select example">
                                        <option disabled selected>Comprobante de pago</option>
                                        <option value="Boleta">Boleta</option>
                                        <option value="Factura">Factura</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Tipo de pago</label>
                                    <select class="form-select" name="tipopa" aria-label="Default select example">
                                        <option disabled selected>Tipo de pago</option>
                                        <option value="Contado">Contado</option>
                                        <option value="Crédito">Crédito</option>
                                    </select>
                                </div>

                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Proveedor</th>
                                            <th style="width: 20%;">Precio</th>
                                            <th style="width: 10%;">Cantidad</th>
                                            <th><button class="btn btn-success add_item_btn btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_item">
                                        <tr>
                                            <td>
                                                <select name="product_name[]" id="cbProducto" class="form-select" required>
                                                    <option selected disabled value="">Seleccione </option>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result_pro)) {
                                                        ?>
                                                            <option value="<?php echo $row["id_prod"]; ?>"><?php echo $row["nompro"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input id="prove" type="text" name="prove[]" class="form-control" required readonly="readonly">
                                                <input hidden id="id_prove" name="id_prove[]" type="text">
                                            </td>
                                            <td>
                                                <input id="precio" type="number" min="0.01" step=".01" value="0.00" name="product_price[]" class="form-control" required readonly="readonly">
                                            </td>
                                            <td>
                                                <input type="number" min="1" value="1" name="product_qty[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm remove_item_btn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--hide-->
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                    <button class="w-auto btn btn-primary text-end" type="submit" name="add">Registrar Pedido</button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php
            include_once("./includes/3_footer.php");
            include_once("./includes/4_foot.php");
            ?>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        
        $(document).on('change','#cbProducto',function(e){
                e.preventDefault();
                
                let tr = $(this).parent().parent();
                let precio = tr.find("#precio");

                let prove = tr.find("#prove");
                let id_prove = tr.find("#id_prove");

                let id = $(this).val();

                $.ajax({
                    type:"POST",
                    url:"proveedor.php",
                    data:"id="+ id,
                    success:function(u){
                        
                        let result = JSON.parse(u);
                        id_prove.val(result.id);
                        prove.val(result.nombre);
                    }
                }); 

                $.ajax({
                    type:"POST",
                    url:"precio.php",
                    data:"id="+ id,
                    success:function(r){
                        precio.val(r);
                    }
                });             
                
                
                

            });

        $(document).ready(function() {
            $(".add_item_btn").click(function(e) {
                e.preventDefault();
                $("#show_item").prepend(`
                <tr>
                    <td>
                        <select name="product_name[]" id="cbProducto" class="form-select" required>
                            <option selected disabled value="">Seleccione </option>
                            <?php
                            $conex = new mysqli($server, $user, $pass, $bd);
                            $query = "select * from products";
                            $result = mysqli_query($conex, $query);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $row[0]; ?>"><?php echo $row[4]; ?></option>
                            <?php
                            } ?>
                        </select>
                    </td>
                    <td>
                        <input id="prove" type="text" name="prove[]" class="form-control" required readonly="readonly">
                        <input id="id_prove" hidden name="id_prove[]" type="text">
                    </td>
                    <td>
                        <input id="precio" type="number" min="0.01" step=".01" value="0.00" name="product_price[]" class="form-control" required readonly="readonly">
                    </td>
                    <td>
                        <input type="number" min="1" value="1" name="product_qty[]" class="form-control" required>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm remove_item_btn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                    </td>
                </tr>
                `);
            });

            $(document).on('click','.remove_item_btn',function(e){
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });
        });
    </script>

</body>

</html>