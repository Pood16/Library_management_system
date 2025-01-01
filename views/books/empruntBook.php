
<?php 
    session_start();
    require '../../classes/models/Borrowing.php';
    $borrowBook = new Borrowing();
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $book_id = isset($_GET['id']) ? $_GET['id'] : '';
    $book_title = isset($_GET['title']) ? $_GET['title'] : '';
    $book_author = isset($_GET['author']) ? $_GET['author'] : '';
    $date= new DateTime();
    $date->modify('+15 days');
    $dueDate = $date->format('Y-m-d');
    $message_correct = $message_failed = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $res = $borrowBook->setBorrowingBook($_POST['user_id'], $_POST['book_id'],$_POST['borrowed_date'], $dueDate);
        // echo $res;
        // die();
        if($res){
            $message_correct = 'Vous aver emprunter Le livre avec succes';
        }else{
            $message_failed = 'Le livre n\'est pas emprunter';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunter un Livre</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-col justify-center items-center">
                <h2 class="text-2xl font-bold">Emprunter Le Livre</h2>
                <span class="p-5 text-center text-green-500"><?=$message_correct?></span>
                <span class="p-5 text-center text-red-500"><?=$message_failed?></span>
            </div>
            <form method="POST" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="book_title">
                        Titre du Livre
                    </label>
                    <input value="<?=$book_title?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="book_title" name="book_title" type="text" placeholder="titre de livre">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="book_author">
                        Auteur du Livre
                    </label>
                    <input value="<?=$book_author?>" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="book_author" name="book_author" type="text" placeholder="author de livre">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="borrowed_date">
                        Date d'emprunt
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="borrowed_date" name="borrowed_date" type="date" value="<?php echo date('Y-m-d'); ?>" readonly >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="due_date">
                        Date de retour
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="due_date" name="due_date" type="date" value="<?=$dueDate?>" readonly>
                </div>
                <input type="hidden" name="book_id" value="<?=$book_id?>">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
               

                <div class="flex items-center justify-between">
                    <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Confirmer
                    </button>
                    <a href="user_dash.php?page=" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Mes Livres
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


