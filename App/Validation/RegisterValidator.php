<?php

declare(strict_types = 1);

namespace App\Validation;

use App\Models\User;
use Core\Util\Input;

/**
 * Class RegisterValidator
 */
class RegisterValidator extends Validator
{
    /**
     * @var User|null
     */
    private ?User $user;

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
        $post = Input::validatePost();

        $this->validateUsername($post['username']);
        $this->validateEmail($post['email']);
        $this->validatePassword($post['password']);
        $this->validateConfirmPassword($post['password'], $post['confirmPassword']);
        $this->validateStreetAddress($post['streetAddress']);
        $this->validateCity($post['city']);
        $this->validatePostcode($post['postcode']);
        $this->validateCountry($post['country']);

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
            if (strlen($username) < 2)
            {
                $this->setError('username', USERNAME_SHORT_ERROR);
            }
            elseif (strlen($username) > 64)
            {
                $this->setError('username', USERNAME_LONG_ERROR);
            }
            else
            {
                if ($this->user->isUsernameAvailable($username))
                {
                    $this->setError('username', USERNAME_EXISTS_ERROR);
                }
            }
        }
        else
        {
            $this->setError('username', USERNAME_MISSING_ERROR);
        }

        $this->setData('username', $username);
    }

    /**
     * @param string $email
     *
     * @return void
     */
    private function validateEmail(string $email): void
    {
        if (!empty($email))
        {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $this->setError('email', EMAIL_NOT_VALID_ERROR);
            }
            if (strlen($email) < 2)
            {
                $this->setError('email', EMAIL_SHORT_ERROR);
            }
            elseif (strlen($email) > 64)
            {
                $this->setError('email', EMAIL_LONG_ERROR);
            }
            else
            {
                if ($this->user->isEmailAvailable($email))
                {
                    $this->setError('email', EMAIL_EXISTS_ERROR);
                }
            }
        }
        else
        {
            $this->setError('email', EMAIL_MISSING_ERROR);
        }

        $this->setData('email', $email);
    }

    /**
     * @param string $password
     *
     * @return void
     */
    private function validatePassword(string $password): void
    {
        if (!empty($password))
        {
            if (strlen($password) < 8)
            {
                $this->setError('password', PASSWORD_SHORT_ERROR);
            }
            if (!preg_match("#[0-9]+#", $password))
            {
                $this->setError('password', PASSWORD_REQUIRES_NUMBER_ERROR);
            }
            if (!preg_match("#[A-Z]+#", $password))
            {
                $this->setError('password', PASSWORD_REQUIRES_UPPERCASE_ERROR);
            }
            if (!preg_match("#[a-z]+#", $password))
            {
                $this->setError('password', PASSWORD_REQUIRES_LOWERCASE_ERROR);
            }
        }
        else
        {
            $this->setError('password', PASSWORD_MISSING_ERROR);
        }

        $this->setData('password', $password);
    }

    /**
     * @param string $password
     * @param string $confirmPassword
     *
     * @return void
     */
    private function validateConfirmPassword(string $password, string $confirmPassword): void
    {
        if (!empty($confirmPassword))
        {
            if ($password != $confirmPassword)
            {
                $this->setError('confirmPassword', CONFIRM_PASSWORD_DIFFERENCE_ERROR);
            }
        }
        else
        {
            $this->setError('confirmPassword', CONFIRM_PASSWORD_MISSING_ERROR);
        }

        $this->setData('confirmPassword', $confirmPassword);
    }

    /**
     * @param string $streetAddress
     *
     * @return void
     */
    private function validateStreetAddress(string $streetAddress): void
    {
        if (!empty($streetAddress))
        {
            if (strlen($streetAddress) < 2)
            {
                $this->setError('streetAddress', STREET_ADDRESS_SHORT_ERROR);
            }
            elseif (strlen($streetAddress) > 64)
            {
                $this->setError('streetAddress', STREET_ADDRESS_LONG_ERROR);
            }
        }
        else
        {
            $this->setError('streetAddress', STREET_ADDRESS_MISSING_ERROR);
        }

        $this->setData('streetAddress', $streetAddress);
    }

    /**
     * @param string $city
     *
     * @return void
     */
    private function validateCity(string $city): void
    {
        if (!empty($city))
        {
            if (strlen($city) < 2)
            {
                $this->setError('city', CITY_SHORT_ERROR);
            }
            elseif (strlen($city) > 64)
            {
                $this->setError('city', CITY_LONG_ERROR);
            }
        }
        else
        {
            $this->setError('city', CITY_MISSING_ERROR);
        }

        $this->setData('city', $city);
    }

    /**
     * @param string $postcode
     *
     * @return void
     */
    private function validatePostcode(string $postcode): void
    {
        if (!empty($postcode))
        {
            if (strlen($postcode) < 2)
            {
                $this->setError('postcode', POSTCODE_SHORT_ERROR);
            }
            elseif (strlen($postcode) > 10)
            {
                $this->setError('postcode', POSTCODE_LONG_ERROR);
            }
        }
        else
        {
            $this->setError('postcode', POSTCODE_MISSING_ERROR);
        }

        $this->setData('postcode', $postcode);
    }

    /**
     * @param string $country
     *
     * @return void
     */
    private function validateCountry(string $country): void
    {
        if (empty($country))
        {
            $this->setError('country', COUNTRY_MISSING_ERROR);
        }

        $this->setData('country', $country);
    }
}
