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
                $sql_cat = "select * from category";
                $result_cat = mysqli_query($conex, $sql_cat);

                $sql_pro = "select * from supplier";
                $result_pro = mysqli_query($conex, $sql_pro);

                if (isset($_POST['add'])) {

                    $codigo = $_POST['codigo'];
                    $id_cate = $_POST['id_cate'];
                    $foto = $_FILES['foto']['name'];
                    $nompro = $_POST['nompro'];
                    $peso = $_POST['peso'];
                    $id_prove = $_POST['id_prove'];
                    $descp = $_POST['descp'];
                    $preciC = $_POST['preciC'];
                    $precV = $_POST['precV'];
                    $stock = $_POST['stock'];
                    $estado = $_POST['estado'];
                    $sql_o = "select * from supplier where id_prove='$id_prove'";
                    $result_o = mysqli_query($conex, $sql_o);
                    $row_o = mysqli_fetch_array($result_o);
                    if ($row_o['estado'] == 1) {
                        if(($_FILES['foto']['name'])!=null){
                            $foto = $_FILES['foto'];
                            move_uploaded_file($foto['tmp_name'], "images/productos/" . $foto['name']);
                        }
    
                        $sql_q = "select * from products where codigo='$codigo'";
                        $result_q = mysqli_query($conex, $sql_q);
                        if (mysqli_num_rows($result_q) == 0) {
                            $sql = "insert into products(codigo,id_cate, foto,nompro,peso,id_prove,descp,preciC,precV,stock,estado) values(?,?,?,?,?,?,?,?,?,?,?)";
    
                            $statement = $conex->prepare($sql);
                            $foto_string = "$foto";
    
                            $statement->bind_param('sisssisddss', $codigo, $id_cate, $foto_string, $nompro, $peso, $id_prove, $descp, $preciC, $precV, $stock, $estado);
                            //Guardar foto en carpeta
                            if(($_FILES['foto']['name'])!=null){
                                $foto = $_FILES['foto'];
                                move_uploaded_file($foto['tmp_name'], "images/productos/" . $foto['name']);
                            }else{
                                $foto = "images/productos/no-disponible.jpg";
                            }
                            
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
                             Código ya registrado </div>';
                        }
                    }else {
                        echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             Proveedor inactivo </div>';
                    }
                }

                ?>


                <?php

                class tools
                {

                    public function randomCode()
                    {
                        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $pass = array();
                        $pass[] = "0";
                        $alphaLength = strlen($alphabet) - 1;
                        for ($i = 0; $i < 13; $i++) {
                            $n = rand(0, $alphaLength);
                            $pass[] = $alphabet[$n];
                        }
                        return implode($pass);
                    }
                }

                $instancia = new tools();
                $codigo = $instancia->randomCode();
                ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="d-flex col-auto align-self-center mt-2">
                            <a href="productos_listar.php" class="btn icon-item icon-item-sm shadow-none p-0 me-2" type="button" data-event="prev" data-bs-toggle="tooltip" title="Atrás"><span class="fas fa-arrow-left"></span></a>
                                <h5 class="mb-0 mt-1">Registrar Producto</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">

                        <form method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Código de barra del producto</label>
                                    <input class="form-control" name="codigo" required type="text" readonly value="<?php echo $codigo ?>"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Nombre del producto</label>
                                    <input class="form-control" name="nompro" required type="text"/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Categoría del producto</label>
                                    <select class="form-select" name="id_cate" aria-label="Default select example" required>
                                        <option  value="" disabled selected="selected"> Seleccione la categoría </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_cat)) {
                                        ?>
                                            <option value="<?php echo $row["id_cate"]; ?>"><?php echo $row["nomcate"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Proveedor del producto</label>
                                    <select class="form-select" name="id_prove" aria-label="Default select example" required>
                                        <option  value="" disabled selected="selected"> Seleccione el proveedor </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($result_pro)) {
                                        ?>
                                            <option value="<?php echo $row["id_prove"]; ?>"><?php echo $row["nomprove"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Precio de compra</label>
                                    <input class="form-control" name="preciC" type="number" step="0.01" required/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Precio de venta</label>
                                    <input class="form-control" name="precV" type="number" step="0.01" required/>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Peso del producto</label>
                                    <input class="form-control" name="peso" type="text" required />
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Stock del producto</label>
                                    <input class="form-control" name="stock" type="number" required/>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">Imagen del producto</label>
                                    <div class="row" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"data":[{"name":"no-disponible.jpg","url":"images/productos"}]}'>
                                        <div class="col-md-auto">
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0">
                                            <div class="avatar avatar-4xl"><img class="rounded-2" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md">
                                        <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                                            <div class="text-center">Elija una foto o arrástrela aquí
                                            </div>
                                        </div>
                                        <input class="form-control" type="file" name="foto" id="foto" hidden/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label" for="basic-form-textarea">Descripción del producto</label>
                                    <textarea class="form-control h-75" name="descp" rows="3"></textarea>
                                </div>
                                <! hide >
                                <div class="col-sm-5" style="display:none;">
                                    <select name="estado" class="form-control show-tick">

                                        <option value="1">1</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                                    <button class="btn btn-outline border-300 me-2" type="reset">Limpiar</button>
                                    <button class="w-auto btn btn-primary text-end" type="submit" name="add">Registrar Producto</button>
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
        // let file = document.getElementById("file");
        // let foto = document.getElementById("foto");

        // file.addEventListener('change', function() {
        // let files = this.files;
        // let dt = new DataTransfer();
        // for(let i=0; i<files.length; i++) {
        //     let f = files[i];
        //     dt.items.add(
        //     new File(
        //         [f.slice(0, f.size, f.type)],
        //         f.name
        //     ));
        // }
        // foto.files = dt.files;
        // });



        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $('#blah')
        //                 .attr('src', e.target.result);
        //         };

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
    </script>
</body>

</html>