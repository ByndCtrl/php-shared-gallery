<?php

declare(strict_types = 1);

namespace App\Validation;

/**
 * Class Validator
 */
abstract class Validator implements IValidator
{
    private array $data = [];
    private array $errors = [];

    protected function setData(string $key, string $value): void
    {
        $this->data[$key] = $value;
    }

    public function getAllData(): ?array
    {
        return $this->data;
    }

    public function getData(string $key): ?string
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    protected function setError(string $key, string $value): void
    {
        $this->errors[$key] = $value;
    }

    public function getAllErrors(): ?array
    {
        return $this->errors;
    }

    public function getError(string $key): ?string
    {
        return isset($this->errors[$key]) ? $this->errors[$key] : null;
    }
}
