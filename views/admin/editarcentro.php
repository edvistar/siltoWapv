<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'views/head.php'; ?>
</head>
<body>

    <?php require 'views/header.php'; ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="col-md-8 col-md-8 col-sm-8 col-xs-12">
            <div class="text-center custom-login mt-20px">
                <h3><i class="fa fa-edit" aria-hidden="true"></i> Actualizacion de Centro o Bodega</h3>
                <p>Todos los campos son obligatorios</p>
            </div>
            <div class="center"><?php echo $this->mensaje;?></div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo constant('URL'); ?>centro/editar" method="POST">
                        <div class="row">
                        <div class="form-group col-md-6">
                                <label for="id_centro">Id Centro</label>
                                <input type="number" class="form-control" value="<?php echo $this->centro->id_centro; ?>" name="id_centro" id="id_centro" readonly>
                                <small id="id_centroHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" value="<?php echo $this->centro->nombre; ?>" name="nombre" id="nombre" readonly>
                                <small id="nombreHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="<?php echo $this->centro->email; ?>" name="email" id="email">
                                <small id="emailHelp" class="form-text text-muted">Diligencie el email del Centro</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefono">Telefono</label>
                                <input type="number" class="form-control" value="<?php echo $this->centro->telefono; ?>" name="telefono" id="telefono">
                                <small id="telefonoHelp" class="form-text text-muted">Diligencie el numero de telefono del Centro</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="whatsapp">Whatsapp</label><br>
                                    <input class="custom-control-input"required type="radio" name="whatsapp" id="whatsapp1" value="SI" checked>SI
                                    <input class="custom-control-input" type="radio" name="whatsapp" id="whatsapp0" value="NO">NO<br>
                                    <small id="whatsappHelp" class="form-text text-muted">Confirme si tiene whatsapp el numero de telefono ingresado</small>
                                </div>
                            <div class="form-group col-lg-6">
                                <label for="lugar">Lugar</label>
                                <input type="text" class="form-control" value="<?php echo $this->centro->lugar; ?>" name="lugar" id="lugar">
                                <small id="lugarHelp" class="form-text text-muted">Diligencie el Lugar de ubicacion</small>
                            </div>
                            <!-- <div class="form-group col-lg-6">
                                <label for="departamento">Departamento</label>
                                <input type="text" class="form-control" value="<?php echo $this->centro->departamento; ?>" name="departamento" id="departamento" readonly>
                                <small id="departamentoHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="ciudad">Lugar</label>
                                <input type="text" class="form-control" value="<?php echo $this->centro->ciudad; ?>" name="ciudad" id="ciudad" readonly>
                                <small id="ciudadHelp" class="form-text text-muted"></small>
                                
                            </div> -->

                             <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                    Seleccione Departamento y Ciudad
                                    </div>
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Departamento</label>
                                                    <select class="form-control" name="departamento"  id="departamentos_editar" style="width: 100%;" readonly>
                                                    <option selected value="<?php echo $this->centro->departamento;?>"><?php echo $this->centro->departamento; ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                <label for="ciudades">Ciudad</label>
                                                <select class="form-control" name="ciudad" id="ciudades_editar" style="width: 100%;" readonly>
                                                <option selected value="<?php echo $this->centro->ciudad; ?>"><?php echo $this->centro->ciudad; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="identificacion">Encargado</label>
                                <select class="form-control" id="identificacion" name="identificacion" style="width:100%">
                                <option selected value="<?php echo $this->centro->identificacion; ?>"><?php echo $this->centro->identificacion; ?></option>
                                
                                        <?php
                                            include_once 'models/usuario.php';

                                            if(count($this->ddl_usuarios)>0){
                                                foreach ($this->ddl_usuarios as $usuario) {
                                                $ddl_usuario = new UsuarioDAO();
                                                $ddl_usuario = $usuario;
                                        ?>
                                                <option  value="<?php echo $ddl_usuario->identificacion;?>"><?php echo $ddl_usuario->identificacion;?>-<?php echo $ddl_usuario->nombre;?>-<?php echo $ddl_usuario->apellido; ?>-<?php echo $ddl_usuario->cargo; ?></option>
                                                <?php
                                                }
                                            }
                                                ?>
                                </select>
                                <small id="identificacionHelp" class="form-text text-muted">Debe elegir nuevamente el encargado del centro</small>
                            </div>
                        </div>
                        <div class="text-center ">
                            <button type="submit" class="btn btn-info">Actualizar centro</button>
                            <button class="btn btn-danger">Cancelar</button>
                        </div>
                  </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
    </div>
</div><br>

    <?php require 'views/footer.php'; ?>

</body>
</html>
