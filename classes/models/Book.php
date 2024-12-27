<?php 
require_once "./classes/models/Database.php";

    class Book extends Database {
        protected function allBooks() {
            try {
                $sql = "SELECT * FROM books";
                $stmt = $this->connect()->query($sql);
                return $stmt;
            } catch (PDOException $e) {
                header("Book.php");
                exit();
            }  
            $stmt = null;
            return $emailExist;
        }
    }