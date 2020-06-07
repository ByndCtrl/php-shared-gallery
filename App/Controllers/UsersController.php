<?php

use Core\Controller;
use Core\View;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {   
        $users = new User();
        $users = $users->index();

        $view = new View();
        $view->render('users', $users);
    }
}
