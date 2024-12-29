<?php 
    require_once '../../classes/controllers/bookController.php';
    $allBookscontroller = new bookController();
    $allBooks = $allBookscontroller ->showBooks();
?>



    <!-- Book Box -->
    <?php foreach($allBooks as $book){?>
    <div class="bg-white rounded-lg shadow p-3 transform hover:-translate-y-1 transition">
        <img src="<?=$book['cover_image']?>" alt="<?=$book['title']?> Cover" class="w-full h-48 object-cover rounded-lg mb-4">
        <h3 class="font-bold text-lg"><?=$book['title']?></h3>
        <p class="text-gray-600"><?=$book['author']?></p>
        <div class="mt-4 flex justify-between items-center">
            <span class="text-green-600 text-sm"><?=$book['status']?></span>
            <div>
                <a href="bookDetails.php?id=<?=$book['id']?>" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"> Details </a>
            </div>
        </div>
    </div>
    <?php }?>



                    
                
