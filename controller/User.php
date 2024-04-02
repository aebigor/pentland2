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
        // Verifica que la solicitud sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Obtén el ID del usuario a eliminar
            $userId = isset($_GET['Id']) ? $_GET['Id'] : null;
            
            // Si se proporciona un ID de usuario
            if ($userId) {
                // Instancia la clase 'users'
                $usersModel = new users();
                
                // Intenta eliminar el rol
                if ($usersModel->rolDelete($userId)) { 
                    // Redirige después de la eliminación exitosa
                    header("Location: ?c=User&a=verUsuario");
                    exit; // Importante: detener la ejecución después de la redirección
                } else {
                    // Manejar el caso en que no se encuentra el rol
                    echo "El rol no se encontró";
                }
            } else {
                // Manejar el caso en que no se proporciona un ID de usuario
                echo "ID de usuario no proporcionado";
            }
        }
    }
    }    