<?php
session_start();
$title = "Liste des Utilisateurs";
//require_once 'filters/auth_filter.php';
require_once 'config/database.php';
require_once 'includes/constants.php';
require_once 'includes/functions.php';
require_once 'bootstrap/locale.php';

/**
 * on crée la pagination des users
 * 
 */
$rq = $db->query("SELECT id FROM users WHERE active='1' ");
$nb_total_users = $rq->rowCount();

$nb_users_par_page = 12;
$nb_users_max_avant_apres = 4;

$nb_pages = ceil($nb_total_users / $nb_users_par_page);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    # code...
    $page_num = $_GET['page'];
}else {
    $page_num = 1;
}

//verifie le numero de page

if($page_num < 1){
    $page_num = 1;
}elseif($page_num >$nb_pages){
    $page_num = $nb_pages;
}

//requetes pour limiter mes resultats
$limit = 'LIMIT '.($page_num - 1) * $nb_users_par_page.' , '. $nb_users_par_page;
$q = $db->query("SELECT id, pseudo, email FROM users WHERE active ='1' ORDER BY pseudo $limit");
$users = $q->fetchAll(PDO::FETCH_OBJ);

$pagination = '<nav class="text-center"><ul class="pagination">';
if($nb_pages != 1){
    if($nb_pages > 1){
        $previous = $page_num - 1;
        $pagination .= '<li class="page-item disabled"><a class="page-link" href="list_users.php?page='.$previous.'">Précédent</a></li>';
        
        for ($i=$page_num - $nb_users_max_avant_apres; $i < $page_num ; $i++) { 
            # code...
            if($i > 0){
                $pagination.='<li class="page-item"><a class="page-link" href="list_users.php?page='.$i.'">'.$i.'</a></li>';
            }
        }
    }

    $pagination .='<li class="page-item active" aria-current="page"><a class="page-link">'.$page_num.'</a></li>';
    
    for ($i=$page_num + 1; $i < $nb_pages; $i++) { 
        # code...
        $pagination.='<li class="page-item"><a class="page-link" href="list_users.php?page='.$i.'">'.$i.'</a></li>';
        if($i > $page_num + $nb_users_max_avant_apres){
            break;
        }
    }
    if($page_num != $nb_pages){
        $next = $page_num + 1;
        $pagination.='<li class="page-item"><a class="page-link" href="list_users.php?page='.$next.'">Suivant</a></li>';
    }
}
$pagination .='</ul></nav>';

require_once 'partials/_header.php';
require_once 'views/list_users.view.php';
require_once 'partials/_footer.php'; ?>