<?php

require_once '../../classes/controllers/bookController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bookController = new bookController();
    $result = $bookController->addBookCtr($_POST);
    
    if ($result === true) {
        header('Location: createBook.php?the_book_was_added');
        exit();
    } else {
        // header('Location: createBook.php?the_book_was_not_added');
        $errors = $result;
        echo "<pre>";
        print_r($errors);
        echo "</pre>";

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
    <title>Create a book</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-xl w-full flex flex-col p-8 shadow-lg rounded-lg overflow-hidden bg-white">
        <!-- Form  -->
        <h2 class="text-3xl text-center font-bold text-gray-800">Ajouter Un Livre</h2>
        <form class="" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" 
                    class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" id="author" name="author"
                    class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_name" id="category" class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="*">All</option>
                    <option value="roman">Roman</option>
                </select>
            </div>
            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <input type="text" id="covar_image" name="cover_image" 
                    class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="summury" class="block text-sm font-medium text-gray-700">Summary</label>
                <textarea id="summury" name="summary" rows="4" class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            
        
       
            <button type="submit"
                class="w-full mt-4 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Ajouter
            </button>

            
        </form>
     
    </div>
</body>
</html>