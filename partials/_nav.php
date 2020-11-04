<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><?=WEBSITE_NAME?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 pr-3 " type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0 " type="submit">Search</button>
        </form>
        <ul class="navbar-nav ml-4">
            <li class="nav-item">
                <a  class="nav-link btn btn-outline-primary" href="list_users.php"><?= $menu['liste_utilisateur'][$_SESSION['locale']]?></a>
            </li>
        </ul>
        <ul class=" navbar-nav nav mr-5">
            <li class="nav-item <?=set_active('index') ?>">
                <a class="nav-link" href="?lang=fr"><img src="images/fr.png" width="25px" alt=""><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?=set_active('index') ?>">
                <a class="nav-link" href="?lang=en"><img src="images/en.png" width="25px" alt=""><span class="sr-only">(current)</span></a>
            </li>
            <!-- <li class="nav-item <?=set_active('index') ?>">
                <a class="nav-link" href="index.php"><?= $menu['accueil'][$_SESSION['locale']]?> <span class="sr-only">(current)</span></a>
            </li> -->
            
            <?php if(is_logged_in()): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= get_avatar_url(get_session('user_email'));?>" class="rounded-circle" alt="image de <?= get_session('user_pseudo')?>">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php?id=<?= get_session('user_id')?>"><?= $menu['mon_profil'][$_SESSION['locale']]?> </a>
                        <a class="dropdown-item" href="edit_user.php?id=<?= get_session('user_id')?>"><?= $menu['edit_user'][$_SESSION['locale']]?> </a>
                        <a class="dropdown-item" href="share_code.php"><?= $menu['share_code'][$_SESSION['locale']]?> </a>
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="logout.php"><?= $menu['deconnexion'][$_SESSION['locale']]?> </a>
                        
                    </div>
                </li>
                <!-- <li class="nav-item <?=set_active('profile')?>">
                    <a class="nav-link" href="profile.php?id=<?= get_session('user_id')?>">Mon Profil</a>
                </li>
                <li class="nav-item <?=set_active('share_code')?>">
                    <a class="nav-link" href="share_code.php">Partager</a>
                </li> -->
                
            <?php else: ?>
                <li class="nav-item <?=set_active('login') ?>">
                    <a class="nav-link" href="login.php"><?= $menu['connexion'][$_SESSION['locale']]?> </a>
                </li>
                <li class="nav-item <?=set_active('register') ?>">
                    <a class="nav-link " href="register.php" ><?= $menu['inscription'][$_SESSION['locale']]?> </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>