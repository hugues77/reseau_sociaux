<?php
session_start();
require_once 'filters/auth_filter.php';
$title = "Partager";
require_once 'config/database.php';
require_once 'includes/constants.php';
require_once 'includes/functions.php';
require_once 'bootstrap/locale.php';
/* si user veut bien télécharger l'id existante */
if(!empty($_GET['id'])){
    $q = $db->prepare("SELECT code FROM codes WHERE id = ?");
        $success = $q->execute([$_GET['id']]);

    if($success){
        $data = $q->fetch(PDO::FETCH_OBJ);
        if(!$data){
            $code = "";
        }else{
            $code = $data->code;
        }
    }
}else{
    $code = "";
}

/* si le formulaire est soumis */
if(isset($_POST['save'])){
    if(not_empty(['code'])){
        extract($_POST);
        $q = $db->prepare("INSERT INTO codes(code) VALUES(?)");
        $success = $q->execute([$code]);
        if($success){
            $id = $db->lastInsertId();
            //Afficher le code source de user
            //set_flash("Félicitation, Le code a bien été partagés", "warning");
            redirect("show_code.php?id=".$id);
        }else{
            set_flash("Erreur lors d'ajout du code, Reesayer svp", "danger");
            redirect("share_code.php");
        }
    }else{
        redirect('share_code.php');
    }
}

require_once 'partials/_header.php';
require_once 'views/share_code.view.php';
?>

<!--<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/tabby.js"></script>
<script src="librairies/parsley/parsley.min.js"></script>
<script src="librairies/parsley/langues/fr.js"></script>
<script type="text/javascript">
    window.ParsleyValidator.setLocale('fr');
    $('#code').tabby();
    $('#code').height($(window).height() - 150);
</script>
    
</body>
</html>