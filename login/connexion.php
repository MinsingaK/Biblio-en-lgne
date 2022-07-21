<?php
    require_once "./config.php";
    $title="connexion";
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
    <body class="body2">
    <?php
        if(isset($_POST['username'])){
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

            $query = "SELECT * FROM `user` WHERE username='$username' and email='$email' and details='$details' and profession='$profession' and pwd='".hash('sha256',$pwd)."'";

            $result = mysqli_query($conn, $query) or die(mysql_error());

            $rows = mysqli_num_rows($result);

            if($rows == 1){
                $_SESSION['username'] = $username;
                header("Location: ../accueil/user.php");
            }else{
                $message = "le nom d'utilisateur ou le mot de passe  est incorrect";
            }
        }    
    ?>

    <?php
        require '../functions/func.php';
        if(est_connecte()){
            header("Location: ../accueil/user.php");
            exit();
        }
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
        <div class="card-box">
            <h1>Please Login</h1>
            <form action="" method="POST">
                <div class="form-control">
                <input name="username" type="text" required />
                <label>Username</label>
                </div>
            
                <div class="form-control">
                <input name="pwd" type="password" required />
                <label>Password</label>
                </div>
                <!-- <a href="#">forgotten password?</a> -->
                <button class="btn">Login</button>
                <p class="text">Don't have an account?<a href="../login/register.php">Register</a></p>
                <?php if(!empty($message)): ?>
                    <p class="errorMessage"> <?php echo $message; ?></p>
                <?php endif ?>
            </form>
        </div>
    </body>
    <script>
        /**********************traitement de l'input sur le formulaire d'authentification*****************************************/
        const labels = document.querySelectorAll(".form-control label")
        labels.forEach((label) => {
            label.innerHTML = label.innerHTML
            .split("")
            .map(
            (letter, idx) =>
                `<span style="transition-delay:${idx * 50}ms">${letter}</span>`
            )
            .join("")
        })
    </script>
</html>