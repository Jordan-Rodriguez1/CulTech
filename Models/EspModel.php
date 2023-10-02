<?php
    class EspnModel extends Mysql{
    
        public function __construct()
        {
            parent::__construct();
        }

        //Registra una nuevo placa
        public function RegistroDatos(string $nombre, string $key, string $usuario)
        {
            $return = "";
            $this->nombre = $nombre;
            $this->key = $key;
            $this->usuario = $usuario;
            $sql = "SELECT * FROM placas WHERE id_placa = '{$this->key}'";
            $result = $this->selecT($sql);
            if (empty($result)) {
                $query = "INSERT INTO placas(nombre, id_placa, id_usuario) VALUES (?,?,?)";
                $data = array($this->nombre, $this->key, $this->usuario);
                $resul = $this->insert($query, $data);
                $return = "registrado";
            }else {
                $return = "existe";
            }
            return $return;
        }

        //Registra una nuevo placa
        public function insertarPlaca(string $nombre, string $key, string $usuario)
        {
            $return = "";
            $this->nombre = $nombre;
            $this->key = $key;
            $this->usuario = $usuario;
            $sql = "SELECT * FROM placas WHERE id_placa = '{$this->key}'";
            $result = $this->selecT($sql);
            if (empty($result)) {
                $query = "INSERT INTO placas(nombre, id_placa, id_usuario) VALUES (?,?,?)";
                $data = array($this->nombre, $this->key, $this->usuario);
                $resul = $this->insert($query, $data);
                $return = "registrado";
            }else {
                $return = "existe";
            }
            return $return;
        }
    
    }
?>