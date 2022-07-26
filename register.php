<?php
    @$username = $_POST['username'];
    @$email = $_POST['email'];
    @$pwd = $_POST['pwd'];
    @$repeatpwd = $_POST['repeatpwd'];
    @$details = $_POST['details'];
    @$profession = $_POST['profession'];
    @$inscription = $_POST['inscription'];
    $message="";
    if(isset($inscription)){
        include("config.php");
        $req=$pdo->prepare("select id from users where username=? limit 1");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute(array($username));
        $tab=$req->fetchAll();
        if(count($tab)>0){
            $message="<li>username déjà existant</li>";
        }else{
            $ins=$pdo->prepare("insert into users(username,email,pwd,details,profession) value(?,?,?,?,?)");
            $ins->execute(array($username,$email,md5($pwd),$details,$profession));
            header("location:loginUser.php");
        }
    }    
    /*require 'config.php';
    if(!empty($_POST)){
        if(isset($_POST['username'], $_POST['pwd'], $_POST['email'], $_POST['details'], $_POST['profession'])){
            //on récupère les données
            $username = htmlentities(trim($_POST['username']));
            $email = strip_tags($_POST['email']);  
            $pwd = password_hash($_POST['pwd'], PASSWORD_ARGON2ID);
            $repeatpwd = password_hash($_POST['repeatpwd'], PASSWORD_ARGON2ID);
            $details = strip_tags($_POST['details']);
            $profession = strip_tags($_POST['profession']);
            if($repeatpwd == $pwd){
                 //On enregistre en bd
                 require_once "./config.php";
                 $sql = "INSERT INTO `users`(`username`,`email`,`pwd`,`details`,`profession`) VALUES (:username,:email ,'$pwd', :details, :profession)";
                 
                 $query = $db->prepare($sql);
                 
                 $query->bindValue(":username", $username, PDO::PARAM_STR);
                 $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
                 $query->bindValue(":details", $details, PDO::PARAM_STR);
                 $query->bindValue(":profession", $profession, PDO::PARAM_STR);  
                 
                 $query->execute();
                 if($query){
                    echo "Inscription reussie, <a href='login.php'>connectez vous ici!!</a>";
                }
            }else{
                $message = "les mots de passe sont différents";
        
                echo '<div style="margin-top:245px; float:right; margin-right: 70px"><span style="color:red; font-weight:normal;">'.$message.'</span></div>';
            }
                
        }
    }*/
    $title = "Inscription";

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
    <body class="body3">
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
        <div class="register-box">
            <p>Veuillez remplir les champs suivants!!!</p>
                    
            <form action="register.php" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <label for="username" id="username">Username</label>
                        <input id="username" type="text" name="username" placeholder="entrer votre nom d'utilisateur" required>
                        
                    </div>
                    <div class="input-box">
                        <label for="email" id="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="entrer votre email" required>
                    </div>

                    <div class="input-box">
                        <label for="pwd" id="pwd">Password</label>
                        <input id="pwd" type="password" name="pwd" placeholder="entrer votre mot de passe" required>
                        
                    </div>
                    <div class="input-box">
                        <label for="repeatpwd" id="repeatpwd">Confirm password</label>
                        <input id="repeatpwd" type="password" name="repeatpwd" placeholder="Confirmer votre mot de passe" required>
                        
                    </div>
                    <div class="input-box">
                        <label for="details" id="details">Details of your profession</label>
                        <textarea name="details" placeholder="Quelques détails sur votre profession" required id="details" cols="30" rows="10"></textarea>
                        
                    </div>
                    <div class="input-box">
                        <label for="profession" id="profession">Profession</label> 
                        <input type="text" name="profession" placeholder="entrer votre profession" required>
                    </div>  
                </div>
                <button name="inscription" type="submit">Create account</button>
            </form>
        </div>
    </body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

    </script>
</html>