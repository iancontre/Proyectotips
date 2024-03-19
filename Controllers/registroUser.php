<?php

require_once("../Models/conexion_db.php");
require_once("../Models/consultaUser.php");

$documento = $_POST["documento"];
$nombre = $_POST["nombre"];
$telefono =  $_POST["telefono"];
$correo= $_POST["correo"];
$contrasena = $_POST["contrasena"];
$id_rol= "3";

$contrasenaEncrip = md5($contrasena);

$objconsultas = new ConsultaUser();
$result = $objconsultas -> registrarUser($documento, $nombre,$telefono,$correo,$contrasenaEncrip, $id_rol);









?>