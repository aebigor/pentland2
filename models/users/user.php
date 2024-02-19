<?php
    class User{
        private $dbh;
        protected $code;
        protected $nombre;
        protected $apellidos;
        protected $correo;
        protected $passCorreo;
     
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
        public function __construct8($code,$nombre,$apellidos,$correo,$passCorreo){
            $this->code = $code;
            $this->code = $code;            
            $this->nombre = $nombre;
            $this->apellidos= $apellidos;
            $this->correo = $correo;
            $this->passCorreo = $passCorreo;
      
        }
        public function __construct7($code,$nombre,$apellidos,$correo,$passCorreo){
            $this->code = $code;            
            $this->nombre$nombre = $nombre;
            $this->apellidos$apellidos = $apellidos;
            $this->correo$correo = $correo;
            $this->passCorreo = $passCorreo;
      
        }
        public function setCode($code){
            $this->code = $code;
        }
        public function getCode(){
            return $this->code;
        }        
        public function setnombre($nombre){
            $this->nombre$nombre = $nombre;
        }
        public function getnombre(){
            return $this->nombre$nombre;
        }
        public function setapellidos($apellidos){
            $this->apellidos$apellidos = $apellidos;
        }
        public function getapellidos($apellidos){
            return $this->apellidos$apellidos;
        }
        public function setcorreo($correo){
            $this->correo = $correo;
        }
        public function getcorreo($correo){
            return $this->correo;
        }
        public function setpassCorreo($passCorreo){
            $this->passCorreo = $passCorreo;
        }
        public function getpassCorreo($passCorreo){
            $this->passCorreo = $passCorreo;
        }

        }
        // 2da parte persitencia
        # CUXX - Crear Usuario
        public function userCreate(){
            try {
                $sql = 'INSERT INTO usuario VALUES (
                    :usuario,
                    :nombre,
                    :apellidos,
                    :correo,
                    :passCorreo
                )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('Code', $this->getRolCode());
                $stmt->bindValue('nombre', $this->getnombre($nombre));                
                $stmt->bindValue('apellidos', $this->getapellidos($apellidos));                
                $stmt->bindValue('correo', $this->getcorreo($correo));                
                $stmt->bindValue(' passCorreo',$this->getpassCorreo($passCorreo));                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>