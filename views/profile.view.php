<div class="container">
    <div class="row jumbotron">
    <?php require_once 'partials/_errors.php';?>
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header">
                    <h4>Profil de <?= e($user->pseudo)?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 ">
                            <img src="<?= get_avatar_url($user->email, 100);?>" class="rounded-circle" alt="image de <?= e($user->pseudo)?>">
                        </div>
                        <div class="col-md-7"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <strong><?= e($user->pseudo)?></strong><br>
                            <a href="mailto:<?=e($user->email)?>"><i class="fas fa-envelope-open-text mr-2"></i><?= $user->email?></a><br>
                            <?= ($user->city && $user->country) ?
                            '<i class="fa fa-location-arrow mr-2"></i>'.e($user->city).' - '.e($user->country).'<br>': '';
                            ?>
                            <i class="fas fa-map-signs mr-2"></i><a href="https://google.com/maps?q=<?=  e($user->city).' '.e($user->country)?>" target="_blank">Voir  sur Google Maps</a><br>
                        </div>
                        <div class="col-md-7">
                            <?= ($user->twitter) ?
                            '<i class="fab fa-twitter mr-1"></i><a href="//twitter.com/'.e($user->twitter).'">@'.e($user->twitter).'</a>': '';
                            ?><br>
                            <?= ($user->github) ?
                            '<i class="fab fa-github mr-1 ml-1"></i><a class="ml-1" href="//github.com/'.e($user->github).'">@'.e($user->github).'</a><br>': '';
                            ?>
                            <?= ($user->sex) == 'H' ? '<i class="fas fa-male mr-1"></i>': '<i class="fas fa-female mr-1"></i>';
                            ?>
                            <?= ($user->available) ? 'Disponible pour l\' emploi': 'Non disponible pour l\'emploi';
                            ?>
                        </div>
                    </div>
                    <blockquote class="blockquote mb-0 well">
                    <h5 class="mt-2 text-warning">Biographie de <?= e($user->name)?></h5>
                    <div class="row">
                        <div class="col-md-12 well">
                            <p>
                                <?=
                                    $user->bio ? nl2br(e($user->bio)):'Aucune biographie pour le moment...';
                                ?>
                            </p>
                        </div>
                    </div>
                    <footer class="blockquote-footer">Je certifie en l'honneur que <cite title="Source Title">les informations fournies sont sincères et exactes</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
                <div class="status-post">
                    <form action="microposts.php" method="post" data-parsley-validate>
                        <div class="form-group">
                            <label class="sr-only" for="content">Statut</label>
                            <textarea class="form-control" rows="3" placeholder="Alors quoi de neuf mon ami?" name="content"></textarea>
                        </div>
                        <div class="form-group status-post-submit">
                            <input type="submit" class="btn btn-outline-primary" name="publier" value="Publier">
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>       
</div>
