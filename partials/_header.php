<?php 
 require_once 'includes/constants.php';
  ?> 
<!doctype html>
<html lang="Fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Réseau social">
    <meta name="author" content="Softhandy">
    <title>
    <?= isset($title) ? $title . ' -Social Network' 
        : WEBSITE_NAME .', simple et Efficace';?>
    </title>  
    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/parsley.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/js/google-code-prettify/sons-of-obsidian.css">
    <link href="assets/css/main.css" rel="stylesheet">
  </head>
  <body class="">
      <?php require_once '_nav.php'; ?>
      <?php require_once '_flash.php'; ?>
