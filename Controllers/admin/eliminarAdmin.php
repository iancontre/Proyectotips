<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");


$documento = $_GET['documento'];
    $objconsultas = new consultarAdmin();
    $result = $objconsultas->eliminarAdmin($documento);

?>