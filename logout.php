<?php
    // initialiser la session
    session_start();
    if(session_destroy()){
        header("location:index.php");
        exit();
    }
?>