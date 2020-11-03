<?php
//function pour inserer htmlentities dans chaque inputs
if(!function_exists('e')){
    function e($string){
        if($string){
            return htmlspecialchars($string);
            //return strip_tags($string); (il enleve les balises)
            //return htmlentities($string, ENT_QUOTES,'UTF-8',false);
        }
    }
}

if(!function_exists('not_empty')){
    function not_empty($fields = []){
        if(count($fields) != 0){
            foreach($fields as $field){
                if(empty($_POST[$field]) || trim($_POST[$field]) == ""){ 
                    return false;
                }
            }
            return true;
        }
    }
}
if(!function_exists('is_already_in_use')){
    function is_already_in_use($field,$value,$table){
        global $db;
       /**
        * $field peut remplacer par exemple email et 
        *$value c'est la valeur que l'utilisateur va nous donner 
        *et qui doit etre egal a la valeur qui se trouve dans la base 
        */ 
        $q = $db->prepare("SELECT id FROM $table WHERE $field = ? ");
        $q->execute(array($value));

        $count = $q->rowCount();
        $q->closeCursor();
        return $count;
    }
}

//function pour les messages d'alerts
if (!function_exists('set_flash')) {
    # function pour les messages alerts
    function set_flash($message, $type = 'info'){
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}

//function pour rediriger les pages
if(!function_exists('redirect')){
    function redirect($page){
        header('Location:' .$page);
        exit();
    }
}
//function pour rediriger les pages
if(!function_exists('save_input_data')){
    function save_input_data(){
       foreach($_POST as $key => $value){
          if(strpos($key, 'password') === false){
            $_SESSION['input'][$key] = $value;
          }
       }
    }
}
//function pour recuperer les données input
if(!function_exists('get_input')){
    function get_input($key){
        if(!empty($_SESSION['input'][$key])){
            return e($_SESSION['input'][$key]);
        }else{
            return null;
        }
    
    }
}
//function pour vider les inputs
if(!function_exists('clear_input_data')){
    function clear_input_data(){
        if(isset($_SESSION['input'])){
            $_SESSION['input'] = [];
        }
    }
}

//function pour gerer l'etat actif de nos lien de navigation
if(!function_exists('set_active')){
    function set_active($file, $class='active'){
        $page = array_pop(explode('/',$_SERVER['SCRIPT_NAME']));
        //array_pop, renvoie le dernier occurence de la chaine,c'est= à strrchr
        if($page == $file.'.php'){
            return $class;
        }else{
            return '';
        }
    }
}

//function pour la session si existe
if(!function_exists('get_session')){
    function get_session($key){
        if ($key) {
            # code...
            return !empty($_SESSION[$key]) ? e($_SESSION[$key]): null;
        }
    }
}

//function pour la session si la langue existe ou la langue courante
if(!function_exists('get_current_locale')){
    function get_current_locale(){
       return $_SESSION['locale'];
    }
}

//find an user by id =>afficher user par son id
if (!function_exists('find_user_by_id')) {
    # code...
    function find_user_by_id($id){
        global $db;
        $q = $db->prepare('SELECT * FROM users WHERE id = ?');
        $q->execute([$id]);

        $data = current($q->fetchAll(PDO::FETCH_OBJ));
        $q->closeCursor();
        return $data;
    }
}

//find an code by id =>afficher code par son id
if (!function_exists('find_code_by_id')) {
    # code...
    function find_code_by_id($id){
        global $db;
        
        $q = $db->prepare('SELECT code FROM codes WHERE id = ?');
        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);
        $q->closeCursor();
        return $data;
    }
}

//get_avatar, pour rechercher les avatar
if(!function_exists('get_avatar_url')){
    function get_avatar_url($email, $size = 25){
        return "https://fr.gravatar.com/avatar/".MD5(strtolower(trim(e($email))))."?s=".$size;
    }
}

//check si user est connecter au  iveau du menu
if(!function_exists('is_logged_in')){
    function is_logged_in(){
        return isset($_SESSION['user_id']) || isset($_SESSION['user_pseudo']);
    }
}