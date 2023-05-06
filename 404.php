<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    include_once('includes/1_head.php');
    ?>
    <title>Error 404 | Pet Shop</title>
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
        <div class="row flex-center min-vh-100 py-6 text-center">
          <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5"><p class="d-flex flex-center mb-4 text-primary"><img class="me-2" src="images/logo.png" alt="" width="58" /><span class="font-sans-serif fw-bolder fs-5 d-inline-block">Pet Shop</span></p>
            <div class="card">
              <div class="card-body p-4 p-sm-5">
                <div class="fw-black lh-1 text-300 fs-error">404</div>
                <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">No existe la página que estas buscando.</p>
                <hr />
                <p>Asegúrate de que la dirección sea correcta y que la página no se haya movido. Si crees que esto es un error, <a href="mailto:petshopentrepatas@gmail.com">contáctanos</a>.</p><a class="btn btn-primary btn-sm mt-3" href="#" onclick="history.back()"><span class="fas fa-angle-left me-2 mt-1"></span>Regresar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
  <?php include_once("./includes/4_foot.php"); ?>
</html>