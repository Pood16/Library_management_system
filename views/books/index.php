<?php 

    
    require_once '../../classes/controllers/bookController.php';
    $allBookscontroller = new bookController();
    $allBooks = $allBookscontroller ->showBooks();
    foreach($allBooks as $book){
        echo $book['title'] . "<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
</body>
</html>