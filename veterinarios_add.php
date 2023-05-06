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
                <!--add-->
                <?php

                if (isset($_POST['add'])) {

                    $dnivet = $_POST['dnivet'];
                    $nomvet = $_POST['nomvet'];
                    $apevet = $_POST['apevet'];
                    $direcc = $_POST['direcc'];
                    $sexo = $_POST['sexo'];
                    $correo = $_POST['correo'];
                    $fijo = $_POST['fijo'];
                    $movil = $_POST['movil'];
                    $cargo = $_POST['cargo'];
                    $estado = $_POST['estado'];


                    $sql_q = "select * from veterinarian where dnivet='$dnivet' or correo='$correo' or fijo='$fijo' or movil='$movil'";
                    $result_q = mysqli_query($conex, $sql_q);
                    if (mysqli_num_rows($result_q) == 0) {
                        $sql = "insert into veterinarian (dnivet,nomvet,apevet,direcc,sexo,correo,fijo,movil,cargo,estado) 
                        values (?,?,?,?,?,?,?,?,?,?)";
                        $statement = $conex->prepare($sql);

                        $statement->bind_param('ssssssssis', $dnivet, $nomvet, $apevet, $direcc, $sexo, $correo,$fijo, $movil, $cargo, $estado);
                        //Guardar foto en carpeta
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
                    } else {
                        echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         Dni/Correo/Cel/Tel ya registrado! </div>';
                    }
                }

                ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                                <a href="veterinarios_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Veterinario</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dni del veterinario</label>
                                    <input class="form-control" name="dnivet" required type="text" />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del veterinario</label>
                                    <input class="form-control" name="nomvet" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Apellido del veterinario</label>
                                    <input class="form-control" name="apevet" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dirección del veterinario</label>
                                    <input class="form-control" name="direcc" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Sexo del veterinario</label>
                                    <select class="form-select" name="sexo" aria-label="Default select example">
                                        <option disabled selected="selected">Seleccione el sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Correo del veterinario</label>
                                    <input class="form-control" name="correo" required type="email"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono móvil del veterinario</label>
                                    <input class="form-control" name="movil" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono fijo del veterinario</label>
                                    <input class="form-control" name="fijo" required type="text"/>
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
                            <div class="col mt-2 d-flex justify-content-end">
                                <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                <button class="btn btn-primary" type="submit" name="add">Registrar Veterinario</button>
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