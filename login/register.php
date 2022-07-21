<?php
    session_start();
    $title = "Inscription";
    require_once "./config.php";
    require_once "../class/User.php";

    // $title = "create account";
    $errors = null;
    if(isset($_POST['username'], $_POST['email'], $_POST['pwd'], $_POST['details'], $_POST['profession'])){
        $user = new User($_POST['username'], $_POST['email'], $_POST['pwd'], $_POST['details'], $_POST['profession']);
        if($user->isValid()){

        }else{
            $errors = $user->getErrors();
        }
    }

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

        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger">
                Formulaireinvalide
            </div>
            <?php endif ?>
        <?php
            if(isset($_POST['username'], $_POST['email'], $_POST['pwd'], $_POST['details'], $_POST['profession'])){
                // recuperer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($conn, $username);
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($conn, $email);
                $pwd = stripslashes($_REQUEST['pwd']);
                $pwd = mysqli_real_escape_string($conn, $pwd);
                $details = stripslashes($_REQUEST['details']);
                $details = mysqli_real_escape_string($conn, $details);
                $profession = stripslashes($_REQUEST['profession']);
                $profession = mysqli_real_escape_string($conn, $profession);

                $query = "INSERT INTO `user`(username, email, pwd, details, profession) VALUES ('$username','$email', '".hash('sha256',$pwd)."', '$details', '$profession')";
                $res = mysqli_query($conn, $query);
                if($res){
                    echo "<div class='success'>
                     <h3>Vous êtes inscrits avec succès.</h3>
                     <p>cliquez ici pour vous <a href='./connexion.php>connecter</a><p>
                     </div>";
                }
                    
            }else{
                ?>
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
                        <?php if(isset($errors['username'])): ?>
                            <div class="invalid-feedback"><?= $errors['username'] ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-box">
                        <label for="email" id="email">Email</label>
                        <input type="email" name="email" placeholder="entrer votre email" required>
                    </div>

                    <div class="input-box">
                        <label for="pwd" id="pwd">Password</label>
                        <input type="password" name="pwd" placeholder="entrer votre mot de passe" <?= isset($errors['pwd']) ? 'is-invalid' : '' ?> required>
                        <?php if(isset($errors['pwd'])): ?>
                            <div class="invalid-feedback"><?= $errors['pwd'] ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-box">
                        <label for="pwd" id="pwd">Confirm password</label>
                        <input type="password" name="pwd" placeholder="Confirmer votre mot de passe" <?= isset($errors['pwd']) ? 'is-invalid' : '' ?> required>
                        <?php if(isset($errors['pwd'])): ?>
                            <div class="invalid-feedback"><?= $errors['pwd'] ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-box">
                        <label for="details" id="details">Details of your profession</label>
                        <textarea name="details" placeholder="quelques détails sur votre profession" <?= isset($errors['details']) ? 'is-invalid' : '' ?>required id="details" cols="30" rows="10"></textarea>
                        <?php if(isset($errors['details'])): ?>
                            <div class="invalid-feedback"><?= $errors['details'] ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-box">
                        <label for="profession" id="profession">Profession</label> 
                        <select name="profession" id="profession">
                            <option name="etudiant" value="etudiant">Etudiant</option>
                            <option name="enseignant" value="Enseignant">Enseignant</option>
                        </select>
                    </div>  
                </div>
                <button onclick="problem();" type="submit">Create account</button>
            </form>
            <?php } ?>
        </div>
    </body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function validation(){
            swal({
                text: "Création du compte reussie!",
                icon: "success",
                button: "Aww yiss!",
            });
        }

        // function problem(){
        //     swal("Oups", "Something went wrong", "error")
        // }
    </script>
</html>