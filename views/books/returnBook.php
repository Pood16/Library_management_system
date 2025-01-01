<?php

require '../../classes/models/Borrowing.php';
$book_id = isset($_GET['id_book'])? $_GET['id_book'] : '0';


$myBooks = new Borrowing();
$books = $myBooks->returnBook($book_id);
if ($books){
    header('Location: user_dash.php');
}else{
    echo "failed";
}