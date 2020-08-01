<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\Util\Session;
use Core\View;
use App\Models\User;
use App\Validation\LoginValidator;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends Controller
{
    /**
     * @var int|null
     */
    private ?int $userId = null;

    /**
     * @var View|null
     */
    private ?View $view;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->view = new View();
    }

    public function index()
    {
        // Render empty login form.
        $this->view->render('Pages/Login');
    }

    /**
     * @return void
     */
    public function login(): void
    {
        $user = new User();
        $validator = new LoginValidator($user);

        if ($validator->validate())
        {
            $userId = $user->getIdByUsername($validator->getData('username'));

            // Login user if there are no errors found during validation.
            $this->session->login((int)$userId->id, $validator->getData('username'));

            $this->redirect('Management');
        }
        else
        {
            // Render with errors.
            $this->view->render('Pages/Login', $validator->getAllData(), $validator->getAllErrors());
        }
    }

    /**
     * @return void
     */
    public function logout() : void
    {
        $this->session->logout();
        $this->redirect(' ');
    }
}
