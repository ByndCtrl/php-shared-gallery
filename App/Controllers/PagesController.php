<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Image;
use App\Models\User;
use Core\Controller;
use Core\View;

/**
 * Class PagesController
 * @package App\Controllers
 */
class PagesController extends Controller
{
    private ?View $view;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }

    public function index()
    {
        $data = [
            'title' => 'Landing'
        ];

        $this->view->render('Pages/Landing', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];

        $this->view->render('Pages/About', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        $this->view->render('Pages/Login');
    }

    public function register()
    {
        $data = [
            'title' => 'Register'
        ];

        $this->view->render('Pages/Register');
    }

    public function notFound()
    {
        $data = [
            'title' => '404'
        ];

        $this->view->render('Pages/404', $data);
    }

    /**
     * @return string
     */
    public function ajaxTest()
    {
        $image = new Image();
        $count = $image->getCount();
        echo json_encode($count);
    }
}
