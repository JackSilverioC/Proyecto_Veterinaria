<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <?php
    include_once('includes/1_head.php');
    include_once('sesion.php');
    ?>
</head>

<body>
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <?php
            include_once('includes/2_header.php');
            ?>


            <div class="content">
                <?php
                include_once('includes/nav.php');
                include_once('conexion/conexion.php');
                $sql_cat = "select * from category";
                $result_cat = mysqli_query($conex, $sql_cat);
                $sql_sup = "select * from supplier";
                $result_sup = mysqli_query($conex, $sql_sup);
                ?>
                <!--edit-->
                <?php
                $idproducto = $_GET['idproducto'];
                $sql_edit = "select * from products where id_prod='$idproducto'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: productos_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {
                    
                    if ($_FILES["foto"]["error"] > 0) {
                        $foto = $row_edit['foto'];
                    } else {
                        $nombreantiguo=$row_edit['foto'];
                        $rutaa="images/productos/".$nombreantiguo;
                        if(unlink($rutaa));

                        $foto = $_FILES['foto']['name'];
                        $fotof = $_FILES['foto'];
                        move_uploaded_file($fotof['tmp_name'], "images/productos/" . $fotof['name']);
                    }

                    $codigo = $_POST['codigo'];
                    $id_cate = $_POST['id_cate'];
                    $nompro = $_POST['nompro'];
                    $peso = $_POST['peso'];
                    $id_prove = $_POST['id_prove'];
                    $descp = $_POST['descp'];
                    $preciC = $_POST['preciC'];
                    $precV = $_POST['precV'];
                    $stock = $_POST['stock'];
                    $estado = $_POST['estado'];

                    $sql = "update products set codigo=?,nompro=?,id_cate=?,id_prove=?,preciC=?,precV=?,peso=?,stock=?,descp=?,foto=? where id_prod=?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('ssiiddssssi', $codigo, $nompro, $id_cate, $id_prove, $preciC, $precV, $peso, $stock, $descp,$foto,$idproducto);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'productos_edit.php?idproducto=" . $idproducto . "&resp=OK';</script>");
                    //header("Location: productos_edit.php?idproducto=" . $idproducto . "&resp=OK");
                    else
                        echo '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         Error, no se puedo editar los datos </div>';
                }
                if (isset($_GET['resp']) == 'OK')
                    echo '<div class="alert alert-success alert-dismissible fade show mt-0 mb-2">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     Datos editados con éxito! </div>';
                ?>




                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                                <a href="productos_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Editar Producto</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Código de barra del producto</label>
                                    <input class="form-control" name="codigo" required type="text" readonly value="<?php echo $row_edit['codigo']; ?>" placeholder="Código de barra..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del producto</label>
                                    <input class="form-control" name="nompro" required type="text" value="<?php echo $row_edit['nompro']; ?>" placeholder="Nombre del producto..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Categoría del producto</label>
                                    <select class="form-select" name="id_cate" aria-label="Default select example">
                                        <option disabled selected="selected">--Seleccione la categoría--</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_cat)) {
                                        ?>
                                            <option value="<?php echo $row["id_cate"]; ?>" <?php if ($row_edit['id_cate'] == $row["id_cate"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row["nomcate"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Proveedor del producto</label>
                                    <select class="form-select" name="id_prove" aria-label="Default select example">
                                        <option disabled selected="selected">--Seleccione el proveedor--</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_sup)) {
                                        ?>
                                            <option value="<?php echo $row["id_prove"]; ?>" <?php if ($row_edit['id_prove'] == $row["id_prove"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row["nomprove"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Precio de compra</label>
                                    <input class="form-control" name="preciC" type="number" step="0.01" value="<?php echo $row_edit['preciC']; ?>" required placeholder="Precio de compra..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Precio de venta</label>
                                    <input class="form-control" name="precV" type="number" step="0.01" value="<?php echo $row_edit['precV']; ?>" required placeholder="Precio de venta..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Peso del producto</label>
                                    <input class="form-control" name="peso" type="text" value="<?php echo $row_edit['peso']; ?>" required placeholder="Peso del producto..." />
                                </div>
                                <div class="col-lg-4 mb-3"> 
                                    <label class="form-label">Stock del producto</label>
                                    <input class="form-control" name="stock" type="number" value="<?php echo $row_edit['stock']; ?>" required placeholder="Stock del producto" />
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Imagen del producto</label>
                                    <div class="row" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"data":[{"name":"<?php if(file_exists("images/productos/".$row_edit['foto'])&&$row_edit['foto']!=null) echo $row_edit['foto']; else { echo "no-disponible.jpg";} ?>","url":"images/productos"}]}'>
                                        <div class="col-md-auto">
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0">
                                            <div class="avatar avatar-4xl"><img class="rounded-2" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md">
                                        <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                                            <div class="text-center">Elija una foto o arrástrela aquí
                                            </div>
                                        </div>
                                        <input class="form-control" type="file" name="foto" id="foto" hidden/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="basic-form-textarea">Descripción del producto</label>
                                    <textarea class="form-control h-75" name="descp" rows="3"><?php echo $row_edit['descp']; ?></textarea>
                                </div>
                                <!--hide-->
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-outline border-300 me-2" type="reset">Reestablecer</button>
                                    <button class="btn btn-primary" type="submit" name="edit">Editar Producto</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <?php 
                include_once("./includes/3_footer.php");
                include_once("./includes/4_foot.php");
                ?>
            </div>
        </div>

    </main>

</body>

</html>