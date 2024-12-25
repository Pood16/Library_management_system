<?php 

    class UserController extends User{
        private $name;
        private $email;
        private $password;
        public $email_error;
        public $password_error;
        public $empty_error;
        public $allValid;
        public $email_format_error;

        public function __construct($name, $email, $password){
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
        // sign up
        public function signUpUser(){
            $this->allValid = true;
            // empty fields
            if(!$this->emptyInputs()) {
                $this->empty_error = 'This input should not be empty';
                $this->allValid = false;
            }
            // invalid email
            if ($this->isEmailValid()){
                $this->email_format_error = 'Wrong email format';
                $this->allValid = false;
            }
            // invalid password
            if (!$this->isPasswordValid()){
                $this->password_error = 'password should be more than 4 caracters';
                $this->allValid = false;
            }
            // user exist 
            if ($this->userStatus()){
                $this->email_error = 'This email is already exist.';
                $this->allValid = false;
            }

            if ($this->allValid){
                return $this->setUser($this->name, $this->email, $this->password);
            }
            return false;

        }

        
        
        
        // Validation des informations
        // Empty Fields
        private function emptyInputs(){
            $status = true;
            if (empty($this->name) || empty($this->email) || empty($this->password)){
                $status = false;
            }
            return $status;
        }
        // validation d'email
        private function isEmailValid(){
            return filter_var($this->email, FILTER_VALIDATE_EMAIL);
        }
        // validation de paassword
        private function isPasswordValid(){
            $status = true;
            if(strlen($this->password) < 4){
                $status = false;
            }
            return $status;
        }
        // check if the user exist in db
        private function userStatus(){
            return $this->checkUser($this->email);
        }
    }