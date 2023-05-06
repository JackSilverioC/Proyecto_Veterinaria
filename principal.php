<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal | Pet Shop</title>
    <?php
    include_once('includes/1_head.php');
    ?>
</head>

</head>

<body>
    <main class="main" id="top">
        <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
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


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0 overflow-hidden light" id="banner">

            <div class="bg-holder overlay" style="background-image:url(images/principal/bg.jpg);background-position: center bottom;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                    <div class="col-md-11 col-lg-8 col-xl-6 pb-7 pb-xl-9 text-center">
                        <h1 class="text-white fw-light">Asegura el <span class="typed-text fw-bold" data-typed-text='["bienestar","estilo","comfort"]'></span><br />de tu mascota</h1>
                        <p class="lead text-white opacity-75">En nuestra tienda para mascotas, encontrarás todo tipo de accesorios y utilidades que te podrán facilitar la vida con tu mascota y a su vez mejorar su salud y estado de ánimo.</p><a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="#productos">Descubre Nuestros Productos<span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1"></span></a>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-6 shadow-sm">

            <div class="container ">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <h1 class="fs-2 fs-sm-4 fs-md-5">Nos comprometemos contigo</h1>
                        <p class="lead">A ofrecer todo tipo de servicios especializados y de la mejor calidad, siempre pensando en la salud y el bienestar de las mascota y en la tranquilidad de nuestros usuarios.</p>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <section class="py-4 bg-light ">
        <div class="container-fluid text-center">
            <h2 class="mt-3" >Nuestra Marcas</h2>
            <div class="row mx-auto my-auto justify-content-center mt-3">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner py-3" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Dog-Chow-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/06/barker_logo_nuevo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Vetlife-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Taste-of-the-wild-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Royal-Canin-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Rambala-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Hills-Prescription-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Vetlife-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Taste-of-the-wild-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3 px-4">
                                <div class="card shadow-sm">
                                    <div class="card-img">
                                        <img src="https://petplaza.pe/wp-content/uploads/2022/03/Hant-logo.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
            <!-- end of .container-->

        </section>
        

        <script>
            let items = document.querySelectorAll('.carousel .carousel-item')

            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })
        </script>

        <!-- <section class="bg-white">
            <div class="container ">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <h1 class="fs-2 fs-sm-4 fs-md-5">WebApp theme of the future</h1>
                        <p class="lead">Built on top of Bootstrap 5, super modular Falcon provides you gorgeous design &amp; streamlined UX for your WebApp.</p>
                    </div>
                </div>
            </div>
        </section> -->


        <!-- <section> close ============================-->
        <!-- ============================================-->
        <div class="card mb-3 px-9" id="productos">
            <h2 class="mt-3 text-center mt-6 mb-4">Nuestros Productos</h2>
            <div class="card-body">
                <div class="row">
                    <?php
                    require_once './conexion/conexion.php';
                    $sql_pro = "select p.*,c.nomcate, s.nomprove from products p,category c,supplier s WHERE p.id_cate=c.id_cate and p.id_prove=s.id_prove";
                    $result_pro = mysqli_query($conex, $sql_pro);
                    while ($row = mysqli_fetch_array($result_pro)) {
                    ?>
                        <div class="mb-4 col-md-5 col-lg-3">
                            <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                                <div class="overflow-hidden">
                                    <div class="position-relative rounded-top overflow-hidden"><a class="d-block" href="app/e-commerce/product/product-details.html"><img class="rounded-top w-100" src="<?php if ($row['foto'] == null || file_exists("images/productos/" . $row['foto']) == false) {
                                                                                                                                                                                                                        echo "images/productos/no-disponible.jpg";
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                        echo "images/productos/" . $row['foto'];
                                                                                                                                                                                                                    } ?>" /></a>
                                    </div>
                                    <div class="p-3">
                                        <h5 class="fs-0"><a class="text-dark"><?php echo $row['nompro']; ?></a></h5>
                                        <p class="fs--1 mb-3 text-500"><?php echo $row['nomcate']; ?></p>
                                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">S/ <?php echo $row['precV']; ?>
                                            <del class="ms-2 fs--1 text-500">S/ <?php echo $row['precV'] * 1.5; ?></del>
                                        </h5>
                                        <p class="fs--1 mb-1">Stock: <?php if ($row["stock"] > 20) {
                                                                            echo '<strong class="text-success">Disponible</strong>';
                                                                        } else if ($row["stock"] > 0) {
                                                                            echo '<strong class="text-warning">Pocas Unidades</strong>';
                                                                        } else {
                                                                            echo '<strong class="text-danger">No disponible</strong>';
                                                                        } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex flex-between-center px-3">
                                    <div><a class="btn btn-sm btn-falcon-default me-2" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Añadir a Favoritos"><span class="far fa-heart"></span></a>
                                    <a class="btn btn-sm btn-falcon-default" href="carrito.php?id=<?php echo $row['id_prod']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Añadir al Carrito"><span class="fas fa-cart-plus"></span></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-light text-center py-7">

            <div class="container mt-1">
                <div class="row">
                    <div class="col">
                        <h1 class="fs-2 fs-sm-4 fs-md-5">Quiénes Somos</h1>
                        <p class="lead">Te ofrecemos un servicio de calidad y los mejores precios en artículos y alimentos para tu mascota, los esperamos.</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card card-span h-100">
                            <div class="card-body p-4">
                                <h4 class="mb-2">Mision</h4>
                                <p>La clínica veterinaria Pet Shop tiene como misión ofrecer bienestar a cada una de nuestras mascotas, que sus familias entiendan los deberes y los derechos que tienen las mascotas desde el instante que entran a formar parte de sus vidas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-span h-100">
                            <div class="card-body p-4">
                                <h4 class="mb-2">Visión</h4>
                                <p>La clínica veterinaria Pet Shop tiene como visión ser una empresa sólida, líder en prestación de servicios médicos veterinarios de la mejor calidad y profesionalismo, con énfasis en animales de compañía. </p>
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
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <section class="bg-200 text-center py-6">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
            <h2 class="fs-2 fs-sm-4 fs-md-5 mb-4">Opiniones</h2>
            <div class="swiper-container theme-slider" data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                    <p class="fs-sm-1 fs-md-1 fst-italic text-dark">La atención de primera, excelente veterinario y la amabilidad del personal para destacar. El lugar súper limpio y contando con todas las medidas de seguridad. A mí Negrita la bañaron con tanto cariño y tan bien, siempre voy a ir. Lo recomiendo.</p>
                    <p class="fs-0 text-600">- Patricia Buzonich</p><img class="w-auto mx-auto rounded-circle" src="https://lh3.ggpht.com/-dJJAmqVjWuY/AAAAAAAAAAI/AAAAAAAAAAA/El85tpxn7aU/s1600--mo/photo.jpg" alt="" height="60" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                    <p class="fs-sm-1 fs-md-1 fst-italic text-dark">Llevo desde hace 4 años a mis mascotas ahí. Jamás tuve 1 queja, sólo agradecimiento con los que atendieron a mis perros que en más de 1 ocasión cayeron enfermos pero superaron los cuadros con medicina indicada y atención personalizada.</p>
                    <p class="fs-0 text-600">- Jorge Andres Saldaña Franco</p><img class="w-auto mx-auto rounded-circle" src="https://scontent.flim1-2.fna.fbcdn.net/v/t1.6435-9/131361622_10221600282810702_1007178534164617319_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=IOb4qWX3osUAX8Ug1tK&_nc_oc=AQlFDZxfSr2jTFqcyczk7PmOOoAonxOEQ-7R3mLWaKsd5ZxSa-iM7l5DRxbwi5k-tGg&_nc_ht=scontent.flim1-2.fna&oh=00_AT8pye7c84HqsmD_tjDGK3UG8O2vyem0nGWvSBjpICGH4A&oe=63048DCE" alt="" height="60" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                    <p class="fs-sm-1 fs-md-1 fst-italic text-dark">Las veces que e llevado a mi felino a recibido muy buen trato y atención, además puedo decir que hay una gran variedad de productos para mascotas, comidas balanceadas importadas y lindas ropitas</p>
                    <p class="fs-0 text-600">- Raul Rolando Llontop Hernandez</p><img class="w-auto mx-auto rounded-circle" src="https://scontent.flim1-1.fna.fbcdn.net/v/t39.30808-6/238018489_10227591214115591_3458525425913076057_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=TQMW5JA5NwwAX_qWM2I&_nc_ht=scontent.flim1-1.fna&oh=00_AT8d8ulo5wgrcY0Aoe6pY3q7rE_6HBEY7XlonwL9JTREEw&oe=62E36CE4" alt="" height="60" />
                    </div>
                </div>
                </div>
                <div class="swiper-nav">
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"> </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </section>
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d582.6833853636848!2d-77.76361906479758!3d-10.74904804019068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91073732e9410ba3%3A0x8c248184f65bd9ad!2sVETERINARIA%20%F0%9F%90%BEPET-%20SHOP%20ENTRE%20PATAS%F0%9F%90%BE!5e0!3m2!1ses-419!2spe!4v1658768102494!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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
        <!-- <section> close ============================-->
        <!-- ============================================-->
    </main>


</body>

</html>