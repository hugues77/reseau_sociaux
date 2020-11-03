<?php
$authorized_languages = array('fr','en');
if(!empty($_GET['lang']) && in_array($_GET['lang'], $authorized_languages)){
    $_SESSION['locale'] = $_GET['lang'];
}else{
    if(empty($_SESSION['locale'])){
        $_SESSION['locale'] = $authorized_languages[0];
    }
}

//require menu
require_once 'locales/menu.php';
require_once 'locales/long_text.php';