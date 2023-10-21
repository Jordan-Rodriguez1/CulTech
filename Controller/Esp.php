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
            $id_placa = Limpiar($_POST['id_placa']);
            echo $id_placa;
            //Obtenemos el id del cultivo que tiene asignada esa placa.
            $data = $this->model->BuscarCultivo($id_placa);
            $id_usuario = $data['id_usuario']
            $id_cultivo = $data['id'];
            $tem = Limpiar($_POST['tem']);
            $humendad = Limpiar($_POST['humendad']);
            $stem = Limpiar($_POST['stem']);
            $shumendad = Limpiar($_POST['shumendad']);
            $lum = Limpiar($_POST['luz']);
            $co2 = Limpiar($_POST['co2']);
            $altura = Limpiar($_POST['altura']);

            $insert = $this->model->insertarMonitoreo($id_cultivo, $tem, $humendad, $stem, $shumendad, $lum, $co2, $altura);

            //En esta parte analiza los datos y en base a ello determinamos un código.
            //Primero trae la información de configuración.
            $config = $this->model->CultivoConfiguracion($id_cultivo);
            //Traigo los los datos del usuario en base al id cultivo
            $usuario = $this->model->DatosUsuario($id_usuario);

            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX.
            $airet = EvaluarMinMax($tem, $config['tem_min'], $config['tem_max']);
            //SI APLICA MANDAMOS LA NOTIFICACIÓN Y EL CORREO
            if ($airet != 0) {
                $this->model->insertarNotificaciones($id_usuario, $airet['descripcion'], $airet['relevancia']);
                if ($airet['relevancia'] == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = "<p>$descripcion</p><br>";
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                    $alerta = 2;
                } else {
                    $alerta = 1;
                }
            } else {
                $alerta = 0;
            }
            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX

            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MAX.
            $co2 = EvaluarMax($co2, $config['co2_max']);
            //ASIGNAMOS LOS DATOS SEGUN EL CODIGO
            switch ($airet) {
                case 2001:
                    $descripcion = '';
                    $relevancia = 1;
                    break;
                //...
                default:
                    break;
            }
            if ($airet != 0) {
                $this->model->insertarNotificaciones($id_usuario, $descripcion, $relevancia);
                if ($relevancia == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = "<p>$descripcion</p><br>";
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                }
            }
            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MAX

            //En esta parte revisa el array y determina cual es la relevancia máxima del cultivo y pone el cultivo en esa alerta.
                $alerta = 0;
                $cultivo = $this->model->CultivoAlerta($id_cultivo, $alerta);

            die();   
        }
//----------------------
        //INGRESA ALERTAS DE ACCIONES
        public function Acciones()
        {
            $id_placa = Limpiar($_POST['id_placa']);
            //Obtenemos el id del cultivo que tiene asignada esa placa.
            $data = $this->model->BuscarCultivo($id_placa); 
            $id_cultivo = $data['id'];

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