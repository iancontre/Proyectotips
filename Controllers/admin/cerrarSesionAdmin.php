<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");




    $objconsultas = new consultarAdmin();
    $result = $objconsultas->cerrarSesionAdmin();
    
?>