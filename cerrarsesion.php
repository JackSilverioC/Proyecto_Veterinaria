<?php 
session_start();
session_destroy();
// header('location:index.php');
include_once('includes/1_head.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesión | Pet Shop</title>
</head>
<body>
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <div class="row flex-center min-vh-100 py-6">
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><p class="d-flex flex-center mb-4 text-primary"><img class="me-2" src="images/logo.png" alt="" width="58" /><span class="font-sans-serif fw-bolder fs-5 d-inline-block">Pet Shop</span></p>
            <div class="card">
              <div class="card-body p-4 p-sm-5">
                <div class="text-center"><img class="d-block mx-auto mb-4" src="images/login/45.png" alt="shield" width="100" />
                  <h4>¡Nos vemos pronto!</h4>
                  <p>Gracias por usar el Sistema. <br />Usted ha cerrado sesión con éxito.</p><a class="btn btn-primary btn-sm mt-3" href="principal.php"><span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>Volver a Principal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

<?php include_once("./includes/4_foot.php"); ?>
  </body>
</html>