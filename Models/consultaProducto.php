<?php
class ConsultaProducto{

    function registrarProducto($codigo, $garantia, $referencia, $marca, $precio, $codigoEquipo, $descripcion, $rutaFoto){
        $objConexion = new conexion();
        $conexion = $objConexion->get_conexion();
    
        $consulta= "INSERT INTO producto (cod_pro, pro_grantia, pro_referen,pro_marca, pro_descrip, precio, cod_equip, foto)
       VALUES (:codigo, :garantia, :referencia, :marca, :descripcion, :precio, :codigoEquipo, :rutaFoto)";
    
       $result = $conexion->prepare($consulta);
       $result->bindParam(":codigo", $codigo);
       $result->bindParam(":garantia", $garantia);
       $result->bindParam(":referencia", $referencia);
       $result->bindParam(":marca", $marca);
       $result->bindParam(":descripcion", $descripcion);
       $result->bindParam(":precio", $precio);
       $result->bindParam(":codigoEquipo", $codigoEquipo);
       $result->bindParam(":rutaFoto", $rutaFoto);
        
      
       if ($result->execute()) {
        echo '<script>alert("Registro insertado")</script>';
       echo '<script>location.href="../../Views/dashboard/verProductos.php"</script>';
       } else {
           echo '<script>alert("¡Lo lamentamos! hay un Error al cargar tu producto, vuelve a intentar);</script>';
           echo '<script>location.href="../../Views/dashboard/verProductos.php"</script>';
       }
       
    
     }
    function consultarProductos()
    {
        $f = null;
        $productos = array(); 
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
        $cargar = "SELECT p.*, e.nom_equip 
        FROM producto p
        INNER JOIN equipos e ON p.cod_equip = e.cod_equip";

        $result = $conexion->prepare($cargar);
        

        $result->execute();

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;

            
        }
        return $f;
    }

    public function modificarProducto($codigo, $garantia, $referencia, $marca, $precio, $codigoEquipo, $descripcion, $rutaFoto){
        $objConexion = new  Conexion();
        $conexion = $objConexion->get_conexion();
      
        $modificar = "UPDATE producto SET pro_grantia=:garantia, pro_referen=:referencia, pro_marca=:marca, pro_descrip=:descripcion, precio=:precio, cod_equip=:codigoEquipo, foto=:rutaFoto WHERE cod_pro=:codigo";
        $result= $conexion->prepare($modificar);
        $result->bindParam(':codigo',$codigo);
        $result->bindParam(':garantia',$garantia);
        $result->bindParam(':referencia',$referencia);
        $result->bindParam(':marca',$marca);
        $result->bindParam(':precio',$precio);
        $result->bindParam(':codigoEquipo',$codigoEquipo);
        $result->bindParam(':descripcion',$descripcion);
        $result->bindParam(':rutaFoto',$rutaFoto);
        $result->execute();
      
        echo '<script>alert("Producto modificado correctamente")</script>';
        echo '<script>location.href="../../Views/dashboard/verProductos.php"</script>';
       
      
      
      }

      public function consultarProductosModif($codigo){
        $f = array();
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();
      
        $consultar = "SELECT * FROM producto WHERE cod_pro=:codigo";
        $result = $conexion->prepare($consultar);
      
        $result->bindParam(":codigo", $codigo);
        $result->execute();
      
        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }

    function eliminarProductos($cod_pro){

        $objConexion = new conexion();
        $conexion = $objConexion->get_conexion();
      
        $eliminar= "DELETE FROM producto WHERE cod_pro=:cod_pro";
      
        $result = $conexion->prepare($eliminar);
        $result->bindParam(":cod_pro", $cod_pro);
        $result->execute();
        echo '<script>alert("Producto eliminado")</script>';
        echo '<script>location.href="../../Views/dashboard/verProductos.php"</script>';
      
      }
}

?>