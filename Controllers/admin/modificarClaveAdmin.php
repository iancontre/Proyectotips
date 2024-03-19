<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");

$documento = $_POST["documento"];
$contrasena = $_POST["contrasena"];


$contrasenaEncrip = md5($contrasena);

$objconsultas = new ConsultarAdmin();

$result = $objconsultas->editcontrasena($documento, $contrasenaEncrip);

?>