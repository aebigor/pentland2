<?php
    
    class DataBase{       
    
         public static function connection(){            
            $hostname = "is-yours-testing:us-central1:is-yours";
            $port = "3306";
            $database = "is_yours_GCSQL";
            $username = "admin_test";
            $password = "|@_6J"UO7sud@?f>";
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => 'asset/db/DigiCertGlobalRootCA.crt.pem'
            );
			$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password,$options);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}} 

    //     public static function connection(){            
    //         $hostname = "localhost";
    //         $port = "3306";
    //         $database = "pentland";
    //         $username = "root";
    //         $password = "";
	// 		$pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",$username,$password);
	// 		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 		return $pdo;
	// 	}
	
	// }
?>
