<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\View;

/**
 * Class ManagementController
 * @package App\Controllers
 */
class ManagementController extends Controller
{
    private ?View $view = null;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }

    public function index()
    {
        $data = [
            'title' => 'Management'
        ];

        $this->view->render('Users/Management', $data);
    }
}
