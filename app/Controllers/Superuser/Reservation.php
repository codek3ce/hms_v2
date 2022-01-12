<?php

namespace App\Controllers\Superuser;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use App\Models\PriceListModel;
use App\Models\RoomsTypeModel;
use App\Models\ReservationModel;
use App\Models\RoomsModel;
use App\Models\BookingRoomsModel;
use App\Models\CheckinModel;
use App\Models\BillingModel;

class Reservation extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Reservations',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/reservation/index', $data);
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
                } else {
                    $status = '';
                }
                return $status;
            })
            ->add('action', function ($row) {
                if ($row->status == 'RESERVATION') {
                    $m = '
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="/superuser/reservation/checkin/' . $row->id . '" class="btn btn-success btn-sm text-white"><i class="ti-check"></i> Check IN</a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/superuser/reservation/print_form/' . $row->id . '" target="_blank">Print From Reservation</a>
                                <a class="dropdown-item" href="/superuser/reservation/print_letter/' . $row->id . '" target="_blank">Print Confirmation Letter</a>
                            </div>
                        </div>
                        
                        <a href="/superuser/reservation/rooms/' . $row->id . '" class="btn btn-info btn-sm text-white"><i class="fa fa-bed"></i></a>
                        <a href="/superuser/reservation/delete/' . $row->id . '" class="btn btn-danger btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="ti-trash"></i></a>
                    </div>';
                } else if ($row->status == 'CHECK IN') {
                    $m = '
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="/superuser/reservation/precheckout/' . $row->id . '" class="btn btn-warning btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-ban mr-2"></i> Check OUT</a>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/superuser/reservation/print_form/' . $row->id . '" target="_blank">Print From Reservation</a>
                                <a class="dropdown-item" href="/superuser/reservation/print_letter/' . $row->id . '" target="_blank">Print Confirmation Letter</a>
                            </div>
                        </div>
                        
                        <a href="/superuser/reservation/rooms/' . $row->id . '" class="btn btn-info btn-sm text-white"><i class="fa fa-bed"></i></a>
                        <a href="/superuser/reservation/delete/' . $row->id . '" class="btn btn-danger btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="ti-trash"></i></a>
                    </div>';
                } else if ($row->status == 'CANCELED') {
                    $m = '
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                       
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/superuser/reservation/print_form/' . $row->id . '" target="_blank">Print From Reservation</a>
                                <a class="dropdown-item" href="/superuser/reservation/print_letter/' . $row->id . '" target="_blank">Print Confirmation Letter</a>
                            </div>
                        </div>
                        
                        <a href="/superuser/reservation/delete/' . $row->id . '" class="btn btn-danger btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="ti-trash"></i></a>
                    </div>';
                } else if ($row->status == 'CHECK OUT') {
                    $m = '
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="/superuser/reservation/print_form/' . $row->id . '" target="_blank">Print From Reservation</a>
                                <a class="dropdown-item" href="/superuser/reservation/print_letter/' . $row->id . '" target="_blank">Print Confirmation Letter</a>
                            </div>
                        </div>
                        
                        <a href="/superuser/reservation/delete/' . $row->id . '" class="btn btn-danger btn-sm text-white" onclick="return confirm(\'Are you sure?\')"><i class="ti-trash"></i></a>
                    </div>';
                } else {
                    $status = '';
                }

                return $m;
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function add()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $price = new PriceListModel();
        $type = new RoomsTypeModel();

        $data = [
            'title'   => 'Add New Reservation',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'price'   => $price->price_room_type()->getResult(),
            'type'    => $type->findAll(),
        ];

        return view('superuser/reservation/add', $data);
    }

    public function insert()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();

        $data = [
            'officer_id'         => $this->session->id,
            'created_at'         => date("Y-m-d H:i:s"),
            'updated_at'         => date("Y-m-d H:i:s"),
            'name'               => $this->request->getVar('name'),
            'no_person'          => $this->request->getVar('person'),
            'made_by'            => $this->request->getVar('made_by'),
            'phone'              => $this->request->getVar('phone'),
            'company'            => $this->request->getVar('company'),
            'arrival_date'       => $this->request->getVar('arrival_date'),
            'flight_number'      => $this->request->getVar('flight_number'),
            'flight_hour'        => $this->request->getVar('flight_hour'),
            'departure_date'     => $this->request->getVar('departure_date'),
            'type_accommodation' => serialize($this->request->getVar('type_accommodation')),
            'daily_rate'         => $this->request->getVar('daily_rate'),
            'guest_request'      => $this->request->getVar('guest_request'),
            'payment'            => $this->request->getVar('payment'),
            'deposit'            => $this->request->getVar('deposit'),
            'guest_category'     => $this->request->getVar('guest_category'),
        ];

        if ($res->save($data)) {
            $id = $res->getInsertID();
            return redirect()->to(base_url('/superuser/reservation/rooms/' . $id));
        } else {
            session()->setFlashdata('failed', 'Data failed to save');
            return redirect()->to(base_url('/superuser/reservation/add'));
        }
    }

    public function delete($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $booked = new BookingRoomsModel();

        if ($res->delete($id) && $booked->where('reservation_id', $id)->delete()) {
            session()->setFlashdata('delete_success', 'Data deleted successfully');
            return redirect()->to(base_url('/superuser/reservation'));
        } else {
            session()->setFlashdata('delete_failed', 'Data failed to save');
            return redirect()->to(base_url('/superuser/reservation'));
        }
    }

    public function rooms($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $price = new PriceListModel();
        $rooms = new RoomsModel();
        $type  = new RoomsTypeModel();
        $res   = new ReservationModel();
        $booked = new BookingRoomsModel();
        $data = [
            'title'      => 'Choose Rooms',
            'session'    => $this->session,
            'segment'    => $this->request->uri->getSegments(),
            'price'      => $price->price_room_type()->getResult(),
            'booked'     => $booked->booked_rooms($id)->getResult(),
            'res'        => $res->where('id', $id)->first(),
            'rooms_type' => $type->findAll(),
        ];

        $tp = $data['res'];
        $in = unserialize($tp->type_accommodation);

        $types = $type->whereIn('id', $in)->findAll();

        $data['rooms'] = '<ul class="nav nav-tabs mb-3" role="tablist">';

        $nomor = 1;
        foreach ($types as $t) {
            if ($nomor == 1) {
                $active = 'active';
            } else {
                $active = '';
            }
            $data['rooms'] .= '<li class="nav-item">';
            $data['rooms'] .= '<a class="nav-link ' . $active . '" id="data' . $nomor . '-tab" data-toggle="tab" href="#data' . $nomor . '" role="tab" aria-controls="data' . $nomor . '" aria-selected="true"><h4>' . $t->name . '</h4></a>';
            $data['rooms'] .= '</li>';
            $nomor++;
        }
        $data['rooms'] .= '</ul>';

        $data['rooms'] .=  '<div class="tab-content">';
        $nomor2 = 1;
        foreach ($types as $t) {
            if ($nomor2 == 1) {
                $active = 'show active';
            } else {
                $active = '';
            }
            $data['rooms'] .=  '<div class="tab-pane fade ' . $active . '" id="data' . $nomor2 . '" role="tabpanel" aria-labelledby="data' . $nomor2 . '-tab">';

            $ro = $rooms->where('type_id', $t->id)->findAll();

            foreach ($ro as $r) {

                $book = new BookingRoomsModel();
                $b = $book->where('rooms_type_id', $t->id)->where('rooms_id', $r->id)->first();
                if ($b == null) {
                    $booked = 'text-success';
                } else {
                    $booked = 'text-danger disabled';
                }

                // id reservasi/id type/idroom
                $data['rooms'] .= '<a href="/superuser/reservation/book_room/' . $id . '/' . $t->id . '/' . $r->id . '" onclick="bookthis(' . $r->id . ')" class="btn btn-apple m-2 ' . $booked . '"><i class="fa fa-bed"></i><span><span>' . $t->name . '</span><span>No: ' . $r->number . '</span></span></a>';
            }
            $data['rooms'] .= '</div>';
            $nomor2++;
        }
        $data['rooms'] .=  '</div>';

        return view('superuser/reservation/rooms', $data);
    }

    public function change_room($id)
    {
        if (empty($this->request->getVar('type_accommodation'))) {
            return redirect()->to(base_url('/superuser/reservation/rooms/' . $id));
        }

        $data = [
            'id'                 => $id,
            'type_accommodation' => serialize($this->request->getVar('type_accommodation'))
        ];

        $res = new ReservationModel();
        $res->save($data);
        return redirect()->to(base_url('/superuser/reservation/rooms/' . $id));
    }

    public function book_room($reservasi, $type, $rooms)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $booking = new BookingRoomsModel();

        $data = [
            'start_date'     => date("Y-m-d H:i:s"),
            'end_date'       => date("Y-m-d H:i:s"),
            'reservation_id' => $reservasi,
            'rooms_type_id'  => $type,
            'rooms_id'       => $rooms,
            'status'         => 0,
        ];

        $t = new RoomsTypeModel();
        $r = new RoomsModel();
        $p = new PriceListModel();

        $get_type = $t->where('id', $type)->first();
        $get_room = $r->where('id', $rooms)->first();
        $get_price = $p->where('rooms_type_id', $type)->first();
        $item = 'ROOM TYPE: ' . $get_type->name . '. NO: ' . $get_room->number;

        $billing = new BillingModel();

        $data2 = [
            'reservation_id' => $reservasi,
            'item' => $item,
            'price' => $get_price->wed,
        ];
        $billing->save($data2);
        $booking->save($data);
        return redirect()->to(base_url('/superuser/reservation/rooms/' . $reservasi));
    }

    public function book_delete($reservasi, $id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $booking = new BookingRoomsModel();

        $booking->delete($id);
        return redirect()->to(base_url('/superuser/reservation/rooms/' . $reservasi));
    }

    public function book_finish($reservasi)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'start_date' => $this->request->getVar('start'),
            'end_date' => $this->request->getVar('end'),
        ];

        $book = new BookingRoomsModel();
        $book->whereIn('reservation_id', [$reservasi])->set($data)->update();
        return redirect()->to(base_url('/superuser/reservation'));
    }

    public function print_form($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();

        $data = [
            'res'  => $res->form($id)->getRow(),
            'type' => $type->findAll(),
        ];
        return view('/superuser/reservation/form', $data);
    }

    public function print_letter($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();

        $data = [
            'res'  => $res->form($id)->getRow(),
            'type' => $type->findAll(),
        ];
        return view('/superuser/reservation/letter', $data);
    }

    public function print_register($id)
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

        return view('/superuser/reservation/register', $data);
    }

    public function arrival_list()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();

        $data = [
            'title'   => 'Expected Arrival List',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        if (isset($_GET['date'])) {
            $data['expected'] = $res->ex_arrival_list($_GET['date'])->getResult();
        }

        return view('/superuser/reservation/arrival_list', $data);
    }

    public function diary()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();

        $data = [
            'title'   => 'Reservation Diary',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];
        $diary = $res->diary(date("Y-m-d"))->getResult();
        $data['diary'] = '<tbody>';
        foreach ($diary as $d) {
            $now =  strtotime($d->end_date); // or your date as well
            $your_date = strtotime($d->start_date);
            $datediff = $now - $your_date;

            $day = round($datediff / (60 * 60 * 24));
            $data['diary'] .= '<tr>';
            $data['diary'] .= '<td>' . $d->created_at . '</td>';
            $data['diary'] .= '<td>-</td>';
            $data['diary'] .= '<td>' . $d->arrival_date . '</td>';
            $data['diary'] .= '<td>' . $d->name . '</td>';

            $book1 = $res->booking($d->id)->getResult();
            $data['diary'] .= '<td>';
            foreach ($book1 as $b1) {
                $data['diary'] .= $b1->type . ', ';
            }
            $data['diary'] .= '</td>';
            $data['diary'] .= '<td>REGULAR</td>';
            $data['diary'] .= '<td>' . $day . '</td>';
            $data['diary'] .= '<td>' . $d->guest_request . '</td>';
            $data['diary'] .= '<td>';
            foreach ($book1 as $b1) {
                $data['diary'] .= $b1->number_room . ', ';
            }
            $data['diary'] .= '</td>';
            $data['diary'] .= '<tr>';
        }
        $data['diary'] .= '</tbody>';

        return view('/superuser/reservation/diary', $data);
    }

    public function checkin($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $type = new RoomsTypeModel();
        $booking = new BookingRoomsModel();

        $data = [
            'title'   => 'Expected Arrival List',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'res'     => $res->reservation($id)->getRow(),
            'booking' => $booking->booked_rooms($id)->getResult(),
        ];

        return view('/superuser/reservation/checkin', $data);
    }

    public function checkin_insert($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'reservation_id'    => $id,
            'created_at'        => date("Y-m-d H:i:s"),
            'sure_name'         => $this->request->getVar('sure_name'),
            'sex'               => $this->request->getVar('sex'),
            'address'           => $this->request->getVar('address'),
            'id_number'         => $this->request->getVar('id_number'),
            'date_place_issued' => $this->request->getVar('date_issue'),
            'nationality'       => $this->request->getVar('nationality'),
            'date_birth'        => $this->request->getVar('date_birth'),
            'occupation'        => $this->request->getVar('occupation'),
            'purposed_visit'    => $this->request->getVar('purposed_visit'),
            'arrival_date'      => $this->request->getVar('arrival_date'),
            'arrival_time'      => $this->request->getVar('arrival_time'),
            'departure_date'    => $this->request->getVar('departure_date'),
            'departure_time'    => $this->request->getVar('departure_time'),
        ];

        $in = new CheckinModel();
        if ($in->save($data)) {
            $res = new ReservationModel();
            $res->where('id', $id)->set('status', 'CHECK IN')->update();

            session()->setFlashdata('success', 'Check in successfully');
            return redirect()->to(base_url('superuser/reservation/'));
        } else {
            session()->setFlashdata('failed', 'Check in failed');
            return redirect()->to(base_url('superuser/reservation'));
        }
    }

    public function precheckout($id)
    {

        $res     = new ReservationModel();
        $booking = new BookingRoomsModel();
        $billing = new BillingModel();

        $data = [
            'title'   => 'Payment Method',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'res'     => $res->where('id', $id)->first(),
            'booking' => $booking->booked_rooms($id)->getResult(),
            'invoice' => $billing->total_invoice($id)->getResult()[0]
        ];
        return view('/superuser/reservation/precheckout', $data);
    }

    public function checkout($id)
    {

        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res     = new ReservationModel();
        $booking = new BookingRoomsModel();

        $payment        = $this->request->getVar('payment');
        $deposit        = $this->request->getVar('deposit');
        $jumlah_tagihan = $this->request->getVar('jumlah_tagihan');

        if ($payment == 'Cash') {
            $a = $res->where('id', $id)->set('status', 'CHECK OUT')->update();
            $b = $booking->where('reservation_id', $id)->delete();

            if ($a && $b) {
                session()->setFlashdata('checkout_success', 'Successfully Check OUT');
                return redirect()->to(base_url('/superuser/reservation'));
            } else {
                session()->setFlashdata('checkout_failed', 'Check OUT Failed');
                return redirect()->to(base_url('/superuser/reservation'));
            }
        } else {
            $data = [
                'id'      => $id,
                'payment' => $this->request->getVar('payment'),
                'deposit' => $deposit - $jumlah_tagihan,
                'status'  => 'CHECK OUT',
            ];

            $a = $res->save($data);
            $b = $booking->where('reservation_id', $id)->delete();

            if ($a && $b) {
                session()->setFlashdata('checkout_success', 'Successfully Check OUT');
                return redirect()->to(base_url('/superuser/reservation'));
            } else {
                session()->setFlashdata('checkout_failed', 'Check OUT Failed');
                return redirect()->to(base_url('/superuser/reservation'));
            }
        }
    }

    public function cancel($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $res = new ReservationModel();
        $q = $res->where('id', $id)->set('status', 'CANCELED')->update();
        if ($q) {
            session()->setFlashdata('delete_success', 'Reservation Canceled successfully');
            return redirect()->to(base_url('/superuser/reservation'));
        } else {
            session()->setFlashdata('delete_failed', 'Reservation failed to cancel');
            return redirect()->to(base_url('/superuser/reservation'));
        }
    }
}
