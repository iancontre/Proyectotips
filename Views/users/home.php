<?php
   require_once('../../Models/conexion_db.php');
   require_once('../../Models/consultaUser.php');
  require_once('../../Controllers/mostrarFoto.php');
?>

<!DOCTYPE html>


<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TipsScan | Sistema de Consejería Tecnológica</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Bingo HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="../plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../plugins/bootstrap/bootstrap.min.css">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="../plugins/lightbox2/css/lightbox.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="../plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../plugins/slick/slick.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">

</head>

<body id="body">
<header class="navigation fixed-top">
    <div class="container">
      <!-- main nav -->
      <nav class="navbar navbar-expand-lg navbar-light px-0">
        <!-- logo -->
        <a class="navbar-brand logo" href="home.php">
          <h1 style="font-size: 25px;">TipsScann</h1>
         
        </a>
        <!-- /logo -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            
            <li class="nav-item ">
              <a class="nav-link" href="#home" style="font-weight: bold;" >Consejería</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#about" style="font-weight: bold;">Historial</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#service" style="font-weight: bold;">Ayuda</a>
            </li>
            
          
            <li class="nav-item dropdown" id="item1" style="margin-left: 20px;">
                        <ul class="dropdown-menu" style="background-color: #f8d49b; border-radius: 14px;">
                            <li style="background-color: #f8d49b;"><a class="dropdown-item" href="profile.php"
                                    style="text-align: center; color: rgba(0, 0, 0, 0.767);">Editar Perfil</a></li>
                            <li style="background-color: #f8d49b;"><a class="dropdown-item"
                                    href="../../Controllers/cerrarSesion.php"
                                    style="text-align: center; color: rgba(0, 0, 0, 0.767);">Cerrar Sesión</a></li>
                        </ul>
           
                        <?php
                      mostrarFoto();

                              ?>
       </li>
  
      
        
          
            
          </ul>	
        </div>
      </nav>
      <!-- /main nav -->
    </div>
  </header>

                       
             
  
  
  
<style>

</style>

<script src="Views/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap4 -->
<!-- Parallax -->
<script src="Views/plugins/parallax/jquery.parallax-1.1.3.js"></script>
<!-- lightbox -->
<script src="Views/plugins/lightbox2/js/lightbox.min.js"></script>
<!-- Owl Carousel -->
<script src="Views/plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="Views/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Smooth Scroll js -->
<script src="Views/plugins/smooth-scroll/smooth-scroll.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
<script src="Views/plugins/google-map/gmap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- Custom js -->
<!-- Custom js -->
<script src="Views/js/script.js"></script>

</body>	

</html>
