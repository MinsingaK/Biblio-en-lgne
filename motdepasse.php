<?php
    include("config.php");
    $title = "nouveau mdp";
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
    <body class="body2">
        
        <div class="card-box">
            <h1>New password</h1>
            <form action="motdepasse.php" method="POST">
                <div class="form-control">
                    <input name="email" type="email" required />
                    <label>Adresse email</label>
                </div>
                <?php
                    if(isset($_POST['email'])){
                        $pwd = uniqid();
                        $new_pwd = password_hash($pwd, PASSWORD_DEFAULT);

                        $message = "Bonjour voici votre nouveau mot de passe : $pwd";
                        $headers = 'Content-Type: text/plain; charset="utf-8"' . " ";

                        if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers)){
                            $sql = "UPDATE users SET pwd = ? WHERE email = ?";
                            $etat=$pdo->prepare($sql);
                            $etat->execute([$new_pwd, $_POST['email']]);
                            echo "mail envoyé";
                        }else{
                            echo "<h3 style='margin-left:30%; color:black'>Une erreur est surevnue...</h3>";
                        }
                    }
                ?>
                <button type="submit" class="btn">Envoyer</button>
        
            </form>
        </div>
    </body>
    <script>
        /**********************traitement de l'input sur le formulaire d'authentification*****************************************/
        const labels = document.querySelectorAll(".form-control label")
        labels.forEach((label) => {
            label.innerHTML = label.innerHTML
            .split("")
            .map(
            (letter, idx) =>
                `<span style="transition-delay:${idx * 50}ms">${letter}</span>`
            )
            .join("")
        })
    </script>
</html>
