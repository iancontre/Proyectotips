<?php
 session_start();
function mostrarFotoAdmin() {
   
    $objconsultas = new ConsultarAdmin();
    
    $result = $objconsultas->verFotoAdmin();

    if ($result !== false && !empty($result)){
        $rutafoto = $result['foto']; // Obtén la ruta de la foto del resultado de la consulta
        echo '
         
                 <img  src="' . $rutafoto . '"class="avatar img-circle" alt="avatar"
                            style="width: 40px;border-radius:100px;"> <span class="user-avatar" style="color:black;">   ' . $result['nombre'] . '
                  <i class="ti-angle-down f-s-10"></i>
                </span>
        
                          
                        
                
        
        ';
    }
}

?>