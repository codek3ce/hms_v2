<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomsModel extends Model
{
    protected $table            = 'rooms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['type_id', 'number', 'status'];

    public function rooms_type()
    {
        return $this->db->table('rooms a')
            ->join('rooms_type b', 'b.id=a.type_id')->get();
    }
}
