<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");
require_once("../../Models/consultaProducto.php");
require_once("../../Controllers/admin/mostrarAdmin.php");
require_once("../../Controllers/admin/mostrarFotoAdmin.php");
require_once("../../Controllers/admin/mostrarProductos.php");

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
    <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../dashboard/css/lib/helper.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../dashboard/css/style.css" rel="stylesheet">
    
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

    
                <!-- /# row -->

                <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                
                <!-- /# row -->
                <section  id="main-content">
                    <div class="row "  >
                                    <div class="col-lg-12 ">
                                        <div class="card contenedorimagen">                                                                                               
                                        <div class="card-title">
                                        <h2 class="textproductos" Styles=" font-weight: 800px ;">PRODUCTOS</h2>
                                                         
                                         </div>
                                         <div class="card-body">
                                            <div class="basic-elements">
                                                <div class="table-responsive">
                                                    
                                                    <table class="table table-bordered table-hover">
                                                    <button  type="button" href="hola" class="botonAgregar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" ><i class="bi bi-bag-plus-fill"></i>AGREGAR</button>
    
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content"> 
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Productos</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="../../Controllers/admin/agregarProductos.php" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    
                                              
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="garantia" class="form-control inputRegistro" id="garantia" placeholder="Garantía"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="referencia" class="form-control inputRegistro"  id="referencia"  placeholder="Referencia"/> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="marca" class="form-control inputRegistro" id="marca" placeholder="Marca"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text"  name="precio" class="form-control inputRegistro"  id="precio"  placeholder="Precio"/> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                
                                                <select class="form-select"  name="codigoEquipo" id="codigoEquipot">
                                                    <option selected>Tipo Equipo</option>
                                                    <option value="1034">Celular</option>
                                                    <option value="1035">Computador</option>
                                                    <option value="1036">Portatil</option>
                                                    <option value="1037">Tableta</option>
                                                    <option value="1038">Televisor</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                    <input type="file" accept=".sgv, .png, .jpg, .gif, .jpeg"  name="foto" class="form-control inputRegistro" id="Foto" placeholder="Agregue Foto"/>
                                                
                                                </div>
                                            
                                                <textarea type="text"  name="descripcion" class="form-control inputRegistro" id="descripcion" placeholder="Descripción" cols="10" rows="4"></textarea>
                                                
                                                <div style="text-align: center;">
                                                <br>
                                                <button  id="agrega" type="submit" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </form>
                                            </div>



                                            
                                                                                                                         
                                                        </div>
                                                    </div>
                                                    </div>
                                                     <div class="tabla bg bg-warning">
                                                     <thead style="color:#e7e7e7;">
                                                            <tr style="background: #e7e7e7">
                                                                <th style="color: #000">Codigo</th>
                                                                <th style="color: #000">Garantia</th>
                                                                <th style="color: #000">Referencia</th>
                                                                <th style="color: #000">Marca</th>
                                                                <th style="color: #000">Descripcion</th>
                                                                <th style="color: #000">Precio</th>
                                                                <th style="color: #000">Codigo equipo</th>
                                                                <th style="color: #000">Foto</th>                                                              
                                                                <th style="color: #000">Modificar</th>
                                                                <th style="color: #000">Eliminar</th>
                                                              
            
                                                </tr >
            
            
            
            
        
            
                                                        </thead>
                                                        <tbody>   

                                                            <?php
                                                            //Traer la funcion del controlador
                                                            cargarProductos();


                                                            ?>                                                             
                                                        
        
                                                        </tbody>


                                                     </div>
    
                                                     
                                                    </table>
                                                </div>
                                            </div>
                                        </div>




                                                    
                                                                                                                                                                                                                                                                                                             
                                                                                                    
                                                                                                      
                                                                                                                                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>

                   
                </section>
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

</body>

</body>

</html>