<?php
    // initialiser la session
    session_start();
    // unset($_SESSION['connecte']);
    // header("Location: ../index.php");
    // verifier si l'utilisateur est connecté et si c'est pas le cas, le rediriger ver la zone de connexion
    if(session_destroy()){
        header("Location: ./index.php");
        exit();
    }
?>