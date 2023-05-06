<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio</title>
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


                $idservicio = $_GET['idservicio'];
                $sql_edit = "select * from service where id_servi='$idservicio'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: servicio_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {

                    $nomser = $_POST['nomser'];
                    $estado=$_POST['estado'];

                    $sql = "update service set nomser=?, estado=? where id_servi=?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('sii', $nomser, $estado, $idservicio);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'servicio_edit.php?idservicio=" . $idservicio . "&resp=OK';</script>");

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
                                <a href="servicio_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Editar Servicio</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del servicio</label>
                                    <input class="form-control" name="nomser" required type="text" value="<?php echo $row_edit['nomser']; ?>" placeholder="Nombre del Servicio..." />
                                </div>


                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select class="form-select" name="estado" aria-label="Default select example">
                                        <option>-- Estado --</option>
                                        <option value="1" <?php if ($row_edit['estado'] == '1') {
                                                                echo "selected";
                                                            } ?>>Activo</option>
                                        <option value="2" <?php if ($row_edit['estado'] == '2') {
                                                                echo "selected";
                                                            } ?>>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-outline border-300 me-2" type="reset">Reestablecer</button>
                            <button class="btn btn-primary" type="submit" name="edit">Editar Servicio</button>
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

</body>

</html>