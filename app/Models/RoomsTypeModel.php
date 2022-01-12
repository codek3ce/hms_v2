<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomsTypeModel extends Model
{
    protected $table            = 'rooms_type';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['name', 'code', 'facility', 'description', 'base_occupancy', 'kids_occupancy', 'higher_occupancy', 'gallery'];
}
