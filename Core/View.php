<?php

namespace Core;

class View
{
    public function render($view, $data = [])
   {
        ob_start();

        extract($data);

        try 
        {
            require APP_ROOT . "/Views/Pages/$view.view.php";
        } 
        catch (\Throwable $t) 
        {
            throw $t;
        }
        
        echo ob_get_clean();
   } 
}
