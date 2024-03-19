<?php

function mostrarPerfilUser(){
   
    $documento = $_SESSION['documento'];
    $objconsultas = new ConsultaUser();
    
    $result = $objconsultas->mostrarUserPerfil($documento);

    if ($result !== false && !empty($result)){
    foreach($result as $f){

        echo'<div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="user-photo m-b-30">
                    <img class="img-fluid" src="../'.$f['foto'].'" alt="" style="width: 300px;border-radius:200px;" />
                </div>
            </div>
            <div class="col-lg-9">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Cambiar datos de la cuenta</button>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar
                            clave</button>
                        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cambiar foto</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <h3>Modificar Datos de la cuenta</h3>
                            <p>Aquí podrás cambiar todos tus datos personales</p>
                            <form class="form-horizontal" role="form" method="post" action="../../Controllers/admin/modificarPerfilAdmin.php" enctype="multipart/form-data">
                                <input class="form-control" name="documento" type="hidden" value="'.$f['documento'].'">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label control-label">Nombre</label>
                                        <input class="form-control" name="nombre" type="text" value="'.$f['nombre'].'">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label control-label">Teléfono</label>
                                        <input class="form-control" name="telefono" type="text" value="'.$f['telefono'].'">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label control-label">Correo</label>
                                        <input class="form-control" name="correo" type="text" value="'.$f['correo'].'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-info" value="Guardar Usuario" style="background-color: #75bde0; border-radius:10px; border-color: #75bde0;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="card">
                    <h3>Modifica tu contraseña</h3>
                     <p>Escribe aquí tu nueva contraseña</p>
                    <form class="form-horizontal" role="form" method="post" action="../../Controllers/admin/modificarClaveAdmin.php" enctype="multipart/form-data">
                        <input class="form-control" name="documento" type="hidden" value="'.$f['documento'].'">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label control-label">Nueva Contraseña</label>
                                <input class="form-control" name="contrasena" type="password" value="'.$f['contrasena'].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-info" value="Guardar Contraseña" style="background-color: #75bde0; border-radius:10px; border-color: #75bde0;">
                            </div>
                        </div>
                    </form>
                </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="card">
                    <h3>Modifica tu foto de Perfil</h3>
                     <p>Aquí podrás seleccionar una nueva foto para tu perfil</p>
                    <form class="form-horizontal" role="form" method="post" action="../../Controllers/admin/modificarFotoAdmin.php" enctype="multipart/form-data">
                        <input class="form-control" name="documento" type="hidden" value="'.$f['documento'].'">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label control-label">Inserta un nueva foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-info" value="Guardar Foto" style="background-color: #75bde0; border-radius:10px; border-color: #75bde0;">
                            </div>
                        </div>
                    </form>
                </div>
                    
                   
                    </div>
                </div>
            </div>
        </div>
    </div>  
        ';
    }

}
}



?>