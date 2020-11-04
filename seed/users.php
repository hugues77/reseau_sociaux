<?php
require_once '../config/database.php';
require '../vendor/autoload.php';
require_once '../partials/_header.php';
require_once '../partials/_nav.php';

$faker = Faker\Factory::create();

for($i=1; $i<150;$i++){
    $sql = $db->prepare("INSERT INTO users (name, pseudo, email, password, active,created_at,city, country, sex, available,bio)
    VALUES (:name, :pseudo, :email, :password, :active, :created_at, :city, :country, :sex, :available, :bio)");

    $sql->execute([
            'name' => $faker->unique()->name,
            'pseudo' => $faker->unique()->userName ,
            'email' => $faker->unique()->email ,
            'password' => password_hash('25101997live', PASSWORD_BCRYPT) ,
            'active' => 1,
            'created_at' => $faker->date().' '.$faker->time(),
            'city' => $faker->city,
            'country' => $faker->country,
            'sex' => $faker->randomElement(['H','F']),
            'available' => $faker->randomElement([0,1]),
            'bio' => $faker->paragraph() 
    ]);
}

?>
<div class="alert alert-success">Les utilisateurs sont bien ajoutés dans la base</div>

