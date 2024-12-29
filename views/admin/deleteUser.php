<?php 

    require_once '../../classes/controllers/userController.php';
    $users = new userController();
    $users->deleteSelectedUser($_GET['id']);
    // echo $_GET['id'];
    header('Location: admin_dash.php?page=users');
    
   


