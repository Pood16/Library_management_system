<?php




require_once '../../classes/controllers/catController.php';
require_once '../../classes/controllers/bookController.php';

$errors = [
    'title' => '',
    'author' => '',
    'category_name' => '',
    'cover_image' => '',
    'summary' => '',
    'general' => ''
];

$myCats = new catController();
$catsRes = $myCats->getAllCats();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bookController = new bookController();
    $result = $bookController->addBookCtr($_POST);


   
    if ($result === true) {
        header('Location: createBook.php?the_book_was_added');
        exit();
    } else {
        $errors = $result;
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
        <span class='text-red-500'><?=$errors['general']?></span>
        <form class="space-y-3" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" 
                    class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span class="text-red-500"><?=$errors['title']?></span>
            </div>

            
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" id="author" name="author"
                    class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span class="text-red-500"><?=$errors['author']?></span>
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category" class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <?php foreach($catsRes as $key => $value){?>
                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <input type="text" id="covar_image" name="cover_image" 
                    class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <span class="text-red-500"><?=$errors['cover_image']?></span>

            </div>

            <div>
                <label for="summury" class="block text-sm font-medium text-gray-700">Summary</label>
                <textarea id="summury" name="summary" rows="4" class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                <span class="text-red-500"><?=$errors['summary']?></span>

            </div>
            
        
            <div class="flex justify-center items-center gap-5">
                <button type="submit"
                    class="mt-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500">
                    Ajouter
                </button>
                <a href="../admin/admin_dash.php"
                    class="mt-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Retour
                </a>
            </div>
        
            
            
        </form>
     
    </div>
</body>
</html>