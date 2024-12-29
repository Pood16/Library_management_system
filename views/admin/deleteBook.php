<?php 

$id =  $_GET['id'];

require_once '../../classes/controllers/bookController.php';

$book = new bookController();
$res = $book->deleteBookCtr($id);
header('Location: admin_dash.php?page=catalogue');

    