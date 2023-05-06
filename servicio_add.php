<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("sesion.php"); ?>
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
            include_once('includes/2_header.php'); //nav
            ?>
            <div class="content">
                <?php
                include_once('includes/nav.php');

                include_once('conexion/conexion.php');


                if (isset($_POST['add'])) {

                    $nomser=$_POST['nomser'];
                    $estado=$_POST['estado'];

                    $sql_ser = "select * from service";
                    $result_ser = mysqli_query($conex, $sql_ser);


                    $sql = "insert into service (nomser, estado)  values (?,?)";

                    $statement = $conex->prepare($sql);

                    $statement->bind_param('si', $nomser, $estado);

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
                                <a href="servicio_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Servicio</h5>
                            </div>
                        </div>
                    </div>


                    <div class="card-body  bg-light">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del Servicio</label>
                                    <input class="form-control" name="nomser" required type="text"/>
                                </div>


                                <!--hide-->
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                        </select>
                                </div>
                            </div>

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