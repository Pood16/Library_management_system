<?php 

    
    require_once '../../classes/controllers/bookController.php';
    $books = new bookController();
    $books->showBooks();
    foreach($books as $book){
        echo $book . "<br>";
    }