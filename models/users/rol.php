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
        protected $imagen;
        protected $precio;
        protected $descripcion;
        protected $nombreP;
        protected $cantidad;
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
        public function __constructt5( $nombre , $apellidos , $correo , $passCorreo,$usuario){
        
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
        public function __construct5($nombreP , $descripcion , $precio , $cantidad ,$imagen)
        {
            $this->nombreP = $nombreP;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
            $this->imagen = $imagen;
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
        public function setimagen($imagen){
            $this->imagen = $imagen;
        }
        #imagen: get()
        public function getimagen(){
            return $this->imagen;
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

    
        public function createProduct($nombre, $descripcion, $precio, $cantidad) {
            try {
                // Verificar si la conexión a la base de datos está establecida
                if ($this->dbh) {
                    // Verificar si todos los datos necesarios están presentes
                    if (isset($nombre, $descripcion, $precio, $cantidad)) {
                        // Verificar si se ha subido una imagen
                        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                            $imagen_temporal = $_FILES['imagen']['tmp_name'];
                            $imagen_nombre = $_FILES['imagen']['name'];
                            $imagen_tipo = $_FILES['imagen']['type'];
                            $imagen_tamano = $_FILES['imagen']['size'];
                            
                            // Validar el tipo de archivo (puedes agregar más tipos según tus necesidades)
                            $permitidos = array("image/jpeg", "image/png", "image/gif");
                            if(!in_array($imagen_tipo, $permitidos)) {
                                return false; // Tipo de archivo no permitido
                            }
                            
                            // Mover el archivo a una ubicación permanente
                            $ruta_imagen = "img" . $imagen_nombre;
                            if(move_uploaded_file($imagen_temporal, $ruta_imagen)) {
                                // Preparar la consulta SQL para insertar un nuevo producto
                                $sql = 'INSERT INTO productos (nombre, descripcion, precio, cantidad, imagen) VALUES (:nombre, :descripcion, :precio, :cantidad, :imagen)';
                                
                                if ($stmt = $this->dbh->prepare($sql)) {
                                    // Vincular parámetros
                                    $stmt->bindParam(':nombre', $nombre);
                                    $stmt->bindParam(':descripcion', $descripcion);
                                    $stmt->bindParam(':precio', $precio);
                                    $stmt->bindParam(':cantidad', $cantidad);
                                    $stmt->bindParam(':imagen', $ruta_imagen); // Guardamos la ruta de la imagen en la base de datos
                                    
                                    // Ejecutar la consulta
                                    $stmt->execute();
                                    
                                    return true; // Indicar éxito en la inserción
                                } else {
                                    return false; // Error en la preparación de la consulta
                                }
                            } else {
                                return false; // Error al mover el archivo
                            }
                        } else {
                            return false; // No se ha subido ninguna imagen
                        }
                    } else {
                        return false; // Faltan datos necesarios
                    }
                } else {
                    return false; // Error en la conexión a la base de datos
                }
            } catch (PDOException $e) {
                // Captura y maneja los errores de PDO
                die("Error en la consulta: " . $e->getMessage());
            }
        }
    }
    
?>