<?php

declare(strict_types=1);

namespace App\Controllers;

use Core\Controller;
use Core\Util\Input;
use Core\View;
use App\Models\Image;

/**
 * Class ManagementController
 * @package App\Controllers
 */
class ManagementController extends Controller
{
    /**
     * @var View|null
     */
    private ?View $view;
    /**
     * @var Image|null
     */
    private ?Image $image;

    /**
     * ManagementController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
        $this->image = new Image();
    }

    /**
     *
     */
    public function index()
    {
        $data = $this->image->getImagesAndUsers();
        $this->view->render('Users/Management', $data);
    }

    /**
     *
     */
    public function deleteImage() : void
    {
        if (isset($_POST['deleteImage']))
        {
            // Prevents header modification errors.
            // "PHP will automatically flush everything in the buffer after the script finishes running"
            // https://stackoverflow.com/questions/9707693/warning-cannot-modify-header-information-headers-already-sent-by-error
            ob_start();

            $post = Input::validatePost();

            $id = $post['imageId'];

            $files = $this->image->getFilePaths($id);

            if($files != null)
            {
                if(unlink($files->path) && unlink($files->thumbnailPath))
                {
                    $this->image->destroy($id);
                    $this->redirect('Management');
                    exit;
                }
                else
                {
                    echo 'Failed to delete image.';
                }
            }
        }
    }
}
