<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Validation\RegisterValidator;
use Core\Controller;
use Core\View;
use App\Models\User;

/**
 * Class RegisterController
 * @package App\Controllers
 */
class RegisterController extends Controller
{
    private ?User $user;
    private ?View $view;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User();
        $this->view = new View();
    }

    public function index(): void
    {
        // Render empty register form.
        $this->view->render('Pages/Register');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $validator = new RegisterValidator($this->user);

        if ($validator->validate())
        {
            // Get validated input values.
            $registerData = $validator->getAllData();

            // Remove confirm password key/value as it is not needed in the database.
            unset($registerData['confirmPassword']);

            // Transform to sequential (index) array.
            $registerData = array_values($registerData);

            if ($this->user->create(...$registerData))
            {
                $this->view->render('Pages/Login', $validator->getAllData());
            }
            else
            {
                $errors = [
                    'register' => REGISTER_ERROR
                ];

                $this->view->render('Pages/Register', $validator->getAllData(), $errors);
            }
        }
        else
        {
            // Render with errors.
            $this->view->render('Pages/Register', $validator->getAllData(), $validator->getAllErrors());
        }
    }
}
