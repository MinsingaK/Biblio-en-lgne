<?php
    //On vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
        if(isset($_POST['username'], $_POST['pwd'], $_POST['email'], $_POST['details'], $_POST['profession'])){
            //on récupère les données
            $username = strip_tags($_POST['username']);
            $email = strip_tags($_POST['email']);  
            $pwd = password_hash($_POST['pwd'], PASSWORD_ARGON2ID);
            $details = strip_tags($_POST['details']);
            $profession = strip_tags($_POST['profession']);

            //On enregistre en bd
            require_once "./config.php";
            $sql = "INSERT INTO `users`(`username`, `pwd`, `email`, `details`, `profession`) VALUES (:username,'$pwd',:email, :details, :profession)";
            
            $query = $db->prepare($sql);
            
            $query->bindValue(":username", $username, PDO::PARAM_STR);
            $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
            $query->bindValue(":details", $details, PDO::PARAM_STR);
            $query->bindValue(":profession", $profession, PDO::PARAM_STR);  
            
            $query->execute();

        }
    }
    //require_once "../class/User.php";

    $title = "Inscription";
    // $errors = null;
    // if(isset($_POST['username'], $_POST['email'], $_POST['pwd'], $_POST['details'], $_POST['profession'])){
    //     $user = new User($_POST['username'], $_POST['email'], $_POST['pwd'], $_POST['details'], $_POST['profession']);
    //     if($user->isValid()){

    //     }else{
    //         $errors = $user->getErrors();
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="../style.css">
        <title><?= $title ?></title>
    </head>
    <body class="body3">
        <header>
            <span>Ma Biblio</span>
            <nav>
                <ul>
                    <div>
                        <li><a href="../index.php">Accueil</a></li>
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div>
                        <li><a href="#">A propos</a></li>
                        <i class="fa-solid fa-info"></i>
                    </div>
                </ul>
            </nav>
        </header> 
        <div class="register-box">
            <p>Veuillez remplir les champs suivants!!!</p>
                    
            <form action="register.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <label for="username" id="username">Username</label>
                        <input type="text" name="username" placeholder="entrer votre nom d'utilisateur" <?= isset($errors['username']) ? 'is-invalid' : '' ?> required>
                        
                    </div>
                    <div class="input-box">
                        <label for="email" id="email">Email</label>
                        <input type="email" name="email" placeholder="entrer votre email" required>
                    </div>

                    <div class="input-box">
                        <label for="pwd" id="pwd">Password</label>
                        <input type="password" name="pwd" placeholder="entrer votre mot de passe" <?= isset($errors['pwd']) ? 'is-invalid' : '' ?> required>
                        
                    </div>
                    <div class="input-box">
                        <label for="repeatpwd" id="repeatpwd">Confirm password</label>
                        <input type="password" name="repeatpwd" placeholder="Confirmer votre mot de passe" <?= isset($errors['pwd']) ? 'is-invalid' : '' ?> required>
                        
                    </div>
                    <div class="input-box">
                        <label for="details" id="details">Details of your profession</label>
                        <textarea name="details" placeholder="Quelques détails sur votre profession" <?= isset($errors['details']) ? 'is-invalid' : '' ?>required id="details" cols="30" rows="10"></textarea>
                        
                    </div>
                    <div class="input-box">
                        <label for="profession" id="profession">Profession</label> 
                        <input type="text" name="profession" placeholder="entrer votre profession" required>
                    </div>  
                </div>
                <button type="submit">Create account</button>
            </form>
        </div>
    </body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

    </script>
</html>