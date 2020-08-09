<?php

try
{
    $db = new \Core\Database();
    $sql = file_get_contents(__DIR__ . 'App/app.sql');
    $db->run($sql);
    echo 'Success, php-shared-gallery is ready to use.' . "\n";
}
catch (PDOException $exception)
{
    echo $exception->getMessage() . "\n";
}