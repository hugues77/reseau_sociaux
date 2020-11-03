<div id="main-content">
    <div class="jumbotron">
        <div id="main-content-share-code">
            <pre class="prettyprint linenums">
                <?= e($data->code) ?>
            </pre>
            <div class="btn-group mt-1 nav">
                <a href="share_code.php?id=<?= $_GET['id']?>" class="btn btn-warning">Télécharger</a>
                <a href="share_code.php" class="btn btn-primary">Nouveau</a>
            
            </div>
        </div>
    </div>
</div>
