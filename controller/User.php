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
            require_once "views/administrador/menu/footer.php";
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
    public function deleteProducto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
    
            if ($id !== null) {
                $users = new Users();
                try {
                    if ($users->productoDeleteA($id)) {
                        // Redireccionar después de eliminar el producto
                        header("Location: ?c=User&a=verProductoA");
                        exit;
                    } else {
                        echo "El producto no se encontró";
                    }
                } catch (Exception $e) {
                    echo "Error al eliminar el producto: " . $e->getMessage();
                }
            } else {
                echo "ID de producto no proporcionado";
            }
        }
    }
    public function deleteUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
    
            if ($id !== null) {
                $users = new Users();
                try {
                    if ($users->usuarioDelete($id)) {
                        // Redireccionar después de eliminar el producto
                        header("Location: ?c=User&a=verProductoA");
                        exit;
                    } else {
                        echo "El producto no se encontró";
                    }
                } catch (Exception $e) {
                    echo "Error al eliminar el producto: " . $e->getMessage();
                }
            } else {
                echo "ID de producto no proporcionado";
            }
        }
    }
    // En el controlador

    public function editProducto() {
        // Verificar si se recibió el ID del producto a editar
        if (isset($_GET['idProducto'])) {
            // Obtener el ID del producto desde la URL
            $idProducto = $_GET['idProducto'];
            
            // Obtener los datos del producto desde el modelo (o base de datos)
            $users = new Users();
            $Producto = $users->productoReadById($idProducto); // Asegúrate de tener este método implementado
    
            // Verificar si se encontraron los datos del producto
            if ($Producto) {
                // Cargar la vista con los datos del producto
                require_once "views/administrador/menu/editarP.php";
            } else {
                // Manejar el caso donde el producto no se encontró
                echo "Producto no encontrado";
            }
        } else {
            // Manejar el caso donde no se proporcionó el ID del producto
            echo "ID de producto no proporcionado";
        }
    }
    public function updateProducto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];
            $nombreP = $_POST['nombreProducto'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $categoria = $_POST['categoria'];
            $imagen = $_FILES['imagen'];
    
            // Crear una instancia del modelo de productos
            $users = new Users();
    
            // Obtener los datos del producto para obtener el nombre de la imagen anterior (si existe)
            $productoAnterior = $users->productoReadById($idProducto);
            $imagenAnterior = $productoAnterior->getImagen();
    
            // Verificar si se está subiendo una nueva imagen
            if ($imagen['error'] !== UPLOAD_ERR_NO_FILE) {
                // Validar y guardar la nueva imagen
                $imagenNombre = uniqid() . '_' . $imagen['name'];
                $target_dir = "img/";
                $target_file = $target_dir . basename($imagenNombre);
    
                if (!move_uploaded_file($imagen['tmp_name'], $target_file)) {
                    echo "Error al subir la nueva imagen.";
                    exit;
                }
                // Eliminar la imagen anterior si existe
                if (!empty($imagenAnterior)) {
                    unlink("img/" . $imagenAnterior);
                }
            } else {
                // Si no se está subiendo una nueva imagen, conservar la imagen anterior
                $imagenNombre = $imagenAnterior;
            }
    
            // Llamar a la función productoUpdate para actualizar el producto
            if ($users->productoUpdate($idProducto, $nombreP, $descripcion, $precio, $cantidad, $categoria, $imagenNombre)) {
                // Si la actualización es exitosa, redireccionar a la página de productos
                header("Location: ?c=User&a=verProductA");
                exit;
            } else {
                // Manejar el caso de que la actualización no sea exitosa
                echo "Error al actualizar el producto";
            }
        } else {
            // Manejar el caso de que no se recibieran los datos necesarios para actualizar el producto
            echo "Datos de producto no proporcionados correctamente";
        }
    }
    
    public function editUsuario() {
        // Verificar si se recibió el ID del usuario a editar
        if (isset($_GET['idUsuario'])) {
            // Obtener el ID del usuario desde la URL
            $idUsuario = $_GET['idUsuario'];
            
            // Obtener los datos del usuario desde el modelo (o base de datos)
            $users = new Users();
            $Usuario = $users->usuarioReadById($idUsuario); // Asegúrate de tener este método implementado
    
            // Verificar si se encontraron los datos del usuario
            if ($Usuario) {
                // Cargar la vista con los datos del usuario
                require_once "views/administrador/menu/editarU.php";
            } else {
                // Manejar el caso donde el usuario no se encontró
                echo "Usuario no encontrado";
            }
        } else {
            // Manejar el caso donde no se proporcionó el ID del usuario
            echo "ID de usuario no proporcionado";
        }
    }
    
    public function updateUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idUsuario'])) {
            $idUsuario = $_POST['idUsuario'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            $rol = $_POST['rol'];
    
            // Crear una instancia del modelo de usuarios
            $users = new Users();
    
            // Llamar a la función usuarioUpdate para actualizar el usuario
            if ($users->usuarioUpdate($idUsuario, $nombre, $apellidos, $correo, $rol)) {
                // Si la actualización es exitosa, redireccionar a la página de usuarios
                header("Location: ?c=User&a=editUsuario");
                exit;
            } else {
                // Manejar el caso de que la actualización no sea exitosa
                echo "Error al actualizar el usuario";
            }
        } else {
            // Manejar el caso de que no se recibieran los datos necesarios para actualizar el usuario
            echo "Datos de usuario no proporcionados correctamente";
        }
    }
    
    
    
    }    