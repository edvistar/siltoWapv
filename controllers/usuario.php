<?php
class Usuario extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
    }


    function render(){
        $usuarios = $this->view->datos['usuarios'] = $this->model->read();
        $this->view->usuarios = $usuarios;
        $this->view->render('admin/listausuario');
    }


    function crear(){
        if(isset($_POST["identificacion"])){
            if($this->model->create($_POST)){
                $this->view->mensaje = "Usuario creado correctamente";
                $usuarios = $this->view->datos['usuarios'] = $this->model->read();
                $this->view->usuarios = $usuarios;
                $this->view->render('admin/listausuario');
            }else{
                
                $this->view->mensaje = "El Usuario ya existe";
                $usuarios = $this->view->datos = $this->model->read();
                $this->view->usuarios = $usuarios;
                $this->view->render('admin/listausuario');
            }
        }else{
            
            $this->view->render('admin/crearusuario');
        }
    }


    function leer($param = null){
        $identificacion = $param[0];
        $usuario = $this->model->readById($identificacion);

        //session_start();
        $_SESSION["identificacion"] = $usuario->identificacion;

        $this->view->usuario = $usuario;
        $this->view->render('admin/editarusuario');
    }


    function editar($param = null){
        //session_start();
        $id = $_SESSION["identificacion"];
        //$_POST["identificacion"]=$id;
        unset($_SESSION['identificacion']);

        if($this->model->update($_POST)){
            
            $usuario = new usuarioDAO();
            $usuario->identificacion  = $id;
            $usuario->identificacion  = $_POST['identificacion'];
            $usuario->nombreUsuario   = $_POST['nombreUsuario'];
            $usuario->apellidoUsuario = $_POST['apellidoUsuario'];
            $usuario->emailUsuario           = $_POST['emailUsuario'];
            $usuario->pass            = $_POST['pass'];
            $usuario->telefonoUsuario = $_POST['telefonoUsuario'];
            $usuario->whatsappUsuario = $_POST['whatsappUsuario'];
            $usuario->cargo           = $_POST['cargo'];
            $usuario->estado          = $_POST['estado'];

            $this->view->usuario = $usuario;
            $this->view->mensaje = "Usuario actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar el Usuario";
        }
        $usuarios = $this->view->datos = $this->model->read();
        $this->view->usuarios = $usuarios;
        $this->view->render('admin/listausuario');
    }


    function eliminar($id = null){
        $identificacion = $id[0];

        if($this->model->delete($identificacion)){
            $mensaje ="Usuario eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar el Usuario";
        }
        echo $mensaje;
    }   
}

?>