<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Validation\UploadValidator;
use Core\Controller;
use Core\View;
use App\Models\Image;
use App\ThumbnailGenerator;

/**
 * Class UploadController
 * @package App\Controllers
 */
class UploadController extends Controller
{
    private ?Image $image;
    private ?View $view;

    public function __construct()
    {
        parent::__construct();
        $this->image = new Image();
        $this->view = new View();
    }

    public function index()
    {
        $this->view->render('Users/Upload');
    }

    public function upload()
    {
        ob_start();

        $validator = new UploadValidator();

        if ($validator->validate())
        {
            $name = $validator->getData('name');
            $tmpName = $validator->getData('tmpName');
            $type = $validator->getData('type');
            $size = $validator->getData('size');

            $path = $this->getImagePath($name, $type);
            $thumbnailPath = $this->getImageThumbnailPath($name, $type);

            // Move original version of the image
            if(move_uploaded_file($tmpName, $path))
            {
                $uploaderId = $this->session->getValue('userId');

                if($this->image->create((int)$uploaderId, $name, $path, $thumbnailPath, $size))
                {
                    // Create a resized and downsampled thumbnail of the original image
                    $thumbnailGenerator = new ThumbnailGenerator();
                    $thumbnailGenerator->createThumbnail(240, $path, $thumbnailPath);

                    $this->redirect('Management');
                }
                else
                {
                    $errors = [
                        'upload' => UPLOAD_ERROR
                    ];

                    $this->view->render('Users/Upload', $validator->getAllData(), $errors);
                }
            }
            else
            {
                $errors = [
                    'upload' => UPLOAD_ERROR
                ];
                $this->view->render('Users/Upload', $validator->getAllData(), $errors);
            }
        }
        else
        {
            // Render with errors.
            $this->view->render('Users/Upload', $validator->getAllData(), $validator->getAllErrors());
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
    private function getImageExtension($type) : string
    {
        $ext = explode('/', $type);
        return strtolower(end($ext));
    }
}
