<?php

namespace Core;

use Throwable;

abstract class Controller 
{
    protected function model($model)
    {
        try 
        {
            require '../App/Models/' . ucwords($model) . '.php';
        } 
        catch (Throwable $t) 
        {
            echo $t->getMessage();
        }
    }
}
