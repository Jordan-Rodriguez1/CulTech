<?php
    class Control extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url());
            }
            parent::__construct();
        }
        
        public function Configuracion()
        {
            $this->views->getView($this, "Configuracion");
        }

        public function Placas()
        {
            $this->views->getView($this, "Placas");
        }

        public function Inactivas()
        {
            $this->views->getView($this, "Inactivas");
        }
    }
?>