<?php 

    class Signup extends database {

        // check if the user already in db
        protected function checkUser($email){
            $sql_stm = $this->connect()->prepare('SELECT * FROM users WHERE users.email = ?;');
            if(!$sql_stm ->execute([$email])){
                $sql_stm = null;
                header('Location: ../aut/signup.php?error=statmentfailed');
                exit();
            }
            $isExist = null;
            if($sql_stm -> rowCount() > 0){
                $isExist = true;
            }else{
                $isExist = false;
            }
            return $isExist;

        }
        // register the user
        protected function setUser($username, $email, $password){
            $sql_stm = $this->connect()->prepare('INSERT INTO users (users.name, users.email, users.password) VALUES (?, ?, ?)');
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            if(!$sql_stm->execute([$username, $email, $hash_password])) {
                $sql_stm = null;
                header('Location: ../aut/signup.php?error=statmentfailed');
                exit();
            }
            $sql_stm = null;
        }
    }