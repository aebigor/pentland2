<?php session_start();
require_once "models/users/validar.php";

    class inicio{
        public function main(){
            #header("Location:?c=menu");
         }
        // inicioar Rol
        public function validarr(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/inicio secion/header.php";
                require_once "views/inicio secion/footer.php";
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    
                
                    $_POST['correo'],
                    $_POST['passCorreo']
                    
                );
                print_r($_POST);
                print_r($rol);
                $rol->validar();
                #header("Location: ?c=Roles");
            }
        }
    }
    
?>