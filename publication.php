<?php
    /*session_start();
    if(session_destroy()){
        header("location:index.php");
        exit(); inserer ceci après la publication  pour fermer la session
    }*/
    // include("register.php");
    @$titre = trim($_POST['title']);
    @$cat = $_POST['categorie'];
    @$document = ($_POST['document']);
    @$mess = $_POST['message'];
    @$pub = $_POST['publication'];
    $message="";
    if(isset($publication)){
        if(empty($message)){
            include("config.php");
            $req=$pdo->prepare("SELECT title FROM livre WHERE title=? LIMIT 1");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($titre));
            $tab=$req->fetchAll();
            if(count($tab)>0){
                $message="<span style='color=red'>title déjà existant</span>";
            }else{
                $ins=$pdo->prepare("INSERT INTO livre(titre_livre,categorie,document,nomuser) VALUE(?,?,?,?)");
                $ins->execute(array($titre,$cat,$document,$nomuser));
                header("location:user.php");
            }
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
                    <input name="document" type="file" placeholder="uploader votre livre" accept=".pdf" required>
                    <label for="msg" id="msg">Message</label>
                    <textarea name="msg" placeholder="un petit message sur le contenu que vous publiez" required id="details" cols="30" rows="10"></textarea>
                    <button name="publication" type="submit">Publier le livre</button>
                </div>
            </form>
            <?php if(!empty($message)) : ?>
                <div id="message">
                <?php echo "$message";?>
                </div>
            <?php endif ?>
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
