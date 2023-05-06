<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación</title>
    <?php
    include_once('includes/1_head.php');

    include_once('conexion/conexion.php');
    if(isset($_GET['total'])){
        $total=$_GET['total'];
    }

    if(isset($_POST['submit'])){
        $total=$_POST['total'];
        $efectivo="efectivo";

        $sql='insert into venta(total,tipopa) values('.$total.',"'.$efectivo.'")';
        $statement = $conex->prepare($sql);
        $statement->execute();

        $sql2="TRUNCATE TABLE carrito";
        $statement2 = $conex->prepare($sql2);
        $statement2->execute();

        echo ' 
            <div class="position-fixed bottom-0 end-0 p-3 me-5" style="z-index: 5" aria-live="polite" aria-atomic="true">
                <div class="toast show">
                    <div class="toast-header alert-success">
                        <strong class="me-auto">Mensaje</strong>
                        <button class="ms-2 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-white">Compra realizada exitosamente.</div>
                </div>
            </div>
                ';
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
                            <a style="color:white;" target="_blank" class="nav-link" href="carrito.php"><span class="fas fa-shopping-cart me-2"></span>Carrito</a>
                        </li>

                        <li class="nav-item"><a style="color:white;" target="_blank" class="nav-link" href="index.php"><i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="py-0 bg-dark light shadow-none">
            <div class="bg-white rounded-0 pt-6 pb-0 px-9">
            <form method="post">
                <div class="card-header bg-light mt-4">
                  <div class="row flex-between-center">
                    <div class="col-sm-auto">
                      <h5 class="mb-2 mb-sm-0">Dirección de Entrega</h5>
                    </div>
                  </div>
                </div>   
                <div class="card-body">
                    <div class="row">
                    <div class="col-6">
                                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Dirección</label>
                                        <input class="form-control" type="text" required/>
                                    </div>
                    </div>
                </div>
            </div>
            

            <div class="card shadow-none rounded-0 pt-3 pb-4 px-9">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Método de Pago</h5>
                </div>
                <div class="card-body">
                    
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" value="" id="credit-card" checked="checked" name="payment-method" />
                            <label class="form-check-label mb-2 fs-1" for="credit-card">Tarjeta de Crédito
                            </label>
                        </div>
                        <div class="row gx-0 ps-2 mb-4">
                            <div class="col-sm-8 px-3">
                                <div class="mb-3">
                                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" for="inputNumber">Número de la tarjeta</label>
                                    <input class="form-control" id="inputNumber" type="text" placeholder="•••• •••• •••• ••••" />
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Fecha de Exp.</label>
                                        <input class="form-control" type="text" placeholder="mm/aaaa" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">CVV</label>
                                        <input class="form-control" type="text" placeholder="123" maxlength="3" pattern="[0-9]{3}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ps-3 text-center pt-2 d-none d-sm-block">
                                <div class="rounded-1 p-2 mt-3 bg-100">
                                    <div class="text-uppercase fs--2 fw-bold">Aceptamos</div><img src="images/carrito/tarjetas.png" alt="" width="120" />
                                </div>
                            </div>
                        </div>
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="radio" value="" id="credit-card" checked="checked" name="payment-method" />
                            <label class="form-check-label mb-2 fs-1" for="credit-card">Efectivo
                            </label>
                        </div>
                        <div class="border-dashed-bottom my-5"></div>
                        <div class="row">
                            <div class="col-md-5 col-xl-12 col-xxl-5 ps-lg-4 ps-xl-2 ps-xxl-5 text-center text-md-start text-xl-center text-xxl-start">
                                <div class="border-dashed-bottom d-block d-md-none d-xl-block d-xxl-none my-4"></div>
                                <div class="fs-2 fw-semi-bold">Total: <span class="text-primary"><?php if(isset($total)) {echo "S/".$total;}else{echo "S/0.00";} ?></span></div>
                                <input type="text" name="total" value="<?php if(isset($total)) {echo $total;}?>" hidden>
                                <input class="btn btn-success mt-3 px-5" name="submit" type="submit" value="Confirmar Pago"></input>
                            </div>
                        </div>
                    </form>
                </div>
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