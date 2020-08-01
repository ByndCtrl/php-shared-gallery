<?php

declare(strict_types=1);

namespace App\Models;

use Core\Model;
use PDO;
use PDOStatement;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    /**
     * @return array
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM users";
        return $this->DB->run($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @param string $streetAddress
     * @param string $city
     * @param string $postcode
     * @param string $country
     * @return PDOStatement
     */
    public function create(string $username, string $email, string $password, string $streetAddress, string $city, string $postcode, string $country): PDOStatement
    {
        $password = $this->encryptPassword($password);

        $sql = "INSERT INTO users (username, email, password, streetAddress, city, postcode, country) 
        VALUES  (:username, :email, :password, :streetAddress, :city, :postcode, :country)";

        return $this->DB->run($sql, [$username, $email, $password, $streetAddress, $city, $postcode, $country]);
    }

    /**
     * @param int $id
     *
     * @return object
     */
    public function get(int $id): object
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        return $this->DB->run($sql, [$id])->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @param string $newEmail
     * @return PDOStatement
     */
    public function editEmail(int $id, string $newEmail): PDOStatement
    {
        $sql = "UPDATE users SET email = :email WHERE id = :id";
        return $this->DB->run($sql, [$newEmail, $id]);
    }

    /**
     * @param $id
     * @param $newPassword
     * @return PDOStatement
     */
    public function editPassword($id, $newPassword): PDOStatement
    {
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        return $this->DB->run($sql, [$newPassword, $id]);
    }

    /**
     * @param $id
     */
    public function destroy($id): void
    {
        $sql = "DELETE FROM users WHERE $id = :id";
        $this->DB->run($sql, [$id]);
    }

    /**
     * @param string $username
     *
     * @return int
     *
     * Return 0 if available.
     * Return 1 if taken.
     */
    public function isUsernameAvailable(string $username): int
    {
        $sql = "SELECT COUNT(username) AS username FROM users WHERE username = :username";
        $isAvailable = $this->DB->run($sql, [$username])->fetch(PDO::FETCH_ASSOC);

        return $isAvailable['username'];
    }

    /**
     * @param string $email
     * @return int
     */
    public function isEmailAvailable(string $email): int
    {
        $sql = "SELECT COUNT(email) AS email FROM users WHERE email = :email";
        $isAvailable = $this->DB->run($sql, [$email])->fetch(PDO::FETCH_ASSOC);

        return $isAvailable['email'];
    }

    /**
     * @param string $password
     *
     * @return string
     */
    public static function encryptPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    /**
     * @param string $username
     * @return object|null
     */
    public function getByUsername(string $username): ?object
    {
        $sql = "SELECT * FROM users WHERE username = :username";

        // Return user object if it exists, otherwise return null.
        return ($user = $this->DB->run($sql, [$username])->fetch(PDO::FETCH_OBJ)) ? $user : null;
    }


    /**
     * @param string $username
     * @return object|null
     */
    public function getIdByUsername(?string $username) : ?object
    {
        $sql = "SELECT id FROM users WHERE username = :username";

        // Return user object if it exists, otherwise return null.
        return ($user = $this->DB->run($sql, [$username])->fetch(PDO::FETCH_OBJ)) ? $user : null;
    }
}
