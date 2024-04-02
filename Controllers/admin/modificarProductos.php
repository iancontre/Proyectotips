<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultaProducto.php");
$codigo = $_POST['codigo'];
$garantia =$_POST['garantia'];
$referencia =$_POST['referencia'];
$marca =$_POST['marca'];
$precio =$_POST['precio'];
$codigoEquipo =$_POST['codigoEquipo'];
$descripcion =$_POST['descripcion'];
$rutaFoto="../../Uploads/".$_FILES['foto']['name'];
$mover= move_uploaded_file($_FILES['foto']['tmp_name'], $rutaFoto);

$objConsultas = new consultaProducto();
$resultado = $objConsultas->modificarProducto($codigo, $garantia, $referencia, $marca, $precio, $codigoEquipo, $descripcion, $rutaFoto);




?>