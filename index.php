<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pet Shop</title>
    <?php
    session_start();
    include_once('includes/1_head.php');
    include_once('conexion/validar.php');
    if(isset( $_SESSION['usuario'])){
    header('location:inicio.php');}
    ?>
</head>
<body>
    <main class="main" id="top">
        <div class="container-fluid">
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape" src="images/login/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="images/login/shape-1.png" alt="" width="150">
                    <?php
                    if (isset($errMsg)) {
                        echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        ' . $errMsg . '</div>';
                    } ?>
                    <div class="card overflow-hidden z-index-1">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center bg">
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <p class="d-flex flex-center mb-4 text-primary" href="#"><img class="me-2" src="images/logo.png" alt="" width="58" /><span class="font-sans-serif fw-bolder fs-4 d-inline-block">Pet Shop</span></p>
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <h4>Sistema Logístico</h4>
                                            </div>
                                        </div>
                                        <form method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Usuario</label>
                                                <input class="form-control" name="usuario" required value="<?php if(isset($_COOKIE['usuario'])){ echo $_COOKIE['usuario'];} ?>"/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Contraseña</label>
                                                <div class="input-group">
                                                    <input class="form-control" name="contra" type="password" id="password" required value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass'];} ?>"/>
                                                    <div class="input-group-text bi bi-eye-slash-fill px-2" id="togglePassword1"></div>
                                                </div>
                                            </div>
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" id="card-checkbox" <?php if(isset($_COOKIE['pass'])){ echo "checked";} ?> name="recordar" />
                                                        <label class="form-check-label mb-0" for="card-checkbox">Recordarme</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name='login'>Ingresar</button>
                                            </div>
                                        </form>
                                        <!-- <div class="position-relative mt-4">
                        <hr class="bg-300" />
                        <div class="divider-content-center">or log in with</div>
                      </div>
                      <div class="row g-2 mt-2">
                        <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                        <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                      </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
    include_once("./includes/4_foot.php");
    ?>
</body>
</html>
<script>
    const togglePassword = document.querySelector("#togglePassword1");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {

        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('bi-eye-fill');
        this.classList.toggle('bi-eye-slash-fill');
    });
</script>