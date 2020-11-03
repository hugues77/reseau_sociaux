<?php
session_start();
require_once 'filters/guest_filter.php';
require_once 'config/database.php';
require_once 'includes/functions.php';
if(!empty($_GET['p']) && is_already_in_use('pseudo', $_GET['p'],'users')  && !empty($_GET['token'])){
 
    $pseudo = $_GET['p'];
    $token = $_GET['token'];

    $q = $db->prepare('SELECT email,password FROM users WHERE pseudo = ?');
    $q->execute([$pseudo]);

    $data = $q->fetch(PDO::FETCH_OBJ);

    $token_verif = sha1($pseudo.$data->email);

    if($token == $token_verif){
        
         $q = $db->prepare("UPDATE  users set active = '1' WHERE pseudo = ?");
        $q->execute([$pseudo]);
        set_flash('Votre compte est activé','success');
        redirect('login.php');  
    }else{
        set_flash('parametres invalides','danger');
        redirect('index.php');
    }
     
}else{
    echo 'zero papa';
    //redirect('index.php');
}