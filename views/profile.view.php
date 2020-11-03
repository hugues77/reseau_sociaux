<div class="container">
    <div class="row jumbotron">
    <?php require_once 'partials/_errors.php';?>
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-header">
                    <h4>Profil de <?= e($_SESSION['user_pseudo'])?></h4>
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
                            <a href="mailto:<?=e($user->email)?>"><?= $user->email?></a><br>
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
        <?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')) : ?>
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-header">
                        <h4>Completer mon Profil</h4>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <?php require_once 'partials/_errors.php';?>
                            <form data-parsley-validate method="POST" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nom <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" value="<?= get_input('name') ? get_input('name') : e($user->name)?>" class="form-control" placeholder="Handy" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">Ville <span class="text-danger">*</span></label>
                                            <input type="text" name="city" id="city" value="<?= get_input('city') ? get_input('city') : e($user->city)?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Pays <span class="text-danger">*</span></label>
                                            <input type="text" name="country" id="country" value="<?= get_input('country') ? get_input('country') : e($user->country)?>" class="form-control" placeholder="Handy" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">Sexe <span class="text-danger">*</span></label>
                                            <select required name="sex" id="sex" class="form-control">
                                                <option value="H" <?= $user->sex =="H"? "selected" :"" ?>>Homme</option>
                                                <option value="F" <?= $user->sex =="F"? "selected" :"" ?>>Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" name="twitter" id="twitter" value="<?= get_input('twitter') ? get_input('twitter') : e($user->twitter)?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="github">Github</label>
                                            <input type="text" name="github" id="github" value="<?= get_input('github') ? get_input('github') : e($user->github)?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="available_for_hire">
                                                <input type="checkbox" name="available" id="available" <?=  $user->available ? "checked" : ""?>>
                                                Disponible pour l'emploi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="bio">Biographie <span class="text-danger">*</span></label>
                                            <textarea cols="30" rows="10" name="bio" id="bio" class="form-control" 
                                            placeholder="Je suis amoureux de la dev web..." required><?= get_input('bio') ? get_input('bio') : e($user->bio)?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="valider" class="btn btn-outline-primary" name="update">
                            </form>
                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>       
</div>
