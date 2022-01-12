<?php

namespace App\Controllers\Superuser;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use App\Models\ReservationModel;


class Guest extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Guests',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/guest/index', $data);
    }

    public function data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('reservations');

        return DataTable::of($query)

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

    public function add()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Add New Guest',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/guest/add', $data);
    }
}
