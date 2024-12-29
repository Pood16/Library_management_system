

<?php 

    require_once '../../classes/controllers/userController.php';
    $users = new userController();
    $showUsers = $users->getAllUsers();
    
   


?>
<table class="w-full">
    <thead>
        <tr class="text-left bg-gray-50">
            <th class="p-3">Nom</th>
            <th class="p-3">Email</th>
            <th class="p-3">Role</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($showUsers as $user){?>
        <tr class="border-t">
            <td class="p-3"><?=$user['name']?></td>
            <td class="p-3"><?=$user['email']?></td>
            <td class="p-3"><?=$user['role']?></td>
            <td class="p-3 flex gap-5">
            
                <a href="editUserRole.php?id=<?=$user['id']?>" class="text-blue-500"><i class="fas fa-edit"></i></a>
                <a href="deleteUser.php?id=<?=$user['id']?>" class="text-red-500"><i class="fas fa-trash"></i></a>
                
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>



