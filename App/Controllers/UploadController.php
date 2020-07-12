<?php

declare(strict_types = 1);

namespace App\Controllers;

use Core\Controller;
use Core\View;
use Core\Util\Input;
use App\Models\Image;
use App\ThumbnailGenerator;

/**
 * Class UploadController
 * @package App\Controllers
 */
class UploadController extends Controller
{
    private ?View $view = null;
    private string $prefix = SITE_NAME . '_';

    private array $allowedExtensions = [
        'jpg',
        'jpeg',
        'png'
    ];

    private array $data = [];
    private array $errors = [];

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();

        $this->data = [
            'uploaderId' => '',
            'name' => '',
            'path' => '',
            'thumbnailPath' => '',
            'size' => ''
        ];

        $this->errors = [
            'nameError' => '',
            'extensionError' => '',
            'sizeError' => '',
            'uploadError' => ''
        ];
    }

    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $post = Input::validatePost();
            $files = Input::validateFiles();

            $name = $post['imageName'];
            $fileName = $this->prefix . $post['imageName'];
            $type = $files['image']['type'];
            $size = $files['image']['size'];

            $uploaderId = $this->session->getValue('userId');

            $this->validateUpload($name, $type, intval($size));

            if (!array_filter($this->errors))
            {
                $tmpName = $files['image']['tmp_name'];

                $path = $this->getImagePath($fileName, $type);
                $thumbnailPath = $this->getImageThumbnailPath($fileName, $type);

                // Move original version of the image
                move_uploaded_file($tmpName, $path);

                // Create a resized and downsampled thumbnail of the original image
                $thumbnailGenerator = new ThumbnailGenerator();
                $thumbnailGenerator->createThumbnail($path, $thumbnailPath);

                $image = new Image();
                $image->create((int)$uploaderId, $name, $path, $thumbnailPath, $size);

                $this->data['success'] = 'Successful upload.';
                $this->redirect('Management');
            }
            else
            {
                // Render with errors
                $this->view->render('Users/Management', $this->data, $this->errors);
            }
        }
    }

    public function validateUpload(string $name, string $type, int $size) : void
    {
        $this->validateName($name);
        $this->validateExtension($type);
        $this->validateSize(intval($size));
    }

    public function validateName(string $name) : void
    {
        if (!empty($name))
        {
            if(strlen($name) < 3)
            {
                $this->errors['nameError'] = IMAGE_NAME_SHORT_ERROR;
            }
            elseif(strlen($name) > 64)
            {
                $this->errors['nameError'] = IMAGE_NAME_LONG_ERROR;
            }
        }
        else
        {
            $this->errors['nameError'] = IMAGE_NAME_MISSING_ERROR;
        }

        $this->data['name'] = $name;
    }

    public function validateExtension(string $type) : void
    {
        // Lowercase and get extension out of file type
        $tmp = explode('/', $type);
        $ext = strtolower(end($tmp));

        if (!in_array($ext, $this->allowedExtensions))
        {
            $this->errors['extensionError'] = IMAGE_EXT_NOT_VALID_ERROR;
        }
    }

    public function validateSize(int $size) : void
    {
        // 50 million bytes, 50 MB
        if ($size > 50000000)
        {
            $this->errors['sizeError'] = IMAGE_LARGE_ERROR;
        }
    }

    private function getImagePath(string $name, string $type) : string
    {
        $ext = $this->getImageExtension($type);

        $name = $name . uniqid('_', false) . '.' . $ext;
        return IMAGE_PATH . $name;
    }

    private function getImageThumbnailPath(string $name, string $type) : string
    {
        $ext = $this->getImageExtension($type);

        $name = $name . '_tmb_' . uniqid('', false) . '.' . $ext;
        return THUMBNAIL_PATH . $name;
    }

    /**
     * @param $type
     * @return string
     */
    /**
     * @param $type
     * @return string
     */
    /**
     * @param $type
     * @return string
     */
    /**
     * @param $type
     * @return string
     */
    /**
     * @param $type
     * @return string
     */
    private function getImageExtension($type) : string
    {
        $ext = explode('/', $type);
        return strtolower(end($ext));
    }
}
