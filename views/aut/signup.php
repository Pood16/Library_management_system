<?php
require_once '../../classes/controllers/userController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $controller = new UserController();
    $result = $controller->register($_POST);
    
    if ($result === true) {
        header('Location: login.php?comming-from-signup');
        exit();
    } else {
        $errors = $result;
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full flex shadow-lg rounded-lg overflow-hidden bg-white">
        <!-- Image  -->
        <div class="hidden md:block w-1/2 bg-cover bg-center">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=600&h=800" 
                 alt="Library Books" 
                 class="w-full h-full object-cover"/>
        </div>
        
        <!-- Form  -->
        <div class="w-full md:w-1/2 p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Create Account</h2>
                <p class="text-gray-600 mt-2">Join our library community</p>
                <span class="text-red-400"></span>
            </div>

            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="space-y-6">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                    <span class="text-red-400"></span>

                </div>

                <!-- Email  -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                    <span class="text-red-400"></span>

                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500">
                    <span class="text-red-400"></span>
                </div>

                <!-- Register Button -->
                <button type="submit" name="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Register
                </button>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600">
                    Already have an account? 
                    <a href="login.php" class="font-medium text-blue-600 hover:text-blue-500">Log in</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>