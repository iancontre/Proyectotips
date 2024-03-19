<?php
require_once("../Models/conexion_db.php");
require_once("../Models/consultaUser.php");

session_start();

$documento = $_POST["documento"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];
$rutafoto = "../Uploads/" . $_FILES['foto']['name'];
$mover = move_uploaded_file($_FILES['foto']['tmp_name'], $rutafoto);
$id_rol = "3";




$contrasenaEncrip = md5($contrasena);

$objconsultas = new ConsultaUser();
$result = $objconsultas->editarPerfil($documento, $nombre, $telefono, $correo, $contrasenaEncrip, $rutafoto, $id_rol);


?>