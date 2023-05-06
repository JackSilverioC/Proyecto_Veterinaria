<?php
require_once './conexion/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once("sesion.php"); ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajustes | Pet Shop</title>
  <?php
  include_once('includes/1_head.php');
  include_once('sesion.php');
  $filename = 'images/admin/' . $_SESSION['usuario'] . '.png';
  ?>
</head>

<body>
  <main class="main" id="top">
    <div class="container" data-layout="container">
      <?php
      include_once('includes/2_header.php'); //nav
      ?>
      <?php
      ?>
      <div class="content">
        <?php
        include_once './includes/nav.php';
        ?>

        <!--edit pass-->
        <?php
        $id = $_SESSION['id'];

        $sql_edit = "select * from usuarios where id='$id'";
        $result_edit = mysqli_query($conex, $sql_edit);

        if (mysqli_num_rows($result_edit) == 0)
          header("Location: ajustes.php");
        else
          $row_edit = mysqli_fetch_assoc($result_edit);
        ?>

        <?php
        if (isset($_POST['add2'])) {


          $pass = $_SESSION['contra'];

          $passa = $_POST['passa'];
          $pass1 = $_POST['pass1'];
          $pass2 = $_POST['pass2'];

          if ($pass != MD5($passa)) {
            echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             Contraseña no coincide a la anterior </div>';
          } else if ($pass1 != $pass2) {
            echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             La contraseña nueva no coincide </div>';
          } else {
            $sql = "update usuarios set contra=? where id=?";

            $statement = $conex->prepare($sql);

            $x = MD5($pass1);

            $statement->bind_param('si', $x, $id);

            $statement->execute();

            $conex->close();

            if ($statement){

              echo ' <div class="alert alert-success alert-dismissible fade show mt-0 mb-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             Datos Registrados </div>';

             $_SESSION['contra'] = $x;
     
            }else{
              echo ' <div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             Error </div>';
            }
          }
        }
        ?>

        <!--edit datos-->
        <?php
        $id = $_SESSION['id'];

        $sql_edit2 = "select * from usuarios where id='$id'";
        $result_edit2 = mysqli_query($conex, $sql_edit2);

        if (mysqli_num_rows($result_edit2) == 0)
          header("Location: ajustes.php");
        else
          $row_edit2 = mysqli_fetch_assoc($result_edit2);

        if (isset($_POST['add'])) {

          

          $nombre = $_POST['nombre'];
          $usuario = $_POST['usuario'];
          $correo = $_POST['correo'];

          $sql2 = "update usuarios set nombre=?, usuario=?, correo=? where id=?";

          $statement2 = $conex->prepare($sql2);

          $statement2->bind_param('sssi', $nombre, $usuario,  $correo, $id);

          $statement2->execute();

          $conex->close();

          if ($statement2) {
            $filePath = "images/admin/" . $_SESSION['usuario'] . ".png";
            $newFileName = "images/admin/" . $usuario . ".png";
            rename($filePath, $newFileName);
            
            echo ' <div class="alert alert-success alert-dismissible fade show mt-0 mb-2">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           Datos Registrados </div>';

            

           $_SESSION['nombre'] = $nombre;
           $_SESSION['usuario'] = $usuario;
           $_SESSION['correo'] = $correo;

          } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-0 mb-2">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 Error, no se puedo editar los datos </div>';
          }
        }

       
        ?>




        <div class="row">
          <div class="col-12">
            <div class="card mb-3 btn-reveal-trigger">
              <div class="card-header position-relative" style="min-height: 16.5vh !important; margin-bottom: 6rem!important;">
                <div class="cover-image">
                  <div class="bg-holder rounded-3 rounded-bottom-0" id="portada">
                  </div>
                </div>
                <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle" style="height: 9rem;width: 9rem;">
                  <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> <img id="i" src="images/admin/<?php if (file_exists($filename)) {
                                                                                                                              echo $_SESSION['usuario'];
                                                                                                                            } else {
                                                                                                                              echo "no-pic";
                                                                                                                            } ?>.png" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                    <form id="fotoperfil" enctype="multipart/form-data" method="post">
                      <input class="d-none" id="profile-image" name="pic" type="file" accept="image/*" />
                    </form>
                    <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Actualizar</span></span></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0">
          <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="mb-0 mt-1">Ajustes de Usuario</h5>
              </div>
              <div class="card-body bg-light">
                <form form method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label class="form-label" for="first-name">Nombres</label>
                    <input class="form-control" id="first-name" type="text" value="<?php echo $_SESSION['nombre']; ?>" name="nombre" required />
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input class="form-control" type="text" value="<?php echo $_SESSION['usuario']; ?>" name="usuario" required />
                  </div>


                  <div class="mb-3">
                    <label class="form-label" for="email1">Email</label>
                    <input class="form-control" id="email1" type="email" value="<?php echo $_SESSION['correo']; ?>" name="correo" required />
                  </div>


                  <button class="btn btn-primary d-block w-100" type="submit" name="add">Actualizar Datos</button>

                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">

              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0 mt-1">Cambiar Contraseña</h5>
                </div>
                <div class="card-body bg-light">
                  <form form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label" for="old-password">Antigua Contraseña</label>
                      <input class="form-control" id="old-password" type="password" name="passa" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="new-password">Nueva Contraseña</label>
                      <input class="form-control" id="new-password" type="password" name="pass1" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="confirm-password">Confirmar Contraseña</label>
                      <input class="form-control" id="confirm-password" type="password" name="pass2" />
                    </div>
                    <button class="btn btn-primary d-block w-100" type="submit" name="add2">Actualizar Contraseña</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        include_once("./includes/3_footer.php");
        include_once("./includes/4_foot.php");
        ?>
      </div>
    </div>
  </main>
</body>

</html>
<script>
  var rgb = getAverageRGB(document.getElementById('i'));
  document.getElementById('portada').style.backgroundColor = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';

  function getAverageRGB(imgEl) {
    var blockSize = 5, // only visit every 5 pixels
      defaultRGB = {
        r: 0,
        g: 0,
        b: 0
      }, // for non-supporting envs
      canvas = document.createElement('canvas'),
      context = canvas.getContext && canvas.getContext('2d'),
      data, width, height,
      i = -4,
      length,
      rgb = {
        r: 0,
        g: 0,
        b: 0
      },
      count = 0;

    if (!context) {
      return defaultRGB;
    }

    height = canvas.height = imgEl.naturalHeight || imgEl.offsetHeight || imgEl.height;
    width = canvas.width = imgEl.naturalWidth || imgEl.offsetWidth || imgEl.width;

    context.drawImage(imgEl, 0, 0);

    try {
      data = context.getImageData(0, 0, width, height);
    } catch (e) {
      /* security error, img on diff domain */
      alert('x');
      return defaultRGB;
    }

    length = data.data.length;

    while ((i += blockSize * 4) < length) {
      ++count;
      rgb.r += data.data[i];
      rgb.g += data.data[i + 1];
      rgb.b += data.data[i + 2];
    }

    // ~~ used to floor values
    rgb.r = ~~(rgb.r / count);
    rgb.g = ~~(rgb.g / count);
    rgb.b = ~~(rgb.b / count);

    return rgb;

  }

  document.getElementById('profile-image').onchange = function() {
    document.getElementById('fotoperfil').submit();
  }
</script>
<?php
if (isset($_FILES["pic"]["name"])) {
  $pic = $_FILES['pic'];
  move_uploaded_file($pic['tmp_name'], "images/admin/" . $_SESSION['usuario'] . ".png");
}

?>