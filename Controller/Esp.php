<?php
    class Esp extends Controllers{
        public function __construct()
        {
        session_start();
            if (!empty($_SESSION['activo'])) {
                header("location: " . base_url()."Dashboard/Inicio");
            }
            parent::__construct();
        }
        
        //INGRESA LAS MEDICIONES TOMADAS
        public function RegistroDatos()
        {
            $id_placa = Limpiar($_POST['nombre']);
            //Obtenemos el id del cultivo que tiene asignada esa placa.
            $data = $this->model->BuscarCultivo($id_placa); 
            $id_cultivo = $data['id'];

            $tem = Limpiar($_POST['tem']);
            $humendad = Limpiar($_POST['humendad']);
            $stem = Limpiar($_POST['key']);
            $shumendad = Limpiar($_POST['nombre']);
            $lum = Limpiar($_POST['key']);
            $co2 = Limpiar($_POST['nombre']);
            $altura = Limpiar($_POST['key']);

            $insert = $this->model->insertarMonitoreo($id_cultivo, $tem);
            die();   
        }

        //INGRESA ALERTAS DE ACCIONES
        public function Alertas()
        {
            $id_placa = Limpiar($_POST['id_placa']);
            //Obtenemos el id del cultivo que tiene asignada esa placa.
            $data = $this->model->BuscarCultivo($id_placa); 
            $id_cultivo = $data['id'];
            $id_usuario = $data['id_usuario'];
            $nombre = $data['nombre'];

            $codigo = Limpiar($_POST['codigo']);
            //ASIGNAMOS LOS DATOS SEGUN EL CODIGO
            switch ($codigo) {
                case 'value':
                    $descripcion = '';
                    $relevancia = 1;
                    break;
                
                default:
                    # code...
                    break;
            }
            
            if ($relevancia == 1) {
                $insert = $this->model->insertarAcciones($id_cultivo, $descripcion, $codigo);
            }

            $ingresar = $this->model->insertarNotificaciones($id_usuario, $descripcion, $relevancia);
            
            
            //Si relevancia es 3 manda correo y pone cultivo con alerta
            if ($relevancia == 3) {
                //obtiene datos del usuario
                $usuario = $this->model->DatosUsuario($id_usuario);
                $asunto = 'ALERTA CULTIVO '.$nombre;
                $cuerpo = "<p>$descripcion</p><br>";
                EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                //PONE CULTIVO CON ALERTA
                $alerta = 1;
                $cultivo = $this->model->CultivoAlerta($id_cultivo, $alerta);
            } elseif ($data['alerta'] == 1) {
                //PONE CULTIVO SIN ALERTA
                $alerta = 0;
                $cultivo = $this->model->CultivoAlerta($id_cultivo, $alerta);
            }
            die();   
        }

        //OBTENER LA CONFIGURACIÓN DEL CULTIVO
        public function ObtenerConfiguracion()
        {
            $id_placa = Limpiar($_POST['nombre']);
            //Obtenemos el id del cultivo que tiene asignada esa placa.
            $data = $this->model->BuscarCultivo($id_placa); 
            $id_cultivo = $data['id'];

            $tem = Limpiar($_POST['tem']);
            $humendad = Limpiar($_POST['humendad']);
            $stem = Limpiar($_POST['key']);
            $shumendad = Limpiar($_POST['nombre']);
            $lum = Limpiar($_POST['key']);
            $co2 = Limpiar($_POST['nombre']);
            $altura = Limpiar($_POST['key']);

            $insert = $this->model->insertarMonitoreo($id_cultivo, $tem);
            die();   
        }

    }
?>