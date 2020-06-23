<?php

declare(strict_types = 1);

namespace App\Models;

use Core\Model;
use PDO;

class User extends Model
{
    /**
     * @return array
     */
    public function index() : array
    {
        $sql = "SELECT * FROM users";
        $users = $this->DB->run($sql)->fetchAll(PDO::FETCH_OBJ);
        
        return $users;
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $streetAddress
     * @param string $city
     * @param string $postcode
     * @param string $country
     * 
     * @return bool
     */
    public function create(string $username, string $email, string $password, string $streetAddress, string $city, string $postcode, string $country) : bool
    {
        $password = $this->encryptPassword($password);

        $sql = 
        "INSERT INTO users (username, email, password, streetAddress, city, postcode, country) 
        VALUES  (:username, :email, :password, :streetAddress, :city, :postcode, :country)";

        $stmt = $this->DB->prepare($sql);
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':streetAddress', $streetAddress);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postcode', $postcode);
        $stmt->bindParam(':country', $country);

        $result = $stmt->execute();

        return $result;
    }

    /**
     * @param int $id
     * 
     * @return array
     */
    public function show(int $id) : array
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $user = $this->DB->run($sql, [$id])->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    /**
     * @param string $username
     * 
     * @return array
     */
    public function showByUsername(string $username) : array
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $user = $this->DB->run($sql, [$username])->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    /**
     * @param string $email
     * 
     * @return array
     */
    public function showByEmail(string $email) : array
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $user = $this->DB->run($sql, [$email])->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function edit($id) : void
    {
        
    }

    public function destroy($id) : void
    {
        
    }

    /**
     * @param string $username
     * 
     * @return int
     * 
     * Return 0 if available.
     * Return 1 if taken.
     */
    public function isUsernameAvailable(string $username) : int
    {
        $sql = "SELECT COUNT(username) AS username FROM users WHERE username = :username";
        $isAvailable = $this->DB->run($sql,[$username])->fetch(PDO::FETCH_ASSOC);

        return $isAvailable['username'];
    }

    /**
     * @param string $email
     * 
     * @return int
     * 
     * Return 0 if available.
     * Return 1 if taken.
     */
    public function isEmailAvailable(string $email) : int
    {
        $sql = "SELECT COUNT(email) AS email FROM users WHERE email = :email";
        $isAvailable = $this->DB->run($sql,[$email])->fetch(PDO::FETCH_ASSOC);

        return $isAvailable['email'];
    }

    /**
     * @param string $password
     * 
     * @return string
     */
    public static function encryptPassword(string $password) : string
    {
        $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $encryptedPassword;
    }
}
