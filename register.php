<?php
    @$nomuser = trim($_POST['nomuser']);
    @$email = $_POST['email'];
    @$pwd = trim($_POST['pwd']);
    @$repeatpwd = trim($_POST['repeatpwd']);
    @$profession = $_POST['profession'];
    @$inscription = $_POST['inscription'];
    $message="";
    if(isset($inscription)){
        if(empty($message)){
            include("config.php");
            $req=$pdo->prepare("SELECT id_user FROM users WHERE nomuser=? LIMIT 1");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($nomuser));
            $tab=$req->fetchAll();
            if(count($tab)>0){
                $message="<span style='color:red; padding-left:10%; font-size:20px'>Username déjà existant, veuillez choisir un autre s'il vous plait.</span>";
            }else{
                $ins=$pdo->prepare("INSERT INTO users(nomuser,email,profession,pwd) VALUE(?,?,?,?)");
                $ins->execute(array($nomuser,$email,$profession,md5($pwd)));
                header("location:loginUser.php");   
            }
            /*if(password_verify($pwd =! $repeatpwd)){
                $message="<span style='color:red; padding-left:25%; font-size:20px'>les mots de passe doivent être identiques!!!</span>";
            }else{

            }*/
        }
    }    
    $title = "Inscription";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css"> -->
        <link rel="stylesheet" href="style.css">
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
                        <label for="nomuser" id="nomuser">Username</label>
                        <input id="nomuser" type="text" name="nomuser" placeholder="entrer votre nom d'utilisateur" required>
                        
                    </div>
                    <div class="input-box">
                        <label for="email" id="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="entrer votre email" required>
                    </div>
                    <div class="input-box">
                        <label for="profession" id="profession">Profession</label> 
                        <input type="text" name="profession" placeholder="entrer votre profession" required>
                    </div>
                    <div class="input-box">
                        <label for="pwd" id="pwd">Password</label>
                        <input id="pwd" type="password" name="pwd" placeholder="entrer votre mot de passe" required>
                        
                    </div>
                    <div class="input-box">
                        <label for="repeatpwd" id="repeatpwd">Confirm password</label>
                        <input id="repeatpwd" type="password" name="repeatpwd" placeholder="Confirmer votre mot de passe" required>
                        
                    </div>  
                </div>
                <?php if(!empty($message)) : ?>
                    <div id="message">
                    <?php echo "$message";?>
                    </div>
                <?php endif ?>
                <button name="inscription" type="submit">Create account</button>
            </form>
        </div>
    </body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        // function validation(){
        //     swal({
        //         text: "Hello world!",
        //     });
        // }
    </script>
</html>