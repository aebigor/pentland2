<?php session_start();

require_once "models/users/usuario.php";

    class Inicio{

        // inicioar Rol
        public function validar(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/inicio-secion/header.php";
                require_once "views/inicio-secion/footer.php";
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol= new usuario(
                    
                
                    $_POST['correo'],
                    $_POST['passCorreo']
                    
                );
                print_r($_POST);
                print_r($rol);
                $rol->validarUsuario();
                header("Location: ?c=Roles");
            }
        }
    }
    
?>