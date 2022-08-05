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
                    <?php
                        include "config.php";
                        if(isset($_POST['search'])){
                            $req = $pdo->prepare("SELECT id_post,titre,date_publication,nomuser,document,commentaire,categorie
                                FROM users u INNER JOIN post p
                                ON u.id_user = p.id_user INNER JOIN livre l
                                ON l.id_livre = p.id_livre
                                WHERE categorie = '" . $_REQUEST['categorie'] ."'"); 
                            if($result = mysqli_query($link, $sql)){  
                                if(mysqli_num_rows($result) > 0){
                                        echo "<table>";
                                            echo "<tr>";
                                                echo "<th>ID</th>";
                                                echo "<th>Titre du livre</th>";
                                                echo "<th>Auteur</th>";
                                                echo "<th>date de publication</th>";
                                                echo "<th>Document</th>";
                                                echo "<th>Categorie</th>";
                                                echo "<th>Commentaire</th>";
                                            echo "</tr>";
                                        while($row = $req->fetch(PDO::FETCH_ASSOC)){
                                            echo "<tr>";
                                                echo "<td>" . $row['id_post'] . "</td>";
                                                echo "<td>" . $row['titre'] . "</td>";
                                                echo "<td>" . $row['nomuser'] . "</td>";
                                                echo "<td>" . $row['date_publication'] . "</td>";
                                                echo "<td>" . $row['document'] . "</td>";
                                                echo "<td>" . $row['categorie'] . "</td>";
                                                echo "<td>" . $row['commentaire'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        // Close result set
                                        mysqli_free_result($result);
                                    } else{
                                        echo "No records matching your query were found.";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                                 
                                // Close connection
                                $pdo->closeCursor();
                            }
                                ?>

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
                        <button name="search">Search</button>
                    </div>
            </section>
            <section class="contain">
                <div class="all-book">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Titre du livre</th>
                            <th>Auteur</th>
                            <th>date de publication</th>
                            <th>Document</th>
                            <th>Categorie</th>
                            <th>Commentaire</th>
                        </tr>
                        <?php
                            include "config.php"; 
                            $req = $pdo->prepare("SELECT id_post,titre,nomuser,date_publication,document,categorie,commentaire
                            FROM users u INNER JOIN post p
                            ON u.id_user = p.id_user INNER JOIN livre l
                            ON l.id_livre = p.id_livre"); 
                            // $req->execute();
                            $row = $req->rowCount();
                            if($row == 0){
                                echo "<span style='color:red; font-size:1.5rem'>Il n'ya pas encore de livres publiés.</span>";
                            }else{
                                $req->execute();
                                while($row = $req->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <tr>
                                        <td><?= $row['id_post'] ?></td>
                                        <td><?= $row['titre'] ?></td>
                                        <td><?= $row['nomuser'] ?></td>
                                        <td><?= $row['date_publication'] ?></td>
                                        <td><?= $row['document'] ?></td>
                                        <td><?= $row['categorie'] ?></td>
                                        <td><?= $row['commentaire'] ?></td>
                                    </tr>
                                <?php
                                }
                            }
                        ?>     
                    </table>
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

            boutton.onclick = function(){
                sidebar.classList.toggle("active")
            }
        </script>
    </body>
</html>