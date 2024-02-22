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
        public function __construct4( $nombre , $apellidos , $correo , $passCorreo){
        
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            $this->passCorreo = $passCorreo;
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
    


        # CU09 - Registrar Rol
        public function createrol(){
            try {
               // Verificar si la conexión a la base de datos está establecida
               if ($this->dbh) {
                  var_dump($_POST['nombre'], $_POST['apellidos'], $_POST['correo'], $_POST['passCorreo']);
                  $sql = 'INSERT INTO USUARIO  VALUES (:id, :nombre, :apellido, :correo, :passCorreo)';
                  
                  if ($stmt = $this->dbh->prepare($sql)) {
                    // Ahora puedes usar $stmt
                    $stmt->bindValue(':id', NULL);
                    $stmt->bindValue(':nombre', $this->getnombre());
                    $stmt->bindValue(':apellido', $this->getapellidos());
                    $stmt->bindValue(':correo', $this->getcorreo());
                    $stmt->bindValue(':passCorreo', $this->getpassCorreo());
                    
                    $stmt->execute();
                 } else {
                    die("Error en la preparación de la consulta.");
                 }
                 
               } else {
                  die("Error: La conexión a la base de datos no está establecida.");
               }
            } catch (PDOException $e) {
               // Captura y maneja los errores de PDO
               die("Error en la consulta: " . $e->getMessage());
            }
         }
         
         public function validar($correo, $passCorreo) {
            try {
                // Verificar si la conexión a la base de datos está establecida
                if ($this->dbh) {
                    // Preparar la consulta SQL para buscar el correo por correo electrónico
                    $sql = 'SELECT id, correo, passCorreo FROM usuario WHERE correo = :correo';
                    
                    if ($stmt = $this->dbh->prepare($sql)) {
                        // Vincular parámetros
                        $stmt->bindParam(':correo', $correo);
                        
                        // Ejecutar la consulta
                        $stmt->execute();
                        
                        // Obtener el resultado
                        $correo = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        if ($correo) {
                            // Verificar la contraseña usando password_verify
                            if (password_verify($passCorreo, $correo['passCorreo'])) {
                                // Contraseña correcta, devolver los datos del correo
                                return $correo;
                            } else {
                                // Contraseña incorrecta
                                return false;
                            }
                        } else {
                            // Usuario no encontrado
                            return false;
                        }
                    } else {
                        die("Error en la preparación de la consulta.");
                    }
                } else {
                    die("Error: La conexión a la base de datos no está establecida.");
                }
            } catch (PDOException $e) {
                // Captura y maneja los errores de PDO
                die("Error en la consulta: " . $e->getMessage());
            }
        }
    }
        
        #public function createrolAdmin(){
        #    try {
        #        $sql = 'INSERT INTO administrador VALUES (:Codigo,:nombre,:Apellido,:correo,:passCorreo)';
        #        $stmt = $this->dbh->prepare($sql);
        #        $stmt->bindValue('Codigo', $this->getCodigo());
        #        $stmt->bindValue('nombre', $this->getnombre());
        #        $stmt->bindValue('apellidos', $this->getapellido());
        #        $stmt->bindValue('correo', $this->getcorreo());
        #        $stmt->bindValue('passCorreo', $this->getpassCorreo());
#
        #        $stmt->execute();
        #    } catch (Exception $e) {
        #        die($e->getMessage());
        #    }
        #}
        #public function createrolVendedor(){
        #    try {
        #        $sql = 'INSERT INTO Vendedor VALUES (:Codigo,:nombre,:Apellido,:correo,:passCorreo)';
        #        $stmt = $this->dbh->prepare($sql);
        #        $stmt->bindValue('Codigo', $this->getCodigo());
        #        $stmt->bindValue('nombre', $this->getnombre());
        #        $stmt->bindValue('apellidos', $this->getapellido());
        #        $stmt->bindValue('correo', $this->getcorreo());
        #        $stmt->bindValue('passCorreo', $this->getpassCorreo());
#
        #        $stmt->execute();
        #    } catch (Exception $e) {
        #        die($e->getMessage());
        #    }
        #}
        ## CUXX - Consultar Roles
        #public function rolRead(){
        #    try {
        #        $rolList = [];
        #        $sql = 'SELECT * FROM ROLES';
        #        $stmt = $this->dbh->query($sql);
        #        foreach ($stmt->fetchAll() as $rol) {
        #            $rolList[] = new Rol(
        #                $rol['rol_Codigo'],
        #                $rol['rol_name']
        #            );
        #        }
        #        return $rolList;
        #    } catch (Exception $e) {
        #        die($e->getMessage());
        #    }
        #}
        ## CUXX - Obtener el Rol por Id
        #public function getRolById($Codigo){
        #    try {
        #        $sql = "SELECT * FROM ROLES WHERE rol_Codigo=:Codigo";
        #        $stmt = $this->dbh->prepare($sql);
        #        $stmt->bindValue('Codigo', $Codigo);
        #        $stmt->execute();
        #        $rolDb = $stmt->fetch();
        #        $rol = new Rol(
        #            $rolDb['rol_Codigo'],
        #            $rolDb['rol_name']
        #        );
        #        return $rol;
        #    } catch (Exception $e) {
        #        die($e->getMessage());
        #    }
        #}
        ## CUXX - Actualizar Rol
        #public function rolUpdate(){
        #    try {
        #        $sql = 'UPDATE ROLES SET
        #                    rol_Codigo = :Codigo,
        #                    rol_name = :nombre
        #                WHERE rol_Codigo = :Codigo';
        #        $stmt = $this->dbh->prepare($sql);
        #        $stmt->bindValue('Codigo', $this->getRolCodigo());
        #        $stmt->bindValue('nombre', $this->getnombre());
        #        $stmt->execute();
        #    } catch (Exception $e) {
        #        die($e->getMessage());
        #    }
        #}
        ## CUXX - Eliminar Rol
        #public function rolDelete($Codigo){
        #    try {
        #        $sql = 'DELETE FROM ROLES WHERE rol_Codigo = :Codigo';
        #        $stmt = $this->dbh->prepare($sql);
        #        $stmt->bindValue('Codigo', $Codigo);
        #        $stmt->execute();
        #    } catch (Exception $e) {
        #        die($e->getMessage());
        #    }
        #}
    
?>