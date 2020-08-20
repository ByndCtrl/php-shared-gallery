<?php

declare(strict_types = 1);

namespace App\Validation;

use App\Models\User;
use Core\Util\Input;

/**
 * Class LoginValidator
 */
class LoginValidator extends Validator
{
    /**
     * @var User|null
     */
    private ?User $user;

    public array $post;

    /**
     * LoginValidator constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function validate() : bool
    {
        $this->post = Input::validatePost();
        $this->validateUsername($this->post['username']);
        $this->validatePassword($this->post['password']);

        return !array_filter($this->getAllErrors()) ? $isValid = true : $isValid = false;
    }

    /**
     * @param string $username
     *
     * @return void
     */
    private function validateUsername(string $username): void
    {
        if (!empty($username))
        {
            $this->setData('username', $username);
        }
        else
        {
            $this->setError('username', USERNAME_MISSING_ERROR);
        }
    }

    /**
     * @param string $password
     *
     * @return void
     */
    private function validatePassword(string $password): void
    {
        $username = (!empty($this->getData('username')) ? $this->getData('username') : null);

        if (!empty($password))
        {
            //$this->getData('username')
            if ($this->user->getIdByUsername($username) && $username !== null)
            {
                $hashedPassword = $this->user->getByUsername($this->getData('username'))->password;
            }
            else
            {
                $hashedPassword = null;
            }

            if ($hashedPassword === null || !password_verify($password, $hashedPassword))
            {
                $this->setError('password', LOGIN_ERROR);
            }
        }
        else
        {
            $this->setError('password', PASSWORD_MISSING_ERROR);
        }

        $this->setData('password', $password);
    }
}
