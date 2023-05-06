        <?php 
        $url = "";   
        $url.= $_SERVER['REQUEST_URI'];
        $c=basename($url, ".php");
        ?>
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="#">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="images/logo.png" alt="" width="45" /><span class="font-sans-serif fs-2">Pet Shop</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link <?php if(strtok($c, '.')=="inicio"){echo "active";} ?>" href="inicio.php" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Inicio</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#masc" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="mascota"||strtok($c, '_')=="tipo"||strtok($c, '_')=="raza"){echo "true";}else{ echo "false";} ?>" aria-controls="email">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-paw"></span></span><span class="nav-link-text ps-1">Mascota</span>
                    </div>
                  </a>
                 
                  <!--Mascota-->
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="mascota"||strtok($c, '_')=="tipo"||strtok($c, '_')=="raza"){echo "show";} ?>" id="masc"> 
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="mascota_add"){echo "active";} ?>" href="mascota_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Agregar</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="mascota_edit"||strtok($c, '.')=="mascota_listar"){echo "active";} ?>" href="mascota_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar/Modificar</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>

                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '_')=="tipo"){echo "active";} ?>" href="tipo_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Tipos</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>

                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '_')=="raza"){echo "active";} ?>" href="raza_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Razas</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    

                  </ul>
                  <!--Cita-->
                     <!-- parent pages--><a class="nav-link dropdown-indicator" href="#cita" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="cita"||strtok($c, '_')=="servicio"){echo "true";}else{ echo "false";} ?>" aria-controls="email">
                     <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comment-medical"></span></span><span class="nav-link-text ps-1">Cita</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="cita"||strtok($c, '_')=="servicio"){echo "show";} ?>" id="cita"> 
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="cita_add"){echo "active";} ?>" href="cita_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Agregar</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="cita_edit"||strtok($c, '.')=="cita_listar"){echo "active";} ?>" href="cita_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar/Modificar</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>

                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="servicio_listar"){echo "active";} ?>" href="servicio_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Servicio</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    

                  </ul>


                  <!-- Productos-->
                  <!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#productos" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="productos"){echo "true";}else{ echo "false";} ?>" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-basket"></span></span><span class="nav-link-text ps-1">Productos</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="productos"){echo "show";} ?>" id="productos">
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="productos_add"){echo "active";} ?>" href="productos_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Registrar</span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="productos_edit"||strtok($c, '.')=="productos_listar"){echo "active";} ?>" href="productos_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar / Modificar</span>
                        </div>
                      </a>
                    </li>
                  </ul>

                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#pedido" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="pedido"){echo "true";}else{ echo "false";} ?>" aria-controls="email">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-box-open"></span></span><span class="nav-link-text ps-1">Pedidos</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="pedido"){echo "show";} ?>" id="pedido"> 
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="pedido_add"){echo "active";} ?>" href="pedido_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Agregar</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="pedido_edit"||strtok($c, '.')=="pedido_listar"){echo "active";} ?>" href="pedido_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>

                  <!-- Categorias-->
                  <!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#categorias" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="categorias"){echo "true";}else{ echo "false";} ?>" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-th-list"></span></span><span class="nav-link-text ps-1">Categorías</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="categorias"){echo "show";} ?>" id="categorias">
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="categorias_add"){echo "active";} ?>" href="categorias_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Registrar</span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="categorias_edit"||strtok($c, '.')=="categorias_listar"){echo "active";} ?>" href="categorias_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar / Modificar</span>
                        </div>
                      </a>
                    </li>
                  </ul>

                  <!-- Clientes-->
                  <!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#clientes" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="clientes"){echo "true";}else{ echo "false";} ?>" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Clientes</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="clientes"){echo "show";} ?>" id="clientes">
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="clientes_add"){echo "active";} ?>" href="clientes_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Registrar</span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="clientes_edit"||strtok($c, '.')=="clientes_listar"){echo "active";} ?>" href="clientes_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar / Modificar</span>
                        </div>
                      </a>
                    </li>
                  </ul>

                  <!-- Proveedores-->
                  <!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#proveedores" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="proveedores"){echo "true";}else{ echo "false";} ?>" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-building"></span></span><span class="nav-link-text ps-1">Proveedores</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="proveedores"){echo "show";} ?>" id="proveedores">
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="proveedores_add"){echo "active";} ?>" href="proveedores_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Registrar</span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="proveedores_edit"||strtok($c, '.')=="proveedores_listar"){echo "active";} ?>" href="proveedores_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar / Modificar</span>
                        </div>
                      </a>
                    </li>
                  </ul>

                  <!-- Veterinarios-->
                  <!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#veterinarios" role="button" data-bs-toggle="collapse" aria-expanded="<?php if(strtok($c, '_')=="veterinarios"){echo "true";}else{ echo "false";} ?>" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-stethoscope"></span></span><span class="nav-link-text ps-1">Veterinarios</span>
                    </div>
                  </a>
                  <ul class="nav collapse false <?php if(strtok($c, '_')=="veterinarios"){echo "show";} ?>" id="veterinarios">
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="veterinarios_add"){echo "active";} ?>" href="veterinarios_add.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Registrar</span>
                        </div>
                      </a>
                    </li>
                    <li class="nav-item"><a class="nav-link <?php if(strtok($c, '.')=="veterinarios_edit"||strtok($c, '.')=="veterinarios_listar"){echo "active";} ?>" href="veterinarios_listar.php" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Listar / Modificar</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>