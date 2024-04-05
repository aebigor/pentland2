<?php

class Producto {

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
  // ... (setter and getter methods for other properties)

  public function fetchAllProductos() {
    try {
        $sql = "SELECT * FROM productos";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productos;
    } catch (PDOException $e) {
        throw new Exception("Error retrieving products: " . $e->getMessage());
    }
}

public function getProductById($id) {
    try {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    } catch (PDOException $e) {
        throw new Exception("Error retrieving product: " . $e->getMessage());
    }
}
}

