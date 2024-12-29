


<?php 
     require_once '../../classes/controllers/bookController.php';
    //  require_once '../../classes/controllers/catController.php';
     $allBookscontroller = new bookController();
     $allBooks = $allBookscontroller ->showBooks();
    

     
?>
<table class="w-full">
<thead>
    <tr class="text-left bg-gray-50">
        <th class="p-3">Cover Image</th>
        <th class="p-3">Titre</th>
        <th class="p-3">Auteur</th>
        <th class="p-3">Catégorie</th>
        <th class="p-3">Status</th>
        <th class="p-3">Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach($allBooks as $book){?>
    <tr class="border-t">
        <td class="p-3"><img src="<?=$book['cover_image']?>" alt="<?=$book['title']?> . cover" class="w-12 h-16"></td>
        <td class="p-3"><?=$book['title']?></td>
        <td class="p-3"><?=$book['author']?></td>
        <td class="p-3"><?=$book['name']?></td>
        <td class="p-3"><?=$book['status']?></td>
        <td class="p-3">
            <a href="editBook.php?id=<?=$book['id']?>" class="text-blue-500 mr-2"><i class="fas fa-edit"></i></a>
            <a href="deleteBook.php?id=<?=$book['id']?>" class="text-red-500"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>

