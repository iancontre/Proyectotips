<?php
require_once('../Models/conexion_db.php');
require_once('../Models/consultaUser.php');


$documento = $_POST['documento'];
$rutaFoto ="../Uploads/" . $_FILES['foto'] ['name'];
$mover = move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);


$objconsultas = new ConsultaUser();

$result = $objconsultas -> modificarFoto($documento, $rutaFoto);






?>