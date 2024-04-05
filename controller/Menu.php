<?php
require_once "models/users/producto.php";
    class menu{
        public function __construct(){}
        public function main(){
            $producto = new producto();
            $productos = $producto->fetchAllProductos();
            require_once "views/menu/header.php";
            require_once "views/menu/categori.php";
            require_once "views/menu/footer.php";
            require_once "models/users/producto.php";
        
            
        }
    }

?>