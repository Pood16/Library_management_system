<?php 

    class Database {
        private $dbname;
        private $password;
        private $username;
        private $hostname;
        private $pdo_connection;

        public function __construct($dbname,$password, $hostname = 'localhost', $username = 'root'){
            $this -> dbname = $dbname;
            $this -> password = $password;
            $this -> hostname = $hostname;
            $this -> username = $username;
        }
        public function connect(){
            try{
                $this->pdo_connection = new PDO(
                    "mysql:host={$this->hostname};dbname={$this->dbname}", 
                    $this->username,
                    $this->password
                );
                $this->pdo_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // echo "connected with database succefully!";
                return $this->pdo_connection;
            }catch(PDOException $err){
                die("Failed to connect to database : ".$err->getMessage());
            }
        }
        public function disconnect() {
            if ($this->pdo_connection) {
                $this->pdo_connection = null;
                return true;
            }
            return false;
        }
    }

