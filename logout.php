<?php include 'header.php';

    unset($_SESSION['username']);
    unset($_SESSION['password']);
    session_destroy();
    header('Location: index.php'); 
    exit();
 ?>