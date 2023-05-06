<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
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

                $sql_raz = "select * from raza";
                $result_raz = mysqli_query($conex, $sql_raz);

                $sql_due = "select * from owner";
                $result_due = mysqli_query($conex, $sql_due);
                ?>
                <?php

                if (isset($_POST['add'])) {

                    $nomas = $_POST['nomas'];
                    $id_tiM = $_POST['id_tiM'];
                    $id_raza = $_POST['id_raza'];
                    $sexo = $_POST['sexo'];
                    $edad = $_POST['edad'];
                    $tamano = $_POST['tamano'];
                    $peso = $_POST['peso'];
                    $id_due = $_POST['id_due'];
                    $obser = $_POST['obser'];
                    $estado = $_POST['estado'];

                    $sql_pet = "select * from pet";
                    $result_pet = mysqli_query($conex, $sql_pet);
                   
                   
                        $sql = "insert into pet(nomas,id_tiM,id_raza,sexo,edad,tamano,peso,id_due,obser,estado) values (?,?,?,?,?,?,?,?,?,?)";
                       
                        $statement = $conex->prepare($sql);

                        $statement->bind_param('siisssiisi',$nomas,$id_tiM,$id_raza,$sexo,$edad,$tamano,$peso,$id_due,$obser,$estado);
                        
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
                                <a href="mascota_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Mascota</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body  bg-light">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre de la mascota</label>
                                    <input class="form-control" name="nomas" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Sexo de la mascota</label>
                                    <select class="form-select" name="sexo" aria-label="Default select example" required>
                                        <option disabled value="" selected>  Seleccione un sexo  </option>
                                        <option value="Macho">Macho</option>
                                        <option value="Hembra">Hembra</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Edad de la Mascota</label>
                                    <input class="form-control" name="edad" type="text" required/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Tipo de la Mascota</label>
                                    <select class="form-select" name="id_tiM" aria-label="Default select example" required>
                                        <option value="" disabled selected="selected">  Seleccione el tipo  </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_tip)) {
                                        ?>
                                            <option value="<?php echo $row["id_tiM"]; ?>"><?php echo $row["noTiM"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Raza de la Mascota</label>
                                    <select class="form-select" name="id_raza" aria-label="Default select example" required>
                                        <option disabled selected="selected">  Seleccione la raza  </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_raz)) {
                                        ?>
                                            <option value="<?php echo $row["id_raza"]; ?>"><?php echo $row["nomraza"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Dueño de la Mascota</label>
                                    <select class="form-select" name="id_due" aria-label="Default select example" required>
                                        <option disabled selected="selected">  Seleccione un dueño  </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_due)) {
                                        ?>
                                            <option value="<?php echo $row["id_due"]; ?>"><?php echo  $row["nom_due"]; ?>&nbsp;<?php echo $row["ape_due"];; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Tamaño de la mascota</label>
                                    <select class="form-select" name="tamano" aria-label="Default select example" required>
                                        <option value="" disabled selected="selected">   Seleccione un tamaño   </option>
                                        <option value="Pequeña">Pequeña</option>
                                        <option value="Grande">Grande</option>

                                    </select>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Peso de la Mascota</label>
                                    <input class="form-control" name="peso" type="text" required/>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-textarea">Observación de la Mascota</label>
                                    <textarea class="form-control" name="obser" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-5" style="display:none;">
                                <select name="estado" class="form-control show-tick">

                                    <option value="1">1</option>

                                </select>
                            </div>
                            <div class="col mt-2 d-flex justify-content-end">
                                <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                <button class="btn btn-primary" type="submit" name="add">Registrar Mascota</button>
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