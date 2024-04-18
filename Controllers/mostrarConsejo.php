<?php

public function mostarProductosRecomendados(){
    $objconsultas = new ConsultaUser();
    $result = $objconsultas-> obtenerConsejo($presupuesto,$tipoEquip, $descripción, $precio,$foto );
    if (isset($result) && !empty($result)) {
        foreach ($result as $f) {
            echo '
            <div class="producto">
                <p>Descripción: ' . $f['descripcion'] . '</p>
                <p>Precio: ' . $f['precio'] . '</p>
                <p>Tipo de equipo: ' . $f['cod_equip'] . '</p>
                <p>Presupuesto: ' . $f['presupuesto'] . '</p>
                <img src="' . $f['foto'] . '" alt="Foto del producto">
            </div>';
        }
    } else {
        echo 'No se encontraron productos que coincidan con los criterios de búsqueda.';
    }
}


?>