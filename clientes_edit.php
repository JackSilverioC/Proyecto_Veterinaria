<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link datepicker -->
    <link href="vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />
    <title>Clientes</title>
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
                $idcliente = $_GET['idcliente'];
                $sql_edit = "select * from owner where id_due='$idcliente'";
                $result_edit = mysqli_query($conex, $sql_edit);
                if (mysqli_num_rows($result_edit) == 0)
                    header("Location: clientes_listar.php");
                else
                    $row_edit = mysqli_fetch_assoc($result_edit);
                ?>

                <?php
                if (isset($_POST['edit'])) {

                    $dni_due  = $_POST['dni_due'];
                    $nom_due = htmlspecialchars($_POST['nom_due']);
                    $ape_due = htmlspecialchars($_POST['ape_due']);
                    $fecnaci = $_POST['fecnaci'];
                    $movil = $_POST['movil'];
                    $fijo = $_POST['fijo'];
                    $correo = $_POST['correo'];
                    $direc = $_POST['direc'];

                    $sql = "update owner set dni_due = ?, nom_due = ?, ape_due = ?, fecnaci = ?, movil = ?, fijo = ?,correo = ?,direc = ? WHERE  id_due  = ?";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('ssssssssi', $dni_due, $nom_due, $ape_due, $fecnaci, $movil, $fijo, $correo, $direc, $idcliente);

                    $statement->execute();

                    $conex->close();

                    if ($statement)
                        echo ("<script>location.href = 'clientes_edit.php?idcliente=" . $idcliente . "&resp=OK';</script>");
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
                                <a href="clientes_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Editar Cliente</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dni del cliente</label>
                                    <input class="form-control" name="dni_due" required value="<?php echo $row_edit['dni_due']; ?>" type="text" placeholder="Dni del cliente..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del cliente</label>
                                    <input class="form-control" name="nom_due" required value="<?php echo $row_edit['nom_due']; ?>" type="text" placeholder="Nombre del cliente..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Apellido del cliente</label>
                                    <input class="form-control" name="ape_due" required value="<?php echo $row_edit['ape_due']; ?>" type="text" placeholder="Apellido del cliente..." />
                                </div>
                                <div class="col-lg-4 mb-3" id="datepicker">
                                    <label class="form-label" for="datepicker">Fecha de nacimiento del cliente</label>
                                    <input class="form-control datetimepicker" name="fecnaci" id="datepicker" value="<?php echo $row_edit['fecnaci']; ?>" type="text" placeholder="Fecha de nacimiento del cliente..." data-options='{"disableMobile":true}' />
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono móvil</label>
                                    <input class="form-control" name="movil" required value="<?php echo $row_edit['movil']; ?>" type="number" placeholder="Teléfono móvil..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono fijo</label>
                                    <input class="form-control" name="fijo" value="<?php echo $row_edit['fijo']; ?>" type="number" placeholder="Teléfono fijo..." />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Correo</label>
                                    <input class="form-control" name="correo" value="<?php echo $row_edit['correo']; ?>" type="email" placeholder="Correo..." />
                                </div>
                                <div class="col-lg-8 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <input class="form-control" name="direc" value="<?php echo $row_edit['direc']; ?>" type="text" placeholder="Dirección..." />
                                </div>
                            </div>


                            <div class="col d-flex justify-content-end">
                            <button class="btn btn-outline border-300 me-2" type="reset">Reestablecer</button>
                                <button class="btn btn-primary" type="submit" name="edit">Editar Cliente</button>
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