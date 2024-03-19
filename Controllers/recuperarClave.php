<?php
require_once("../Models/conexion_db.php");
require_once("../Models/generarClaveEmail.php");

$identificacion = $_POST['identificacion']; 
$correo = $_POST['correo'];

$objClave = new GenerarClave();
$result = $objClave->enviarNuevaClave($identificacion, $correo);
?>