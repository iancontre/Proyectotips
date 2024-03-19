<?php

class ConsultarAdmin{

    //Sólo irán las consultas del Administrador, de lo contrarío deberá ubicarse en (consultaUser.php)

    public function registrarAdmin($documento, $nombre,$telefono,$correo,$contrasenaEncrip,$rutafoto, $id_rol){
        $objconexion = new Conexion();
        $conexion = $objconexion -> get_conexion();

        $insertarUser = "INSERT INTO usuario (documento, nombre, telefono,correo,contrasena,foto,id_rol) 
        VALUES(:documento,:nombre,:telefono,:correo,:contrasenaEncrip,:rutafoto,:id_rol)";

        $result= $conexion-> prepare($insertarUser);
        $result->bindParam(":documento", $documento);
        $result->bindParam(":nombre",$nombre);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":correo",$correo);
        $result->bindParam(":contrasenaEncrip",$contrasenaEncrip);
        $result->bindParam(':rutafoto', $rutafoto);
        $result->bindParam(":id_rol",$id_rol);

        if ($result->execute()) {
        echo '<script>alert("¡Felicidades! Registro Exitoso");</script>';
        echo '<script>location.href="../../Views/dashboard/registroAdmin.php"</script>';
    } else {
        echo '<script>alert("¡Lo lamentamos! hay un Error al editar el perfil, vuelve a intentarlo");</script>';
    }

    
        

    }
    public function consultarAdmin()
    {
        $f = null;
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $consultar = "SELECT u.*, r.nom_rol AS nombre_rol 
              FROM usuario u 
              INNER JOIN roles r ON u.id_rol = r.id_rol
              ORDER BY u.documento";
        $result = $conexion->prepare($consultar);

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

         public function editAdmin($documento, $nombre, $telefono, $correo, $contrasenaEncrip,$rutafoto, $id_rol)
        {
            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();

            $modificar = "UPDATE usuario SET nombre=:nombre, telefono=:telefono,correo=:correo, contrasena=:contrasenaEncrip, foto=:rutafoto, id_rol=:id_rol WHERE  documento=:documento";

            $result = $conexion->prepare($modificar);

            $result->bindParam(":documento", $documento);
            $result->bindParam(":nombre",$nombre);
            $result->bindParam(":telefono",$telefono);
            $result->bindParam(":correo",$correo);
            $result->bindParam(":contrasenaEncrip",$contrasenaEncrip);
            $result->bindParam(':rutafoto', $rutafoto);
            $result->bindParam(":id_rol",$id_rol);
            $result->execute(); 


            echo '<script>alert("¡Felicidades! Usuario modificado Correctamente");</script>';
        echo '<script>location.href="../../Views/dashboard/verAdmin.php"</script>';
        }

         public function consultarAdminEdit($documento)
    {
        $f = null;
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $mostrar = "SELECT * FROM usuario WHERE documento=:documento";

        $result = $conexion->prepare($mostrar);

        $result->bindParam(":documento", $documento);
        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }

    public function eliminarAdmin($documento)
    {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $eliminar = "DELETE FROM usuario WHERE documento=:documento";
        $result = $conexion->prepare($eliminar);
        $result->bindParam(':documento', $documento);

        $result->execute();
       echo '<script>alert("Usuario Eliminado Correctamente");</script>';
        echo '<script>location.href="../../Views/dashboard/verAdmin.php"</script>';
    }
     public function verFotoAdmin() { 
    $f = null;
    $objConexion = new Conexion();
    $conexion = $objConexion->get_conexion();

    $consultarFotoYNombre = "SELECT foto, nombre FROM usuario WHERE documento=:documento";
    $result = $conexion->prepare($consultarFotoYNombre);
    $result->bindParam(':documento', $_SESSION['documento']);
    
    $result->execute();

    $f = $result->fetch(); 

    return $f;
}
    public function validarSesion($correo,$contrasena) {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
    
        $consultarUser = "SELECT * FROM usuario WHERE correo=:correo";
        $resultado = $conexion->prepare($consultarUser);
        $resultado->bindParam(':correo', $correo);
        $resultado->execute();
    
        if ($f = $resultado->fetch()) {
            // Verificar la contraseña
            if ($contrasena == $f['contrasena']) {
                
                session_start();
                $_SESSION['documento'] = $f['documento'];
                $_SESSION['id_rol'] = $f['id_rol'];
                $_SESSION['correo'] = $f['correo'];
                $_SESSION['autenticado'] = "SI";
    
                // Manejar el rol del usuario
                switch ($f['id_rol']) {
                    case '1':
                        echo '<script>alert("Bienvenido Administrador");</script>';
                        echo '<script>location.href="../Views/dashboard/index.php"</script>';
                        break;
                    case '2':
                        echo '<script>alert("Bienvenido Vendedor");</script>';
                        echo '<script>location.href="../Views/vendedor/home.php"</script>';
                        break;
                    case '3':
                        echo '<script>alert("Bienvenido Usuario");</script>';
                        echo '<script>location.href="../Views/users/home.php"</script>';
                        break;
                    default:
                        echo '<script>alert("Usted no pertenece a ningún rol, comuníquese con el Administrador");</script>';
                        break;
                }
            } else {
                echo '<script>alert("Su contraseña no es correcta, vuelva a intentar o seleccione recuperar contraseña");</script>';
                echo '<script>location.href="../Views/extras/page-login.html"</script>';
            }
        } else {
            echo '<script>alert("Su correo no coincide con ningún usuario registrado, por favor cree una cuenta");</script>';
            echo '<script>location.href="../Views/extras/page-register.html"</script>';
        }
    }

    public function cerrarSesionAdmin() {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
    
        session_start();
        session_destroy();
        echo'<script>location.href = "../../index.html  " </script>';
}  

    public function obtenerNombreRol($id_rol)
        {
            if ($id_rol == 1) {
                return "Administrador";
            } elseif ($id_rol == 2) {
                return "Vendedor";
            } elseif ($id_rol == 3) {
                return "Usuario";
            } else {
                return "Rol desconocido";
            }
        }

    public function mostrarAdmin($documento){

        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $consultaredic = "SELECT * FROM usuario WHERE documento = :documento";
        $result = $conexion->prepare($consultaredic);
        $result->bindparam(':documento',$documento);
        $result->execute();
        while ($resultado = $result->fetch()){   
            $f[] = $resultado;
        }
        return $f;
        }

   public function editarPerfilAdmin($documento, $nombre, $telefono, $correo){
    $objconexion = new Conexion();
    $conexion = $objconexion->get_conexion();

    $actualizarPerfil = "UPDATE usuario SET nombre=:nombre, telefono=:telefono, correo=:correo WHERE documento = :documento";
    $result = $conexion->prepare($actualizarPerfil);
    $result->bindParam(':documento', $documento);
    $result->bindParam(':nombre', $nombre);
    $result->bindParam(':telefono', $telefono);
    $result->bindParam(":correo", $correo);
    $result->execute(); 

    if ($result->execute()) {
     echo '<script>alert("¡Felicidades! Tu perfil se ha actualizado correctamente");</script>';
        echo '<script>location.href="../../Views/dashboard/PerfilAdmin.php"</script>';
    } else {
        echo '<script>alert("¡Lo lamentamos! hay un Error al editar el perfil, vuelve a intentarlo");</script>';
    }
        }

    public function editcontrasena($documento, $contrasenaEncrip){

    $objconexion = new Conexion();
    $conexion = $objconexion->get_conexion();

    $actualizarContrasena = "UPDATE usuario SET  contrasena=:contrasenaEncrip  WHERE documento = :documento";
    $result = $conexion->prepare($actualizarContrasena);
    $result->bindParam(':documento', $documento);
    $result->bindParam(':contrasenaEncrip',$contrasenaEncrip);


    if ($result->execute()) {
        echo '<script>alert("¡Felicidades! Tu contraseña se ha editado correctamente");</script>';
           echo '<script>location.href="../../Views/dashboard/PerfilAdmin.php"</script>';
       } else {
           echo '<script>alert("¡Lo lamentamos! hay un Error al editar tu contraseña");</script>';
       }

    }

    public function editarFoto($documento, $rutafoto){
    $objconexion = new Conexion();
    $conexion = $objconexion->get_conexion();

    $actualizarFoto = "UPDATE usuario SET  foto=:rutafoto  WHERE documento = :documento";
    $result = $conexion->prepare($actualizarFoto);
    $result->bindParam(':documento', $documento);
    $result->bindParam(':rutafoto', $rutafoto);

    
    if ($result->execute()) {
        echo '<script>alert("¡Felicidades! Tu foto de perfil ha quedado actualizada Correctamente");</script>';
           echo '<script>location.href="../../Views/dashboard/PerfilAdmin.php"</script>';
       } else {
           echo '<script>alert("¡Lo lamentamos! hay un Error al editar tu foto");</script>';
       }

    }

    public function mostrarcontrasena(){
        $f = null;
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
        $consultaredic = "SELECT * FROM usuario WHERE documento = :documento";
        $result = $conexion->prepare($consultaredic);
        $result->bindparam(':documento',$documento);
        $result->execute();
        while ($resultado = $result->fetch()){   
            $f[] = $resultado;
        }
        return $f;
        }

    



}
   





?>