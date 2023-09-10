<?php
    class Esp extends Controllers{
        public function __construct()
        {
        session_start();
            if (!empty($_SESSION['activo'])) {
                header("location: " . base_url()."Dashboard/Inicio");
            }
            parent::__construct();
        }
        

    }
?>