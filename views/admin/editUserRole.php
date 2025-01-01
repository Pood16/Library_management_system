
<?php 
    require_once '../../classes/controllers/userController.php';
    $id = $_GET['id'];
    $user = new UserController();
    $row = $user->getUserById($id);
    // change
    if ($_SERVER['REQUEST_METHOD']== 'POST'){
        $user->updateuserRole($_POST['id'], $_POST['userRole']);
        header("Location: admin_dash.php?page=users");
    }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role Modal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center">
        <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Changer Le Role de  <span class="text-blue-600"><?=$row['name']?></span></h2>
            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <!-- Select -->
                <label for="userRole" class="block text-gray-700 font-medium mb-2">Role</label>
                <select id="userRole" name="userRole" class="block w-full border border-gray-300 rounded-lg px-3 py-2 mb-4">
                    <option value="<?=$row['role']?>" selected><?=$row['role']?></option>
                    <option value="admin">Admin</option>
                    <option value="authenticated">Authenticated</option>
                </select>
                <input type="hidden" name="id" value="<?=$row['id']?>">
          
                <div class="flex justify-end gap-4">
                    <a href="admin_dash.php?page=users" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                        Cancel
                    </a>
                    <button 
                        type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



