<?php
    require_once '../../classes/controllers/userController.php';
    $errors = [
        'name' => '',
        'email' => '',
        'password' => '',
        'general' => ''
    ];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new UserController();
        $result = $controller->login($_POST);
        if ($result === true) {
            $user_role = $_SESSION['user_role'];
            checkRole($_SESSION['user_role']);
            exit();
        } else {
            $errors = $result;
        }
    } 
    function checkRole($role){
        $user_role = $role;
        switch($user_role){
            case 'admin':
                header('Location: ../admin/admin_dash.php');
                break;
            case 'authenticated':
                header('Location: ../books/user_dash.php');
                break;
            case 'visitor':
                header('Location: ../books/index.php');
                break;
            default:
                header('Location: login.php?the_role_is_undefined');
                break;
                
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full flex shadow-lg rounded-lg overflow-hidden bg-white">
        <!-- Image -->
        <div class="hidden md:block w-1/2 bg-cover bg-center">
            <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&h=800" 
                 alt="Library Interior" 
                 class="w-full h-full object-cover"/>
        </div>
        
        <!-- Form  -->
        <div class="w-full md:w-1/2 p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Login to your library account</p>
                <span class="text-red-500"><?=$errors['general']?></span>
            </div>

            <form class="space-y-6" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="text-red-500"><?=$errors['email']?></span>
                    </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="text-red-500"><?=$errors['password']?></span>
                    </div>

                
            
                <!-- Login Button -->
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Sign in
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="signup.php" class="font-medium text-blue-600 hover:text-blue-500">Register here</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>