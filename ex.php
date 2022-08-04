<?php
    $title = "Page d'accueil";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="shorcut icon" href="./images/alien-153542__340.jpg">

        <link rel="stylesheet" href="style1.css">
        <title><?= $title ?></title>
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
                    <a href="loginUser.php">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span class="links_name">Connexion</span>
                    </a>
                    <span class="tooltip">Connexion</span>
                </li>
                <li>
                    <a href="register.php">
                        <i class="fa-solid fa-angle-right"></i>
                        <span class="links_name">Inscription</span>
                    </a>
                    <span class="tooltip">Inscription</span>
                </li>
            </ul>
        </div>
        <div class="home-content">
            <header>
                <span>Ma Biblio</span>
            </header>
            <section class="top">
                <h2>Bienvenue sur <span>Ma Biblio</span></h2>
                    <div id="cate" class="cat">
                        <select name="categorie" id="categorie">
                            <option value="histoire">Histoire</option>
                            <option value="geographie">Géographie</option>
                            <option value="mathematiques">Mathématiques</option>
                            <option value="informatique">Informatique</option>
                            <option value="science">Science</option>
                            <option value="physique">Physique</option>
                            <option value="chimie">Chimie</option>
                            <option value="physique">Economie</option>
                            <option value="chimie">Autre...</option>
                        </select>
                    </div>
            </section>
            <section class="contain">
                <div class="all-book">
                    <?php
                        
                        ?>
                         <table>
                            <tr>
                                <th>ID</th>
                                <th>Auteur</th>
                                <th>Email</th>
                                <th>Date inscription</th>
                            </tr>
                            <!-- <?php while($row=$res->fetch(PDO::FETCH_ASSOC)) : ?> -->
                                <tr>
                                    <!-- <td><?= $row['id'] ?></td>
                                    <td><?= $row['nomuser'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['date_inscription'] ?></td>
                                </tr>
                                <?php endwhile ?>
                        </table>
                                
                                
                                <?php
                        // $requete = "SELECT * FROM publication ORDER BY date_publication";
                    // $result = $pdo->query($requete);
                    // if(!$result){
                    //     echo "la récupération des données a rencontré un problème";
                    // }else{
                        ?>
                        <?php
                            // while($ligne=$result->fetch(PDO::FETCH_NUM)){
                            //     echo "<tr>";
                            //     foreach($ligne as $valeur){
                            //         echo "<td>$valeur</td>";
                            //     }
                            //     echo "</tr>";
                            // }
                        ?>
                    <?php
                        //  $result->closeCursor();   
                        //}
                    ?>
                </div>
            </section>
            <div class="btn4">
                <button><a href="login.php">Publier un livre</a></button>
            </div> 
        </div> 
         
        <footer>
                <p>&copy; MK - IUC 2022</p>
        </footer>
        
        <script type="text/javascript">
            let boutton = document.querySelector("#btn")
            let sidebar= document.querySelector(".sidebar")

            boutton.click = function(){
                sidebar.classList.toggle("active")
            }
        </script>