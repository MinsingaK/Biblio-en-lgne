<?php
    require './header.php';
    $title = "publication du livre";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="shorcut icon" href="./images/alien-153542__340.jpg">
    <link rel="stylesheet" href="style2.css">
    <title><?= $title ?></title>
</head>
    <body>
        
            <h3>Publier en tant que:</h3>
            <div class="card-box">
                <div class="card">
                    <div class="card1">
                        <button><a href="./livre.php">Enseignant</a></button> 
                        <img src="./images/icons8_teacher_100px.png" alt="">
                    </div>
                    <div class="card1">
                        <button><a href="./livre.php">Etudiant</a></button> 
                        <img src="./images/icons8_student_male_40px.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        /**********************traitement de la sidebar*****************************************/
        let boutton = document.querySelector("#btn")
        let sidebar= document.querySelector(".sidebar")

        boutton.onclick = function(){
            sidebar.classList.toggle("active")
        }
    </script>
</html>
