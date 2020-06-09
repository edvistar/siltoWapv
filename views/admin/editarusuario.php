<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-md-8 col-sm-8 col-xs-12">
                <div class="text-center custom-login">
                    <h3><i class="fa fa-user" aria-hidden="true"></i> Editar usuario</h3>
                    <p>Todos los campos son obligatorios</p>
                </div>
                <h4> Identificación del usuario: <?php echo strtoupper($this->usuario->identificacion); ?></h4>
                <div><?php echo $this->mensaje; ?></div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo constant('URL'); ?>usuario/editar" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- <div class="form-group col-lg-6">
                                    <label for="identificacion">Identificación</label> -->
                                    <input type="hidden" class="form-control" value="<?php echo $this->usuario->identificacion; ?>" name="identificacion" id="identificacion" readonly>
                                    <!-- <small id="identificacionHelp" class="form-text text-muted">Diligencie el numero de identificación del usuario</small>
                                </div> -->

                                <div class="form-group col-lg-6">
                                    <label for="nombreUsuario">Nombres</label>
                                    <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" value="<?php echo $this->usuario->nombreUsuario; ?>" placeholder="Ej: Luis Felipe" required>
                                    <small id="nombreUsuarioHelp" class="form-text text-muted">Diligencie el nombre del usuario</small>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="apellidoUsuario">Apellidos</label>
                                    <input type="text" name="apellidoUsuario" id="apellidoUsuario" class="form-control" value="<?php echo $this->usuario->apellidoUsuario; ?>" placeholder="Ej: Agudelo Restrepo" required>
                                    <small id="apellidoUsuarioHelp" class="form-text text-muted">Diligencie los apellidos del usuario</small>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="emailUsuario">Email</label>
                                    <input type="email" name="emailUsuario" id="emailUsuario" class="form-control" value="<?php echo $this->usuario->emailUsuario; ?>" placeholder="Ej: usuario@gmail.com" required>
                                    <small id="emailUsuarioHelp" class="form-text text-muted">Diligencie el email del usuario</small>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="pass">Password</label>
                                    <input type="password" name="pass" id="pass" class="form-control" value="<?php echo $this->usuario->pass; ?>" required>
                                    <small id="passHelp" class="form-text text-muted">Diligencie la contraseña del email</small>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="telefonoUsuario">Numero Telefonico</label>
                                    <input type="number" name="telefonoUsuario" id="telefonoUsuario" class="form-control" value="<?php echo $this->usuario->telefonoUsuario; ?>" placeholder="Ej: 3040000000" required>
                                    <small id="telefonoHelp" class="form-text text-muted">Diligencie el numero de telefono del usuario</small>
                                </div>

                                <div id="cargo" name="cargo" class="form-group col-lg-6">
                                    <label for="cargo">Cargo</label>
                                    <select id="cargo" name="cargo" class="form-control" required>
                                        <option value="<?php echo $this->usuario->cargo; ?>"><?php echo $this->usuario->cargo; ?></option>
                                        <option value="administrador">Administrador</option>
                                        <option value="coordinador">Coordinador</option>
                                        <option value="conductor">Conductor</option>
                                    </select>
                                    <small id="cargopHelp" class="form-text text-muted">Diligencie el cargo a desempeñar el usuario</small>
                                </div>

                                <div class=" form-check form-check-inline col-lg-6">
                                    <label for="whatsappUsuario">Whatsapp</label><br>
                                    <input class="custom-control-input" type="radio" name="whatsappUsuario" id="whatsapp1" value="1" checked>
                                    <label class="custom-control-label" for="whatsapp1">Si</label>
                                    <input class="custom-control-input" type="radio" name="whatsappUsuario" id="whatsapp2" value="0">
                                    <label class="custom-control-label" for="whatsapp2">No</label><br>
                                    <small id="whatsappHelp" class="form-text text-muted">Confirme si tiene whatsapp el numero de telefono ingresado</small>
                                </div>

                                <div id="estado" name="estado" class="form-group col-lg-6">
                                    <label for="estado">Estado</label>
                                    <select id="estado" name="estado" class="form-control" required>
                                        <option value="<?php echo $this->usuario->estado; ?>"><?php echo $this->usuario->estado; ?></option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                    <small id="estadopHelp" class="form-text text-muted">Estado en la aplicación</small>
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label for="foto">Cambiar Foto de perfil</label>
                                    <input type="file" name="foto" id="foto" accept=".jpg, .png, .jpeg">
                                    <br>
                                    <small id="foto" class="form-text text-muted"> Seleccione de su equipo una imagen nueva si desea cambiar su foto</small>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="foto">Foto de Perfil Actual</label>
                                    <div>
                                        <input type="hidden" name="fotoriginal" value="<?php echo $this->usuario->foto; ?>">
                                        <img src="<?php echo '../../' . $this->usuario->foto; ?>" alt="imagen usuario" width="100" height="100">
                                    </div>
                                </div>

                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-info" value="Actualizar Usuario">
                                <input type="button" class="btn btn-danger" onClick='window.location.assign("<?php echo constant('URL'); ?>usuario")' value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>

</body>

</html>