<?php
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_pseudo'])) {
    # code...
    header('Location:index.php');
    exit();
}