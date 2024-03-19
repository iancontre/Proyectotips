<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");


$documento = $_POST["documento"];
$nombre = $_POST["nombre"];
$telefono =  $_POST["telefono"];
$correo = $_POST["correo"];

$objconsultas = new ConsultarAdmin();
$result = $objconsultas->editarPerfilAdmin($documento, $nombre, $telefono, $correo);

?>