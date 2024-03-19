<?php
 session_start();
function mostrarFoto() {
   
    $objconsultas = new ConsultaUser();
    
    $result = $objconsultas->verFoto();

    if ($result !== false && !empty($result)){
        $rutafoto = $result['foto']; // Obtén la ruta de la foto del resultado de la consulta
        echo '
         
                        <img src="../../Uploads/' . $rutafoto . '" class="avatar img-circle" alt="avatar"
                            style="width: 40px;border-radius:100px;"> <a id="item1">' . $result['nombre'] . '</a>
                    </li>
                
        
        ';
    }
}

?>