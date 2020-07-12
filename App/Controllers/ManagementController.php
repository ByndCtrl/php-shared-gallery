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
    private ?View $view = null;
    /**
     * @var Image|null
     */
    private ?Image $image = null;

    /**
     * @var array
     */
    private array $data = [];

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
        $this->data = $this->image->getImagesAndUsers();
        $this->view->render('Users/Management', $this->data);
    }

    /**
     *
     */
    public function deleteImage() : void
    {
        $post = Input::validatePost();

        $id = $post['imageId'];

        $files = $this->image->getFilePaths($id);

        if ($files !== null)
        {
            unlink($files->path);
            unlink($files->thumbnailPath);
            $this->image->destroy($id);
            $this->redirect('Management');
        }

        exit;
    }
}
