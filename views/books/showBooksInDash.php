<?php 
    require_once '../../classes/controllers/bookController.php';
    require_once '../../classes/controllers/catController.php';
 
    $myCats = new catController();
    $catsRes = $myCats->getAllCats();
   
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';

    $allBookscontroller = new bookController();
    $allBooks = $allBookscontroller ->showBooks($search, $category);
?>


<div class="space-y-6">
    <form method="POST" action="" class="flex justify-between">
        <div class="flex justify-between items-center">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Rechercher par titre ou auteur" 
                   class="px-4 py-2 rounded-lg border focus:outline-none focus:ring-1 focus:ring-blue-500">
            <select name="category" class="px-4 py-2 rounded-lg border focus:outline-none focus:ring-1 focus:ring-blue-500">
                   <option value="">All</option>
                   <?php foreach($catsRes as $key => $value){?>
                        <option value="<?=$value['id']?>" <?=$category == $value['id'] ? 'selected' : ''; ?>><?=$value['name']?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Filter" class="ml-2 px-4 py-2 bg-blue-600 cursor-pointer text-white rounded-lg hover:bg-gray-700 transition-colors focus:outline-none focus:ring-1 focus:ring-blue-500">
        </div>
    </form>
    <!-- Search Results -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
    </div>
</div>
    



                    
                
