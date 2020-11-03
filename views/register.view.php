<div class="container">
    <div class="row jumbotron">
        <div class="col-md-6 offset-6" aria-autocomplete="off">
            <h1 class="lead font-weight-bold">Devenez dès à présent membre!</h1>
            <?php require_once 'partials/_errors.php';?>
            <form data-parsley-validate method="POST">
                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" class="control-label">Nom:</label>
                    <input type="text" value="<?= get_input('name') ?>" id="name" name="name" class="form-control" required>
                </div>
                <!-- Pseudo Field -->
                <div class="form-group">
                    <label for="pseudo" class="control-label">Pseudo:</label>
                    <input type="text" data-parsley-trigger="keypress" data-parsley-minlength="3" value="<?= get_input('pseudo') ?>" id="pseudo" name="pseudo" class="form-control" required>
                </div>
                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="control-label">Adresse Email:</label>
                    <input type="email" data-parsley-trigger="keypress" value="<?= get_input('email') ?>" id="email" name="email" class="form-control" required>
                </div>
                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="control-label">Password:</label>
                    <input type="password" data-parsley-trigger="keypress" data-parsley-minlength="6" id="password" name="password" class="form-control" required>
                </div>
                 <!-- Password confirm Field -->
                 <div class="form-group">
                    <label for="password_confirm" class="control-label">Password confirm:</label>
                    <input type="password" data-parsley-trigger="keypress"   id="password_confirm" name="password_confirm" class="form-control" required data-parsley-equalto="#password">
                </div>
                <input type="submit" class="btn btn-primary" value="Inscription" name="register">
            </form>
        </div>
    </div>
</div>
