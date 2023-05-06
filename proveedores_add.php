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
                <!--add-->
                <?php

                if (isset($_POST['add'])) {
                    $nomprove = $_POST['nomprove'];
                    $ruc = $_POST['ruc'];
                    $direcc = $_POST['direcc'];
                    $pais = $_POST['pais'];
                    $tele = $_POST['tele'];
                    $corre = $_POST['corre'];
                    $estado = $_POST['estado'];

                    $sql_q = "select * from supplier where ruc='$ruc' or corre='$corre'";
                    $result_q = mysqli_query($conex, $sql_q);
                    if (mysqli_num_rows($result_q) == 0) {
                        $sql = "insert into supplier (nomprove,ruc,direcc,pais,tele,corre,estado) 
                        values (?,?,?,?,?,?,?)";

                        $statement = $conex->prepare($sql);

                        $statement->bind_param('sssssss', $nomprove, $ruc, $direcc, $pais, $tele, $corre, $estado);

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
                         Ruc/Correo ya registrado </div>';
                    }
                }

                ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                                <a href="proveedores_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Proveedor</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">RUC del proveedor</label>
                                    <!-- <input class="form-control" type="text" id="documento" name="ruc" placeholder="Ruc del proveedor..." /> -->
                                    <!-- <button type="button" class="btn btn-default" id="buscar"><span class="fas fa-search"></span></button> -->
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="documento" name="ruc"/>
                                        <div class="input-group-text p-0"><button type="button" class="btn btn-default" id="buscar"><span class="fas fa-search"></span></button></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del proveedor</label>
                                    <input class="form-control" name="nomprove" id="nombre" readonly required type="text"/>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dirección del proveedor</label>
                                    <input class="form-control" id="direccion" name="direcc" readonly required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">País/Ciudad del proveedor</label>
                                    <input class="form-control" id="provincia" name="pais" readonly type="text" required/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Teléfono del proveedor</label>
                                    <input class="form-control" name="tele" type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Correo del proveedor</label>
                                    <input class="form-control" type="email" name="corre"/>
                                </div>
                                <!--hide-->
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col mt-2 d-flex justify-content-end">
                                <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                <button class="btn btn-primary" type="submit" name="add">Registrar Proveedor</button>
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
        $('#buscar').click(function() {
            dni = $('#documento').val();
            $.ajax({
                url: 'consultaRUC.php',
                type: 'post',
                data: 'dni=' + dni,
                dataType: 'json',
                success: function(r) {
                    if (r.numeroDocumento == dni) {
                        $('#nombre').val(r.nombre);
                        $('#direccion').val(r.direccion);
                        $('#provincia').val(r.provincia);

                    } else {
                        alert(r.error);
                    }
                    console.log(r)
                }
            });
        });
    </script>
</body>

</html>