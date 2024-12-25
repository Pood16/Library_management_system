<!-- manage data from inputs -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $username."<br>";
        echo $email."<br>";
        echo $password."<br>";
        // instantiate signupController class

        include '../Classes/Database.php';
        include '../Classes/Signup.classes.php';
        include '../Classes/Signup-contr.classes.php';
        $signup = new SignupContr($username, $email, $password);

        $signup->signupUser();


    }


