<?php
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPASS","");
    define("DBNAME","bibliotheque");

    $conn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;   
    $error=null;
    try{
        $db = new PDO($conn, DBUSER, DBPASS);
        $db->exec("SET NAMES utf8");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(PDOException $e){
         $error=$e->getMessage();
    }
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "bibliotheque";

    // $conn = new mysqli($host, $username, $password, $database);
    // if($conn->connect_error){
    //     die("Erreur :Impossible de se connecter. " . $mysqli->connect_error . "$mysqli->connect_error");
    // }

