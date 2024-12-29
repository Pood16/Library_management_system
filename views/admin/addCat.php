<?php

require_once '../../classes/controllers/catController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo $_POST['category_name'];
    $catController = new catController();
    $result = $catController->createCat($_POST['category_name']);
    
    
    if ($result === true) {
       
        header('Location: addCat.php?the_Cat_was_added');

        exit();
    } else {

        $errors = $result;
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        echo "<br>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Add Category</h2>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <div class="mb-4">
                <label for="category_name" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                <input type="text" id="category_name" name="category_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add</button>
                <a href="admin_dash.php?page=catalogue" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Go Home</a>
            </div>
        </form>
    </div>
</body>
</html>