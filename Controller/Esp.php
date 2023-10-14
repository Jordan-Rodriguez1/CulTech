<?php
    class Esp extends Controllers{
        public function __construct()
        {
        session_start();
            if (!empty($_SESSION['activo'])) {
                //header("location: " . base_url()."Dashboard/Inicio");
            }
            parent::__construct();
        }
        
        //INGRESA LAS MEDICIONES TOMADAS
        public function RegistroDatos()
        {
            echo 'hola';
            $id_placa = Limpiar($_POST['id_placa']);
            echo $id_placa;
            //Obtenemos el id del cultivo que tiene asignada esa placa.
            $data = $this->model->BuscarCultivo($id_placa); 
            $id_cultivo = $data['id'];
            print_r($data);
            $tem = Limpiar($_POST['tem']);
            $humendad = Limpiar($_POST['humendad']);
            $stem = Limpiar($_POST['stem']);
            $shumendad = Limpiar($_POST['shumendad']);
            $lum = Limpiar($_POST['luz']);
            $co2 = Limpiar($_POST['co2']);
            $altura = Limpiar($_POST['altura']);

            $insert = $this->model->insertarMonitoreo($id_cultivo, $tem, $humendad, $stem, $shumendad, $lum, $co2, $altura);
            echo 'adios';
            return $insert;
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
            $response = array();

            $response['number1'] = 8;
            $response['number2'] = 10;

            echo json_encode($response);

            die();   
        }

    }
?>