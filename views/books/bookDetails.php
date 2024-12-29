<!-- get book details based on the passed id -->
<?php
    $id = $_GET['id'];
    require_once '../../classes/controllers/bookController.php';
    $book = new bookController();
    $row = $book->getBook($id);
    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center">
        <div class="bg-white w-11/12 p-6 rounded-lg shadow-lg">
            <div class="flex justify-start">
                <a href="user_dash.php" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <h2 class="text-lg font-semibold mb-4">Details du Livre: <span class="text-blue-600"><?=$row['title']?></span></h2>
            <div class="flex space-x-4">
                <div class="w-full md:w-1/3 p-4">
                    <img src="<?=$row['cover_image']?>" alt="Book Cover" class="object-center mx-auto">
                </div>
                <div class="w-full md:w-2/3 p-4">
                    <h3 class="text-lg font-semibold mb-2"><?=$row['title']?></h3>
                    <p class="text-sm text-gray-700 mb-2"><span class="text-black font-bold">Author:</span> <?=$row['author']?></p>
                    <p class="text-sm text-gray-700 mb-2"><span class="text-black font-bold">Description: </span><br> <?=$row['summary']?></p>
                    <p class="text-sm text-gray-700 mb-2"><span class="text-black font-bold">Status: </span><?=$row['status']?></p>
                    <?php if($row['status'] == 'available'){?>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"> Emprunter </button>
                    <?php }elseif($row['status'] == 'borrowed'){ ?>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"> Reserver </button>
                    <?php  }else{ ?>
                        <p class="text-sm text-red-700 mb-2">Ce Livre n'est pas disponible pour le moment, merci de le consulter  ultérieurement </p>
                    <?php } ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>




    </div>
</body>
</html>



