<?php 
require_once "models/users/rol.php";

    class Roles{
        public function main(){
            header("Location:?c=menu");
          }
        public function mostrarFormularioRol(){

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/rol/header.php";
            }

        }


        // Registrar Rol  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verificar si se recibieron los datos necesarios del formulario
            public function createRolUsuario(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/usuario/registro/header.php";
                    require_once "views/usuario/registro/footer.php";
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Verificar si todos los datos necesarios están presentes
                    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                        $usuario = 'Usuario'; // Asigna el rol de usuario automáticamente
                        $rol = new Rol(
                            $_POST['nombre'],
                            $_POST['apellidos'],
                            $_POST['correo'],
                            $_POST['passCorreo'],
                            $_POST['usuario'] = $usuario
                        );
                    // Mostrar datos recibidos para verificar
                    print_r($_POST);
                    // Mostrar datos de la instancia de Rol para verificar
                    print_r($rol);
                    // Intentar crear el rol en la base de datos
                    try {
                        $rol->createRol();
                         header("Location: ?c=Roles&a=validar");
                    } catch (Exception $e) {
                        echo "Error al crear el rol: " . $e->getMessage();
                    }
                } else {
                    echo "Por favor, complete todos los campos del formulario.";
                }
            }}
            public function createRolVendedor(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/vendedor/registroV/header.php";
                    require_once "views/vendedor/registroV/footer.php";
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Verificar si todos los datos necesarios están presentes
                    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                        $usuario = 'Vendedor'; // Asigna el rol de usuario automáticamente
                        $rol = new Rol(
                            $_POST['nombre'],
                            $_POST['apellidos'],
                            $_POST['correo'],
                            $_POST['passCorreo'],
                            $_POST['usuario'] = $usuario
                        );
                    // Mostrar datos recibidos para verificar
                    print_r($_POST);
                    // Mostrar datos de la instancia de Rol para verificar
                    print_r($rol);
                    // Intentar crear el rol en la base de datos
                    try {
                        $rol->createRol();
                         header("Location: ?c=Roles&a=validar");
                    } catch (Exception $e) {
                        echo "Error al crear el rol: " . $e->getMessage();
                    }
                } else {
                    echo "Por favor, complete todos los campos del formulario.";
                }
            }}
        public function validar() {
            session_start();
            // Si la solicitud es GET, simplemente cargamos la vista del formulario de inicio de sesión
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/inicio-secion/header.php";
               // Aquí deberías incluir tu formulario de inicio de sesión
                require_once "views/inicio-secion/footer.php";
            }
        
            // Si la solicitud es POST, intentamos validar el inicio de sesión
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once "models/users/rol.php"; // Incluye la clase que contiene la función validarRol
        
                $rol = new rol(); // Crea una instancia de la clase rol
        
                $correo = $_POST['correo']; // Obtén el correo electrónico enviado por POST
                $passCorreo = $_POST['passCorreo']; // Obtén la contraseña enviada por POST
        
                // Realiza la validación del rol
                $validacion_exitosa = $rol->validarRol($correo, $passCorreo);
        
                if ($validacion_exitosa) {
                    // Si la validación es exitosa, redirigimos al usuario a la página de menú
                     header("Location: ?c=menuU");
                    exit();
                } else {
                    // Si la validación falla, volvemos a mostrar el formulario de inicio de sesión con un mensaje de error
                    require_once "views/inicio-secion/header.php";
                   // Aquí deberías incluir tu formulario de inicio de sesión
                    require_once "views/inicio-secion/footer.php";
                    echo "Usuario o contraseña incorrectos"; // Puedes mostrar un mensaje de error en el formulario
                }
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
                // $rol->rolCreate();
                header("Location: Menu.php");
            }
        }

        public function createProduct() {
            session_start();
        
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/vendedor/menu/header.php";
                require_once "views/vendedor/menu/categori.php";
                require_once "views/vendedor/menu/footer.php";
            }
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Verificar si todos los datos necesarios están presentes   
                if (isset($_POST['nombreP'],$_POST['descripcion'],$_POST['precio'],$_POST['cantidad'],$_FILES['imagen'])) {
                // Validar la imagen
                if (empty($_FILES['imagen']['name'])) {
                    $errors['imagen'] = 'La imagen no se ha subido correctamente.';
                }

                $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExtensions)) {
                    $errors['imagen'] = 'La imagen debe tener una extensión válida.';
                }

                // Almacenar la imagen
                if (!isset($errors)) {
                    $imagenNombre = uniqid() . '.' . $extension;
                    $target_dir = "img/";
                    $target_file = $target_dir . $imagenNombre;

                        move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
        
                        // Crear un nuevo objeto de la clase Rol con los datos del formulario
                        $rol = new Rol(
                            $_POST['nombreP'],
                            $_POST['descripcion'],
                            $_POST['precio'],
                            $_POST['cantidad'],
                            $_POST['categoria'],
                            $imagenNombre     // Aquí asumo que querías almacenar el nombre de la imagen en la base de datos
                        );
        
                        // Mostrar mensaje de éxito
                        echo '<p>La imagen se ha subido correctamente.</p>';
        
                        // Intentar crear el producto en la base de datos
                        try {
                            $rol->createProductos(); // Aquí deberías llamar a la función que guarda el producto en la base de datos
                            header("Location: ?c=menuV"); // Redireccionar a algún lugar después de crear el producto
                            exit(); // Terminar el script para evitar la ejecución adicional de código
                        } catch (Exception $e) {
                            echo "Error al crear el producto: " . $e->getMessage();
                        }
                    } else {
                        // Mostrar errores
                        foreach ($errors as $error) {
                            echo '<p>' . $error . '</p>';
                        }
                    }
                
        
                }}}
        
    
    public function verProduct() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $roles = new Rol;
            $roles = $roles->productRead();
            require_once "views/vendedor/menu/header.php";
            require_once "views/vendedor/menu/ver.php";
            require_once "views/vendedor/menu/footer.php";
    } 
}
    // Uso del controlador
   
    
    // Suponiendo que $_POST y $_FILES contienen los datos del formulario

        // Consultar roles


}
        
?>