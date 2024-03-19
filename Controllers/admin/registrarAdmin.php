<?php

require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");


$documento = $_POST["documento"];
$nombre = $_POST["nombre"];
$telefono =  $_POST["telefono"];
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];
$rutafoto = "../../Uploads/" . $_FILES['foto']['name'];
$mover = move_uploaded_file($_FILES['foto']['tmp_name'], $rutafoto);
$id_rol = $_POST ["id_rol"];

$contrasenaEncrip = md5($contrasena);

$objconsultas = new ConsultarAdmin();
$result = $objconsultas->registrarAdmin($documento, $nombre, $telefono, $correo, $contrasenaEncrip,$rutafoto, $id_rol);

?>