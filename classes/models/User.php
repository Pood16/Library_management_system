<?php 

    class User extends Database {


        // set user to db
        protected function setUser($name, $email, $password){
            session_start();
            try {
                $sql = 'INSERT INTO users (users.name, users.email, users.password, users.role) VALUES (:name, :email, :password, :role)';
                $stmt = $this->connect()->prepare($sql);
                $secure_password = password_hash($password, PASSWORD_DEFAULT);
                $role = 'authenticated';
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $secure_password, PDO::PARAM_STR);
                $stmt->bindParam(':role', $role, PDO::PARAM_STR);
                
                $stmt->execute();
               
                header("Location: ../views/users/signup.php?set_user_statement=user_added");
            } catch (PDOException $e) {
                echo 'Failed to add the user: ' . $e->getMessage();
                header("Location: ../views/users/signup.php?set_user_statement=stmtfailed");
                exit();
            } finally {
                $stmt = null;
            }
        }
        // check if the user exist or not
        protected function checkUser($email) {
            $emailExists = false;
            try {
                $sql = "SELECT email FROM users WHERE email = :email";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                
                $stmt->execute();
                if($stmt->rowCount() > 0){

                    $emailExists = true;
                }
                
                return $emailExists;
                
            } catch (PDOException $e) {
                
                header("Location: ../views/auth/signup.php?error_email_check_statement=stmtfailed");
                exit();
            }  
            $stmt = null;
            return $emailExist;
            

        }

    }