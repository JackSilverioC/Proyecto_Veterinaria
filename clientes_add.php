<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <!--add-->
                <?php

                if (isset($_POST['add'])) {
                    $dni_due = $_POST['dni_due'];
                    $nom_due = $_POST['nom_due'];
                    $ape_due = $_POST['ape_due'];
                    $movil = $_POST['movil'];
                    $fijo = $_POST['fijo'];
                    $correo = $_POST['correo'];
                    $direc = $_POST['direc'];
                    $estado = $_POST['estado'];
                    $cargo = $_POST['cargo'];
                    $fecnaci = $_POST['fecnaci'];

                    $sql_q = "select * from owner where dni_due='$dni_due' or movil='$movil' or fijo='$fijo'";
                    $result_q = mysqli_query($conex, $sql_q);
                    if (mysqli_num_rows($result_q) == 0) {
                        $sql = "insert into owner(dni_due,nom_due,ape_due,movil,fijo,correo,direc,estado,cargo,fecnaci) 
                        values (?,?,?,?,?,?,?,?,?,?)";

                        $statement = $conex->prepare($sql);

                        $statement->bind_param(
                            'ssssssssis',
                            $dni_due,
                            $nom_due,
                            $ape_due,
                            $movil,
                            $fijo,
                            $correo,
                            $direc,
                            $estado,
                            $cargo,
                            $fecnaci
                        );
                        $statement->execute();

                        $conex->close();

                        if ($statement)

                            echo ' 
                            <div class="position-fixed bottom-0 end-0 p-3 mb-5 me-5" style="z-index: 5" aria-live="polite" aria-atomic="true">
                                <div class="toast show">
                                    <div class="toast-header alert-success">
                                        <strong class="me-auto">Mensaje</strong>
                                        <button class="ms-2 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body bg-white">Datos registrados exitosamente.</div>
                                </div>
                            </div>
                             ';
                        else
                            echo ' <div class="position-fixed bottom-0 end-0 p-3 mb-5 me-5" style="z-index: 5" aria-live="polite" aria-atomic="true">
                            <div class="toast show">
                                <div class="toast-header alert-danger">
                                    <strong class="me-auto">Mensaje</strong>
                                    <button class="ms-2 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-white">Error en los datos.</div>
                            </div>
                        </div>';
                    } else {
                        echo ' <div class="position-fixed bottom-0 end-0 p-3 mb-5 me-5" style="z-index: 5" aria-live="polite" aria-atomic="true">
                        <div class="toast show">
                            <div class="toast-header alert-danger">
                                <strong class="me-auto">Mensaje</strong>
                                <button class="ms-2 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body bg-white">Dni/Móvil/Fijo ya registrado!</div>
                        </div>
                    </div>';
                    }
                }

                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                                <a href="clientes_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Cliente</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">DNI del cliente</label>
                                    <input class="form-control" name="dni_due" required type="text" />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombres del cliente</label>
                                    <input class="form-control" name="nom_due" required type="text" />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Apellidos del cliente</label>
                                    <input class="form-control" name="ape_due" required type="text" />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono móvil</label>
                                    <input class="form-control" name="movil" required type="number" />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono fijo</label>
                                    <input class="form-control" name="fijo" type="number" />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Correo</label>
                                    <input class="form-control" name="correo" type="email" />
                                </div>
                                <div class="col-lg-4 mb-3" id="datepicker">
                                    <label class="form-label" for="datepicker">Fecha de Nacimiento</label>
                                    <input class="form-control datetimepicker" name="fecnaci" id="datepicker" type="text" data-options='{"disableMobile":true}' />
                                </div>
                                <div class="col-lg-8 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <input class="form-control" name="direc" type="text" />
                                </div>
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                                <div class="col-sm-5" style="display:none;">
                                    <select name="cargo" class="form-control show-tick">

                                        <option value="2">2</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col mt-2  d-flex justify-content-end">
                                <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                <button class="btn btn-primary" type="submit" name="add">Registrar Cliente</button>
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