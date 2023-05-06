<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
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
            include_once('includes/2_header.php'); //nav
            ?>
            <div class="content">
                <?php
                include_once('includes/nav.php');
                include_once('conexion/conexion.php');
                ?>
                <!--edit-->
                <?php
                $idvet = $_GET['idvet'];
                $sql_edit = "select * from veterinarian where id_vet='$idvet'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: veterinarios_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {

                    $dnivet  = $_POST['dnivet'];
                    $nomvet = htmlspecialchars($_POST['nomvet']);
                    $apevet = htmlspecialchars($_POST['apevet']);
                    $direcc = $_POST['direcc'];
                    $sexo = $_POST['sexo'];
                    $correo = $_POST['correo'];
                    $fijo = $_POST['fijo'];
                    $movil = $_POST['movil'];

                    $sql = "UPDATE veterinarian SET dnivet = ?, nomvet = ?, apevet = ?, direcc = ?, sexo = ?, correo = ?,fijo = ?,movil = ? WHERE  id_vet  = ?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('ssssssssi', $dnivet, $nomvet, $apevet, $direcc, $sexo, $correo, $fijo, $movil, $idvet);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'veterinarios_edit.php?idvet=" . $idvet . "&resp=OK';</script>");
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
                                <a href="veterinarios_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Editar Veterinario</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dni del veterinario</label>
                                    <input class="form-control" name="dnivet" value="<?php echo $row_edit['dnivet']; ?>" required type="text" placeholder="Dni del veterinario..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del veterinario</label>
                                    <input class="form-control" name="nomvet" value="<?php echo $row_edit['nomvet']; ?>" required type="text" placeholder="Nombre del veterinario..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Apellido del veterinario</label>
                                    <input class="form-control" name="apevet" value="<?php echo $row_edit['apevet']; ?>" required type="text" placeholder="Apellido del veterinario..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dirección del veterinario</label>
                                    <input class="form-control" name="direcc" value="<?php echo $row_edit['direcc']; ?>" required type="text" placeholder="Dirección del veterinario..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Sexo del veterinario</label>
                                    <select class="form-select" name="sexo" aria-label="Default select example">
                                        <option disabled selected="selected">Seleccione el sexo</option>
                                        <option value="Masculino" <?php if ($row_edit['sexo'] == 'Masculino') {
                                                                        echo 'selected';
                                                                    } ?>>Masculino</option>
                                        <option value="Femenino" <?php if ($row_edit['sexo'] == 'Femenino') {
                                                                        echo 'selected';
                                                                    } ?>>Femenino</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Correo del veterinario</label>
                                    <input class="form-control" name="correo" value="<?php echo $row_edit['correo']; ?>" required type="email" placeholder="Correo del veterinario..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono móvil del veterinario</label>
                                    <input class="form-control" name="movil" value="<?php echo $row_edit['movil']; ?>" required type="text" placeholder="Teléfono móvil del veterinario..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono fijo del veterinario</label>
                                    <input class="form-control" name="fijo" value="<?php echo $row_edit['fijo']; ?>" required type="text" placeholder="Teléfono fijo del veterinario..." />
                                </div>

                                <!--hide-->
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                                <div class="col-sm-5" style="display:none;">
                                    <select name="cargo" class="form-control show-tick">

                                        <option value="3">3</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-outline border-300 me-2" type="reset">Reestablecer</button>
                                <button class="btn btn-primary" type="submit" name="edit">Editar Veterinario</button>
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