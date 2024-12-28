<?php 
    $id =  $_GET['id'];
    // echo $id;
    require_once '../../classes/controllers/bookController.php';
    require_once '../../classes/controllers/catController.php';

    $myCats = new catController();
    $catsRes = $myCats->getAllCats();
  
    $book = new bookController();
    $res = $book->getBook($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $book->updateBookCtr($_POST);
        header('Location: ../admin/admin_dash.php');
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
        
        <form class="space-y-3" method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
            
            <div>
                <label for="title" class="block text-sm font-medium text-black">Titre</label>
                <input type="text" id="title" name="title" value="<?=$res['title']?>" 
                    class="mt-1 text-gray-700 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                   
            </div>

            
            <div>
                <label for="author" class="block text-sm font-medium text-black">Author</label>
                <input type="text" id="author" name="author" value="<?=$res['author']?>" 
                    class="mt-1 block text-gray-700 w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                  
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-black">Category</label>
                <select name="category_id" id="category" class="mt-1 text-gray-700 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="<?=$res['id']?>"><?=$res['name']?></option>
                <?php foreach($catsRes as $key => $value){?>
                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-black">Status</label>
                <select name="status" id="status" class="mt-1 text-gray-700 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="<?=$res['status']?>" selected><?=$res['status']?></option>
                    <option value="reserved">Reserved</option>
                    <option value="borrowed">Borrowed</option>
                    
                </select>
            </div>
                <label for="cover_image" class="block text-sm font-medium text-black">Cover Image</label>
                <input type="text" id="covar_image" name="cover_image" value="<?=$res['cover_image']?>"  
                    class="mt-1 text-gray-700 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                   

            </div>

            <div>
                <label for="summury" class="block  text-sm font-medium text-black">Summary</label>
                <textarea id="summury" name="summary"  rows="4" class="mt-1 text-gray-700 block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"><?=$res['summary']?></textarea>
            </div>
            <input type="hidden" value="<?=$id?>" name="id">
            
        
            <div class="flex justify-center items-center gap-5">
                <button type="submit"
                    class="mt-4 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500">
                    Modifier
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