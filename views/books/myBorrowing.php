

<?php
require '../../classes/models/Borrowing.php';
$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : '';

$myBooks = new Borrowing();
$books = $myBooks->myBorrowingBooks($user_id);
// echo "<pre>";
// print_r($books);
// echo "</pre>";



?>

<div id="borrowed-content" class="content-section">
    <h2 class="text-2xl font-bold mb-6">Mes Emprunts</h2>
    <table class="w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="text-left py-2 px-4">Titre</th>
                <th class="text-left py-2 px-4">Auteur</th>
                <th class="text-left py-2 px-4">Date d'emprunt</th>
                <th class="text-left py-2 px-4">Date de retour</th>
                <th class="text-left py-2 px-4">Jours restants</th>
                <th class="text-left py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book){?>
            <tr class="border-b">
                <td class="py-2 px-4"><?=$book['title']?></td>
                <td class="py-2 px-4"><?=$book['author']?></td>
                <td class="py-2 px-4"><?=$book['borrow_date']?></td>
                <td class="py-2 px-4"><?=$book['due_date']?></td>
                <td class="py-2 px-4 text-center"><?=$book['remainig_days']?></td>
                <td class="py-2 px-4">
                    <a href="returnBook.php?id_book=<?=$book['book_id']?>" class="text-red-500 px-4 py-2 cursor-pointer rounded-lg">
                        Retourner
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>