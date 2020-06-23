<?php

declare(strict_types = 1);

use Core\Controller;
use Core\View;

class PagesController extends Controller
{
    /**
     * @return void
     */
    public function index() : void
    {    
        $data = [
            'title' => 'Home'
        ];

        $view = new View();
        $view->render('Pages/index', $data);
    }

    /**
     * @return void
     */
    public function about() : void
    {
        $data = [
            'title' => 'About',
        ];

        $view = new View();
        $view->render('Pages/about', $data);
    }

    /**
     * @return void
     */
    public function login() : void
    {
        $data = [
            'title' => 'Login',
        ];

        $view = new View();
        $view->render('Pages/login', $data);
    }

    /**
     * @return void
     */
    public function register() : void
    {
        $data = [
            'title' => 'Register'
        ];

        $view = new View();
        $view->render('Pages/register', $data);
    }
}
