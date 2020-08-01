<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Image;
use App\Models\User;
use Core\Controller;
use Core\Util\Input;
use Core\View;

/**
 * Class ImageController
 * @package App\Controllers
 */
class ImageController extends Controller
{
    private ?View $view = null;
    private ?Image $image = null;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
        $this->image = new Image();
    }

    public function image()
    {
        $get = Input::validateGet();

        if(!empty($get['id']))
        {
            $id = $get['id'];
            $image = $this->image->get((int)$id);

            $user = new User();
            $user = $user->get($image->uploaderId);

            $data = [
                'title' => 'Image',
                'image' => $image,
                'user' => $user,
            ];

            $this->view->render('Images/Image', $data);
        }
        else
        {
            $this->redirect('404');
        }
    }

    public function showAll()
    {
        $images = $this->image->getAll();

        $data = [
            'title' => 'Explore',
            'image' => $images,
        ];

        $this->view->render('Images/Explore', $data);
    }
}