<?php
    class users{
        private $dbh;
        protected $rol;
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
        public function __construct5($Id, $nombre, $apellidos, $correo, $rol){
            $this->rol = $rol;    
            $this->Id = $Id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            
          
        }
        
        public function __construct2($correo, $passCorreo){
        
    
            $this->correo = $correo;
            $this->passCorreo = $passCorreo;
        
            // Resto del código...
        }
        public function __construct1($Id){
        
            $this->Id = $Id;
        
            // Resto del código...
        }
        
        public function __construct7($Id, $nombreP, $descripcion, $precio, $cantidad, $categoria, $imagen)
        {
            $this->Id = $Id;
            $this->nombreP = $nombreP;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
            $this->imagen = $imagen;
            $this->categoria = $categoria;
        }
        
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
         
         public function setrol($rol){
            $this->rol = $rol;
        }
        #rol: get()
        public function getrol(){
            return $this->rol;
        }
        // 2da parte persitencia
        # CUXX - Crear Usuario
        public function productRead(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM productos';
                $stmt = $this->dbh->query($sql);                
                // Iterar sobre los resultados y almacenarlos en un array
                while ($Users = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rolList[] = new users(
                        $Users['id'],
                        $Users['nombreP'],
                        $Users['descripcion'],
                        $Users['precio'],
                        $Users['cantidad'],
                        $Users['categoria'],
                        $Users['imagen']
                    );
                }                
                return $rolList;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        public function usuarioRead(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM usuario';
                $stmt = $this->dbh->query($sql);                
                // Iterar sobre los resultados y almacenarlos en un array
                while ($Users = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $rolList[] = new Users(
                        $Users['Id'],
                        $Users['nombre'],
                        $Users['apellido'],
                        $Users['correo'],
                        
                        $Users['rol'],
                        
                    );
                }                
                return $rolList;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        public function productoDeleteA($Id) {
            try {
                $sql = 'DELETE FROM productos WHERE Id = :Id';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue(':Id', $Id);
                $stmt->execute();
                
                // Verificar si se eliminó alguna fila
                $rowsAffected = $stmt->rowCount();
                
                // Si se eliminó al menos una fila, redireccionar a la página de productos
                if ($rowsAffected > 0) {
                    header("Location:?c=User&a=verProductA");
                    exit;
                } else {
                    // En caso contrario, mostrar un mensaje de error
                    echo "No se pudo eliminar el producto.";
                }
            } catch (Exception $e) {
                // Manejar cualquier excepción que ocurra durante la eliminación
                die("Error al eliminar el producto: " . $e->getMessage());
            } 
        }
        public function usuarioDelete($Id) {
            try {
                $sql = 'DELETE FROM usuario WHERE Id = :Id';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue(':Id', $Id);
                $stmt->execute();
                
                // Verificar si se eliminó alguna fila
                $rowsAffected = $stmt->rowCount();
                
                // Si se eliminó al menos una fila, redireccionar a la página de productos
                if ($rowsAffected > 0) {
                    header("Location:?c=User&a=verUsuario");
                    exit;
                } else {
                    // En caso contrario, mostrar un mensaje de error
                    echo "No se pudo eliminar el producto.";
                }
            } catch (Exception $e) {
                // Manejar cualquier excepción que ocurra durante la eliminación
                die("Error al eliminar el producto: " . $e->getMessage());
            } 
        }
        
        // Función para eliminar un usuario
        
        // En models/users/user.php

        public function productoUpdate($Id, $nombreP, $descripcion, $precio, $cantidad, $categoria, $imagen) {
            try {
                $sql = "UPDATE productos SET nombreP = :nombreP, descripcion = :descripcion, precio = :precio, cantidad = :cantidad, categoria = :categoria, imagen = :imagen WHERE Id = :id";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindParam(':nombreP', $nombreP);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':cantidad', $cantidad);
                $stmt->bindParam(':categoria', $categoria);
                $stmt->bindParam(':imagen', $imagen);
                $stmt->bindParam(':id', $Id); // Corregido aquí
                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        
        
        public function productoReadById($Id) {
            try {
                $sql = 'SELECT * FROM productos WHERE id = :id';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
                $stmt->execute();
                $Users = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($Users) {
                    return new users(
                        $Users['id'],
                        $Users['nombreP'],
                        $Users['descripcion'],
                        $Users['precio'],
                        $Users['cantidad'],
                        $Users['categoria'],
                        $Users['imagen']
                    );
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        public function usuarioUpdate($Id, $nombreP, $descripcion, $precio, $cantidad, $categoria, $imagen) {
            try {
                $sql = "UPDATE productos SET nombreP = :nombreP, descripcion = :descripcion, precio = :precio, cantidad = :cantidad, categoria = :categoria, imagen = :imagen WHERE Id = :id";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindParam(':nombreP', $nombreP);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':cantidad', $cantidad);
                $stmt->bindParam(':categoria', $categoria);
                $stmt->bindParam(':imagen', $imagen);
                $stmt->bindParam(':id', $Id); // Corregido aquí
                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        
        
        public function usuarioReadById($Id) {
            try {
                $sql = 'SELECT * FROM usuario WHERE id = :id';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
                $stmt->execute();
                $Users = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if ($Users) {
                    return new users(
                        null,
                        $Users['nombre'],
                        $Users['apellido'],
                        $Users['correo'],
                        $Users['rol'],
                        
                    );
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        
    }
        
    
        
    
?>