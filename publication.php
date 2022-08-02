<?php
    include("config.php");
    if(isset($_POST['publication'])){
        @$titre = trim($_POST['titre']);
        @$mess = trim($_POST['msg']);
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
            $req=$pdo->prepare("INSERT INTO livre VALUE('$titre','$ph_name','$mess')");
            $req->execute(array($titre,$ph_name,$mess));
            header("location:index.php");
        }
    /*@$titre = trim($_GET['title']);
    @$cat = $_GET['categorie'];
    @$document = ($_GET['document']);
    @$mess = $_GET['message'];
    @$pub = $_GET['publication'];
    $message="";
    if(isset($publication)){
        if(empty($message)){
            include("config.php");
            $req=$pdo->prepare("SELECT title FROM livre WHERE title=? LIMIT 1");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($titre));
            $tab=$req->fetchAll();
            if(count($tab)>0){
                $message="<span style='color=red'>titre déjà existant</span>";
            }else{
                $ins=$pdo->prepare("INSERT INTO livre(NULL,NULL,title,categorie,document) VALUE(?,?,?)");
                $ins->execute(array($titre,$cat,$document));
                header("location:user.php");
            }
        }
    }  */
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
                        <!-- <label for="Catégorie" id="categorie">Catégorie</label> 
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
                        </select> -->
                    <input name="fichier" type="file" placeholder="uploader votre livre" required>
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
