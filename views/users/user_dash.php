<?php
session_start();
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>User Dashboard</title>
</head>
<body>
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <form action="logout.php" method="post">
            <a href='../aut/login.php' type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Logout
            </a>
        </form>
        <div>
            Hello, <?php echo $_SESSION['user_name']; ?>
        </div>
    </header>
</body>
</html>