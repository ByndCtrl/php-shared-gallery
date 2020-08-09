<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Validation\SettingsValidator;
use App\Validation\Validator;
use Core\Controller;
use Core\View;

/**
 * Class SettingsController
 * @package App\Controllers
 */
class SettingsController extends Controller
{
    private ?View $view = null;
    private ?User $user = null;
    private ?Validator $validator = null;
    private int $userId = 0;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
        $this->user = new User();
        $this->validator = new SettingsValidator($this->user);
        $this->userId = (int)$this->session::getValue('userId');
    }

    public function index()
    {
        $this->session::authenticate();

        $currentEmail = $this->user->get($this->userId);

        $data = [
            'currentEmail' => $currentEmail
        ];

        $this->view->render('Users/Settings', $data);
    }

    public function updateEmail()
    {
        ob_start();

        if($this->validator->validate())
        {
            if ($this->user->editEmail($this->userId, $this->validator->getData('newEmail')))
            {
                $this->redirect('Settings');
            }
            else
            {
                $errors = [
                    'email' => EMAIL_UPDATE_ERROR
                ];

                $this->view->render('Users/Settings', $this->validator->getAllData(), $errors);
            }
        }
        else
        {
            $this->view->render('Users/Settings', $this->validator->getAllData(), $this->validator->getAllErrors());
        }
    }

    public function updatePassword()
    {
        ob_start();

        if($this->validator->validate())
        {
            if ($this->user->editPassword($this->userId, $this->validator->getData('newPassword')))
            {
                $this->redirect('Settings');
            }
            else
            {
                $errors = [
                    'password' => PASSWORD_UPDATE_ERROR
                ];

                $this->view->render('Users/Settings', $this->validator->getAllData(), $errors);
            }
        }
        else
        {
            $this->view->render('Users/Settings', $this->validator->getAllData(), $this->validator->getAllErrors());
        }
    }

    public function deleteAccount()
    {
        ob_start();

        $userId = (int)$this->session::getValue('userId');

        $image = new Image();
        $data = $image->getUserUploads($userId);

        for ($i = 0; $i<count($data); $i++)
        {
            if ($data[$i]->path !== null && $data[$i]->thumbnailPath !== null)
            {
                if (!empty($data[$i]->path) && !empty($data[$i]->thumbnailPath))
                {
                    unlink($data[$i]->path);
                    unlink($data[$i]->thumbnailPath);
                }
            }
        }

        $this->user->destroy($userId);
        $this->session->destroy();
        $this->redirect('/');
        exit;
    }
}
