<?php
    class Rol{
        // ****** 1er Parte: Clase (POO) *************** //
        // Atributos: Encapsulamiento
        private $dbh;
        private $code;
        private $nombre;
        private $usuario;
        private $password;
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
        public function __construct2($code, $nombre, $apellidos, $correo, $passCorreo){
            $this->code = $code;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->correo = $correo;
            $this->password = $password;
        }
        // Métodos set() y get()        
        # code: set()
        public function setcode($code){
            $this->code = $code;
        }
        # code: get()
        public function getCode(){
            return $this->code;
        }        
        # nombre: set()
        public function setnombre($nombre){
            $this->nombre = $nombre;
        }
        # nombre: get()
        public function getnombre(){
            return $this->nombre;
        }

        # apellido: set()
        public function setapellido(){
            return $this->apellido;
        }
        #apellidos: get()
        public function getapellido(){
            return $this->appelido;
        }
        #usuario: set()
        public function setcorreo(){
            return $this->correo;
        }
        #usuario: get()
        public function getcorreo(){
            return $this->correo;
        }

        public function setpassCorreo(){
            return $this->passCorreo;
        }
        public function getpassCorreo(){
            return $this->passCorro;
        }
        // ****** 2da Parte: Persistencia DB (CRUD) ****** //

        # CU09 - Registrar Rol
        public function createrol(){
            try {
                $sql = 'INSERT INTO usuario VALUES (:Code,:Nombre,:Apellido,:Correo,:passCorreo)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('code', $this->getCode());
                $stmt->bindValue('Nombre', $this->getnombre());
                $stmt->bindValue('Apellidos', $this->getapellido());
                $stmt->bindValue('Correo', $this->getcorreo());
                $stmt->bindValue('passCorreo', $this->getpassCorreo());

                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Consultar Roles
        public function rolRead(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);                
                foreach ($stmt->fetchAll() as $rol) {
                    $rolList[] = new Rol(
                        $rol['rol_code'],
                        $rol['rol_name']
                    );
                }                
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Obtener el Rol por Id
        public function getRolById($code){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_code=:code";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('code', $code);
                $stmt->execute();                
                $rolDb = $stmt->fetch();                
                $rol = new Rol(
                    $rolDb['rol_code'],
                    $rolDb['rol_name']
                );                
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Actualizar Rol
        public function rolUpdate(){
            try {                
                $sql = 'UPDATE ROLES SET
                            rol_code = :code,
                            rol_name = :nombre
                        WHERE rol_code = :code';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('code', $this->getRolCode());
                $stmt->bindValue('nombre', $this->getnombre());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CUXX - Eliminar Rol
        public function rolDelete($code){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_code = :code';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('code', $code);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            } 
        }
    }    
?>