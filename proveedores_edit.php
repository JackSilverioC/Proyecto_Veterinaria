<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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

                ?>
                <!--edit-->
                <?php
                $idproveedor = $_GET['idproveedor'];
                $sql_edit = "select * from supplier where id_prove='$idproveedor'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: proveedores_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {

                    $nomprove = $_POST['nomprove'];
                    $ruc = $_POST['ruc'];
                    $direcc = $_POST['direcc'];
                    $pais = $_POST['pais'];
                    $tele = $_POST['tele'];
                    $corre = $_POST['corre'];
                    $estado = $_POST['estado'];

                    $sql = "update supplier set nomprove=?,ruc=?,direcc=?,pais=?,tele=?,corre=?,estado=? where id_prove=?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('ssssssii', $nomprove, $ruc, $direcc, $pais, $tele, $corre,$estado,$idproveedor);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'proveedores_edit.php?idproveedor=" . $idproveedor . "&resp=OK';</script>");
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
                                <a href="proveedores_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Editar Proveedor</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Ruc del proveedor</label>
                                    <input class="form-control" type="text" id="documento" name="ruc" value="<?php echo $row_edit['ruc']; ?>"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del proveedor</label>
                                    <input class="form-control" name="nomprove" value="<?php echo $row_edit['nomprove']; ?>" id="nombre" required type="text"/>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dirección del proveedor</label>
                                    <input class="form-control" id="direccion" value="<?php echo $row_edit['direcc']; ?>" name="direcc" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">País/Ciudad del proveedor</label>
                                    <input class="form-control" id="provincia" value="<?php echo $row_edit['pais']; ?>" name="pais" type="text" required/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono del proveedor</label>
                                    <input class="form-control" name="tele" value="<?php echo $row_edit['tele']; ?>" type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Correo del proveedor</label>
                                    <input class="form-control" type="email" value="<?php echo $row_edit['corre']; ?>" name="corre" required/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="estado" aria-label="Default select example">
                                        <option disabled>Estado</option>
                                        <option value="1" <?php if($row_edit['estado']== '1'){echo "selected";}?>>Activo</option>
                                        <option value="2" <?php if($row_edit['estado']== '2'){echo "selected";}?>>Inactivo</option>
                                    </select>
                                    
                            </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                            <button class="btn btn-outline border-300 me-2" type="reset">Reestablecer</button>
                                <button class="btn btn-primary" type="submit" name="edit">Editar Proveedor</button>
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