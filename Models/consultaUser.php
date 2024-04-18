<?php

class ConsultaUser{

     //Sólo irán las consultas del Usuario, de lo contrarío deberá ubicarse en (consultarAdmin.php)

    public function registrarUser($documento, $nombre,$telefono,$correo,$contrasenaEncrip, $id_rol, $estado){
        $objconexion = new Conexion();
        $conexion = $objconexion -> get_conexion();

        $insertarUser = "INSERT INTO usuario (documento, nombre, telefono,correo,contrasena,id_rol, estado) 
        VALUES(:documento,:nombre,:telefono,:correo,:contrasenaEncrip,:id_rol, :estado)";

        $result= $conexion-> prepare($insertarUser);
        $result->bindParam(":documento", $documento);
        $result->bindParam(":nombre",$nombre);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":correo",$correo);
        $result->bindParam(":contrasenaEncrip",$contrasenaEncrip);
        $result->bindParam(":id_rol",$id_rol);
        $result->bindParam(":estado", $estado);

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
                        if ($f['estado'] == "primeravez") {
                            echo '<script>alert("Bienvenido, has ingresado por primera vez, tendrás que hacer nuestro manual Interactivo");</script>';
                            echo '<script>location.href="../Views/users/manualConsejo.html"</script>';

                            $estado = "activo";
                            $actualizarEstado = "UPDATE usuario SET estado=:estado WHERE documento = :documento";
                            $resultado= $conexion->prepare($actualizarEstado);
                            $resultado->bindParam(':estado', $estado);
                            $resultado->bindParam(':documento', $f['documento']);
                            $resultado->execute();
                
                        }else {
                            
                            echo '<script>alert("Bienvenido Usuario");</script>';
                            echo '<script>location.href="../Views/users/home.php"</script>';
                
                        }
                        
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

public function actulizardatosPerfil($documento,$nombre,$telefono,$correo){
    $f= null;
    $objConexion = new Conexion();
    $conexion = $objConexion -> get_conexion();
    $actualizardatosperfil = "UPDATE  usuario SET nombre=:nombre, telefono=:telefono, correo=:correo WHERE documento=:documento";
    $result = $conexion->prepare($actualizardatosperfil);
    $result->bindParam(':documento', $documento);
    $result->bindParam(':nombre', $nombre);
    $result->bindParam(':telefono', $telefono);
    $result->bindParam(':correo', $correo);
    
    if ($result->execute()) {
        echo '<script>alert("¡Bien Hecho! se han actualizado tus datos personales del Perfil");</script>';
        echo '<script>location.href="../Views/users/profile.php"</script>';
    }else {
        echo '<script>alert(" ¡Lo lamentamos! hay un Error al intentar actualizar tus datos personales");</script>';
    }
}

public function modificarclave($documento,$contrasenaEncrip){
    $objConexion = new Conexion();
    $conexion = $objConexion -> get_conexion();
    $actualizarclave= "UPDATE usuario SET contrasena=:contrasenaEncrip WHERE documento=:documento";
    $result = $conexion ->prepare($actualizarclave);
    $result-> bindParam(':documento', $documento);
    $result-> bindParam (':contrasenaEncrip', $contrasenaEncrip);
    if ($result -> execute()) {

        echo '<script> alert("¡Bien hecho!, has modificado tu clave con exito"); </script>';
        echo '<script> location.href="../Views/users/profile.php" </script>';
        
    }else {
        echo '<script> alert("¡Lo lamento!, hay un error al modificar tu contraseña"); </script>';
    }

}
public function modificarFoto($documento, $rutaFoto){
    $objConexion = new Conexion();
    $conexion = $objConexion -> get_conexion();
    $actualizarFoto = "UPDATE usuario SET foto=:rutaFoto WHERE documento=:documento";
    $result = $conexion ->prepare($actualizarFoto);
    $result->bindParam(':documento',$documento);
    $result ->bindParam(':rutaFoto', $rutaFoto);

    if ($result-> execute()) {

        echo '<script> alert("¡Bien hecho!, has modificado  tu foto de perfil"); </script>';
        echo '<script> location.href="../Views/users/profile.php" </script>';

        
    } else {
        echo '<script> alert("¡Lo lamento!, hay un error al modificar tu foto"); </script>';
    }


}
public function registrarForm($presupuesto,$descripcion,$profesion,$tipoEquip){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }else{
        echo "Error: El documento del usuario no está definido en la sesión.";
    }
    
    $documento = $_SESSION['documento'];
    $objConexion = new Conexion();
    $conexion = $objConexion -> get_conexion();
    $registrarF= "INSERT INTO formulario( `presupuesto`, `descripcion`, `profesion`, `tipoEquip`, `documento`) 
    VALUES (:presupuesto,:descripcion,:profesion,:tipoEquip, :documento)";
    $result= $conexion ->prepare($registrarF);
    $result->bindParam(':presupuesto',$presupuesto);
    $result->bindParam(':descripcion',$descripcion);
    $result->bindParam(':profesion', $profesion);
    $result->bindParam(':tipoEquip',$tipoEquip);
    $result->bindParam(':documento', $documento);
    
    if ($result-> execute()) {
        echo '<script>alert("¡Felicidades! has termiando tu consejo tecnológico ");</script>';
        echo '<script>location.href="../Views/users/resultadoConse.php"</script>';
    }else {
        echo '<script>alert(" ¡Lo lamentamos! no hemos podido brindarte ningún consejo, vuelve a intentarlo");</script>';
        echo '<script>location.href="../Views/users/formConse.php"</script>';
    }

}
public function obtenerConsejo($presupuesto,$tipoEquip, $descripción, $precio,$foto ){
    $f=null;
    $objConexion = new Conexion();
    $conexion=$objConexion->get_conexion();
    $consultarconse="SELECT nombre, precio, foto, descripcion FROM producto
    WHERE precio <= :presupuesto 
    AND cod_equip = :tipoEquip 
    AND pro_descrip LIKE :descripcion
    LIMIT 3";
    $result= $conexion->prepare($consultarconse);
    $result->bindParam(':presupuesto', $presupuesto);
    $result->bindParam(':tipoEquip', $tipoEquip);
    $descripcion = '%' . $descripcion . '%'; 
    $result->bindParam(':descripcion', $descripcion);
    $result->bindParam(':precio', $precio);
    $result->bindParam(':foto', $foto);
    $result->execute();

    while ($resultado = $result->fetch()){   
        $f[] = $resultado;
    }
    return $f;

}

}
 
?>