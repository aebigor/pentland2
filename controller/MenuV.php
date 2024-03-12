<?php
    class menuV{
        public function __construct(){}
        public function main(){
            
            require_once "views/vendedor/menu/header.php";
            // require_once "views/vendedor/menu/categori.php";
            require_once "views/vendedor/menu/footer.php";
        }

        public  function cerrarSecion(){
            session_start();
            session_destroy();
            header("Location: ?c=menu ");
        }
    }
?>