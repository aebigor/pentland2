<?php
    class Rol{
        // ****** 1er Parte: Clase (POO) *************** //
        // Atributos: Encapsulamiento
        private $dbh;
        
        protected $Id;
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
        protected $categoria;
        // Métodos
        # Sobrecarga de Constructores
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $args = func_get_args();
                $num_args = func_num_args();
                if ($num_args > 0) {
                    $constructor_name = '__construct' . $num_args;
                    if (method_exists($this, $constructor_name)) {
                        call_user_func_array(array($this, $constructor_name), $args);
                    } else {
                        throw new Exception("Constructor with $num_args arguments not found.");
                    }
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
        
        public function __construct6($nombreP , $descripcion , $precio , $cantidad , $categoria , $imagen)
        {
            
            $this->nombreP = $nombreP;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
            $this->imagen = $imagen;
            $this->categoria = $categoria;
        }
        
   
        // Métodos set() y get()
        # Id: set()
       public function setId($Id){
           $this->Id = $Id;
       }
       # Id: get()
       public function getId(){
           return $this->Id;
       }
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
                            } else if ($usuario['rol'] === 'Admin'){
                                header("Location: ?c=menuA");
                                exit();
                            }  else {
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

    
        public function createProductos($imagenNombre) {
            try {
                // Preparar la consulta SQL para insertar un nuevo producto
                $sql = 'INSERT INTO productos (nombreP, descripcion, precio, cantidad, categoria, imagen) VALUES (:nombreP, :descripcion, :precio, :cantidad, :categoria, :imagen)';
                
                // Preparar y ejecutar la consulta
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindParam(':nombreP', $_POST['nombreP']);
                $stmt->bindParam(':descripcion', $_POST['descripcion']);
                $stmt->bindParam(':precio', $_POST['precio']);
                $stmt->bindParam(':cantidad', $_POST['cantidad']);
                $stmt->bindParam(':categoria', $_POST['categoria']);
                $stmt->bindParam(':imagen', $imagenNombre); // Utilizar el nombre de la imagen pasado como argumento
        
                if ($stmt->execute()) {
                    return true; // Éxito: se insertó el producto correctamente
                } else {
                    return false; // Fallo: no se pudo insertar el producto
                }
            } catch (PDOException $e) {
                // Capturar y manejar los errores de PDO
                throw new Exception("Error al insertar el producto: " . $e->getMessage());
            }
        }
        
        public function getAllProducts() {
            try {
                // Preparar la consulta SQL para obtener todos los productos
                $sql = "SELECT * FROM productos";
                $stmt = $this->dbh->prepare($sql);
                
                // Ejecutar la consulta
                $stmt->execute();
        
                // Obtener los resultados
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                return $products;
            } catch (PDOException $e) {
                // Capturar y manejar los errores de PDO
                throw new Exception("Error al obtener los productos: " . $e->getMessage());
            }
             
} 
public function Delete($Id){
    try {
        $sql = 'DELETE FROM * WHERE Id = :Id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':Id', $Id);  // Asegúrate de pasar el código del rol, no el objeto Rol
        $stmt->execute();
    } catch (Exception $e) {
        die($e->getMessage());
    } 
}
    }                              
?>