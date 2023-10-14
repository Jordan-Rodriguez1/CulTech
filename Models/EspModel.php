<?php
    class EspModel extends Mysql{
    
        public function __construct()
        {
            parent::__construct();
        }

        //Registra una nuevo placa
        public function BuscarCultivo(string $id_placa)
        {
            $return = "";
            $this->id_placa = $id_placa;
            $sql = "SELECT * FROM cultivos WHERE id_placa = '{$this->id_placa}' AND estado = 0";
            $result = $this->selecT($sql);
            return $result;
        }

        //Registra una nuevo placa
        public function insertarMonitoreo(string $id_cultivo, string $tem, string $humendad, string $stem, string $shumendad, string $lum, string $co2, string $altura)
        {
            $return = "";
            $this->id_cultivo = $id_cultivo;
            $this->tem = $tem;
            $this->humendad = $humendad;
            $this->stem = $stem;
            $this->shumendad = $shumendad;
            $this->lum = $lum;
            $this->co2 = $co2;
            $this->altura = $altura;
            $query = "INSERT INTO monitoreo(id_cultivo, tem, humendad, stem, shumendad, lum, co2, altura) VALUES (?,?,?,?,?,?,?,?)";
            $data = array($this->id_cultivo, $this->tem, $this->humendad, $this->stem, $this->shumendad, $this->lum, $this->co2, $this->altura);
            $resul = $this->insert($query, $data);
            return $resul;
        }

        //Registra una nueva acción
        public function insertarAcciones(string $id_cultivo, string $tem, string $humendad)
        {
            $return = "";
            $this->id_cultivo = $id_cultivo;
            $this->tem = $tem;
            $this->humendad = $humendad;
            $query = "INSERT INTO monitoreo(id_cultivo, tem, humendaa) VALUES (?,?,?)";
            $data = array($this->id_cultivo, $this->tem, $this->humendad);
            $resul = $this->insert($query, $data);
            return $return;
        }

        //Registra una nueva notificación
        public function insertarNotificaciones(string $id_cultivo, string $tem, string $humendad)
        {
            $return = "";
            $this->id_cultivo = $id_cultivo;
            $this->tem = $tem;
            $this->humendad = $humendad;
            $query = "INSERT INTO monitoreo(id_cultivo, tem, humendaa) VALUES (?,?,?)";
            $data = array($this->id_cultivo, $this->tem, $this->humendad);
            $resul = $this->insert($query, $data);
            return $return;
        }

        //CAMBIA EL ESTADO DE ALERTA DE UN CULTIVO
        public function CultivoAlerta(int $id, int $estado)
        {
            $return = "";
            $this->id = $id;
            $this->estado = $estado;
            $query = "UPDATE cultivos SET alerta = ? WHERE id=?";
            $data = array($this->estado, $this->id);
            $resul = $this->update($query, $data);
            $return = $resul;
            return $return;
        }
    
    }
?>