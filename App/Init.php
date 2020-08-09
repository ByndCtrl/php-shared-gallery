<?php
/** @noinspection PhpIncludeInspection */

define('DS', DIRECTORY_SEPARATOR);

// /var/www/html/php-shared-gallery/
define('BASE_ROOT', dirname(__FILE__, 2) . DS);

// /var/www/html/php-shared-gallery/App/
define('APP_ROOT', dirname(__FILE__, 1) . DS);

// http://localhost/php-shared-gallery/
define('URL_ROOT', 'http://localhost/php-shared-gallery/');

define('SITE_NAME', 'SharedGallery');

// assets/images/
define('IMAGE_PATH', 'assets' . DS . 'images' . DS);

// assets/thumbnails/
define('THUMBNAIL_PATH', 'assets' . DS . 'thumbnails' . DS);

mb_internal_encoding("UTF-8");

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($class)
{
    $file = BASE_ROOT . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file))
    {
        require $file;
    }
});
