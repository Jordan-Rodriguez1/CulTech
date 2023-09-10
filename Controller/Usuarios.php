<?php
    class Usuarios extends Controllers
    {
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url());
            }
            parent::__construct();
        }

        public function Perfil()
        {
            $this->views->getView($this, "Perfil");
        }

        //Seleciona los datos de un Usuario
        public function editar()
        {
            $id = $_GET['id'];
            $data1 = $this->model->editarUsuarios($id);
            if ($data1 == 0) {
                $this->Listar();
            } else {
                $this->views->getView($this, "Editar","", $data1);
            }
        }

        //Actualiza los datos de un Usuario
        public function actualizar()
        {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $rol = $_POST['rol'];
            $correo = $_POST['correo'];
            $actualizar = $this->model->actualizarUsuarios($nombre, $usuario, $rol, $id, $correo);     
                if ($actualizar == 1) {
                    $alert = 'modificado';
                } else {
                    $alert =  'error';
                }
            header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
            die();
        }

        //Inactiva los datos de un Usuario
        public function eliminar()
        {
            $id = $_GET['id'];
            $estado = 0;
            $eliminar = $this->model->eliminarUsuarios($id, $estado);
            $alert = 'inactivo';
            $data1 = $this->model->selectUsuarios();
            header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
            die();
        }

        //Cambiar contraseña
        public function cambiar()
        {
            $hash = hash("SHA256", $_POST['actual']);
            $nuevahash = hash("SHA256", $_POST['nueva']);
            $nueva = $_POST['nueva'];
            $confirmar = $_POST['confirmar'];
            if ($nueva == $confirmar) {
                $data = $this->model->verificarPass($hash, $_SESSION['id']);
                if ($data != null) {
                    $this->model->cambiarContra($nuevahash, $_SESSION['id']);
                    $alert =  'cambio';
                }  else{
                    $alert =  'error';
                }
            } else {
                $alert =  'noigual';
            }
            header('location: ' . base_url() . "Dashboard/Listar?msg=$alert");  
        }

        //Cambiar Imagen Perfil
        public function cambiarpic()
        {
            $usuario = $this->model->editarUsuarios($_SESSION['id']);
            $imgactual = $usuario['perfil'];
            $name = pathinfo($_FILES["archivo"]["name"]);
            $nombre_archivo = $_FILES["archivo"]["name"];
            $nombre_nuevo = $_SESSION['id'].".".$name["extension"];
            $tipo_archivo = $_FILES["archivo"]["type"];
            $tamano_archivo = $_FILES["archivo"]["size"];
            $ruta_temporal = $_FILES["archivo"]["tmp_name"];
            $error_archivo = $_FILES["archivo"]["error"];
            $tmaximo = 20 * 1024 * 1024;
            if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "png" || $name["extension"] == "jpg" || $name["extension"] == "jpeg")){
                if ($error_archivo == UPLOAD_ERR_OK) {
                    if($imgactual != "perfil.jpg"){
                        unlink("Assets/img/perfiles/".$imgactual);
                    }
                    $ruta_destino = "Assets/img/perfiles/".$nombre_nuevo;
                    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                        $id = $_SESSION['id'];
                        $this->model->img($nombre_nuevo, $id);
                        $alert =  'imagen';
                    } else {
                        $alert =  'noimagen';
                    }
                } else {
                $alert =  'noimagen';
                }
            } else {
                $alert =  'noimagen';
            }
            header('location: ' . base_url() . "Dashboard/Listar?msg=$alert");
            die();
        }

        /*--------------------------------------------------------- 
        --------------CONTROLADORES FOOTER -------------------------
        ----------------------------------------------------------*/

        //Cerrar Sesión
        public function salir()
        {
            session_destroy();
            header("Location: ".base_url());
        }
    }
?>