<?php
    class Login extends Controllers{
        public function __construct()
        {
        session_start();
            if (!empty($_SESSION['activo'])) {
                header("location: " . base_url()."Admin/Listar");
            }
            parent::__construct();
        }
        
        public function login()
        {
            $this->views->getView($this, "login");
        }

        public function recuperar()
        {
            $this->views->getView($this, "recuperar");
        }

        public function registrar()
        {
            $this->views->getView($this, "registrar");
        }

    //Iniciar sesión
    public function ingresar()
    {
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            $data = $this->model->selectUsuario($usuario, $hash);
            if (!empty($data)) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['perfil'] = $data['perfil'];
                    $_SESSION['activo'] = true;
                    header('location: '.base_url(). 'Dashboard/Listar');
            } else {
                $error = 0;
                header("location: ".base_url(). 'Login/loginprof'."?msg=$error");
            }
        }
    }

    //Añade un nuevo usuario
    public function insertar()
    {
        $nombre = $_POST['FirstName'];
        $apellido = $_POST['LastName'];
        $correo = $_POST['Email'];
        $clave = $_POST['Password'];
        $clave2 = $_POST['RepeatPassword'];
        $hash = hash("SHA256", $clave);
        if ($clave == $clave2) {
            $insert = $this->model->insertarUsuarios($nombre, $usuario, $hash, $rol, $correo);
            if ($insert == 'existe') {
                $data1 = $this->model->editarUsuariosC($correo);
                if ($data1['estado'] == 2) {
                    $estado = 1;
                    $id = $data1['id'];
                    $actualizar = $this->model->actualizarUsuarios($nombre, $usuario, $rol, $id, $correo);
                    $cambio =$this->model->cambiarContra($hash, $id);
                    $eliminar = $this->model->eliminarUsuarios($id, $estado);
                        if ($actualizar == 1) {
                            $alert = 'registrado';
                        } else {
                            $alert =  'error';
                        }
                } else {
                    $alert = 'existe';
                }
            } else if ($insert > 0) {
                $alert = 'registrado';
            } else {
                $alert = 'error';
            }
        } else {
            $alert = 'nopassword';
        }
        header("location: " . base_url() . "Login/registrar?msg=$alert");
        die();   
    }

}
?>