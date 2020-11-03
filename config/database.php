<?php
define('DB_HOST','localhost');
/* define('DB_NAME', 'id14969151_register');
define('DB_USER', 'id14969151_softhandy');
define('DB_PASSWORD', 'Nobizo(25101997'); */
//En local
define('DB_NAME', 'register');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
try {
    //code...
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    //throw $th;
    die('Erreur :'.$th->getMessage());
}

?>