<?php
session_start();
require_once 'filters/auth_filter.php';
$title = "Affichage code source";
require_once 'config/database.php';
require_once 'includes/constants.php';
require_once 'includes/functions.php';
require_once 'bootstrap/locale.php';

/* si le formulaire est soumis */
    if(!empty($_GET['id'])){
            $data = find_code_by_id($_GET['id']);
            if(!$data){
                set_flash('Aucune donnée trouvée! désolé');
                redirect('share_code.php');
            }
            
    }else{
        redirect('share_code.php');
    }
require_once 'partials/_header.php';
require_once 'views/show_code.view.php';
?>

<!--<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/tabby.js"></script>
    <script src="librairies/parsley/parsley.min.js"></script>
    <script src="librairies/parsley/langues/fr.js"></script>
    <script type="text/javascript">
        window.ParsleyValidator.setLocale('fr');
    
    </script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script>
        prettyPrint();
    </script>
</body>
</html>