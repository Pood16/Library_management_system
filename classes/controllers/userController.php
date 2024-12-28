<?php

require '../../classes/models/User.php'; 

class UserController {

    
    private $validation_errors = [
        'name' => '',
        'email' => '',
        'password' => ''
    ];
    private $is_valid = true;

    
    public function register($post_data) {
        // Validate input
        $post_data = $this->sanitizeInput($post_data);
        $this->validateRegistrationData($post_data);
        
        if (!$this->is_valid) {
            return $this->validation_errors;
        }

        // Create new user
        $user = new User(
            $post_data['username'],
            $post_data['email'],
            $post_data['password']
        );

        // Check if email exists
        if ($user->checkUser()) {
            $this->validation_errors['email'] = 'Email already exists';
            return $this->validation_errors;
        }

        //  user
        try {
            $user->setUser();
            return true;
        } catch (Exception $e) {
            $this->validation_errors['general'] = 'Registration failed';
            return $this->validation_errors;
        }
    }

    
    // Handle user login
    
    public function login($post_data) {
        // Validate input
        if (empty($post_data['email']) || empty($post_data['password'])) {
            $this->validation_errors['general'] = 'Please fill in all fields';
            return $this->validation_errors;
        }

        // Cuser object 
        $user = new User('', $post_data['email'], $post_data['password']);

      
        $user_data = $user->getUser();
        
        
        if ($user_data) {
            
            session_start();
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_name'] = $user_data['name'];
            $_SESSION['user_role'] = $user_data['role'];
            return true;
        }

        $this->validation_errors['general'] = 'Invalid email or password';
        return $this->validation_errors;
    }

   
    private function validateRegistrationData($data) {
        // Validate name
        if (empty($data['username'])) {
            $this->validation_errors['name'] = 'Name is required';
            $this->is_valid = false;
        }

        // Validate email
        if (empty($data['email'])) {
            $this->validation_errors['email'] = 'Email is required';
            $this->is_valid = false;
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->validation_errors['email'] = 'Invalid email format';
            $this->is_valid = false;
        }

        // Validate password
        if (empty($data['password'])) {
            $this->validation_errors['password'] = 'Password is required';
            $this->is_valid = false;
        } elseif (strlen($data['password']) < 4) {
            $this->validation_errors['password'] = 'Password must be at least 4 characters';
            $this->is_valid = false;
        }
    }

    // log out
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../views/aut/login.php');
        exit();
    }

    public function sanitizeInput($data) {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars(trim($value));
        }
        return $data;
    }
  
}
?>
