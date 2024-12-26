<?php 
require_once "Database.php";

    class Book extends Database {
        protected function allBooks() {
            try {
                $sql = "SELECT * FROM books";
                $stmt = $this->connect()->query($sql);
             
                
                return $stmt;
                
            } catch (PDOException $e) {
                
                header("Location: ../views/auth/signup.php?error_email_check_statement=stmtfailed");
                exit();
            }  
            $stmt = null;
            return $emailExist;
            

        }

    }