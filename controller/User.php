<?php 

require_once "models/users/user.php";

    class User{
        public function main(){
            header("Location:?c=menu");
          }
          public function verProduct() {
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $users = new users;
                $User = $users->productRead(); // Aquí asignamos los datos a la variable $roles
                require_once "views/vendedor/menu/header.php";
                require_once "views/vendedor/menu/ver.php";
                require_once "views/vendedor/menu/footer.php";
            } 
        }
        
    
    public function verProductA() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $users = new users;
            $User = $users->productRead(); // Aquí asignamos los datos a la variable $roles
            require_once "views/administrador/menu/header.php";
            require_once "views/vendedor/menu/ver.php";
            require_once "views/vendedor/menu/footer.php";
        } 
    }
    public function verUsuario() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $users = new users;
            $User = $users->usuarioRead(); // Aquí asignamos los datos a la variable $roles
            require_once "views/administrador/menu/header.php";
            require_once "views/administrador/menu/ver.php";
            require_once "views/administrador/menu/footer.php";
        } 
    }
    public function deleteRol(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $users = isset($_GET['Id']) ? $_GET['Id'] : null;
           
    
            if ($users) {
                $users = new users();
                $users = $users->rolDelete($_GET['Id']);
                header("Location:?c=User&a=verUsuario");
    
                if ($users) { 
                    $users = new users();
                    $users->rolDelete($_GET['Id']);
                    header("Location:?c=User&a=verUsuario");
                } else {
                    // Manejar el caso en que no se encuentra el rol
                    echo "El rol no se encontró";
                }
            } else {
                // Manejar el caso en que no se proporciona un código de rol
                echo "Código de rol no proporcionado";
            }
        }
    }
        }