<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table            = 'reservations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['officer_id', 'created_at', 'updated_at', 'name', 'no_person', 'made_by', 'phone', 'company', 'arrival_date', 'flight_number', 'flight_hour', 'departure_date', 'type_accommodation', 'daily_rate', 'guest_request', 'payment', 'deposit', 'guest_category', 'status'];

    public function form($id)
    {
        return $this->db->table('reservations a')
            ->select('a.*, b.name as daily, c.full_name as officer, d.*')
            ->where('a.id', $id)
            ->join('rooms_type b', 'b.id=a.daily_rate')
            ->join('super_users c', 'c.id=a.officer_id')
            ->join('booking_rooms d', 'd.reservation_id=a.id')
            ->get();
    }

    public function reservation($id)
    {
        return $this->db->table('reservations a')
            ->select('a.*, b.name as type')
            ->where('a.id', $id)
            ->join('rooms_type b', 'b.id=a.daily_rate')
            ->get();
    }


    public function ex_arrival_list($date)
    {
        return $this->db->table('reservations')
            ->select('reservations.*, rooms_type.name as type')
            ->where('departure_date >= ', $date)
            ->join('rooms_type', 'rooms_type.id=reservations.daily_rate')
            ->orderBy('departure_date', 'ASC')
            ->get();
    }

    public function diary($date)
    {
        return $this->db->table('reservations a')
            ->select('a.*, c.name as room_type, b.start_date, b.end_date, d.number')
            ->where('departure_date >=', $date)
            ->join('booking_rooms b', 'b.reservation_id=a.id')
            ->join('rooms_type c', 'c.id=b.rooms_type_id')
            ->join('rooms d', 'd.id=b.rooms_id')
            ->get();
    }

    public function booking($res)
    {
        return $this->db->table('booking_rooms a')
            ->select('a.*, b.name as type, c.number as number_room')
            ->where('reservation_id', $res)
            ->join('rooms_type b', 'b.id=a.rooms_type_id')
            ->join('rooms c', 'c.id=a.rooms_id')
            ->get();
    }
}
