<?php


function mostrarConsejos() {
    
    $presupuesto = $_POST['presupuesto']; 
    $descripcion = $_POST['descripcion'];
    $tipoEquip = $_POST['tipoEquip'];
    $objconsultas = new ConsultaUser();
    $result = $objconsultas->obtenerConsejos($presupuesto, $descripcion, $tipoEquip);
    if (!empty($result)) {
        foreach ($result as $f) {
            echo '<div>';
            echo '<h2>' . $f['referencia'] . '</h2>';
            echo '<p>' . $f['descripcion_producto'] . '</p>';
            echo '<p>Precio: ' . $f['precio'] . '</p>';
            echo '<img src="' . $f['foto_producto'] . '" alt="Foto del Producto">';
            echo '<a href="' . $f['pagina_web_producto'] . '">Ver Producto</a>';
            echo '</div>';
        }
    } else {
        echo '<p>No se encontraron consejos de compra.</p>';
    }
}


?>
