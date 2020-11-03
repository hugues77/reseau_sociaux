<div class="container">
    <div class="row jumbotron">
        <div class="col-md-6 offset-6" aria-autocomplete="off">
            <h1 class="lead font-weight-bold">Connexion !</h1>
            <?php require_once 'partials/_errors.php';?>
            <form data-parsley-validate method="POST">
                <!-- identifiant Field -->
                <div class="form-group">
                    <label for="identifiant" class="control-label">Pseudo /Adresse electronique:</label>
                    <input type="text" value="<?= get_input('identifiant') ?>" id="identifiant" name="identifiant" class="form-control" required>
                </div>
              
                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="control-label">Password:</label>
                    <input type="password" data-parsley-trigger="keypress" data-parsley-minlength="6" id="password" name="password" class="form-control" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Connexion" name="login">
            </form>
        </div>
    </div>
</div>
