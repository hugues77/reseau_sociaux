<?php if(isset($_SESSION['notification']['message'])): ?>
    <div class="container">
        <div class="alert alert-<?= $_SESSION['notification']['type'] ?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><?= $_SESSION['notification']['message'] ?></h6>
        </div>
    </div>
    <?php $_SESSION['notification'] = []; ?>
<?php endif; ?>