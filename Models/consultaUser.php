<?php

class ConsultaUser{

     //Sólo irán las consultas del Usuario, de lo contrarío deberá ubicarse en (consultarAdmin.php)

    public function registrarUser($documento, $nombre,$telefono,$correo,$contrasenaEncrip, $id_rol){
        $objconexion = new Conexion();
        $conexion = $objconexion -> get_conexion();

        $insertarUser = "INSERT INTO usuario (documento, nombre, telefono,correo,contrasena,id_rol) 
        VALUES(:documento,:nombre,:telefono,:correo,:contrasenaEncrip,:id_rol)";

        $result= $conexion-> prepare($insertarUser);
        $result->bindParam(":documento", $documento);
        $result->bindParam(":nombre",$nombre);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":correo",$correo);
        $result->bindParam(":contrasenaEncrip",$contrasenaEncrip);
        $result->bindParam(":id_rol",$id_rol);

        if ($result->execute()) {
            echo '<script>alert("Registro Exitoso");</script>';
            echo '<script>location.href="../Views/users/iniciarUser.html"</script>';
        }else {
            echo '<script>alert(" ¡Lo lamentamos! hay un Error al registrar el usuario, vuelve a intentarlo");</script>';
        }


        

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

    public function recuperarContrasena($contrasena){

        $objconexion = new Conexion();

    }

    public function cerrarSesion() {
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion();
    
        session_start();
        session_destroy();
        echo'<script>location.href = "../index.html  " </script>';
}
   
    public function editarUser($documento){

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

    public function editarPerfil($documento, $nombre, $telefono, $correo, $contrasenaEncrip, $rutafoto, $id_rol){
    $objconexion = new Conexion();
    $conexion = $objconexion->get_conexion();

    $actualizarPerfil = "UPDATE usuario SET nombre=:nombre, telefono=:telefono, correo=:correo, contrasena=:contrasenaEncrip, foto=:rutafoto, id_rol=:id_rol WHERE documento = :documento";
    $result = $conexion->prepare($actualizarPerfil);
    $result->bindParam(':documento', $documento);
    $result->bindParam(':nombre', $nombre);
    $result->bindParam(':telefono', $telefono);
    $result->bindParam(':correo', $correo);
    $result->bindParam(':contrasenaEncrip', $contrasenaEncrip);
    $result->bindParam(':rutafoto', $rutafoto);
    $result->bindParam(':id_rol', $id_rol);

    if ($result->execute()) {
        echo '<script>alert("Tu Perfil ha sido editado Correctamente");</script>';
        echo '<script>location.href="../Views/users/profile.php"</script>';
    } else {
        echo '<script>alert("¡Lo lamentamos! hay un Error al editar el perfil, vuelve a intentarlo");</script>';
    }
}
public function mostrarUserPerfil($documento){

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


    public function verFoto() { 
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
}
 
?>