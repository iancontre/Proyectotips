<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultaProducto.php");

$cod_pro = $_GET['cod_pro'];
$objConsultas = new consultaProducto($cod_pro);
$result = $objConsultas->eliminarProductos($cod_pro);


?>