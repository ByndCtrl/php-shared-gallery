<?php

declare(strict_types = 1);

use Core\Controller;
use Core\View;
use App\Models\User;
use Core\Util\Input;

class LoginController extends Controller
{
    private ?string $username = null;
    private ?string $password = null;

    private array $data = [];
    private array $errors = [];

    private ?User $user = null;
    private ?View $view = null;

    public function __construct()
    {
        $this->user = new User();
        $this->view = new View();

        $this->data = [
            'title' => 'Login',

            'username' => '',
            'password' => '',
        ];

        $this->errors = [
            'usernameError' => '',
            'passwordError' => '',
        ];
    }

    public function index() : void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $post = Input::validatePost();

            $this->username = $post['username'];
            $this->password = $post['password'];

            // Check every input. Add data and errors found to their respective arrays.
            $this->validateLogin($this->username, $this->password);

            if(!array_filter($this->errors))
            {
                // Login user if there are no errors found during validation.
                $this->view->render('Users/management', $this->data, $this->errors);
            }
            else
            {
                // Render with errors.
                $this->view->render('Pages/login', $this->data, $this->errors);
            }
        }
        else
        {
            // Render empty login form.
            $this->view->render('Pages/login', $this->data, $this->errors);
        }
    }
    
    /**
     * @param string $username
     * @param string $password
     * 
     * @return void
     */
    private function validateLogin(string $username, string $password) : void
    {
        $this->validateUsername($username);
        $this->validatePassword($password);
    }

    /**
     * @param string $username
     * 
     * @return void
     */
    private function validateUsername(string $username) : void
    {      
        if (!empty($username)) 
        {
            if (!$this->user->showByUsername($username)) 
            {
                $this->errors['usernameError'] = USERNAME_NOT_EXISTS_ERROR;
            }
        }
        else 
        {
            $this->errors['usernameError'] = USERNAME_MISSING_ERROR;
        }

        $this->data['username'] = $username;
        $this->username = $username;
    }

    /**
     * @param string $password
     * 
     * @return void
     */
    private function validatePassword(string $password) : void
    {
        $password = $this->password;

        if ($this->user->showByUsername($this->username)) 
        {
            $hashedPassword = $this->user->showByUsername($this->username)['password'];
        }
        else
        {
            $hashedPassword = null;
        }

        if (!empty($password)) 
        {
            if (!password_verify($password, $hashedPassword)) 
            {
                $this->errors['passwordError'] = LOGIN_ERROR;
            }
        }
        else
        {
            $this->errors['passwordError'] = PASSWORD_MISSING_ERROR;
        }

        $this->data['password'] = $password;
    }
}
