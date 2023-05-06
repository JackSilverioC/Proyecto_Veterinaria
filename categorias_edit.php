<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
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
                $idcate = $_GET['idcate'];
                $sql_edit = "select * from category where id_cate='$idcate'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: categorias_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {

                    $nomcate = $_POST['nomcate'];

                    $sql = "update category set nomcate=? where id_cate=?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('si', $nomcate, $idcate);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'categorias_edit.php?idcate=" . $idcate . "&resp=OK';</script>");
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
                                <a href="categorias_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1" data-anchor="data-anchor">Editar Categoría</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre de la categoría</label>
                                    <input class="form-control" name="nomcate" required value="<?php echo $row_edit['nomcate']; ?>" type="text" placeholder="Ingrese el nombre de la categoría..." />
                                </div>
                                <!--hide-->
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-outline border-300 me-2" type="reset">Reestablecer</button>
                            <button class="btn btn-primary" type="submit" name="edit">Editar Categoría</button>
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