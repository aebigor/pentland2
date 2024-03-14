<?php
    class Rol{
        // ****** 1er Parte: Clase (POO) *************** //
        // Atributos: Encapsulamiento
        private $dbh;
        
        protected $Codigo;
        protected $nombre;
        protected $apellidos;
        protected $correo;
        protected $passCorreo;
        protected $usuario;
        protected $imagenNombre;
        protected $precio;
        protected $descripcion;
        protected $nombreP;
        protected $cantidad;
        protected $categoria;
        // Métodos
        # Sobrecarga de Constructores
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function __construct5( $nombre , $apellidos , $correo , $passCorreo,$usuario){
        
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            $this->passCorreo = $passCorreo;
            $this->usuario = $usuario;
        }
        
        public function __construct2($correo , $passCorreo){
        
    
            $this->correo = $correo;
            $this->passCorreo = $passCorreo;
        
            // Resto del código...
        }
        public function __construct6($nombreP , $descripcion , $precio , $cantidad ,$imagenNombre, $categoria)
        {
            $this->nombreP = $nombreP;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
            $this->imagenNombre = $imagenNombre;
            $this->categoria = $categoria;
        }
        
   
        // Métodos set() y get()
        # Codigo: set()
       # public function setCodigo($Codigo){
       #     $this->Codigo = $Codigo;
       # }
       # # Codigo: get()
       # public function getCodigo(){
       #     return $this->Codigo;
       # }
        # nombre: set()
        public function setnombre($nombre){
            $this->nombre = $nombre;
        }
        # nombre: get()
        public function getnombre(){
            return $this->nombre;
        }

  // (continuación desde donde lo dejaste)
        #apellido: set()
        public function setapellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        #apellidos: get()
        public function getapellidos(){
            return $this->apellidos;
        }
        #correo: set()
        public function setcorreo($correo){
            $this->correo = $correo;
        }
        #correo: get()
        public function getcorreo(){
            return $this->correo;
        }

        #passCorreo: set()
        public function setpassCorreo($passCorreo){
            $this->passCorreo = $passCorreo;
        }
        #passCorreo: get()
        public function getpassCorreo(){
            return $this->passCorreo;
        }
        public function setnombreP($nombreP){
            $this->nombreP = $nombreP;
        }
        #usuario: get()
        public function getnombreP(){
            return $this->nombreP;
        }
        public function setdescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        #descripcion: get()
        public function getdescripcion(){
            return $this->descripcion;
        }
        public function setprecio($precio){
            $this->precio = $precio;
        }
        #precio: get()
        public function getprecio(){
            return $this->precio;
        }
        public function setcantidad($cantidad){
            $this->cantidad = $cantidad;
        }
        #cantidad: get()
        public function getcantidad(){
            return $this->cantidad;
        }
        public function setimagen($imagenNombre){
            $this->imagenNombre = $imagenNombre;
        }
        #imagenNombre: get()
        public function getimagen(){
            return $this->imagenNombre;
        }
        public function setcategoria($categoria){
            $this->categoria = $categoria;
        }
        #categoria: get()
        public function getcategoria(){
            return $this->categoria;
        }
      
        

    


        # CU09 - Registrar Rol
        public function createrol() {
            try {
                // Verificar si la conexión a la base de datos está establecida
                if ($this->dbh) {
                    // Verificar si todos los datos necesarios están presentes
                    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo'], $_POST['usuario'])) {
                        // Cifrar la contraseña
                        $passCifrada = password_hash($_POST['passCorreo'], PASSWORD_DEFAULT);
                        
                        // Preparar la consulta SQL para insertar un nuevo usuario
                        $sql = 'INSERT INTO USUARIO (nombre, apellido, correo, passCorreo, rol) VALUES (:nombre, :apellidos, :correo, :passCorreo, :rol)';
                        
                        if ($stmt = $this->dbh->prepare($sql)) {
                            // Vincular parámetros
                           
                            $stmt->bindParam(':nombre', $_POST['nombre']);
                            $stmt->bindParam(':apellidos', $_POST['apellidos']);
                            $stmt->bindParam(':correo', $_POST['correo']);
                            $stmt->bindParam(':passCorreo', $passCifrada);
                            $stmt->bindParam(':rol', $_POST['usuario'
                        ]);
                            #echo($_POST);
                            // Ejecutar la consulta
                            $stmt->execute();
                            
                            #echo "Usuario creado exitosamente.";
                        } else {
                            die("Error en la preparación de la consulta.");
                        }
                    } else {
                        echo "Por favor, proporcione todos los datos necesarios.";
                    }
                } else {
                    die("Error: La conexión a la base de datos no está establecida.");
                }
            } catch (PDOException $e) {
                // Captura y maneja los errores de PDO
                die("Error en la consulta: " . $e->getMessage());
            }
        }
        
        public function validarRol($correo, $passCorreo) {
            try {
                // Verificar si la conexión a la base de datos está establecida
                if ($this->dbh) {
                    // Preparar la consulta SQL para buscar el usuario por correo electrónico y contraseña cifrada
                    $sql = 'SELECT * FROM usuario WHERE correo = :correo';
        
                    if ($stmt = $this->dbh->prepare($sql)) {
                        // Vincular parámetros
                        $stmt->bindParam(':correo', $correo);
        
                        // Ejecutar la consulta
                        $stmt->execute();
        
                        // Obtener el resultado
                        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
                        if ($usuario && password_verify($passCorreo, $usuario['passCorreo'])) {
                            // Contraseña válida, redirecciona según el rol
                            if($usuario['rol'] === 'Vendedor') {
                                header("Location: ?c=menuV");
                                exit();
                            } else if ($usuario['rol'] === 'Usuario'){
                                header("Location: ?c=menuU");
                                exit();
                            } else {
                                header("Location: ?c=menu");
                                exit();
                            }
                        }   
                    } 
                }
            } catch (PDOException $e) {
                // Captura y maneja los errores de PDO
                die("Error en la consulta: " . $e->getMessage());
            }
        }

    
        public function createProductos() {
            try {
                // Verificar si todos los datos necesarios están presentes
                if (isset($_POST['nombreP'], $_POST['descripcion'], $_POST['precio'], $_POST['cantidad'], $_POST['categoria'], $_FILES['imagenNombre'])) {
                    // Inicializar un arreglo para almacenar errores
                    $errors = array();
                    
                    // Validar la imagenNombre
                    if (empty($_FILES['imagenNombre']['name'])) {
                        $errors['imagenNombre'] = 'La imagenNombre no se ha subido correctamente.';
                    } else {
                        // Obtener la extensión de la imagenNombre
                        $extension = pathinfo($_FILES['imagenNombre']['name'], PATHINFO_EXTENSION);
                        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                        
                        // Verificar si la extensión es válida
                        if (!in_array($extension, $allowedExtensions)) {
                            $errors['imagenNombre'] = 'La imagenNombre debe tener una extensión válida.';
                        }
                    }
                    
                    // Si no hay errores en la validación de la imagenNombre, almacenarla
                    if (empty($errors)) {
                        $imagenNombre = uniqid() . '.' . $extension;
                        $target_dir = "img/";
                        $target_file = $target_dir . $imagenNombre;
                        
                        // Mover la imagenNombre al directorio deseado
                        if (move_uploaded_file($_FILES['imagenNombre']['tmp_name'], $target_file)) {

                            // Preparar la consulta SQL para insertar un nuevo producto
                            $sql = 'INSERT INTO productos (nombre, descripcion, precio, cantidad, categoria, imagenNombre) VALUES (:nombre, :descripcion, :precio, :cantidad, :categoria, :imagenNombre)';
                            
                            // Preparar y ejecutar la consulta
                            $stmt = $this->dbh->prepare($sql);
                            $stmt->bindParam(':nombre', $_POST['nombreP']);
                            $stmt->bindParam(':descripcion', $_POST['descripcion']);
                            $stmt->bindParam(':precio', $_POST['precio']);
                            $stmt->bindParam(':cantidad', $_POST['cantidad']);
                            $stmt->bindParam(':categoria', $_POST['categoria']);
                            $stmt->bindParam(':imagenNombre', $imagenNombre); // Guardamos el nombre de la imagenNombre en la base de datos
                            
                            $stmt->execute();
                            
                            // Redireccionar después de la inserción del producto
                            header("Location: ?c=menuV");
                            exit(); // Terminar el script para evitar la ejecución adicional de código
                        } else {
                            // Si falla la carga de la imagenNombre, mostrar un mensaje de error
                            echo '<p>Error al subir la imagenNombre.</p>';
                        }
                    } else {
                        // Mostrar errores de validación de la imagenNombre
                        foreach ($errors as $error) {
                            echo '<p>' . $error . '</p>';
                        }
                    }
                } else {
                    // Mostrar un mensaje de error si faltan datos necesarios en el formulario
                    echo "Por favor, complete todos los campos del formulario.";
                }
            } catch (PDOException $e) {
                // Capturar y manejar los errores de PDO
                die("Error en la consulta: " . $e->getMessage());
            }
        }
        
        

        public function productRead(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM productos';
                $stmt = $this->dbh->query($sql);                
                foreach ($stmt->fetchAll() as $rol) {
                    $rolList[] = new Rol(
                        $rol['nameP'],
                        $rol['descripcion']
                    );
                }                
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                                } 
        
        //                                 return false; // Error en la preparación de la consulta
        //                             }
        //                         } else {
        //                             return false; // Error al mover el archivo
        //                         }
        //                     } else {
        //                         return false; // No se ha subido ninguna imagenNombre
        //                     }
        //                 } else {
        //                     return false; // Faltan datos necesarios
        //                 }
        //             } else {
        //                 return false; // Error en la conexión a la base de datos
        //             }
        //         } catch (PDOException $e) {
        //             // Captura y maneja los errores de PDO
        //             die("Error en la consulta: " . $e->getMessage());
        //         }
        //     }
        // }}
                                
?>