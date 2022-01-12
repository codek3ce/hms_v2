<?php

namespace App\Models;

use CodeIgniter\Model;

class PriceListModel extends Model
{
    protected $table            = 'price_lists';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['rooms_type_id', 'type', 'dates', 'start_date', 'end_date', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

    public function price_room_type()
    {
        return $this->db->table('price_lists a')
            ->join('rooms_type b', 'b.id=a.rooms_type_id')
            ->get();
    }
}
