<?php
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_pseudo'])) {
    //on sauvegarde l'URL que l'utilisateur tente d' y aller
    $_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];
    # code...
    //set_flash("Vous devez etre connectés pour y acceder!","danger");
    $_SESSION['notification']['message'] ='Vous devez etre connectés pour y acceder!' ;
    $_SESSION['notification']['type'] = 'danger';
    header('Location:login.php');
    exit();
}