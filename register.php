<?php
ini_set('display_errors', 'on'); 
session_start();
require_once 'filters/guest_filter.php';
$title = "Inscription";
require_once 'config/database.php';
require_once 'includes/constants.php';
require_once 'includes/functions.php';
require_once 'bootstrap/locale.php';
/* si le formulaire est soumis */
if(isset($_POST['register'])){
    /* si ltous les champs n'est pas vide */
    if(not_empty(['name','pseudo','email','password','password_confirm'])){
        $errors = [];
        extract($_POST);
        if(mb_strlen($pseudo) < 3){
            $errors['pseudo'] = "Le pseudo est trop court!";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "L'adresse email renseigné n'est pas valide";
        }
        if(mb_strlen($password) < 6){
            $errors['password']  = "Le mot de passe est trop court!(Minimum 6 caractères)";
        }else{
            if($password != $password_confirm){
                $errors['passwors2'] = "Les deux mot de passe doivent etre identiques";
            }
        }
        if(is_already_in_use('pseudo', $pseudo,'users')){
            $errors['pseudo_exist'] = "Le pseudo est déjà utilisé!";
        }
        if(is_already_in_use('email', $email,'users')){
            $errors['email_exist'] = "Adresse Email déjà assignée!";
        }

        if(count($errors) === 0){
            //envoie du email à l'utilisateur pour activer son compte
            $to = $email;
            $subject = WEBSITE_NAME. " - ACTIVATION DE COMPTE";
            //$password = sha1($password);
            $token = sha1($pseudo.$email);

            ob_start();
            require_once 'tamplates/emails/activation.tmpl.php';
            $content = ob_get_clean();

            /* $headers = 'MIME-version:1.0' ."\r\n";
            $headers .='Content-type: text/html; charset=iso-8850-1'."\r\n"; */
            $header = "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html; charset-utf-8\r\n";
            $header .= 'From: ne-pas-repondre@rhema-divine.com' . "\r\n" . 'Réponse-à: contact@rhema-divine.com'  ."\r\n"; 

            mail($to, $subject, $content, $headers);
            //informer l'utilisateur
           
            set_flash("email d'activation envoyé, vérifier!",'success');
            //enregistrer l'utilisateur dans la base
            $q = $db->prepare('INSERT INTO users(name,pseudo,email,password)
                               VALUES(:name, :pseudo, :email, :password) ');
            $q->execute(array(
                'name' =>$name,
                'pseudo'=>$pseudo,
                'email' =>$email,
                'password'=>bcrypt_hash_password($password)
            ));
                           
            redirect('index.php');
           
        }else{
            save_input_data();
        }
    }else{
        $errors['empty'] = "veuillez remplir tous les champs svp";
        save_input_data();
    }

}else{
    clear_input_data();
}
require_once 'partials/_header.php';
require_once 'views/register.view.php';
require_once 'partials/_footer.php'; ?>