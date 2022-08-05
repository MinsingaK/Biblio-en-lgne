<?php
    //session_start();
    include "config.php";
    @$titre = trim($_POST['titre']);
    @$categorie = $_POST['categorie'];
    @$mess = trim($_POST['msg']);
    $today = date("Y-m-d H:i:s");
    if(isset($_POST['publication'])){
        if(isset($_FILES['fichier']['name'])){
            $file_name = $_FILES['fichier']['name'];
            $file_tmp = $_FILES['fichier']['tmp_name'];

            move_uploaded_file($file_tmp,"./pdf/".$file_name);

            $req=$pdo->prepare("INSERT INTO livre (titre,categorie,document,commentaire,date_publication) VALUE('$titre','$categorie','$file_name','$mess','$today')");
            $req->execute(array($titre,$categorie,$file_name,$today,$mess));

            if($req){
                ?> 
                echo "Livre inséré avec succès";
                <?php
            }else{
                ?> 
                echo "Veuillez réessayer!";
                <?php
            }
        }
        else{
            ?> 
            echo "Tentative échouée!";
            <?php
        }
    }
    /*if(isset($_POST['publication'])){
        @$titre = trim($_POST['titre']);
        @$categorie = $_POST['categorie'];
        @$mess = trim($_POST['msg']);
        $today = date("Y-m-d H:i:s");
        if(isset($_FILES['fichier']) and $_FILES['fichier']['error'] == 0){
            $dossier = 'documents/';
            $temp_name = $_FILES['fichier']['tmp_name'];
            if(!is_uploaded_file($temp_name)){
                exit("le fichier est introuvable!!");
            }
            if($_FILES['fichier']['size'] >= 4000000){
                exit("Erreur: le fichier est volumineux!!!");
            }
            $infosfichier = pathinfo($_FILES['fichier']['name']);
            $extension_upload = $infosfichier['extension'];

            $extension_upload = strtolower($extension_upload);
            $ext_autorisees = array('pdf','docx');

            if(!in_array($extension_upload, $ext_autorisees)){
                exit("Erreur, veuillez insérer un fichier svp (extensions autorisées : pdf, docx)");
            }
            $nom_fichier = $titre.".".$extension_upload;
            if(!move_uploaded_file($temp_name, $dossier.$nom_fichier)){
                exit("Problème dans le téléchargement du fichier, réessayer");
            }
            $ph_name = $nom_fichier;
        }else{

            }
        $req=$pdo->prepare("INSERT INTO livre (titre,categorie,document,date_publication,commentaire) VALUE('$titre','$categorie','$ph_name','$today','$mess')");
        $req->execute(array($titre,$categorie,$ph_name,$mess,$today));
        if($ins){
            $_SESSION['status'] = "Insertion réussie";
            header("location:user.php");
        }
        else{
            $_SESSION['status'] = "Insertion non réussie";
            header("location:publication.php");
        }
    }*/
    $title = "publication du livre";
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <span>Ma Biblio</span>
            <nav>
                <ul>
                    <div>
                        <li><a href="index.php">Accueil</a></li>
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <div>
                        <li><a href="#">A propos</a></li>
                        <i class="fa-solid fa-info"></i>
                    </div>
                </ul>
            </nav>
        </header> 
        <?php
            if(isset($_SESSION['status'])){
                echo "<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            }
        ?> 
        <div class="card">
            <p>Veuillez remplir les champs suivants!!!</p>
            <form action="livre.php" method="POST" enctype="multipart/form-data">
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
                    <input name="fichier" type="file" placeholder="uploader votre livre" accept="pdf" required>
                    <label for="msg" id="msg">Commentaire</label>
                    <textarea name="msg" placeholder="un petit message sur le contenu que vous publiez" required id="details" cols="30" rows="10"></textarea>
                    <button name="publication" type="submit">Publier le livre</button>
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
