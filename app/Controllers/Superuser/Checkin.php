<?php

namespace App\Controllers\Superuser;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use App\Models\ReservationModel;
use App\Models\RoomsTypeModel;
use App\Models\BookingRoomsModel;
use App\Models\CheckinModel;

class Checkin extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Arrival List',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        $check = new CheckinModel();
        if (isset($_GET['date'])) {
            $data['list'] = $check->arrival_list($_GET['date'])->getResult();
        }

        return view('superuser/checkin/index', $data);
    }
    public function data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('reservations')
            ->where('status', 'CHECK IN');

        return DataTable::of($query)
            ->add('status', function ($row) {
                if ($row->status == 'RESERVATION') {
                    $status = '<span class="badge bg-primary">RESERVATION</span>';
                } else if ($row->status == 'CHECK IN') {
                    $status = '<span class="badge bg-success">CHECK IN</span>';
                } else if ($row->status == 'CANCELED') {
                    $status = '<span class="badge bg-danger">CANCELED</span>';
                }
                return $status;
            })
            ->add('action', function ($row) {
                if ($row->status == 'CHECK IN') {
                    $m = '<a href="/superuser/checkin/cancel/' . $row->id . '" class="btn btn-danger btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="ti-check"></i> Check OUT</a>';
                } else {
                    $m = '';
                }
                return '
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    ' . $m . '
                    
                    <a href="/superuser/checkin/detail/' . $row->id . '" class="btn btn-info btn-sm text-white"><i class="ti-eye"></i></a>
                    <a href="/superuser/checkin/delete/' . $row->id . '" class="btn btn-danger btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="ti-trash"></i></a>
                </div>
                ';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function cancel($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();

        $res->where('id', $id)->set('status', 'CANCELED')->update();

        session()->setFlashdata('success', 'successfully Canceled');
        return redirect()->to(base_url('superuser/checkin/'));
    }

    public function detail($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();
        $booking = new BookingRoomsModel();
        $checkin = new CheckinModel();

        $data = [
            'title'   => 'Expected Arrival List',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'res'     => $res->reservation($id)->getRow(),
            'booking' => $booking->booked_rooms($id)->getResult(),
            'checkin' => $checkin->where('reservation_id', $id)->first(),
        ];

        return view('/superuser/checkin/detail', $data);
    }

    public function morning_call()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();
        $booking = new BookingRoomsModel();
        $checkin = new CheckinModel();

        $data = [
            'title'   => 'Morning Call Sheet',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        if (isset($_GET['date'])) {
            $data['call'] = $checkin->morning_call($_GET['date'])->getResult();
        }


        return view('/superuser/checkin/morning_call', $data);
    }
}
