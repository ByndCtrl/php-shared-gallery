<?php

require 'Core/Database.php';
require 'App/Credentials.php';

try
{
    $db = Database::instance();
    $sql = file_get_contents(__DIR__ . 'App/app.sql');
    $db->run($sql);
    echo 'Success, php-shared-gallery is ready to use.' . "\n";
}
catch (PDOException $exception)
{
    echo $exception->getMessage() . "\n";
}