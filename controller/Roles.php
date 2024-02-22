<?php session_start();
require_once "models/users/rol.php";

    class Roles{
        public function main(){
            header("Location:?c=menu");
        }
        // Registrar Rol
        public function createRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/registro/header.php";
                require_once "views/registro/footer.php";
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    
                    
                    $_POST['nombre'],
                    $_POST['apellidos'],
                    $_POST['correo'],
                    $_POST['passCorreo']
                    
                );
                print_r($_POST);
                print_r($rol);
                $rol->createRol();
                header("Location: ?c=Inicio&a=validarr");
            }
        }

        public function validar(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/inicio-secion/header.php";
                require_once "views/inicio-secion/footer.php";
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol= new rol();
                
                $correo = $_POST['correo']; // Suponiendo que el correo electrónico se envía por POST
                $passCorreo = $_POST['passCorreo']; // Suponiendo que la contraseña se envía por POST
                $resultadoValidacion = $rol->validar($correo, $passCorreo);
                echo($passCorreo);

            }
        }
        public function createRolVendedor(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/registroV/header.php";
                require_once "views/registroV/footer.php";
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    null,
                    $_POST['code'],
                    $_POST['nombre'],
                    $_POST['apellido'],
                    $_POST['usuario'],
                    $_POST['password']
                    
                );                
                $rol->rolCreate();
                header("Location: Menu.php");
            }
        }
        public function createRolAdministrador(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/registro/header.php";
                require_once "views/registro/footer.php";
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Rol(
                    null,
                    $_POST['code'],
                    $_POST['nombre'],
                    $_POST['apellido'],
                    $_POST['usuario'],
                    $_POST['password']
                    
                );                
                $rol->rolCreate();
                header("Location: Menu.php");
            }
        }
        // Consultar roles
        public function readRol(){
            $roles = new Rol;
            $roles = $roles->rolRead();
            require_once "views/menu/header.php";
            require_once "views/menu/categori.php";
            require_once "views/menu/footer.php";            
        }
        // Actualizar Rol
        public function updateRol(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // 1ra Parte: Obtener el registro
                $rol = new Rol;
                $rol = $rol->getRolById($_GET['idRol']);
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/mod01_users/rol_update.view.php";                
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // 2da Parte: Actualizar el registro
                $rol = new Rol(
                    $_POST['rolCode'],
                    $_POST['rolName']
                );
                print_r($rol);
                $rol->rolUpdate();
                header("Location:?c=Roles&a=readRol");
            }
        }
        // Eliminar Rol
        public function deleteRol(){
            $rol = new Rol;
            // $rol->rolDelete("3");
        }

    }

?>