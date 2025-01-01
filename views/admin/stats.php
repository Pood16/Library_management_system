
<?php 

    require '../../classes/models/Borrowing.php';
    $book = new Borrowing();
    $rows = $book->stats();
    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>";
    // die();

?>
<table class="w-full">
<thead>
    <tr class="text-left bg-gray-50">
        <th class="p-3">Titre</th>  
        <th class="p-3">nombre des empruntes</th>
    </tr>
</thead>
<tbody>
    <?php foreach($rows as $row){?>
    <tr class="border-t">
        <td class="p-3"><?=$row['title']?></td>
        <td class="p-3"><?=$row['number_of_borrowings']?></td>  
    </tr>
    <?php }?>
</tbody>
</table>