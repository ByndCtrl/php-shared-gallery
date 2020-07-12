<?php

declare(strict_types=1);

namespace Core\Util;

/**
 * Class Input
 * @package Core\Util
 */
class Input
{
    /**
     * @return array
     */
    public static function validatePost(): array
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post = array_map('trim', $post);
        $post = array_map('htmlspecialchars', $post);

        return $post;
    }

    public static function validateFiles() : array
    {
        if(!empty($_FILES) && $_FILES != null)
        {
            return filter_var_array($_FILES, FILTER_SANITIZE_STRING);
        }
        else
        {
            return [];
        }
    }
}
