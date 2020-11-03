<?php
session_start();
$title = "Profile";
require_once 'filters/auth_filter.php';
require_once 'config/database.php';
require_once 'includes/constants.php';
require_once 'includes/functions.php';
require_once 'bootstrap/locale.php';

if(!empty ($_GET['id'])) {
    # code pour recuperer les infos de user dans la bdd via son id
    $user = find_user_by_id($_GET['id']);
  
    if(!$user){
        set_flash(" L' identifiant que vous démandés n'existe pas","danger");
        redirect("index.php");
    }
}else{
    # sinon on va rediriger user
    redirect('profile.php?id='.get_session('user_id'));
}

if(isset($_POST['update'])){
    $errors = [];
    /* si ltous les champs n'est pas vide */
    if(not_empty(['name','city','sex','country','bio'])){
        $errors = [];
        extract($_POST);

        $q = $db->prepare("UPDATE users
                            SET name = :name, city = :city, country = :country,
                            sex = :sex, twitter = :twitter, github = :github,
                            available = :available, bio = :bio
                            WHERE id = :id ");
        $q->execute(array(
            'name' =>$name,
            'city'    => $city,
            'country' => $country,
            'sex'     => $sex,
            'twitter'  => $twitter,
            'github'   => $github,
            'available'=> !empty($available) ? '1' :'0',
            'bio' => $bio,
            'id'         => $_SESSION['user_id']
        ));
        
        set_flash('Félicitations, votre profil a été bien  mise à jour');
        redirect('profile.php?id='.get_session('user_id'));
    }else{
        save_input_data();
        $errors[] = "merci de remplir tous les champs marqués d'un(*) svp";
    }
}else{
    clear_input_data();
}
require_once 'partials/_header.php';
require_once 'views/profile.view.php';
require_once 'partials/_footer.php'; ?>