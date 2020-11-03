<?php
if (isset($_SESSION['user_id']) || isset($_SESSION['pseudo'])) {
    # code...
    header('Location:index.php');
    exit();
}