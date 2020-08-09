<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Image;
use Core\Controller;
use Core\View;

/**
 * Class PagesController
 * @package App\Controllers
 */
class PagesController extends Controller
{
    /**
     * @var View|null
     */
    private ?View $view;

    /**
     * PagesController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }

    /**
     * @return void
     */
    public function index() : void
    {
        $data = [
            'title' => 'Landing'
        ];

        $this->view->render('Pages/Landing', $data);
    }

    /**
     * @return void
     */
    public function about() : void
    {
        $data = [
            'title' => 'About'
        ];

        $this->view->render('Pages/About', $data);
    }

    /**
     * @return void
     */
    public function login() : void
    {
        $data = [
            'title' => 'Login'
        ];

        $this->view->render('Pages/Login');
    }

    /**
     * @return void
     */
    public function register() : void
    {
        $data = [
            'title' => 'Register'
        ];

        $this->view->render('Pages/Register');
    }

    /**
     * @return void
     */
    public function notFound() : void
    {
        $data = [
            'title' => '404'
        ];

        $this->view->render('Pages/404', $data);
    }
}
