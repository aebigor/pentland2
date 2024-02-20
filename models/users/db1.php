<?php
    class DataBase1{       
    
        public static function connection(){            
    
            $conexion = mysqli_connect("localhost", "root", "", "registro_usuario");
            
            if ($conexion) {
                // Your file upload and SQL query code here
            } else {
                echo "Failed to connect to the database.";
            }
            
        }}
            
?>