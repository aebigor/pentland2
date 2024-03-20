<?php
    class menuA{
        public function __construct(){}
        public function main(){
            
            require_once "views/administrador/menu/header.php";
            // require_once "views/administrador/menu/categori.php";
            require_once "views/administrador/menu/footer.php";
        }

        public  function cerrarSecion(){
            session_start();
            session_destroy();
            header("Location: ?c=menu ");
        }
    }
?>