<?php

namespace App\Validation;

use Cassandra\Varint;
use Core\Util\Input;

/**
 * Class UploadValidator
 * @package App\Validation
 */
class UploadValidator extends Validator
{
    private array $allowedExtensions = [
        'jpg',
        'jpeg',
        'png'
    ];

    /**
     * @return bool
     */
    public function validate() : bool
    {
        $post = Input::validatePost();
        $file = Input::validateFiles();

        $this->validateName($post['name']);
        $this->validateFile($file);
       // $this->validateExtension($file['image']['type']);
        //$this->validateSize($file['image']['size']);

        return !array_filter($this->getAllErrors()) ? $isValid = true : $isValid = false;
    }

    public function validateName(string $name) : void
    {
        if (!empty($name))
        {
            if(strlen($name) < 2)
            {
                $this->setError('name', IMAGE_NAME_SHORT_ERROR);
            }
            elseif(strlen($name) > 64)
            {
                $this->setError('name', IMAGE_NAME_LONG_ERROR);
            }
        }
        else
        {
            $this->setError('name', IMAGE_NAME_MISSING_ERROR);
        }

        $this->setData('name', $name);
    }

    /**
     * @param array|null
     */
    public function validateFile(?array $file)
    {
        if (empty($file) || $file['image']['error'] == 1)
        {
            $this->setError('file', IMAGE_FILE_MISSING_ERROR);
        }
        else
        {
            $this->setData('type', $file['image']['type']);
            $this->setData('tmpName', $file['image']['tmp_name']);

            $this->validateExtension($file['image']['type']);
            $this->validateSize($file['image']['size']);
        }
    }

    public function validateExtension(string $type) : void
    {
        // Lowercase and get extension out of file type
        $tmp = explode('/', $type);
        $ext = strtolower(end($tmp));

        if (!in_array($ext, $this->allowedExtensions))
        {
            $this->setError('extension', IMAGE_EXT_NOT_VALID_ERROR);
        }
    }

    public function validateSize(int $size) : void
    {
        // 50 million bytes, 50 MB
        if ($size > 50000000)
        {
            $this->setError('size', IMAGE_LARGE_ERROR);
        }

        $this->setData('size', $size);
    }
}