<?php

declare(strict_types = 1);

namespace Core;

use Core\Database;

abstract class Model
{
    protected ?Database $DB = null;

    public function __construct()
    {
        $this->DB = Database::instance();
    }
}
