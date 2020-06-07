<?php

require APP_ROOT . '/Views/Layouts/header.php';
require APP_ROOT . '/Views/Layouts/nav.php';
//require APP_ROOT . '/Views/Layouts/footer.php';
?>

<!-- Testing data transmission to view -->
<?php foreach($data as $user) : ?>
    <h1> <?= $user->username ?> </h1>
    <p> <?= $user->email ?> </p>
    <p> <?= $user->created_at ?> </p>
<?php endforeach ?>
