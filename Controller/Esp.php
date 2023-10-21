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
            $id_usuario = $data['id_usuario'];
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

            $alerta = array();
            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX.
            $nombre = 'TEMPERATURA DEL AMBIENTE';
            $airet = EvaluarMinMax($tem, $config['tem_min'], $config['tem_max'], $nombre);
            //SI APLICA MANDAMOS LA NOTIFICACIÓN Y EL CORREO
            if ($airet['codigo'] != 0) {
                $this->model->insertarNotificaciones($id_usuario, $airet['descripcion'], $airet['relevancia']);
                if ($airet['relevancia'] == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = '<p>'.$airet['descripcion'].'</p><br>';
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                    $alerta[] = 2;
                } else {
                    $alerta[] = 1;
                }
            } else {
                $alerta[] = 0;
            }
            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX
            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX.
            $nombre = 'HUMEDAD DEL AMBIENTE';
            $aireh = EvaluarMinMax($tem, $config['tem_min'], $config['tem_max'], $nombre);
            //SI APLICA MANDAMOS LA NOTIFICACIÓN Y EL CORREO
            if ($aireh['codigo'] != 0) {
                $this->model->insertarNotificaciones($id_usuario, $aireh['descripcion'], $aireh['relevancia']);
                if ($aireh['relevancia'] == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = '<p>'.$aireh['descripcion'].'</p><br>';
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                    $alerta[] = 2;
                } else {
                    $alerta[] = 1;
                }
            } else {
                $alerta[] = 0;
            }
            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX
            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX.
            $nombre = 'TEMPERATURA DEL SUELO';
            $suelot = EvaluarMinMax($tem, $config['tem_min'], $config['tem_max'], $nombre);
            //SI APLICA MANDAMOS LA NOTIFICACIÓN Y EL CORREO
            if ($suelot['codigo'] != 0) {
                $this->model->insertarNotificaciones($id_usuario, $suelot['descripcion'], $suelot['relevancia']);
                if ($suelot['relevancia'] == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = '<p>'.$suelot['descripcion'].'</p><br>';
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                    $alerta[] = 2;
                } else {
                    $alerta[] = 1;
                }
            } else {
                $alerta[] = 0;
            }
            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX
            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX.
            $nombre = 'HUMEDAD DEL SUELO';
            $sueloh = EvaluarMinMax($tem, $config['tem_min'], $config['tem_max'], $nombre);
            //SI APLICA MANDAMOS LA NOTIFICACIÓN Y EL CORREO
            if ($sueloh['codigo'] != 0) {
                $this->model->insertarNotificaciones($id_usuario, $sueloh['descripcion'], $sueloh['relevancia']);
                if ($sueloh['relevancia'] == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = '<p>'.$sueloh['descripcion'].'</p><br>';
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                    $alerta[] = 2;
                } else {
                    $alerta[] = 1;
                }
            } else {
                $alerta[] = 0;
            }
            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MIN-MAX

            //---AQUI EMPIEZA LA EVALUACIÓN DE LA VARIABLE CON MAX.
            $nombre = 'NIVELES DE CO2';
            $co2 = EvaluarMax($co2, $config['co2_max'], $nombre);
            //ASIGNAMOS LOS DATOS SEGUN EL CODIGO
            if ($co2['codigo'] != 0) {
                $this->model->insertarNotificaciones($id_usuario, $co2['descripcion'], $co2['relevancia']);
                if ($co2['relevancia'] == 3) {
                    $asunto = 'ALERTA CULTIVO '.$nombre;
                    $cuerpo = '<p>'.$co2['descripcion'].'</p><br>';
                    EnviarCorreo($usuario['correo'], $usuario['nombre'], $asunto, $cuerpo);
                    $alerta[] = 2;
                } else {
                    $alerta[] = 1;
                }
            } else {
                $alerta[] = 0;
            }

            //-------AQUÍ TERMINA LA EVALUACIÓN DE LA VARIABLE CON MAX

            //En esta parte revisa el array y determina cual es la relevancia máxima del cultivo y pone el cultivo en esa alerta.
            $MayorAlerta = max($alerta);
            $this->model->CultivoAlerta($id_cultivo, $MayorAlerta);
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