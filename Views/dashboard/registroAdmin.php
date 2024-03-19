<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");
require_once("../../Controllers/admin/mostrarFotoAdmin.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Tips-Scan | Registrar Usuarios</title>

  <!-- ================= Favicon ================== -->
  <!-- Standard -->
  <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">


  <!-- Styles -->
  <link href="css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="css/lib/themify-icons.css" rel="stylesheet">
  <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="css/lib/bootstrap.min.css" rel="stylesheet">

  <link href="css/lib/helper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  


</head>

<body>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a
                            href="index.php"><!-- <img src="images/logo.png" alt="" /> --><span>Tips-Scann</span></a>
                    </div>
                    <li class="label">Inicio</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i>Dashboard <span
                                class="badge badge-primary"></span> <span></span></a>
                    </li>
                    <li class="label"> Administrador</li>
                    <li><a class="sidebar-sub-toggle"> <i class="ti-user"></i>Administar Usuarios<span
                                class="sidebar-collapse-icon ti-angle-down"> </span></a>
                        <ul>
                            <li><a href="registroAdmin.php">Crear Usuarios</a></li>
                            <li><a href="verAdmin.php">Consultar Usuarios</a></li>
                        </ul>
                    </li>
                    <li><a href="table-export.html"><i class="ti-files"></i>Informes</a></li>

                    <li><a class="sidebar-sub-toggle"><i class="ti-shopping-cart"></i> Administrar Productos <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="ui-typography.html">Productos Disponibles</a></li>
                        </ul>            
            </div>
        </div>
    </div>
    <!-- /# sidebar -->
   <div class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="float-left">
            <div class="hamburger sidebar-toggle">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>
          </div>
          <div class="float-right">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
                mostrarFotoAdmin();
                ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="perfilAdmin.php"> <i class="ti-user"></i>  Perfil</a></li>
            <li ><a class="dropdown-item"
                                    href="../../Controllers/admin/cerrarSesionAdmin.php"> <i class="ti-power-off"></i>  Cerrar Sesión</a></li>
        
          </ul>
        </li>  
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hola,
                  <span>Bienvenido a Registrar Usuarios</span>
                </h1>
              </div>
            </div>
          </div>
          <!-- /# column -->

          <!-- /# column -->
        </div>
        <!-- /# row -->
      </div>
    </div>
  </div>

  <body>
    <div class="unix-login">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="login-content">
              <div class="login-form">
                <h4>Registrar Nuevo Usuario</h4>
                <form action="../../Controllers/admin/registrarAdmin.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Documento:</label>
                      <input type="number" name="documento" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nombre:</label>
                      <input type="text" name="nombre" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Teléfono:</label>
                      <input type="number" name="telefono" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Email:</label>
                      <input type="email" name="correo" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Rol: (Seleccione una opción)</label>
                      <select name="id_rol" id="" class="form-control">
                        <option value="2">Vendedor</option>
                        <option value="1">Administrador</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Contraseña:</label>
                      <input type="password" name="contrasena" class="form-control" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Confirmar Contraseña:</label>
                      <input type="password" name="ccontrasena" class="form-control" placeholder="">
                    </div>
                     <div class="form-group col-md-6">
                       <label>Inserta una foto:</label>
                      <input type="file" class="form-control" name="foto">
                    </div>
                    
                <br>
                  </div>
                  <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Registrar Usuario</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="footer">
          <p>2024 © Dashboard Empresa. - <a href="#">Tips-Scan.com</a></p>
        </div>
      </div>
    </div>




    <div id="search">
      <button type="button" class="close">×</button>
      <form>
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
    </div>
    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <script src="js/scripts.js"></script>


    <!--  flot-chart js -->
    <script src="js/lib/flot-chart/excanvas.min.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.time.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.stack.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="js/lib/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="js/lib/flot-chart/curvedLines.js"></script>
    <script src="js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="js/lib/flot-chart/flot-chart-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>

</html>