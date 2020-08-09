<?php

declare(strict_types=1);

namespace Core;

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
        $this->addRoute('GET', 'login', 'PagesController@login');
        $this->addRoute('GET', 'register', 'PagesController@register');
        $this->addRoute('GET', '404', 'PagesController@notFound');
        $this->addRoute('GET', 'settings', 'SettingsController@index');
        $this->addRoute('GET', 'management', 'ManagementController@index');
        $this->addRoute('GET', 'upload', 'UploadController@index');
        $this->addRoute('GET', 'image', 'ImageController@image');
        $this->addRoute('GET', 'explore', 'ImageController@showAll');

        $this->addRoute('POST', 'login', 'LoginController@login');
        $this->addRoute('POST', 'logout', 'LoginController@logout');
        $this->addRoute('POST', 'register', 'RegisterController@register');
        $this->addRoute('POST', 'upload', 'UploadController@upload');
        $this->addRoute('POST', 'management/deleteImage', 'ManagementController@deleteImage');
        $this->addRoute('POST', 'settings/updateEmail', 'SettingsController@updateEmail');
        $this->addRoute('POST', 'settings/updatePassword', 'SettingsController@updatePassword');
        $this->addRoute('POST', 'settings/deleteAccount', 'SettingsController@deleteAccount');

        $this->addRoute('POST', 'image/getImageCountAjax', 'ImageController@getImageCountAjax');
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
