
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
    <title>Tips-Scan | Dashboard</title>
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
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="link rel=" preconnect href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <li>
        <a href="chart-flot.html">Flot</a>
    </li>
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
                                <h1>Hola, <span>Bienvenido al Dashboard</span></h1>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
                <section id="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class=" card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="ti-bar-chart-alt color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Ventas por formulario</div>
                                            <div class="stat-digit">300</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-file color-primary border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Informes</div>
                                            <div class="stat-digit">10</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-shopping-cart color-red border-red"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Productos Disponibles</div>
                                            <div class="stat-digit">910</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- GRÁFCIAS -->
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-title">
                                        <div class="stat-icon dib"><i
                                                class="ti-bar-chart-alt color-success border-success"></i>
                                            <h4>Gráfica Ventas por Formulario</h4>
                                        </div>
                                        <div class="sales-chart">
                                            <br>
                                            <br>
                                            <br>
                                            <canvas id="sales-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-title">
                                        <div class="stat-icon dib"><i class="ti-file color-primary border-primary"></i>
                                            <h4>Gráfica Informes</h4>
                                        </div>
                                        <div class="line-chart">
                                            <br>
                                            <br>
                                            <br>
                                            <canvas id="line-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-title">
                                        <div class="stat-icon dib"><i class="ti-shopping-cart color-red border-red"></i>
                                            <h4>Gráfica Productos</h4>
                                        </div>
                                        <div class="pie-chart">
                                            <canvas id="pie-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2024 © Dashboard Empresa. - <a href="#">Tips-Scan.com</a></p>
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
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--CREACIÓN GRÁFICA DE BARRRAS -->

    <script>
        var datos = [50, 60, 70];
        var ctx = document.getElementById('sales-chart').getContext('2d');

        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Celulares', 'Computadores', 'Tabletas'],
                datasets: [{
                    label: 'Ventas mensuales',
                    backgroundColor: 'lightsalmon',
                    borderColor: 'black',
                    borderWidth: 1,
                    data: datos // Los datos para las barras
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var pieCtx = document.getElementById('pie-chart').getContext('2d');

        //CREACIÓN GRÁFICA LÍNEAL

        var lineCtx = document.getElementById('line-chart').getContext('2d');


        var lineData = {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            datasets: [{
                label: 'Ventas',
                data: [50, 60, 70, 80, 90],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
            }]
        };

        // Crear la gráfica de línea
        var lineChart = new Chart(lineCtx, {
            type: 'line',
            data: lineData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        //CREACIÓN GRÁFICA DE TORTA

        var pieData = {
            labels: ['Computadores', 'Tabletas', 'Portatiles', 'Celulares'],
            datasets: [{
                data: [10, 20, 30, 25],
                backgroundColor: ['#75BDE0', '#F8D49B', '#F8BC9B', '#F89B9B']
            }]
        };

        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: pieData
        });

    </script>
</body>
</html>