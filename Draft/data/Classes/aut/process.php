

<!-- Register -->
<?php 
    $username_error = $user_email_error = $user_password_error = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        // user name
        if (empty($_POST['username'])){
                $username_error = "Attention: nom est obligatoire";
        }else{
            $username = check_input($_POST['username']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
                $username_error = "Seules les lettres et les espaces sont autorisés";
            }
        }
        // user email

        if (empty($_POST['email'])){
            $user_email_error = "Attention: Email est Obligatoire";
        }
        else{
            // $user_email = check_input($_POST['email']);
            if (!filter_var(check_input($_POST['email']), FILTER_VALIDATE_EMAIL)){
                $user_email_error = "Format d'email n'est pas valide";
            }else{
                $tmp = check_input($_POST['email']);
                $sql = $connect -> prepare ("SELECT email, user_role FROM utilisateurs WHERE email = ?");
                $sql -> bind_param("s", $tmp);
                $sql -> execute();
                $resultat = $sql -> get_result();
                if($resultat -> num_rows > 0) {
                    $user_email_error = "Email deja utilise, Essayer avec autre";
                }else{
                    $user_email = check_input($_POST['email']);
                }
            }
            
        }
        // password
        if (empty($_POST['password'])){
            $user_password_error = "Attention: mot de passe et Obligatoire";
        }else {
            $tmp = check_input($_POST['password']);
            if (strlen($tmp) < 4) {
                $user_password_error = "mot de passe doit contient aumoins 4 carecteres";
            }else{
                $user_password = password_hash($tmp, PASSWORD_DEFAULT);
            }
        }
        // Register user in database
        if (isset($username) && isset($user_email) && isset($user_password)){
            if ($username == "admin" && $user_email == "admin@admin.com"){
                $user_role = "admin";
            }else{
                $user_role = "utilisateur"; 
            }
            try{
                // insert admi into database
                $s = "ALTER TABLE utilisateurs AUTO_INCREMENT = 2";
                $connect -> query($s);
                $sql = $connect -> prepare("INSERT INTO utilisateurs (user_role, nom_utilisateur, mot_de_passe, email) VALUES (?,?,?,?)");
                $sql -> bind_param("ssss", $user_role, $username, $user_password, $user_email);
                $sql -> execute();
                switch($user_role){
                    case "admin":
                        $_SESSION['user_name'] = "admin";
                        $_SESSION['user_email'] = $user_email;
                        $_SESSION['user_role'] = "admin";
                        $_SESSION['log_in'] = true;
                        header('Location: ../admin/admin_dashboard.php');
                        break;
                    case "utilisateur":
                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['user_email'] = $user_email;
                        $_SESSION['user_role'] = $user_role;
                        $_SESSION['log_in'] = true;
                        header("Location: ../user/user_dashboard.php");
                        break;
                    default:
                        header("Location: ../authentication/register.php");
                        break;
                }
            }catch(mysqli_sql_exception $err){
                echo "Failed to insert user " . $err -> getMessage();
            }
          
                
            

        }
    }
    // validation de chaque input
    function check_input($input_value){
        $input_value = trim($input_value);
        $input_value = stripslashes($input_value);
        $input_value = htmlspecialchars($input_value);
        return $input_value;
    }
?>
<!-- End Register -->