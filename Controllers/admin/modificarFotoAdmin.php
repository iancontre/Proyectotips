<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultarAdmin.php");

$documento = $_POST['documento'];
$rutafoto = "../../Uploads/" . $_FILES['foto']['name'];
$mover = move_uploaded_file($_FILES['foto']['tmp_name'], $rutafoto);

$objconsultas = new ConsultarAdmin();
$result = $objconsultas->editarFoto($documento, $rutafoto);




?>