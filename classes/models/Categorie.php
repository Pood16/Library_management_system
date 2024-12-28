<?php 
    require_once 'Database.php';
    class Categorie {
        private $id;
        private $name;
        // private $pdo;

        // public function __construct($name){
        //     $this->name = $name;
        // }

        

        // add cat
        public function addCategorie($name){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'INSERT INTO categories (name) VALUES (:name)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $err) {
                echo 'Failed to add Categorie: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }


        // get Categories
        public function getCats(){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'SELECT * FROM categories';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(!empty($categories)){
                    return $categories;
                }
            } catch (PDOException $err) {
                echo 'Failed to Load categories: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }

        


    }