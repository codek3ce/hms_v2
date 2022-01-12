<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingRoomsModel extends Model
{
    protected $table            = 'booking_rooms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['start_date', 'end_date', 'reservation_id', 'rooms_type_id', 'rooms_id', 'status'];

    public function booked_rooms($res)
    {
        return $this->db->table('booking_rooms a')
            ->select('a.*, b.name as type, c.number as number, d.wed as price')
            ->where('reservation_id', $res)
            ->join('rooms_type b', 'b.id=a.rooms_type_id')
            ->join('rooms c', 'c.id=a.rooms_id')
            ->join('price_lists d', 'd.rooms_type_id=a.rooms_type_id')
            ->get();
    }
}
