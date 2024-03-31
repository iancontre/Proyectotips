<?php
require_once("../Models/conexion_db.php");
require_once("../Models/consultaUser.php");

$documento=$_POST['documento'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$correo= $_POST['correo'];

$objconsultas = new ConsultaUser();
$resultado = $objconsultas->actulizardatosPerfil($documento,$nombre,$telefono,$correo);


?>