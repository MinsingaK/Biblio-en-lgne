<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "bibliotheque";

    $conn = new mysqli($host, $username, $password, $database);
    if($conn->connect_error){
        die("Erreur :Impossible de se connecter. " . $mysqli->connect_error . "$mysqli->connect_error");
    }

