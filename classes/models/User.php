<?php 
    require_once 'Database.php';
   

    class User {

        private $id;
        private $name;
        private $email;
        private $password;
        private $role;
        private $created_at;

        public function __construct($name, $email, $password,$id = null, $role = null, $create_at = null) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->id = $id;
            $this->role = $role;
            $this->created_at = $create_at;
        }
    
        // set user to db
        public function setUser(){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'INSERT INTO users (users.name, users.email, users.password) VALUES (:name, :email, :password)';
                $stmt = $pdo->prepare($sql);
                $secure_password = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $secure_password, PDO::PARAM_STR);
                // $stmt->bindParam(':role', $this->role, PDO::PARAM_STR);
                $stmt->execute();
                
                header("Location: ../../views/books/index.php");
            } catch (PDOException $e) {
                echo 'Failed to add the user: ' . $e->getMessage();
                // header("Location: ../views/users/signup.php?set_user_statement=stmtfailed");
                exit();
            } finally {
                $stmt = null;
            }
        }
        // check if the user exist or not
        public function checkUser() {
            $emailExists = false;
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "SELECT email FROM users WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                
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
        // get user from db using email
        public function getUser(){
            $user = null;
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "SELECT * FROM users WHERE users.email = :email";
                $stmt = $pdo-> prepare($sql);
                $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowCount() == 0){
                    return false;
                }

                $user = $stmt->fetch();
            
                if(password_verify($this->password, $user['password'])){
                    return $user;
                }else{
                    return false;
                }
            }catch(PDOException $err){
                echo "Failed to execute select query : ".$err->getMessage();
                echo "<pre>";
                print_r($user);
                echo "</pre>";
            }finally{
                $stmt = null;
            }
        }
        // get all users
        public function getUsers(){
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "SELECT * FROM users";
                $stmt = $pdo-> prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(PDOException $err){
                echo "Failed to get  users : ".$err->getMessage();
            }finally{
                $stmt = null;
            }
        }
        // delete users by ID
        public function deleteUser(){
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "DELETE FROM users WHERE users.id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                $stmt->execute();
                
            }catch(PDOException $err){
                echo "Failed to Delete  user : ".$err->getMessage();
            }finally{
                $stmt = null;
            }
        }
        // get user from db using id
        public function getUserId(){
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "SELECT * FROM users WHERE users.id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch();
            }catch(PDOException $err){
                echo "Failed to Select  user : ".$err->getMessage();
            }finally{
                $stmt = null;
            }
        }
        // update the user role
        public function updateUserRole(){
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "UPDATE users SET users.role = :role WHERE users.id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':role', $this->role, PDO::PARAM_STR);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                $stmt->execute();
            }catch(PDOException $err){
                echo "Failed to update the role " . $err->getMessage();
            }finally{
                $stmt = null;
            }
        }

    }