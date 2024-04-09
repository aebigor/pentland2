<?php 
require_once "models/users/rol.php";
require_once "models/users/user.php";



    class Roles{
        public function main(){
            header("Location:?c=menu");
          }
        public function mostrarFormularioRol(){

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/rol/header.php";
                require_once "views/rol/encabezado.php";
            }

        }


        // Registrar Rol  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Verificar si se recibieron los datos necesarios del formulario
            public function createRolUsuario(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once "views/usuario/registro/header.php";
                    require_once "views/usuario/registro/footer.php";
                    require_once "views/usuario/registro/encabezado.php";
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
                    // print_r($_POST);
                    // // Mostrar datos de la instancia de Rol para verificar
                    // print_r($rol);
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
            public function createRolUsuarioA(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                            
                    require_once "views/administrador/menu/header.php";
                    // require_once "views/administrador/menu/categori.php";
                    require_once "views/administrador/menu/footer.php";
                    require_once "views/usuario/registro/header.php";
                    require_once "views/usuario/registro/footer.php";
                    require_once "views/usuario/registro/encabezado.php";
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
                    // print_r($_POST);
                    // // Mostrar datos de la instancia de Rol para verificar
                    // print_r($rol);
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
                    require_once "views/vendedor/registroV/encabezado.php";
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
                    // // Mostrar datos recibidos para verificar
                    // print_r($_POST);
                    // // Mostrar datos de la instancia de Rol para verificar
                    // print_r($rol);
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
            public function createRolVendedorA(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    
                    require_once "views/administrador/menu/header.php";
                    // require_once "views/administrador/menu/categori.php";
                    require_once "views/administrador/menu/footer.php";
                    require_once "views/vendedor/registroV/header.php";
                    require_once "views/vendedor/registroV/footer.php";
                    require_once "views/vendedor/registroV/encabezado.php";
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
                    // // Mostrar datos recibidos para verificar
                    // print_r($_POST);
                    // // Mostrar datos de la instancia de Rol para verificar
                    // print_r($rol);
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
                require_once "views/inicio-secion/encabezado.php";
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
        
        
        public function createRolAdmin(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/administrador/registro/header.php";
                require_once "views/administrador/registro/footer.php";
                require_once "views/administrador/registro/encabezado.php";
            }
            
            
            if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
                $usuario = 'Admin'; // Asigna el rol de usuario automáticamente
                $rol = new Rol(
                    $_POST['nombre'],
                    $_POST['apellidos'],
                    $_POST['correo'],
                    $_POST['passCorreo'],
                    $_POST['usuario'] = $usuario
                );
            // // Mostrar datos recibidos para verificar
            // print_r($_POST);
            // // Mostrar datos de la instancia de Rol para verificar
            // print_r($rol);
            // Intentar crear el rol en la base de datos
            try {
                $rol->createRol();
                 header("Location: ?c=Roles&a=validar");
            } catch (Exception $e) {
                echo "Error al crear el rol: " . $e->getMessage();
            }
        }
    }
    public function createRolAdminA(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            require_once "views/administrador/menu/header.php";
            // require_once "views/administrador/menu/categori.php";
            require_once "views/administrador/menu/footer.php";
            require_once "views/administrador/registro/header.php";
            require_once "views/administrador/registro/footer.php";
            require_once "views/administrador/registro/encabezado.php";
        }
        
        
        if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'])) {
            $usuario = 'Admin'; // Asigna el rol de usuario automáticamente
            $rol = new Rol(
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['correo'],
                $_POST['passCorreo'],
                $_POST['usuario'] = $usuario
            );
        // // Mostrar datos recibidos para verificar
        // print_r($_POST);
        // // Mostrar datos de la instancia de Rol para verificar
        // print_r($rol);
        // Intentar crear el rol en la base de datos
        try {
            $rol->createRol();
             header("Location: ?c=Roles&a=validar");
        } catch (Exception $e) {
            echo "Error al crear el rol: " . $e->getMessage();
        }
    }
}
    public function createProduct() {
        session_start();
        $errors = array(); // Array para almacenar errores
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/vendedor/menu/header.php";
            require_once "views/vendedor/menu/categori.php";
            require_once "views/vendedor/menu/footer.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nombreP'], $_POST['descripcion'], $_POST['precio'], $_POST['cantidad'], $_FILES['imagen']['name'])) {
                // Validar la imagen
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    
                if (!in_array($extension, $allowedExtensions)) {
                    $errors['imagen'] = 'La imagen debe tener una extensión válida.';
                }
    
                // Validaciones adicionales para otros campos requeridos
                if (empty($_POST['categoria'])) {
                    $errors['categoria'] = 'Por favor, selecciona una categoría.';
                }
    
                if (empty($_POST['nombreP']) || empty($_POST['descripcion']) || empty($_POST['precio']) || empty($_POST['cantidad'])) {
                    $errors['otros'] = 'Por favor, completa todos los campos necesarios.';
                }
    
                // Si no hay errores, procedemos con la subida de la imagen y la creación del producto
                if (empty($errors)) {
                    $imagenNombre = uniqid() . '.' . $extension; // Generar un nombre único para la imagen
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($imagenNombre);
    
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                        // Inicializar el objeto Rol con los datos
                        $rol = new Rol(
                            $_POST['nombreP'],
                            $_POST['descripcion'],
                            $_POST['precio'],
                            $_POST['cantidad'],
                            $_POST['categoria']
                        );
    
                        try {
                            // Llamar a createProductos y pasar la imagen como argumento
                            $rol->createProductos($imagenNombre);
                            echo '<p>Producto creado con éxito.</p>';
                            header("Location: ?c=menuV"); // Redirigir al controlador deseado
                        } catch (Exception $e) {
                            $errors['db'] = "Error al crear el producto: " . $e->getMessage();
                        }
                    } else {
                        $errors['imagen'] = 'Error al subir la imagen.';
                    }
                }
            } else {
                echo "Por favor, complete todos los campos del formulario.";
            }
        }
    
        // Mostrar errores si los hay
        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                echo "<p>Error ($key): $error</p>";
            }
        }
    }

    public function createProductA() {
        session_start();
        $errors = array(); // Array para almacenar errores
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/administrador/menu/header.php";
            require_once "views/vendedor/menu/categori.php";
            require_once "views/vendedor/menu/footer.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['nombreP'], $_POST['descripcion'], $_POST['precio'], $_POST['cantidad'], $_FILES['imagen']['name'])) {
                // Validar la imagen
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    
                if (!in_array($extension, $allowedExtensions)) {
                    $errors['imagen'] = 'La imagen debe tener una extensión válida.';
                }
    
                // Validaciones adicionales para otros campos requeridos
                if (empty($_POST['categoria'])) {
                    $errors['categoria'] = 'Por favor, selecciona una categoría.';
                }
    
                if (empty($_POST['nombreP']) || empty($_POST['descripcion']) || empty($_POST['precio']) || empty($_POST['cantidad'])) {
                    $errors['otros'] = 'Por favor, completa todos los campos necesarios.';
                }
    
                // Si no hay errores, procedemos con la subida de la imagen y la creación del producto
                if (empty($errors)) {
                    $imagenNombre = uniqid() . '.' . $extension; // Generar un nombre único para la imagen
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($imagenNombre);
    
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                        // Inicializar el objeto Rol con los datos
                        $rol = new Rol(
                            $_POST['nombreP'],
                            $_POST['descripcion'],
                            $_POST['precio'],
                            $_POST['cantidad'],
                            $_POST['categoria']
                        );
    
                        try {
                            // Llamar a createProductos y pasar la imagen como argumento
                            $rol->createProductos($imagenNombre);
                            echo '<p>Producto creado con éxito.</p>';
                            header("Location: ?c=menuA"); // Redirigir al controlador deseado
                        } catch (Exception $e) {
                            $errors['db'] = "Error al crear el producto: " . $e->getMessage();
                        }
                    } else {
                        $errors['imagen'] = 'Error al subir la imagen.';
                    }
                }
            } else {
                echo "Por favor, complete todos los campos del formulario.";
            }
        }
    
        // Mostrar errores si los hay
        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                echo "<p>Error ($key): $error</p>";
            }
        }
    }
    // public function mostrarMenu() {
    //     $producto = new producto();
    //     $productos = $producto->fetchAllProductos();
    
    //     require_once 'views/menu/header.php'; // Include header view
    //     require_once 'views/menu/categori.php'; // Include categori view
    //     require_once 'views/menu/footer.php';
        
    //     require_once "models/users/producto.php";// Include footer view
    
    //     // Pass data to views using variables (explained later)
    //   }
    
    
        
    

}


        
?>