<?php

namespace App\Controllers\Superuser;

use App\Controllers\BaseController;
use App\Models\BillingModel;
use Hermawan\DataTables\DataTable;
use App\Models\ReservationModel;
use App\Models\RoomsTypeModel;
use App\Models\BookingRoomsModel;
use App\Models\CheckinModel;

class Billing extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Billing',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/billing/index', $data);
    }
    public function data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('reservations');

        return DataTable::of($query)
            ->add('status', function ($row) {
                if ($row->status == 'RESERVATION') {
                    $status = '<span class="badge bg-primary">RESERVATION</span>';
                } else if ($row->status == 'CHECK IN') {
                    $status = '<span class="badge bg-success">CHECK IN</span>';
                } else if ($row->status == 'CANCELED') {
                    $status = '<span class="badge bg-danger">CANCELED</span>';
                } else if ($row->status == 'CHECK OUT') {
                    $status = '<span class="badge bg-warning">CHECK OUT</span>';
                }
                return $status;
            })
            ->add('action', function ($row) {
                return '
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a href="/superuser/billing/invoice/' . $row->id . '" class="btn btn-info btn-sm text-white"><i class="ti-money"></i> Invoice</a>
                </div>
                ';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function invoice($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();
        $booking = new BookingRoomsModel();
        $checkin = new CheckinModel();
        $billing = new BillingModel();

        $data = [
            'title'   => 'Invoice',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'res'     => $res->reservation($id)->getRow(),
            'booking' => $booking->booked_rooms($id)->getResult(),
            'checkin' => $checkin->where('reservation_id', $id)->first(),
            'invoice' => $billing->where('reservation_id', $id)->findAll(),
        ];

        return view('/superuser/billing/invoice', $data);
    }
}
