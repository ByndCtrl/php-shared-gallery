<?php

use Core\Controller;
use Core\View;

class PagesController extends Controller
{
    public function index()
    {    
        $data = 
        [
            'title' => 'Home'
        ];

        $view = new View();
        $view->render('index', $data);
    }

    public function about()
    {
        $data = 
        [
            'title' => 'About',
        ];

        $view = new View();
        $view->render('about', $data);
    }
}
