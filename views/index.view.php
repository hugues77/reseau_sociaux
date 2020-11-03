<?php
$title = "Bonjour !";
require_once 'partials/_header.php'; ?>
<main id="main-content" >
  <div class="container">
    <div class="jumbotron">
        <h1><?= $long_text['accueil_intro'][$_SESSION['locale']]?> <?=WEBSITE_NAME?></h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.<a href="register.php"> Alors réjoindre la communauté</a></p>
    
        <a href="register.php" class="btn btn-outline-dark btn-lg">Inscrivez-vous</a>
    </div>
  </div>
</main>

<?php require_once 'partials/_footer.php'; ?>
