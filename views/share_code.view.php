<div id="main-content">
    <div class="jumbotron">
        <div id="main-content-share-code">
            <form data-parsley-validate action="" method="POST" autocomplete="off">
                <textarea class="form-control" name="code" id="code" required cols="30" rows="10" placeholder="Votre Message">
                    <?= e($code)?>
                </textarea>
                <div class="btn-group mt-1 nav">
                    <a href="share_code.php" class="btn btn-danger">Tout effacer</a>
                    <input type="submit" value="Enregistrer" name="save" class="btn btn-success">
                
                </div>
            </form>
        </div>
    </div>
</div>
