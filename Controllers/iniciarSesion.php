<?php

require_once("../Models/conexion_db.php");
require_once("../Models/consultaUser.php");

$correo = $_POST ['correo'];
$contrasena = md5($_POST ['contrasena']);

$objconsultas = new ConsultaUser();
$resultado = $objconsultas->validarSesion($correo,$contrasena);

?>
