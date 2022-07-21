<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="shorcut icon" href="./images/alien-153542__340.jpg">
        <script defer src="./script.js"></script>
        <link rel="stylesheet" href="./style1.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <div class="home-content">
            <header>
                <span>Ma Biblio</span>
            </header>
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
                    <a href="./login/connexion.php">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span class="links_name">Connexion</span>
                    </a>
                    <span class="tooltip">Connexion</span>
                </li>
                <li>
                    <a href="./login/register.php">
                        <i class="fa-solid fa-angle-right"></i>
                        <span class="links_name">Inscription</span>
                    </a>
                    <span class="tooltip">Inscription</span>
                </li>
            </ul>
        </div>