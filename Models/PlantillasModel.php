<?php
    class PlantillasModel extends Mysql{
        public $id, $nombre, $tem_max, $tem_min, $humedad_max, $humedad_min, $stem_max, $stem_min, $shumedad_max, $shumedad_min, $altura, $dias, $id_usuario, $nombre_nuevo;
        public function __construct()
        {
            parent::__construct();
        }
    
        /*--------------------------------------------------------- 
        --------------MODELOS COMPARTIDOS  ------------------------
        ----------------------------------------------------------*/

        //SELECCIONA LOS DATOS DE UNA PLACA
        public function datosplantilla(int $id)
        {
            $this->id = $id;
            $this->user = $_SESSION['id'];
            $sql = "SELECT * FROM plantillas WHERE id = '{$this->id}' AND id_usuario = '{$this->user}'";
            $res = $this->select($sql);
            return $res;
        }

        //CAMBIA EL ESTADO DE UNA PLACA
        public function EstadoPlantilla(int $id, int $estado)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE plantillas SET estado = ? WHERE id=?";
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }
    
        /*--------------------------------------------------------- 
        --------------MODELOS VISTAS PLACA ------------------
        ----------------------------------------------------------*/

        //SELECCIONA PLACAS ACTIVAS
        public function plantillasactivas()
        {
            $this->user = $_SESSION['id'];
            $sql = "SELECT * FROM plantillas WHERE estado = 0 AND id_usuario = '{$this->user}'";
            $res = $this->select_all($sql);
            return $res;
        }

        //SELECCIONA PLACAS ACTIVAS
        public function contarplantillas()
        {
            $sql = "SELECT COUNT(*) AS total FROM plantillas";
            $res = $this->select($sql);
            return $res;
        }

        //Registra una nueva plantilla
        public function insertarPlantilla(string $nombre, string $tem_max, string $tem_min, string $humedad_max, string $humedad_min, string $stem_max, string $stem_min, string $shumedad_max, string $shumedad_min, string $altura, string $dias, string $usuario, string $nombre_nuevo)
        {
            $return = "";
            $this->nombre = $nombre;
            $this->tem_max = $tem_max;
            $this->tem_min = $tem_min;
            $this->humedad_max = $humedad_max;
            $this->humedad_min = $humedad_min;
            $this->stem_max = $stem_max;
            $this->stem_min = $stem_min;
            $this->shumedad_max = $shumedad_max;
            $this->shumedad_min = $shumedad_min;
            $this->altura = $altura;
            $this->dias = $dias;
            $this->usuario = $usuario;
            $this->nombre_nuevo = $nombre_nuevo;
            $query = "INSERT INTO plantillas(nombre, tem_max, tem_min, humedad_max, humedad_min, stem_max, stem_min, shumedad_max, shumedad_min, altura, dias, id_usuario, foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($this->nombre, $this->tem_max, $this->tem_min, $this->humedad_max, $this->humedad_min, $this->stem_max, $this->stem_min, $this->shumedad_max, $this->shumedad_min, $this->altura, $this->dias, $this->usuario, $this->nombre_nuevo);
            $resul = $this->insert($query, $data);
            $return = "registrado";
            return $return;
        }

        //EDITAR UNA PLACA
        public function EditarPlaca(string $nombre, string $key, string $id)
        {
            $return = "";
            $this->nombre = $nombre;
            $this->key = $key;
            $this->id = $id;
            $sql = "SELECT * FROM placas WHERE id_placa = '{$this->key}'";
            $result = $this->selecT($sql);
            if (empty($result)) {
                $query = "UPDATE placas SET nombre = ?, id_placa = ? WHERE id=?";
                $data = array($this->nombre, $this->key, $this->id);
                $resul = $this->update($query, $data);
                $return = "registrado";
            }else {
                $return = "existe";
            }
            return $return;
        }

        /*--------------------------------------------------------- 
        --------------MODELOS VISTAS INACTIVAS -------------------
        ----------------------------------------------------------*/

        //SELECCIONA PLACAS ACTIVAS
        public function plantillasInactivas()
        {
            $this->user = $_SESSION['id'];
            $sql = "SELECT * FROM plantillas WHERE estado = 1 AND id_usuario = '{$this->user}'";
            $res = $this->select_all($sql);
            return $res;
        }
    
    }
?>