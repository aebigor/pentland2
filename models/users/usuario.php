<?php
class Usuario {
    private $dbh;
    private $correo;
    private $passCorreo;

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
    
    public function __construct2($correo, $passCorreo) {
        $this->correo = $correo;
        $this->passCorreo = password_hash($passCorreo, PASSWORD_DEFAULT);
    }
    
    public function getcorreo() {
        return $this->correo;
    }
    
    public function getpassCorreo() {
        return $this->passCorreo;
    }
    
    // Método para verificar la autenticación del usuario
    public function validarUsuario($correo, $passCorreo) {
        try {
            // Verificar si la conexión a la base de datos está establecida
            if ($this->dbh) {
                $sql = 'SELECT id, nombre, apellido FROM usuario WHERE correo = :correo AND pass = :passCorreo';
                
                if ($stmt = $this->dbh->prepare($sql)) {
                    // Vincular parámetros
                    $stmt->bindParam(':correo', $correo);
                    $stmt->bindParam(':passCorreo', $passCorreo);
    
                    // Ejecutar la consulta
                    $stmt->execute();
    
                    // Obtener el resultado
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
                    if ($usuario) {
                        // Usuario encontrado, devolver los datos del usuario
                        return $usuario;
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
?>

