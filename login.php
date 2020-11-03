<?php
session_start();
require_once 'filters/guest_filter.php';
$title = "Conexion";
require_once 'config/database.php';
require_once 'includes/constants.php';
require_once 'includes/functions.php';
require_once 'bootstrap/locale.php';

/* si le formulaire est soumis */
if(isset($_POST['login'])){
    /* si ltous les champs n'est pas vide */
    if(not_empty(['identifiant','password'])){
        $errors = [];
        extract($_POST);

        $q = $db->prepare("SELECT id,pseudo,email FROM users
                            WHERE (pseudo = :identifiant OR email = :identifiant)
                            AND password = :password AND active = '0' ");
        $q->execute(array(
            'identifiant' =>$identifiant,
            'password'    => sha1($password)
        ));
        
        $userHasBeenFound = $q->rowcount();

        if($userHasBeenFound){
            $user = $q->fetch(PDO::FETCH_OBJ);
            $user_id = $user->id;
            $user_pseudo = $user->pseudo;
            $user_email = $user->email;

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_pseudo'] = $user_pseudo;
            $_SESSION['user_email'] = $user_email;

            redirect('profile.php?id='.$user_id);
        }else{
            set_flash('Identifiant et/ou Mot de passe incorect', 'danger');
            save_input_data();
        }
    }else{
        clear_input_data();
    }
}


require_once 'partials/_header.php';
require_once 'views/login.view.php';
require_once 'partials/_footer.php'; ?>