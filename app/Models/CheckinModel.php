<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckinModel extends Model
{
    protected $table            = 'check_in';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['reservation_id', 'created_at', 'sure_name', 'first_name', 'sex', 'address', 'id_number', 'date_place_issued', 'nationality', 'date_birth', 'company', 'occupation', 'purposed_visit', 'arrival_date', 'arrival_time', 'departure_date', 'departure_time'];

    public function arrival_list($date)
    {
        return $this->db->table('reservations')
            ->select('reservations.*, rooms_type.name as type, rooms.number as room')
            ->where('arrival_date ', $date)
            ->join('rooms_type', 'rooms_type.id=reservations.daily_rate')
            ->join('booking_rooms', 'booking_rooms.reservation_id=reservations.id')
            ->join('rooms', 'rooms.id=booking_rooms.rooms_id')
            ->orderBy('departure_date', 'ASC')
            ->get();
    }

    public function morning_call($date)
    {
        return $this->db->table('morning_call a')
            ->select('a.*, b.name, d.number')
            ->where('a.date', $date)
            ->join('reservations b', 'b.id=a.reservation_id')
            ->join('booking_rooms c', 'c.reservation_id=b.id')
            ->join('rooms d', 'd.id=c.rooms_id')
            ->orderBy('a.date', 'ASC')
            ->get();
    }
}
