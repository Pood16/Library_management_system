<?php 

    class database{
        private $hostname;
        private $dbname;
        private $password;
        private $username;
        private $pdo = null;

        public function __construct($hostname, $dbname, $username, $password){
            $this->hostname = $hostname;
            $this->dbname = $dbname;
            $this->password = $password;
            $this->username = $username;
        }
        
        
        public function connect(){
            try {
                $dsn = "mysql:host={$this->hostname};dbname={$this->dbname}";
                $this->pdo = new PDO($dsn, $this->username, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                echo "connected lahcen ";
                return $this->pdo;
            }catch(PDOException $err){
                die("Failed to connect ". $err->getMessage());
            }
        }
    }
$database = new Database('localhost', 'Library', 'root', '8951');
$database->connect();