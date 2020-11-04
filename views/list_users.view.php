<div id="main-content">
    <div class="container">
        <h2>Liste des Utilisateurs <?=WEBSITE_NAME?></h2><hr>
        <div class="row users">
            <?php foreach($users as $user) : ?>
                <div class="col-md-2">
                    <a class="nav-link text-center" href="profile.php?id=<?=$user->id?>">
                        <img src="<?= get_avatar_url($user->email, 120);?>" class="rounded-circle" alt="image de <?= e($user->pseudo)?>">
                        <h5 class="text-primary ml-0">
                            <?=e($user->pseudo)?>
                        </h5>
                    </a>    
                </div>
            <?php endforeach; ?>
        </div>
        <div id="pagination"><?= $pagination?></div>
    </div>
</div>
