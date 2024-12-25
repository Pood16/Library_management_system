<?php 

    class Database {
        private $username ='root';
        private $password = '8951';
        private $hostname = 'localhost';
        private $dbname = 'Library';

        protected function connect(){
            try{
                $pdo_connection = new PDO('mysql:host=localhost;dbname=Library', 'root', '8951');
                $pdo_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $pdo_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // echo "connected with database succefully!";
                return $pdo_connection;
            }catch(PDOException $err){
                die("Failed to connect to database : ".$err->getMessage());
            }
        }
    }