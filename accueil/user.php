<?php
    // initialiser la session
    session_start();
    // verifier si l'utilisateur est connecté et si c'est pas le cas, le rediriger ver la zone de connexion
    if(!isset($_SESSION['username'])){
        header("Location: ../login/login.php");
        exit();
    }
    // $nomuser = null;
    // if(!empty($_COOKIE['username'])){
    //     $nomuser = $_POST['username'];
    // }
    // if(!empty($_POST['username'])){
    //     setcookie('username',  $_POST['username']);
    //     $nomuser = $_POST['username'];
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="shorcut icon" href="./images/alien-153542__340.jpg">
    <link rel="stylesheet" href="../style1.css">
    <script defer src="./script.js"></script>
    <title>page user</title>
</head>
    <body>
        <div class="sidebar">
            <div class="logo-container">
                <div class="logo">
                    <i class="fa-solid fa-book-open"></i>
                    <div class="logo_name">Book</div>
                </div>
                <i class="fa-solid fa-bars" id="btn"></i>
            </div>
            <ul class="new-list">
                <li>
                    <a href="./index.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="links_name">Accueil</span>
                    </a>
                    <span class="tooltip">Accueil</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-info"></i>
                        <span class="links_name">A propos</span>
                    </a>
                    <span class="tooltip">A propos</span>
                </li>
                <li>
                    <a href="./login/logout.php">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span class="links_name">Déconnexion</span>
                    </a>
                    <span class="tooltip">Déconnexion</span>
                </li>
            </ul>
        </div>
        <div class="home-content">
            <header>
                <span>Ma Biblio</span>
            </header>
        </div>
        <?php echo $_SESSION['username']; ?>
    </body>
    <script>
        let boutton = document.querySelector("#btn")
        let sidebar= document.querySelector(".sidebar")

        boutton.onclick = function(){
            sidebar.classList.toggle("active")
        }
    </script>
</html>