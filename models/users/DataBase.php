<?php
    
    class DataBase{       
    
        // public static function connection(){            
        //     $hostname = "petland.mysql.database.azure.com";
        //     $port = "3306";
        //     $database = "pentland";
        //     $username = "petland";
        //     $password = "Santy1314";
        //     $options = array(
        //         PDO::MYSQL_ATTR_SSL_CA => 'asset/db/DigiCertGlobalRootCA.crt.pem'
        //     );
		// 	$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password,$options);
		// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// 	return $pdo;
		// }}

        public static function connection(){            
            $hostname = "localhost";
            $port = "3306";
            $database = "pentland";
            $username = "root";
            $password = "";
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
	
	}
?>