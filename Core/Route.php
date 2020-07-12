<?php

declare(strict_types=1);

namespace Core;

use App\Controllers\ManagementController;

/**
 * Class Route
 * @package Core
 */
class Route
{
    /**
     * @var array|array[]
     */
    public array $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->addRoute('GET', '/', 'PagesController@index');
        $this->addRoute('GET', 'about', 'PagesController@about');
        $this->addRoute('GET', '404', 'PagesController@notFound');

        $this->addRoute('GET', 'login', 'LoginController@login');
        $this->addRoute('GET', 'logout', 'LoginController@logout');
        $this->addRoute('GET', 'register', 'RegisterController@register');

        $this->addRoute('GET', 'management', 'ManagementController@index');

        $this->addRoute('POST', 'login', 'LoginController@login');
        $this->addRoute('POST', 'register', 'RegisterController@register');
        $this->addRoute('POST', 'upload', 'UploadController@upload');
        $this->addRoute('POST', 'deleteImage', 'ManagementController@deleteImage');
    }

    /**
     * @param string $method
     * @param string $url
     * @param string $controller
     *
     * @return void
     */
    private function addRoute(string $method = 'GET', string $url = '/', string $controller = 'PagesController'): void
    {
        $this->routes[$method][$url] = $controller;
    }
}
