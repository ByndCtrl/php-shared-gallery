<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
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

            // Session
            $this->session->login((int)$userId->id, $validator->getData('username'));

            // Cookie
            $rememberMe = !empty($validator->post['rememberMe']) ? $validator->post['rememberMe'] : null;
            if ($rememberMe != null)
            {
                $time = time()+(60*60*24*30);

                setcookie('userId', (string)$userId->id, $time);
                setcookie('username', (string)$validator->getData('username'), $time);
                setcookie('active', '1', $time);
            }

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

        // Unset cookie
        setcookie('userId', '', 1);
        setcookie('username', '', 1);
        setcookie('active', '0', 1);

        $this->redirect(' ');
    }
}
