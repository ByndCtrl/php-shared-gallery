<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

<?php foreach($data as $user) : ?>
    <h3><?= $user->id ?></h3>
    <strong><?= $user->username ?></strong>
    <?= "<br>" ?>
    <small><?= $user->email ?></small>
    <?= "<br>" ?>
    <small><?= $user->password ?></small>
    <?= "<br>" ?>
    <small><?= $user->streetAddress ?></small>
    <?= "<br>" ?>
    <small><?= $user->city ?></small>
    <?= "<br>" ?>
    <small><?= $user->country ?></small>
    <?= "<br>" ?>
    <small><?= $user->postcode ?></small>
    <?= "<br>" ?>
<?php endforeach ?>    
        
    </body>
    </html>