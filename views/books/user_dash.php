<?php
session_start();
if($_SESSION['user_role'] !== 'authenticated'){
    header('Location: ../aut/login.php');
    exit();
}
$user_name = isset($_SESSION['user_name'])? $_SESSION['user_name']: '';
$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : '';
// // echo $user_id;
// require '../../classes/models/Borrowing.php';
// $myBooks = new Borrowing();
// $books = $myBooks->myBorrowingBooks($user_id);
// // echo "<pre>";
// // print_r($books);
// // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 min-h-screen px-4 py-6">
            <div class="mb-8">
                <h2 class="text-2xl font-bold"><span class="text-red-500">Active: </span><?=$user_name?> (<?=$user_id?>)</h2>
            </div>
            
            <!-- Navigation -->
            <nav>
                <ul class="space-y-2">
                    <li>
                        <button data-section = "search" onclick="showContent('search')" 
                                class="nav-link w-full flex items-center space-x-2 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors"
                                data-active="true">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span>Exploiter</span>
                        </button>
                    </li>
                    <li>
                        <button data-section="borrowed" onclick="showContent('borrowed')" 
                                class="nav-link w-full flex items-center space-x-2 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>Mes Emprunts</span>
                        </button>
                    </li>
                    <li>
                        <button data-section="" onclick="showContent('notifications')" 
                                class="nav-link w-full flex items-center space-x-2 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span>Notifications</span>
                        </button>
                    </li>
                    <li>
                        <a href="../aut/logout.php" class="nav-link w-full flex items-center space-x-2 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">Log out</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- search and filter -->
            <div id="search-content" class="content-section">
                <h2 class="text-2xl font-bold mb-6">Catalogue Des Livres</h2>
                <?php include '../books/showBooksInDash.php'?>
            </div>

            <!-- Borrowed Books Content -->
            <?php include 'myBorrowing.php'?>

            <!-- Notifications Content -->
            <div id="notifications-content" class="content-section hidden">
                <h2 class="text-2xl font-bold mb-6">Notifications</h2>
                <div class="space-y-4">
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="ml-3">
                                <p class="text-yellow-700">
                                    Rappel: Le livre "Les Misérables" doit être retourné dans 2 jours.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Function to handle navigation
        function showContent(section) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show selected content section
            document.getElementById(`${section}-content`).classList.remove('hidden');

            // Update active state of nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('bg-gray-700');
            });
            event.currentTarget.classList.add('bg-gray-700');
        }

        // Initialize the first section as active
        document.addEventListener('DOMContentLoaded', () => {
            showContent('search');
        });
    </script>
    <?php if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'catalogue':
                echo "<script>document.querySelector('a[data-section=\"catalog\"]').click();</script>";
                break;
            case 'users':
                echo "<script>document.querySelector('a[data-section=\"users\"]').click();</script>";
                break;
        }
    }
    ?>
</body>
</html>

