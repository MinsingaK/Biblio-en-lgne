<?php
    session_start();
    @$nomuser = $_POST['nomuser'];
    @$pwd = $_POST['pwd'];
    @$login = $_POST['login'];
    $message="";
    if(isset($login)){
        include("config.php");
        $res=$pdo->prepare("SELECT * FROM users WHERE nomuser=? AND pwd=? LIMIT 1");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute(array($nomuser,md5($pwd)));
        $tab=$res->fetchAll();
        if(count($tab)==0){
            $message="<span>Mauvais login ou mot de passe</span>";
        }else{
            $_SESSION["autoriser"]="oui";
            $_SESSION["nomuser"]=strtoupper($tab[0]["nomuser"]);
            header("location:user.php");
        }
    }
    $title="Connexion";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="./style.css">
        <title><?= $title ?></title>
    </head>
    <body class="body2">
    

    <?php
        //require '../functions/func.php';
        // if(est_connecte()){
        //     header("Location: ../accueil/user.php");
        //     exit();
        // }
    ?>
        <header>
            <span>Ma Biblio</span>
            <nav>
                <ul>
                    <div>
                        <li><a href="./index.php">Accueil</a></li>
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
            <?php
                /*require_once('config.php');
                session_start();
                if(isset($_POST['username'])){
                    $username = stripslashes($_REQUEST['username']);
                    $username = mysqli_real_escape_string($conn, $username);
                   
                    $pwd = stripslashes($_REQUEST['pwd']);
                    $pwd = mysqli_real_escape_string($conn, $pwd);

                    $query = "SELECT * FROM `users` WHERE username='$username' and pwd='".hash('sha256',$pwd)."'";

                    $result = mysqli_query($conn, $query) or die(mysql_error());
                    $rows =mysql_num_rows($result);

                    if($rows == 1){
                        $_SESSION['username'] = $username;
                        header("Location: user.php");
                    }else{
                         echo "le nom d'utilisateur ou le mot de passe est incorrect";
                    }
                }*/    
                ?>
            <form action="loginUser.php" method="POST">
                <div class="form-control">
                    <input name="nomuser" type="text" required />
                    <label>Username</label>
                </div>
                <div class="form-control">
                    <input name="pwd" type="password" required />
                    <label>Password</label>
                </div>
                <a id="forgot" href="#">Mot de passe oublié?</a>
                <button name="login" type="submit" class="btn">Login</button>
                <p class="text">Don't have an account?<a href="register.php">Register</a></p>
                
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