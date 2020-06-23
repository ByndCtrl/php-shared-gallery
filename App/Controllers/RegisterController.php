<?php

declare(strict_types = 1);

use Core\Util\Input;
use Core\Controller;
use Core\View;
use App\Models\User;

class RegisterController extends Controller
{
    private ?string $username = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $confirmPassword = null;
    private ?string $streetAddress = null;
    private ?string $city = null;
    private ?string $postcode = null;
    private ?string $country = null;

    private array $data = [];
    private array $errors = [];

    private ?User $user = null;
    private ?View $view = null;

    public function __construct()
    {
        $this->user = new User();
        $this->view = new View();

        $this->data = [
            'title' => 'Register',

            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'streetAddress' => '',
            'city' => '',
            'postcode' => '',
            'country' => ''
        ];

        $this->errors = [
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'streetAddressError' => '',
            'cityError' => '',
            'postcodeError' => '',
            'countryError' => ''
        ];
    }

    /**
     * @return void
     */
    public function index() : void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' ) 
        {
            $post = Input::validatePost();

            $this->username = $post['username'];
            $this->email = $post['email'];
            $this->password = $post['password'];
            $this->confirmPassword = $post['confirmPassword'];
            $this->streetAddress = $post['streetAddress'];
            $this->city = $post['city'];
            $this->postcode = $post['postcode'];
            $this->country = $post['country'];

            // Check every input. Add data and errors found to their respective arrays.
            $this->validateRegister($this->username, $this->email, $this->password, $this->confirmPassword, $this->streetAddress, $this->city, $this->postcode, $this->country);

            if(!array_filter($this->errors))
            {   
                // Insert new user if there are no errors found during validation.
                $this->user->create($this->username, $this->email, $this->password, $this->confirmPassword, $this->streetAddress, $this->city, $this->postcode, $this->country);

                // Pass validated data into login view, autofilling username and password fields.
                $this->view->render('Pages/login', $this->data);
            }
            else
            {
                // Render with errors.
                $this->view->render('Pages/register', $this->data, $this->errors);
            }
        }
        else
        {
            // Render empty register form.
            $this->view->render('Pages/register', $this->data, $this->errors);
        }       
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $confirmPassword
     * @param string $streetAddress
     * @param string $city
     * @param string $postcode
     * @param string $country
     * 
     * @return void
     */
    private function validateRegister(string $username, string $email, string $password, string $confirmPassword, string $streetAddress, string $city, string $postcode, string $country) : void
    {
        $this->validateUsername($username);
        $this->validateEmail($email);
        $this->validatePassword($password);
        $this->validateConfirmPassword($confirmPassword);
        $this->validateStreetAddress($streetAddress);
        $this->validateCity($city);
        $this->validatePostcode($postcode);
        $this->validateCountry($country);
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
            if (strlen($username) < 3) 
            {
                $this->errors['usernameError'] = USERNAME_SHORT_ERROR;
            }
            elseif (strlen($username) > 64) 
            {
                $this->errors['usernameError'] = USERNAME_LONG_ERROR;
            }
            else
            {
                if($this->user->isUsernameAvailable($username))
                {
                    $this->errors['usernameError'] = USERNAME_EXISTS_ERROR;
                } 
            }
        } 
        else 
        {
            $this->errors['usernameError'] = USERNAME_MISSING_ERROR;
        }

        $this->data['username'] = $username;
    }

    /**
     * @param string $email
     * 
     * @return void
     */
    private function validateEmail(string $email) : void
    {
        if (!empty($email)) 
        {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $this->errors['emailError'] = EMAIL_NOT_VALID_ERROR;
            }
            if(strlen($email) < 3)
            {
                $this->errors['emailError'] = EMAIL_SHORT_ERROR;
            }
            elseif(strlen($email) > 64)
            {
                $this->errors['emailError'] = EMAIL_LONG_ERROR;
            }
            else 
            {
                if($this->user->isEmailAvailable($email))
                {
                    $this->errors['emailError'] = EMAIL_EXISTS_ERROR;
                }  
            }
        } 
        else 
        {
            $this->errors['emailError'] = EMAIL_MISSING_ERROR;
        }

        $this->data['email'] = $email;
    }

    /**
     * @param string $password
     * 
     * @return void
     */
    private function validatePassword(string $password) : void
    {
        if (!empty($password))
        {
            if (strlen($password) < '8') 
            {
                $this->errors['passwordError'] = PASSWORD_SHORT_ERROR;
            }
            if (!preg_match("#[0-9]+#", $password)) 
            {
                $this->errors['passwordError'] = PASSWORD_REQUIRES_NUMBER_ERROR;
            }
            if (!preg_match("#[A-Z]+#", $password)) 
            {
                $this->errors['passwordError'] = PASSWORD_REQUIRES_UPPERCASE_ERROR;
            }
            if (!preg_match("#[a-z]+#", $password)) 
            {
                $this->errors['passwordError'] = PASSWORD_REQUIRES_LOWERCASE_ERROR;
            }
        } 
        else 
        {
            $this->errors['passwordError'] = PASSWORD_MISSING_ERROR;
        }

        $this->data['password'] = $password;
    }

    /**
     * @param string $confirmPassword
     * 
     * @return void
     */
    private function validateConfirmPassword(string $confirmPassword) : void
    {
        if(!empty($confirmPassword))
        {
            if($this->password != $confirmPassword)
            {
                $this->errors['confirmPasswordError'] = CONFIRM_PASSWORD_DIFFERENCE_ERROR;
            }    
        }
        else
        {
            $this->errors['confirmPasswordError'] = CONFIRM_PASSWORD_MISSING_ERROR;   
        }

        $this->data['confirmPassword'] = $confirmPassword;
    }

    /**
     * @param string $streetAddress
     * 
     * @return void
     */
    private function validateStreetAddress(string $streetAddress) : void
    {   
        if (!empty($streetAddress)) 
        {
            if (strlen($streetAddress) <= 2) 
            {
                $this->errors['streetAddressError'] = STREET_ADDRESS_SHORT_ERROR;
            }
            elseif (strlen($streetAddress) > 64) 
            {
                $this->errors['streetAddressError'] = STREET_ADDRESS_LONG_ERROR;
            }
        } 
        else 
        {
            $this->errors['streetAddressError'] = STREET_ADDRESS_MISSING_ERROR;
        }

        $this->data['streetAddress'] = $streetAddress;
    }

    /**
     * @param string $city
     * 
     * @return void
     */
    private function validateCity(string $city) : void
    {   
        if (!empty($city)) 
        {
            if (strlen($city) > 85) 
            {
                $this->errors['cityError'] = CITY_LONG_ERROR;
            }
        } 
        else 
        {
            $this->errors['cityError'] = CITY_MISSING_ERROR;
        }

        $this->data['city'] = $city;
    }

    /**
     * @param string $postcode
     * 
     * @return void
     */
    private function validatePostcode(string $postcode) : void
    {   
        if (!empty($postcode)) 
        {
            if (strlen($postcode) < 2) 
            {
                $this->errors['postcodeError'] = POSTCODE_SHORT_ERROR;
            }
            elseif (strlen($postcode) > 10) 
            {
                $this->errors['postcodeError'] = POSTCODE_LONG_ERROR;
            }
        } 
        else 
        {
            $this->errors['postcodeError'] = POSTCODE_MISSING_ERROR;
        }

        $this->data['postcode'] = $postcode;
    }

    /**
     * @param string $country
     * 
     * @return void
     */
    private function validateCountry(string $country) : void
    {   
        if (empty($country)) 
        {
            $this->errors['countryError'] = COUNTRY_MISSING_ERROR;
        }

        $this->data['country'] = $country;
    }
}
