<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");
require_once("../../Controllers/admin/mostrarFotoAdmin.php");
require_once("../../Controllers/admin/mostrarPerfilAdmin.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Tips-Scan | Consultar Usuarios</title>

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
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
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
         <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-title">
                  <h1>Información de Usuario</h1>
                  
                </div>
                <div class="card-body">
                  <?php
              mostrarPerfilAdmin();
                  ?>

                </div>
              </div>
            </div>
          </div>
         </section>
        </div>
      </div>
    </div>
  </div>


  

               



                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                           <!-- <p>2024 © Dashboard Empresa. - <a href="#">Tips-Scan.com</a></p-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="js/lib/bootstrap.min.js">
    </script>
    <!-- bootstrap -->
    <!--  Chart js -->
    <!--  Chart js -->
    <script src="js/lib/chart-js/Chart.bundle.js"></script>
    <script src="js/lib/chart-js/chartjs-init.js"></script>
    <!-- // Chart js -->
    <!-- // Chart js -->
    <script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!--CREACIÓN GRÁFICA DE BARRRAS -->

    </body>

</body>

</html>