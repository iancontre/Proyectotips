<?php
require_once("../Models/conexion_db.php");
require_once("../Models/consultaUser.php");



$presupuesto=$_POST['presupuesto']; 
$descripcion= $_POST['descripcion'];
$profesion=$_POST['profesion'];
$tipoEquip =$_POST['tipoEquip'];

$objconsultas = new ConsultaUser();

$resultado = $objconsultas->registrarForm($presupuesto,$descripcion,$profesion,$tipoEquip);

?>