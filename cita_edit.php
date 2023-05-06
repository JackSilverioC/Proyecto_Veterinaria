<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita</title>
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


                $sql_vet = "select * from veterinarian";
                $result_vet = mysqli_query($conex, $sql_vet);

                $sql_tip = "select * from pet_type";
                $result_tip = mysqli_query($conex, $sql_tip);

                $sql_ser = "select * from service";
                $result_ser = mysqli_query($conex, $sql_ser);

                $sql_due = "select * from owner";
                $result_due = mysqli_query($conex, $sql_due);

                $sql_pet = "select * from pet";
                $result_pet = mysqli_query($conex, $sql_pet);

                ?>
                <!--edit-->
                <?php
                $idcita = $_GET['idcita'];
                $sql_edit = "select * from quotes where id='$idcita'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: cita_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {

                    $id_vet = $_POST['id_vet'];
                    $id_tiM = $_POST['id_tiM'];
                    $id_servi = $_POST['id_servi'];
                    $title = $_POST['title'];
                    $nommas = $_POST['nommas'];
                    $dueno = $_POST['dueno'];
                    $color = $_POST['color'];
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $estado = $_POST['estado'];
                    $precio = $_POST['precio'];

                    $sql = "update quotes set id_vet=?, id_tiM=?,id_servi=?, title=?, nommas=?, dueno=?, color=?, start=?, end=?, estado=?, precio=? where id=?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('iiisssssssii', $id_vet, $id_tiM, $id_servi, $title, $nommas, $dueno, $color, $start, $end, $estado, $precio, $idcita);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'cita_edit.php?idcita=" . $idcita . "&resp=OK';</script>");

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
                                <a href="cita_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Editar Citas</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre de la cita</label>
                                    <input class="form-control" name="title" required type="text" value="<?php echo $row_edit['title']; ?>" placeholder="Nombre de la cita..." />
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Veterinario</label>
                                    <select class="form-select" name="id_vet" aria-label="Default select example" required>
                                        <option disabled selected="selected">-- Veterinario --</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_vet)) {

                                        ?>
                                            <option value="<?php echo $row["id_vet"]; ?>" <?php if ($row_edit['id_vet'] == $row["id_vet"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row["nomvet"]; ?> <?php echo $row["apevet"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Tipo de la Mascota</label>
                                    <select class="form-select" name="id_tiM" aria-label="Default select example" required>
                                        <option disabled selected="selected">--Seleccione el tipo--</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_tip)) {
                                        ?>
                                            <option value="<?php echo $row["id_tiM"]; ?>" <?php if ($row_edit['id_tiM'] == $row["id_tiM"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row["noTiM"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Servicio</label>
                                    <select class="form-select" name="id_servi" aria-label="Default select example" required>
                                        <option disabled selected="selected">-- Servicio --</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_ser)) {

                                        ?>
                                            <option value="<?php echo $row["id_servi"]; ?>" <?php if ($row_edit['id_servi'] == $row["id_servi"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row["nomser"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre de la mascota</label>
                                    <select class="form-select" name="nommas" aria-label="Default select example" required>
                                        <option disabled selected="selected">--Seleccione la Mascota--</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_pet)) {
                                        ?>
                                            <option value="<?php echo $row["nomas"]; ?>" <?php if ($row_edit['nommas'] == $row["nomas"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $row["nomas"]; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dueño de la Mascota</label>
                                    <select class="form-select" name="dueno" aria-label="Default select example" required>
                                        <option disabled selected="selected">--Seleccione un dueño--</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_due)) {
                                        ?>
                                            <option value="<?php echo  $row["nom_due"]; ?>&nbsp;<?php echo $row["ape_due"]; ?>" <?php if ($row_edit['dueno'] == $row["nom_due"] . '&nbsp;' . $row["ape_due"]) {
                                                                                                                                    echo "selected";
                                                                                                                                } ?>><?php echo  $row["nom_due"]; ?>&nbsp;<?php echo $row["ape_due"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Precio</label>
                                    <input class="form-control" name="precio" required type="number" value="<?php echo $row_edit['precio']; ?>" placeholder="Precio..." />
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Fecha de inicio</label>
                                    <input type='datetime-local' name="start" value="<?php echo $row_edit['start']; ?>" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Fecha de fin</label>
                                    <input type='datetime-local' name="end" value="<?php echo $row_edit['end']; ?>" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label class="form-label">Estado</label>
                                <select class="form-select" name="estado" aria-label="Default select example">
                                        <option disabled>-- Estado --</option>
                                        <option value="1" <?php if($row_edit['estado']== '1'){echo "selected";}?>>Activo</option>
                                        <option value="2" <?php if($row_edit['estado']== '2'){echo "selected";}?>>Inactivo</option>
                                    </select>
                                    
                            </div>
                            <div class="col-sm-5" style="display:none;">
                                <select name="color" class="form-control show-tick">
                                    <option style="color:#ff0000;" value="#ff0000">&#9724; Rojo</option>

                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit" name="edit">Editar</button>
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