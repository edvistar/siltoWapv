<?php
    class Ruta extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }
        function render(){
            $rutas = $this->view->datos = $this->model->read();
            $this->view->rutas = $rutas;
            $this->view->render('admin/listaruta');
        }
        function crear(){
            if(isset($_POST["destino"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Ruta creada correctamente";
                    $rutas = $this->view->datos = $this->model->read();
                    $this->view->rutas = $rutas;
                    $this->view->render('admin/listaruta');
                }else{
                    
                    $this->view->mensaje = "La ruta ya existe 1";
                    $this->view->render('admin/listaruta');
                }
            }else{
<<<<<<< HEAD
                $this->view->render('admin/formruta');
=======
                $this->view->render('admin/crearruta');
>>>>>>> wapv
            }
        }
        function leer($param = null){
            $id_ruta = $param[0];
            $ruta = $this->model->readById($id_ruta);
    
            session_start();
            $_SESSION["id_verRuta"] = $ruta->id_ruta;
            
    
            $this->view->ruta = $ruta;
            $this->view->render('admin/editarruta');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verRuta"];
            unset($_SESSION['id_verRuta']);
    
            if($this->model->update($_POST)){
                $ruta = new RutaDAO();

                $ruta->id_ruta        = $id;
                $ruta->id_ruta        = $_POST['id_ruta'];
                $ruta->destino        = $_POST['destino'];
                $ruta->fecha_ruta     = $_POST['fecha_ruta'];
                $ruta->hora_salida    = $_POST['hora_salida'];
                $ruta->hora_llegada   = $_POST['hora_llegada'];
                $ruta->descripcion    = $_POST['descripcion'];
                $ruta->tipo_ruta      = $_POST['tipo_ruta'];
                $ruta->precinto       = $_POST['precinto'];
                $ruta->identificacion = $_POST['identificacion'];
                $ruta->placa          = $_POST['placa'];
                $ruta->id_centro      = $_POST['id_centro'];
    
    
                $this->view->ruta = $ruta;
                $this->view->mensaje = "Ruta actualizada correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al ruta";
            }
            $rutas = $this->view->datos = $this->model->read();
            $this->view->rutas = $rutas;
            $this->view->render('admin/listaruta');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Ruta eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar la ruta";
                $this->view->mensaje = "No se pudo eliminar la ruta";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
        
    }