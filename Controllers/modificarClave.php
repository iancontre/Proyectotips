<?php

require_once('../Models/conexion_db.php');
require_once('../Models/consultaUser.php');

$documento = $_POST["documento"];
$contrasena = $_POST["contrasena"];

$contrasenaEncrip= md5($contrasena);

$objconsultas = new ConsultaUser();

$result= $objconsultas -> modificarclave($documento,$contrasenaEncrip);



?>