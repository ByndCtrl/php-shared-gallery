<?php

declare(strict_types = 1);

namespace App;

use Imagick;
use ImagickException;

/**
 * Class ThumbnailGenerator
 * @package App
 */
class ThumbnailGenerator
{
    private ?Imagick $thumbnail = null;
    private int $maxSize = 160;

    /**
     * @param string $filePath
     * @param string $thumbnailPath
     *
     * @return void
     * @throws ImagickException
     */
    public function createThumbnail(string $filePath, string $thumbnailPath) : void
    {
        $thumbnail = new Imagick($filePath);

        // Resizes to whichever is larger, width or height
        if($thumbnail->getImageHeight() <= $thumbnail->getImageWidth())
        {
            // Resize image based on X
            $thumbnail->resizeImage($this->maxSize, 0, Imagick::FILTER_LANCZOS, 1);
        }
        else
        {
            // Resize image based on Y
            $thumbnail->resizeImage(0, $this->maxSize, Imagick::FILTER_LANCZOS, 1);
        }

        // Set compression level (1 lowest quality, 100 highest quality)
        $thumbnail->setImageCompressionQuality(25);

        // Remove meta data
        $thumbnail->stripImage();

        $thumbnail->writeImage($thumbnailPath);

        $thumbnail->destroy();
    }
}
