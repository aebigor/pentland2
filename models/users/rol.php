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
        public function setusuario($usuario){
            $this->usuario = $usuario;
        }
        #usuario: get()
        public function getusuario(){
            return $this->usuario;
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

    }

    
?>