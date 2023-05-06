<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <?php
    include_once('includes/1_head.php');
    include_once('conexion/conexion.php');
    if(isset($_GET['id'])){
        $id_prod=$_GET['id'];
        $sql='insert into carrito(id_producto) values('.$id_prod.')';
        $statement = $conex->prepare($sql);
        $statement->execute();
    }
    

    

    $sql2="select id_producto,nompro,foto,precV,id_carrito from carrito c join products p on c.id_producto=p.id_prod";
    $result = mysqli_query($conex, $sql2);

    if(isset($_POST['factu'])){
        $cant=$_POST['cant'];
        $id=$_POST['id'];
        $precio=$_POST['precio'];

        $total=0;

        for ($i=0; $i < count($id); $i++) { 
            $total+=$precio[$i]*$cant[$i];
        }
        header('location:facturacion.php?total='.$total);

    }

    ?>
</head>

</head>

<body>
    <main class="main" id="top">
        <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark" style="background-color: #0b1727;">
            <div class="container">
                <a class="navbar-brand" href="principal.php"><span class="text-white dark__text-white">Pet Shop</span></a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a style="color:white;" class="nav-link" href="tel:972 519 749"><i class="fas fa-phone-alt me-1"></i>972 519 749</a></li>
                    <li class="nav-item"><a style="color:white;" target="_blank" class="nav-link" href="https://api.whatsapp.com/send?phone=51972519749&app=facebook&entry_point=page_cta&fbclid=IwAR3-kE8P3M6kfUFfb4EQKIiNcr4iJCDQ1b4r1Aavi4mvokBdk4IwJYLErN0"><i class="fab fa-whatsapp me-1"></i>Contacto</a></li>
                    <li class="nav-item">
                            <a style="color:white;" class="nav-link" href="#mapa"><i class="bi bi-geo-alt-fill"></i> ¿Cómo Llegar?</a>
                        </li>
                </ul>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse scrollbar" id="navbarStandard">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a style="color:white;" target="_blank" class="nav-link" href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart me-2"></span>Carrito</a>
                        </li>
                        
                        <li class="nav-item"><a style="color:white;" target="_blank" class="nav-link" href="index.php"><i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="py-0 bg-dark light">
        <div class="card rounded-0 py-6 px-9">
            <div class="card-header bg-light mt-4">
                <div class="row justify-content-between">
                    <div class="col-md-auto">
                        <h5 class="mb-3 mb-md-0">Artículos</h5>
                    </div>
                    <div class="col-md-auto"><a class="btn btn-sm btn-outline-secondary border-300 me-2" href="principal.php#productos"> <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Volver</a></div>
                </div>
            </div>
            <form action="" method="post">
            <div class="card-body p-0">
                <div class="row gx-card mx-0 bg-200 text-900 fs--1 fw-semi-bold">
                    <div class="col-9 col-md-8 py-2">Nombre</div>
                    <div class="col-3 col-md-4">
                        <div class="row">
                            <div class="col-md-8 py-2 d-none d-md-block text-center">Cantidad</div>
                            <div class="col-12 col-md-4 text-end py-2">Precio</div>
                        </div>
                    </div>
                </div>
                <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                    <?php 
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-8 py-3">
                        <div class="d-flex align-items-center"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="images/productos/<?php echo $row['foto']; ?>" alt="" width="60" />
                            <div class="flex-1">
                                <h5 class="fs-0"><a class="text-900" href="#"><?php echo $row['nompro']; ?></a></h5>
                                <!-- <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                                <div>
                                    <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                                        <!-- <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button> -->
                                        <input style="width: 100px;" class="form-control text-center" name="cant[]" type="number" min="1" value="1">
                                        <!-- <input name="cant[]" class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" style="width: 50px" /> -->
                                        <input name="id[]" hidden value="<?php echo $row['id_producto']; ?>">
                                        <input name="precio[]" hidden value="<?php echo $row['precV']; ?>">
                                        <!-- <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600"><?php echo $row['precV']; ?></div>
                        </div>
                    </div><?php } ?>
                </div>
                </div>
            
            <div class="card-footer bg-light d-flex justify-content-end">
                <input class="btn btn-sm btn-primary" type="submit" href="facturacion.php" name="factu" value="Facturación"></input>
            </div>
            </form>
        </div>       

        </section>

        <section class="bg-dark pt-8 pb-4 light">

            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="text-uppercase text-white opacity-85 mb-3">Misión</h5>
                        <p class="text-600">La clínica veterinaria Pet Shop tiene como misión ofrecer bienestar a cada una de nuestras mascotas, que sus familias entiendan los deberes y los derechos que tienen las mascotas desde el instante que entran a formar parte de sus vidas.</p>
                        <h5 class="text-uppercase text-white opacity-85 mb-3">Visión</h5>
                        <p class="text-600">La clínica veterinaria Pet Shop tiene como visión ser una empresa sólida, líder en prestación de servicios médicos veterinarios de la mejor calidad y profesionalismo, con énfasis en animales de compañía.</p>
                        <div class="icon-group mt-4"><a class="icon-item bg-white text-facebook" href="https://www.facebook.com/VeterinariaPetShopEntrePatas" target="_blank"><span class="fab fa-facebook-f"></span></a><a class="icon-item bg-white text-instagram" href="https://www.instagram.com/vetpetshop_entrepatas/"  target="_blank"><span class="fab fa-instagram"></span></a><a class="icon-item bg-white text-whatsapp" href="https://api.whatsapp.com/send?phone=51972519749&app=facebook&entry_point=page_cta&fbclid=IwAR2JQFvWHwgjkrpWe8Nn_0jDFZUKTp06IPfmuuE9u7DWVey6QdC5uPBob-c" target="_blank"><span class="fab fa-whatsapp"></span></a></div>
                    </div>
                    <div class="col ps-lg-6 ps-xl-8">
                        <div class="row mt-5 mt-lg-0">
                            <div class="col-6 col-md-3">
                                <h5 class="text-uppercase text-white opacity-85 mb-3">Valores</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-1"><p class="link-600">Calidad</p></li>
                                    <li class="mb-1"><p class="link-600" >Respeto</p></li>
                                    <li class="mb-1"><p class="link-600" >Organización</p></li>
                                    <li class="mb-1"><p class="link-600" >Honestidad</p></li>
                                    <li class="mb-1"><p class="link-600" >Disciplina</p></li>
                                    <li class="mb-1"><p class="link-600" >Innovación</p></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-3">
                                <h5 class="text-uppercase text-white opacity-85 mb-3">Categorías</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-1"><a class="link-600" href="mascota_listar.php"> Mascotas</a></li>
                                    <li class="mb-1"><a class="link-600" href="cita_listar.php">Citas</a></li>
                                    <li class="mb-1"><a class="link-600" href="pedido_listar.php">Pedidos</a></li>
                                    <li class="mb-1"><a class="link-600" href="categorias_listar.php">Categorías</a></li>
                                    <li class="mb-1"><a class="link-600" href="clientes_listar.php">Clientes</a></li>
                                    <li class="mb-1"><a class="link-600" href="proveedores_listar.php">Proveedores</a></li>
                                    <li class="mb-1"><a class="link-600" href="veterinarios_listar.php">Veterinarios</a></li>
                                </ul>
                            </div>
                            <div class="col mt-5 mt-md-0">
                                <h5 class="text-uppercase text-white opacity-85 mb-3">Horarios de Atención</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <h6 class="fs-0 mb-0"><p class="text-600 opacity-10" >Lunes a Viernes</p></h6>
                                        <p class="text-400 opacity-10">8:30 am - 20:00 pm </p>
                                    </li>
                                    <li>
                                        <h5 class="fs-0 mb-0"><p class="text-600 opacity-10">Sábado</p></h5>
                                        <p class="text-400 opacity-10">8:30 am - 14:00 pm </p>
                                    </li>

                                    <li>
                                        <h5 class="fs-0 mb-0"><p class="text-600 opacity-10">Domingo</p></h5>
                                        <p class="text-400 opacity-10">Cerrado </p>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->


        <section class="py-0 bg-dark light">

            <div>
                <hr class="my-0 text-600 opacity-25" />
                <div class="container py-3">
                    <div class="row justify-content-between fs--1">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600 opacity-85">UNJFSC - Ingeniería de Sistemas <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2022 &copy; <a href="https://www.facebook.com/VeterinariaPetShopEntrePatas" target="_blank">Pet Shop entre Patas</a></p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600 opacity-85">Web Application Development</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>

        <?php
                include_once("./includes/4_foot.php");
                ?>
    </main>


</body>

</html>