<?php
    class Dashboard extends Controllers{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url());
            }
            parent::__construct();
        }
        
        public function Inicio()
        {
            $this->views->getView($this, "Inicio");
        }

        public function Notificaciones()
        {
            $this->views->getView($this, "Notificaciones");
        }
    }
?>