<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raza</title>
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


                $sql_tip = "select * from pet_type";
                $result_tip = mysqli_query($conex, $sql_tip);


                if (isset($_POST['add'])) {

                    $nomraza = $_POST['nomraza'];
                    $id_tiM = $_POST['id_tiM'];
                    $estado = $_POST['estado'];

                    $sql_raz = "select * from raza";
                    $result_raz = mysqli_query($conex, $sql_raz);


                    $sql = "insert into raza(nomraza,id_tiM,estado)  values (?,?,?)";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('sii', $nomraza, $id_tiM, $estado);

                    $statement->execute();

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

                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                                <a href="raza_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Raza</h5>
                            </div>
                        </div>
                    </div>


                    <div class="card-body  bg-light">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre de la raza</label>
                                    <input class="form-control" name="nomraza" required type="text" />
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Tipo de la Raza</label>
                                    <select class="form-select" name="id_tiM" aria-label="Default select example" required>
                                        <option disabled selected="selected">  Seleccione el tipo  </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_tip)) {
                                        ?>
                                            <option value="<?php echo $row["id_tiM"]; ?>"><?php echo $row["noTiM"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                                </div>
                                <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                <button class="btn btn-primary" type="submit" name="add">Registrar</button>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>