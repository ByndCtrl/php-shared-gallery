<?php

declare(strict_types=1);

require_once '../App/Init.php';
require_once '../App/Errors.php';

use Core\Request;
use Core\Route;
use Core\Router;

$request = new Request();
$route = new Route();
$router = new Router($route, $request);

try
{
    $router->direct($request->getRequestMethod(), $request->getUrl());
}
catch (Exception $e)
{

}
