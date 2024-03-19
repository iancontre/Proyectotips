<?php

function consultarAdmin()
{
    $objConsultas = new ConsultarAdmin();
    $result = $objConsultas->consultarAdmin();

    if (!isset($result)) {
        echo "<h2> NO HAY USUARIOS REGISTRADOS </h2>";
    } else {
        foreach ($result as $f) {
            // Utiliza la función obtenerNombreRol() para obtener el nombre del rol
            $nombre_rol = $objConsultas->obtenerNombreRol($f['id_rol']);
            
            echo '
                <tr>
                    <td> ' . $f['documento'] . ' </td>
                    <td> ' . $f['nombre'] . '</td>
                    <td> ' . $f['telefono'] . '</td>
                    <td> ' . $f['correo'] . '</td>

                    <td> ' . $nombre_rol . '</td> <!-- Mostrar el nombre del rol -->
                    <td><a href="../../Views/dashboard/editarAdmin.php?documento=' . $f['documento'] . '" class="btn btn-primary"><i class="bi bi-pencil"></i>Modificar</a></td>
                    <td><a href="../../Controllers/admin/eliminarAdmin.php?documento=' . $f['documento'] . '" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar </a></td>
                </tr>';
        }
    }
}

function cargarAdminEdit()
{


    $documento = $_GET['documento'];
    $objconsultas = new ConsultarAdmin();
    $result = $objconsultas->consultarAdminEdit($documento);
    if ($result !== false && !empty($result)) {



      
        
      
        foreach ($result as $f) {
           
            echo '
                <form action="../../Controllers/admin/modificarPerfilAdmin.php" method="POST"  enctype="multipart/form-data">
                <div class="row">
                <div class="form-group col-md-6" style="display: none";>
                    <label></label>
                    <input type="hidden" name="documento" value="' . $f['documento'] . '" >
                </div>
                <div class="form-group col-md-6">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="' . $f['nombre'] . '" class="form-control" placeholder="Ej:Julian ">
                </div>
                <div class="form-group col-md-6" >
                    <label>Teléfono:</label>
                    <input type="number" name="telefono" value="' . $f['telefono'] . '" class="form-control" placeholder="Ej:3192414745">
                </div>
                <div class="form-group col-md-6">
                    <label>Email:</label>
                    <input type="email" name="correo" value="' . $f['correo'] . '" class="form-control" placeholder="Ej:julian@gmail.com">
                </div>
                <div class="form-group col-md-6">
                    <label>Rol: (Seleccione una opción) </label>
                    
                   <select name="id_rol"  class="form-control">
                    <option value="1">Administrador</option>
                    <option value="2">Vendedor</option>
                   </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Contraseña:</label>
                    <input type="password" name="contrasena" value="' . $f['contrasena'] . '" class="form-control" placeholder="Ej:12345">
                </div>
                 <div class="form-group col-md-6">
                       <label>Inserta una foto:</label>
                      <input type="file" class="form-control" name="foto" value="'.$f['foto'].'">
                    </div>
                
            </div>
            <div style="text-align:center;">
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Modificar Usuario</button>
                </div>
            </form>
                ';
        }
    }
}



?>