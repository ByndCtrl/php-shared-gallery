<?php

declare(strict_types=1);

namespace Core\Util;

use Exception;
use function bin2hex;
use function random_bytes;
use function session_status;

/**
 * Class Session
 * @package Core\Util
 */
class Session
{
    private ?string $sessionId = null;
    private ?string $isActive = 'false';
    private ?int $activationTime = null;
    private ?string $csrfToken = null;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
            $this->isActive = 'true';
            $this->activationTime = time();
            $this->sessionId = session_id();

            try
            {
                $this->csrfToken = bin2hex(random_bytes(32));
            }
            catch (Exception $exception)
            {
                $this->destroy();
            }

            $this->addKeyValuePair('isActive', (string)$this->isActive);
            $this->addKeyValuePair('activationTime', (string)$this->activationTime);
            $this->addKeyValuePair('sessionId', $this->sessionId);
            $this->addKeyValuePair('$csrfToken', $this->csrfToken);
        }
    }

    /**
     * @param int $userId
     *
     * @param string $username
     * @return void
     */
    public function login(int $userId, string $username): void
    {
        $this->addKeyValuePair('userId', (string)$userId);
        $this->addKeyValuePair('username', $username);
        $this->addKeyValuePair('isLoggedIn', 'true');
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        $this->removeValue('userId');
        $this->removeValue('username');
        $this->removeValue('isLoggedIn');

        $this->destroy();
    }

    public static function authenticate()
    {
        if (!self::isLoggedIn() || empty($_SESSION['userId']))
        {
            $url = URL_ROOT . 'login';
            header("Location: $url");
            exit;
        }
    }

    /**
     * @param $csrf
     */
    public function validateCSRF(string $csrf) : void
    {
        if (!hash_equals($_SESSION['csrf'], $csrf)) {
            header('Location: /login');
            exit;
        }
    }

    public static function isLoggedIn(): bool
    {
        return !empty(self::getValue('isLoggedIn'));
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function addKeyValuePair(string $key, string $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public static function getValue(string $key): ?string
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * @param string $key
     *
     * @return void
     */
    public function removeValue(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        $_SESSION = array();
        session_destroy();
    }
}
