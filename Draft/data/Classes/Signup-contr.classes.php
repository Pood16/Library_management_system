<?php

    class SignupContr extends Signup {

        private $username;
        private $email;
        private $password;

        public function __construct($username, $email, $password){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
        // set user
        public function signupUser(){
            // Validate input first
            if(!$this->emptyInput()) {
                header("Location: ../aut/signup.php?error=emptyinput");
                exit();
            }
            // if(!$this->invalidUsername()) {
            //     header("Location: ../aut/signup.php?error=username");
            //     exit();
            // }
            if(!$this->invalidEmail()) {
                header("Location: ../aut/signup.php?error=email");
                exit();
            }
            if($this->existingUser()) {
                header("Location: ../aut/signup.php?error=useralreadyexists");
                exit();
            }

            // If all validations pass, create the user
            $this->setUser($this->username, $this->email, $this->password);
        }

        // Form validation  
        private function emptyInput(){
            $result = null;
            if(empty($this->username) || empty($this->email) || empty($this->password)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidUsername(){
            // $result = null;
            // if(!preg_match("/^[a-aZ-Z0-9]*$/", $this->username)){
            //     $result = false;
            // }else{
            //     $result = true;
            // }
            // return $result;
        }

        private function invalidEmail(){
            $result = null;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function existingUser(){
            $result = null;
            if(!$this->checkUser($this->email)){
                $result = false;
            }else{
                $result = true;
            }
            return $result;

        }



    }