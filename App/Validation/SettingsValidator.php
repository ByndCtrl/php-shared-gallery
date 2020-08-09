<?php

declare(strict_types=1);

namespace App\Validation;

use App\Models\User;
use Core\Util\Input;
use Core\Util\Session;

/**
 * Class SettingsValidator
 * @package App\Validation
 */
class SettingsValidator extends Validator
{
    /**
     * @var User|null
     */
    private ?User $user;

    /**
     * SettingsValidator constructor.
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
        $post = Input::validatePost();

        switch (1)
        {
            case (isset($post['updateEmail'])):
                $this->validateNewEmail($post['newEmail']);
                break;

            case (isset($post['updatePassword'])):
                $this->validateNewPassword($post['newPassword']);
                break;

            default:
                return false;
                break;
        }


        $currentEmail = $this->user->get((int)Session::getValue('userId'))->email;
        $this->setData('currentEmail', $currentEmail);

        return !array_filter($this->getAllErrors()) ? $isValid = true : $isValid = false;
    }

    /**
     * @param string $newEmail
     */
    public function validateNewEmail(string $newEmail) : void
    {
        if (!empty($newEmail))
        {
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL))
            {
                $this->setError('newEmail', EMAIL_NOT_VALID_ERROR);
            }
            if (strlen($newEmail) < 2)
            {
                $this->setError('newEmail', EMAIL_SHORT_ERROR);
            }
            elseif (strlen($newEmail) > 64)
            {
                $this->setError('newEmail', EMAIL_LONG_ERROR);
            }
            else
            {
                if ($this->user->isEmailAvailable($newEmail))
                {
                    $this->setError('newEmail', EMAIL_EXISTS_ERROR);
                }
            }
        }
        else
        {
            $this->setError('newEmail', EMAIL_MISSING_ERROR);
        }

        $email = filter_var($newEmail, FILTER_SANITIZE_EMAIL);
        $this->setData('newEmail', $newEmail);
    }

    /**
     * @param $newPassword
     */
    public function validateNewPassword($newPassword) : void
    {
        if (!empty($newPassword))
        {
            if (strlen($newPassword) < 8)
            {
                $this->setError('newPassword', PASSWORD_SHORT_ERROR);
            }
            if (!preg_match("#[0-9]+#", $newPassword))
            {
                $this->setError('newPassword', PASSWORD_REQUIRES_NUMBER_ERROR);
            }
            if (!preg_match("#[A-Z]+#", $newPassword))
            {
                $this->setError('newPassword', PASSWORD_REQUIRES_UPPERCASE_ERROR);
            }
            if (!preg_match("#[a-z]+#", $newPassword))
            {
                $this->setError('newPassword', PASSWORD_REQUIRES_LOWERCASE_ERROR);
            }
        }
        else
        {
            $this->setError('newPassword', PASSWORD_MISSING_ERROR);
        }

        $newPassword = $this->user::encryptPassword($newPassword);
        $this->setData('newPassword', $newPassword);
    }
}