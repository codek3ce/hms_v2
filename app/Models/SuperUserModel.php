<?php

namespace App\Models;

use CodeIgniter\Model;

class SuperUserModel extends Model
{
    protected $table            = 'super_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['email', 'password', 'full_name', 'level'];
}
