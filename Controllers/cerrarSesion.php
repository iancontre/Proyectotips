<?php
require_once("../Models/conexion_db.php");
require_once("../Models/consultaUser.php");



    $objconsultas = new ConsultaUser();
    $result = $objconsultas->cerrarSesion();
    
?>