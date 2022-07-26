<?php
     if(!empty($_POST)){
        if(isset($_POST['title'], $_POST['categorie'], $_POST['document'], $_POST['msg'])){
            //on récupère les données
            $title = strip_tags($_POST['title']);
            $categorie = strip_tags($_POST['categorie']);  
            $document = strip_tags($_POST['document']);
            $message = strip_tags($_POST['msg']);

            //On enregistre en bd
            require_once "config.php";
            $sql = "INSERT INTO `users`(`titre`, `categorie`, `data`, `message`) VALUES (:title,:categorie,:document,:msg)";
            
            $query = $db->prepare($sql);
            
            $query->bindValue(":titre", $title, PDO::PARAM_STR);
            $query->bindValue(":categorie", $categorie, PDO::PARAM_STR);
            $query->bindValue(":document", $document, PDO::PARAM_STR);
            $query->bindValue(":msg", $message, PDO::PARAM_STR);  
            
            $query->execute();

        }
    }
    $title = "publication du livre";
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
    <body>
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
        <div class="card">
            <p>Veuillez remplir les champs suivants!!!</p>
            <form action="livre.php" method="POST">
                <div class="form-container">
                    <label for="titre" id="title">Titre</label>
                    <input type="text" name="title" placeholder="entrer le titre de votre document" required>
                    <label for="Catégorie" id="categorie">Catégorie</label> 
                    <select name="categorie" id="categorie">
                        <option value="histoire">Histoire</option>
                        <option value="geographie">Géographie</option>
                        <option value="mathematiques">Mathématiques</option>
                        <option value="informatique">Informatique</option>
                        <option value="science">Science</option>
                        <option value="physique">Physique</option>
                        <option value="chimie">Chimie</option>
                        <option value="physique">Economie</option>
                        <option value="autre">Autre...</option>
                    </select>
                    <input name="document" type="file" placeholder="uploader votre livre" required>
                    <label for="msg" id="msg">Message</label>
                    <textarea name="msg" placeholder="un petit message sur le contenu que vous publiez" required id="details" cols="30" rows="10"></textarea>
                    <button onclick="validation();" type="submit">Publier le livre</button>
                </div>
            </form>
        </div>
    </body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        // function validation(){
        //     swal({
        //         text: "Création du compte reussie!",
        //         icon: "success",
        //         button: "Aww yiss!",
        //     });
        // }
    </script>
</html>
