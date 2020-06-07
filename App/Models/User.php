<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public function index()
    {
        $this->db->query("SELECT * FROM users");

        return $this->db->getAll();
    }
}
