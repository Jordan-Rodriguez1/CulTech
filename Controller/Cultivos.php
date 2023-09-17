<?php
    class Cultivos extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url());
            }
            parent::__construct();
        }
        
        //VISTA DE CULTIVOS ACTIVOS
        public function Lista()
        {
            $data1 = $this->model->CultivosActivos();
            $data2 = $this->model->PlantillasDisponibles();
            $data3 = $this->model->PlacasDisponibles();
            $this->views->getView($this, "Lista", '', $data1, $data2, $data3);
        }

        //VISTA CULTIVOS INACTIVOS
        public function Inactivos()
        {
            $data1 = $this->model->CultivosInactivos();
            $this->views->getView($this, "Inactivos", '', $data1);
        }

        //VISTA DE ULTIMAS MEDICIONES
        public function Monitoreo()
        {
            $this->views->getView($this, "Monitoreo");
        }

        //VISTA DE DETALLE DE PLANTILLAS
        public function DetalleP()
        {
            if (!isset($_GET['id'])) {
                header("location: " . base_url() . "Plantillas/Lista");
            } else {
                $id = Limpiar($_GET['id']);
                $data1 = $this->model->datosplantilla($id);
                if ($data1 == null) {
                    header("location: " . base_url() . "Plantillas/Lista");    
                } else {
                    $this->views->getView($this, "Detalle", '', $data1);
                }
                die();
            }
        }

        //VISTA DE MONITOREO HISTÓRICO
        public function Detalle()
        {
            $this->views->getView($this, "Detalle");
        }

        //VISTA PARA CAMBIAR LA CONFIGURACIÓN
        public function Configuracion()
        {
            $this->views->getView($this, "Configuracion");
        }

        /*--------------------------------------------------------- 
        ----- CONTROLADORES VISTAS CULTIVOS AVTIVOS --------------
        ----------------------------------------------------------*/

        //INGRESA UNA NUEVA PLANTILLA
        public function RegistroCultivo()
        {
            $nombre = Limpiar($_POST['nombre']);
            //DATOS PLACA
            $placa = Limpiar($_POST['placa']);
            //ACTUALIZA EL USO DE LA PLACA
            $estado = 1;
            $this->model->UsoPlaca($placa, $estado);
            //DATOS PLANTILLA
            $plantilla = Limpiar($_POST['plantilla']);
            //SELECCIONA LOS DATOS DE LA PLANTILLA
            $datos = $this->model->DatosPlantilla($plantilla);
            //PASA LOS DATOS DE LA PLANTILLA A CONFIG
            $tem_max = $datos['tem_max'];
            $tem_min = $datos['tem_min'];
            $humedad_max = $datos['humedad_max'];
            $humedad_min = $datos['humedad_min'];
            $stem_max = $datos['stem_max'];
            $stem_min = $datos['stem_min'];
            $shumedad_max = $datos['shumedad_max'];
            $shumedad_min = $datos['shumedad_min'];
            $altura = $datos['altura'];
            $dias = $datos['dias'];
            //DATOS FOTO PLANTILLA
            $noregistro = $this->model->contarCultivos();
            $noregistro = $noregistro['total']+1;
            // Ruta del archivo original
            $archivoOriginal = 'Assets/img/cultivos/plantillas/'.$datos['foto'];
            // Ruta de la carpeta de destino
            $carpetaDestino = 'Assets/img/cultivos/monitoreo/';
            // Separar el nombre del archivo en partes usando el punto como delimitador
            $partes = explode(".", $datos['foto']);
            $extension = $partes[1];
            // Nuevo nombre para el archivo 
            $nuevoNombre = $noregistro.'.'.$extension;
            // Combinar la ruta de la carpeta de destino con el nuevo nombre
            $rutaDestinoCompleta = $carpetaDestino.$nuevoNombre;
            // Copiar el archivo a la carpeta de destino con el nuevo nombre
            copy($archivoOriginal, $rutaDestinoCompleta);
            //INSERTA DATOS AL CULTIVO
            $agregar = $this->model->insertarCultivo($nombre, $placa);
            //INSERTA LA CONFIGURACIÓN
            $insert = $this->model->insertarConfiguracion($tem_max, $tem_min, $humedad_max, $humedad_min, $stem_max, $stem_min, $shumedad_max, $shumedad_min, $altura, $dias, $noregistro, $nuevoNombre);
            if ($insert == 'registrado') {
                $alert = 'registrado';
            } else {
                $alert = 'error';
            }
            header("location: " . base_url() . "Cultivos/Lista?msg=$alert");
            die();   
        }

        //CAMBIA DE ESTADO UNA PLANTILLA
        public function InactivarCultivo()
        {
            $id = Limpiar($_GET['id']);
            $estado = 1;
            $insert = $this->model->EstadoCultivo($id, $estado);
            $alert = 'inactivo';
            header("location: " . base_url() . "Cultivos/Lista?msg=$alert");
            die();   
        }

        /*--------------------------------------------------------- 
        ----------CONTROLADORES VISTAS INACTIVAS -----------------
        ----------------------------------------------------------*/

        //CAMBIA DE ESTADO UNA PLANTILLA
        public function ActivarPlantilla()
        {
            $id = Limpiar($_GET['id']);
            $estado = 0;
            $insert = $this->model->EstadoPlantilla($id, $estado);
            $alert = 'reactivo';
            header("location: " . base_url() . "Plantillas/Inactivas?msg=$alert");
            die();   
        }

        //CAMBIA DE ESTADO UNA PLANTILLA
        public function EliminarPlantilla()
        {
            $id = Limpiar($_GET['id']);
            $estado = 2;
            $insert = $this->model->EstadoPlantilla($id, $estado);
            $alert = 'eliminado';
            header("location: " . base_url() . "Plantillas/Inactivas?msg=$alert");
            die();   
        }


        /*--------------------------------------------------------- 
        --------------CONTROLADORES VISTAS DETALLE ----------------
        ----------------------------------------------------------*/

        //EDITAR UNA PLANTILLA
        public function ActualizarPlantilla()
        {
            $nombre = Limpiar($_POST['nombre']);
            $tem_max = Limpiar($_POST['tem_max']);
            $tem_min = Limpiar($_POST['tem_min']);
            $humedad_max = Limpiar($_POST['humedad_max']);
            $humedad_min = Limpiar($_POST['humedad_min']);
            $stem_max = Limpiar($_POST['stem_max']);
            $stem_min = Limpiar($_POST['stem_min']);
            $shumedad_max = Limpiar($_POST['shumedad_max']);
            $shumedad_min = Limpiar($_POST['shumedad_min']);
            $altura = Limpiar($_POST['altura']);
            $dias = Limpiar($_POST['dias']);
            $id = Limpiar($_POST['id']);
            $insert = $this->model->EditarPlantilla($nombre, $tem_max, $tem_min, $humedad_max, $humedad_min, $stem_max, $stem_min, $shumedad_max, $shumedad_min, $altura, $dias, $id);
            if ($insert > 0) {
                $alert = 'editado';
            } else {
                $alert = 'error';
            }
            header("location: " . base_url() . "Plantillas/Detalle?id=$id&msg=$alert");
            die();   
        }

        //Cambiar Imagen Perfil
        public function ImagenPlantilla()
        {
            $id = Limpiar($_POST['id']);
            $data1 = $this->model->datosplantilla($id);
            $imgactual = $data1['foto'];
            $name = pathinfo($_FILES["archivo"]["name"]);
            $nombre_archivo = $_FILES["archivo"]["name"];
            $nombre_nuevo = $id.".".$name["extension"];
            $tipo_archivo = $_FILES["archivo"]["type"];
            $tamano_archivo = $_FILES["archivo"]["size"];
            $ruta_temporal = $_FILES["archivo"]["tmp_name"];
            $error_archivo = $_FILES["archivo"]["error"];
            $tmaximo = 20 * 1024 * 1024;
            if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "png" || $name["extension"] == "jpg" || $name["extension"] == "jpeg")){
                if ($error_archivo == UPLOAD_ERR_OK) {
                    unlink("Assets/img/cultivos/".$imgactual);
                    $ruta_destino = "Assets/img/cultivos/".$nombre_nuevo;
                    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                        $this->model->EditarImgPlantilla($nombre_nuevo, $id);
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
            header('location: ' . base_url() . "Plantillas/Detalle?id=$id&msg=$alert");
            die();
        }

    }
?>