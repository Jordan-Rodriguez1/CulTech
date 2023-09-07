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
        
        public function Lista()
        {
            $this->views->getView($this, "Lista");
        }

        public function Inactivos()
        {
            $this->views->getView($this, "Inactivos");
        }

        public function Detalle()
        {
            $this->views->getView($this, "Detalle");
        }
    }
?>