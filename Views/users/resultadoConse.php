<?php
require_once("../../Models/conexion_db.php");
require_once("../../Models/consultaUser.php");
require_once("../../Controllers/mostrarConsejo.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Consejos de Compra</title>
</head>
<body>
    <h1>Resultado de Consejos de Compra</h1>
    <?php mostrarConsejos(); ?>
</body>
</html>


