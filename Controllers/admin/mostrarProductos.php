<?php
function cargarProductos()
{
    $objconsultas = new ConsultaProducto();
    $result = $objconsultas->consultarProductos();
    if (!isset($result)) {
        echo "<h2> No hay registros en la base de datos</h2>";


    }
    else {

        foreach ($result as $f) {
            
            echo '

            <tr class="cambiarcolor" style="color:#e7e7e7;">                               
            
            <td >'.$f['cod_pro'].'</td>
            <td>'.$f['pro_grantia'].'</td>
            <td>'.$f['pro_referen'].'</td>
            <td>'.$f['pro_marca'].'</td>
            <td>'.$f['pro_descrip'].'</td>
            <td>'.$f['precio'].'</td>
            <td>'.$f['nom_equip'].'</td>
            <td> <img src="' . $f['foto'] .  '" alt="Foto user" width="80px" heigth="80px"> </td>        
            <td> <a href="cargarProductosEdit.php?codigo='.$f['cod_pro'].'" class="btn btn-primary"><i class="bi bi-pencil-square"></i>MODIFICAR</td>
            <td> <a class="btn btn-danger" href="../../Controllers/admin/eliminarProducto.php?cod_pro='.$f['cod_pro'].'"><i class="bi bi-trash3"></i>ELIMINAR</td>
            ';
           

            
        }
    }
}

function cargarProductosEdit(){
    $codigo = $_GET['codigo'];
    $objconsultas = new  ConsultaProducto();
    $result = $objconsultas->consultarProductosModif($codigo);
    if ($result !== null) {
    foreach ($result as $f){
        echo '
        
        </br>
            </br>
            <form action="../../Controllers/admin/modificarProductos.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            

            
            <div class="form-group col-md-6">
            <label>Codigo</label>
            <input type="text" name="codigo" value="'.$f['cod_pro'].'" readOnly class="form-control inputRegistro"  id="codigo"  placeholder="Código"/> 
            </div>
            <div class="form-group col-md-6">
            <label> Garantia</label>
            <input type="text" name="garantia" value="'.$f['pro_grantia'].'" class="form-control inputRegistro" id="garantia" placeholder="Garantía"/>
            </div>
            <div class="form-group col-md-6">
            <label>Referencia</label>
            <input type="text" name="referencia" value="'.$f['pro_referen'].'" class="form-control inputRegistro"  id="referencia"  placeholder="Referencia"/> 
            </div>
            <div class="form-group col-md-6">
            <label>Marca</label>
            <input type="text" name="marca" value="'.$f['pro_marca'].'" class="form-control inputRegistro" id="marca" placeholder="Marca"/>
            </div>
            <div class="form-group col-md-6">
            <label>Precio</label>
            <input type="text"  name="precio" value="'.$f['precio'].'" class="form-control inputRegistro"  id="precio"  placeholder="Precio"/> 
            </div>
            <div class="form-group col-md-6">
            <select class="form-select"  name="codigoEquipo" id="codigoEquipot">
            <option value="1034"' . (($f['cod_equip'] == "1034") ? " selected" : "") . '>Celular</option>
            <option value="1035"' . (($f['cod_equip'] == "1035") ? " selected" : "") . '>Computador</option>
            <option value="1036"' . (($f['cod_equip'] == "1036") ? " selected" : "") . '>Portatil</option>
            <option value="1037"' . (($f['cod_equip'] == "1037") ? " selected" : "") . '>Tableta</option>
            <option value="1038"' . (($f['cod_equip'] == "1038") ? " selected" : "") . '>Televisor</option>
        </select>
        </div>
            

        <div class="form-group col-md-6">

        <label>Foto</label>
           
        <input type="file"  name="foto" value="'.$f['foto'].'" class="form-control inputRegistro" id="foto" placeholder="foto"/>
            </div>
           
        
            <div class="form-group col-md-6">
           
            <label>Descripción</label>
            <input type="text"  name="descripcion" value="'.$f['pro_descrip'].'" class="form-control inputRegistro" id="descripcion" placeholder="Descripción"/>
           
            </div>
           
            
            <div style="text-align: center;">
            <button  id="modifica" type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </form>
            
            
            
        
        
        
        
        
        
        
        
        
        ';
    }
}
}




?>