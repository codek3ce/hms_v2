<?php

namespace App\Controllers\Superuser;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use App\Models\RoomsTypeModel;
use App\Models\RoomsModel;
use App\Models\PriceListModel;
use App\Models\ServiceModel;

class Setup extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }
        $data = [
            'title'   => 'Guide',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/index', $data);
    }

    public function type()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Setup Rooms Type',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/type', $data);
    }

    public function type_data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('rooms_type');

        return DataTable::of($query)
            ->add('facility', function ($row) {
                if ($row->facility == '') {
                    $facility = '';
                } else {
                    $fa = unserialize($row->facility);
                    $facility = implode(', ', $fa);
                }
                return $facility;
            })
            ->add('action', function ($row) {
                return '
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/superuser/setup/type_edit/' . $row->id . '" class="text-white btn btn-primary btn-sm">
                        <i class="ti-pencil"></i>
                    </a>
                    <a href="/superuser/setup/type_delete/' . $row->id . '" class="text-white btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                        <i class="ti-trash"></i>
                    </a>
                </div>
                ';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function type_add()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Add New Rooms Type',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/type_add', $data);
    }

    public function type_insert()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        if ($_FILES['gallery']['size'][0] == 0) {
            $galleryArray = '';
        } else {
            $galleryArray = [];
            foreach ($this->request->getFileMultiple('gallery') as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/uploads', $newName);

                    array_push($galleryArray, $newName);
                }
            }
            $galleryArray = serialize($galleryArray);
        }

        $data = [
            'name'             => $this->request->getVar('name'),
            'code'             => $this->request->getVar('code'),
            'facility'         => (empty($this->request->getVar('facility'))) ? '' : serialize($this->request->getVar('facility')),
            'description'      => $this->request->getVar('description'),
            'base_occupancy'   => $this->request->getVar('base_occupancy'),
            'kids_occupancy'   => $this->request->getVar('kids_occupancy'),
            'higher_occupancy' => $this->request->getVar('higher_occupancy'),
            'gallery'          => $galleryArray

        ];
        $type = new RoomsTypeModel();

        if ($type->save($data)) {
            session()->setFlashdata('success', 'Data saved successfully');
            return redirect()->to(base_url('/superuser/setup/type_add'));
        } else {
            session()->setFlashdata('failed', 'Data failed to save');
            return redirect()->to(base_url('/superuser/setup/type_add'));
        }
    }

    public function type_edit($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $type = new RoomsTypeModel();
        $data = [
            'title'   => 'Edit Rooms Type',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'type'    => $type->where('id', $id)->first()
        ];

        return view('superuser/setup/type_edit', $data);
    }

    public function type_update($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        if ($_FILES['gallery']['size'][0] == 0) {
            if (isset($_POST['old'])) {
                $galleryArray = serialize($_POST['old']);
            } else {
                $galleryArray = '';
            }
        } else {
            $galleryArray = [];
            foreach ($this->request->getFileMultiple('gallery') as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/uploads', $newName);

                    array_push($galleryArray, $newName);
                }
            }
            if (isset($_POST['old'])) {
                $galleryArray = array_merge($_POST['old'], $galleryArray);
                $galleryArray = serialize($galleryArray);
            } else {
                $galleryArray = serialize($galleryArray);
            }
        }


        $data = [
            'id'               => $id,
            'name'             => $this->request->getVar('name'),
            'code'             => $this->request->getVar('code'),
            'facility'         => (empty($this->request->getVar('facility'))) ? '' : serialize($this->request->getVar('facility')),
            'description'      => $this->request->getVar('description'),
            'base_occupancy'   => $this->request->getVar('base_occupancy'),
            'kids_occupancy'   => $this->request->getVar('kids_occupancy'),
            'higher_occupancy' => $this->request->getVar('higher_occupancy'),
            'gallery'          => $galleryArray

        ];

        $type = new RoomsTypeModel();

        if ($type->save($data)) {
            session()->setFlashdata('success', 'Data saved successfully');
            return redirect()->to(base_url('/superuser/setup/type_edit/' . $id));
        } else {
            session()->setFlashdata('failed', 'Data failed to save');
            return redirect()->to(base_url('/superuser/setup/type_edit/' . $id));
        }
    }

    public function type_delete($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $type = new RoomsTypeModel();
        if ($type->delete($id)) {
            session()->setFlashdata('delete_success', 'Data delete successfully');
            return redirect()->to(base_url('/superuser/setup/type'));
        } else {
            session()->setFlashdata('deletefailed', 'Data failed to delete');
            return redirect()->to(base_url('/superuser/setup/type'));
        }
    }

    // END TYPE

    // ROOMS
    public function rooms()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Setup Rooms',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/rooms', $data);
    }

    public function rooms_data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('rooms a')
            ->select('a.id, a.type_id, a.number, a.status, b.name as type')
            ->join('rooms_type b', 'b.id=a.type_id');

        return DataTable::of($query)
            ->add('action', function ($row) {
                return '
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/superuser/setup/rooms_edit/' . $row->id . '" class="text-white btn btn-primary btn-sm">
                        <i class="ti-pencil"></i>
                    </a>
                    <a href="/superuser/setup/rooms_delete/' . $row->id . '" class="text-white btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                        <i class="ti-trash"></i>
                    </a>
                </div>
                ';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function rooms_add()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $type = new RoomsTypeModel();

        $data = [
            'title'   => 'Add New Rooms',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'type'    => $type->findAll(),
        ];

        return view('superuser/setup/rooms_add', $data);
    }

    public function rooms_insert()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $rooms = new RoomsModel();
        $number = explode(',', $this->request->getVar('number'));
        $data = array();
        foreach ($number as $num) {
            $data[] =  array(
                'type_id' => $this->request->getVar('type_id'),
                'number'  => $num,
                'status'  => $this->request->getVar('status'),
            );
        }

        if ($rooms->insertBatch($data)) {
            session()->setFlashdata('success', 'Data delete successfully');
            return redirect()->to(base_url('/superuser/setup/rooms_add'));
        } else {
            session()->setFlashdata('failed', 'Data failed to delete');
            return redirect()->to(base_url('/superuser/setup/rooms_add'));
        }
    }

    public function rooms_edit($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $type = new RoomsTypeModel();
        $rooms = new RoomsModel();

        $data = [
            'title'   => 'Add New Rooms',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'type'    => $type->findAll(),
            'rooms'   => $rooms->where('id', $id)->first(),
        ];

        return view('superuser/setup/rooms_edit', $data);
    }

    public function rooms_update($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $rooms = new RoomsModel();

        $data =  [
            'id'      => $id,
            'type_id' => $this->request->getVar('type_id'),
            'number'  => $this->request->getVar('number'),
            'status'  => $this->request->getVar('status'),
        ];

        if ($rooms->save($data)) {
            session()->setFlashdata('success', 'Data delete successfully');
            return redirect()->to(base_url('/superuser/setup/rooms_edit/' . $id));
        } else {
            session()->setFlashdata('failed', 'Data failed to delete');
            return redirect()->to(base_url('/superuser/setup/rooms_edit/' . $id));
        }
    }

    public function rooms_delete($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $rooms = new RoomsModel();
        if ($rooms->delete($id)) {
            session()->setFlashdata('delete_success', 'Data delete successfully');
            return redirect()->to(base_url('/superuser/setup/rooms'));
        } else {
            session()->setFlashdata('deletefailed', 'Data failed to delete');
            return redirect()->to(base_url('/superuser/setup/rooms'));
        }
    }

    // END ROOMS

    // START PRICE LIST
    public function price_list()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Price Lists',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/price_list', $data);
    }

    public function price_data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('price_lists a')
            ->select('a.id, a.rooms_type_id, a.type, a.dates, a.start_date, a.end_date, a.mon, a.tue, a.wed, a.thu, a.fri, a.sat, a.sun, b.name as rooms_type')
            ->join('rooms_type b', 'b.id=a.rooms_type_id');

        return DataTable::of($query)
            ->add('mon', function ($row) {
                return number_format($row->mon, 0, ',', '.') . ' IDR';
            })
            ->add('tue', function ($row) {
                return number_format($row->tue, 0, ',', '.') . ' IDR';
            })
            ->add('wed', function ($row) {
                return number_format($row->wed, 0, ',', '.') . ' IDR';
            })
            ->add('thu', function ($row) {
                return number_format($row->thu, 0, ',', '.') . ' IDR';
            })
            ->add('fri', function ($row) {
                return number_format($row->fri, 0, ',', '.') . ' IDR';
            })
            ->add('sat', function ($row) {
                return number_format($row->sat, 0, ',', '.') . ' IDR';
            })
            ->add('sun', function ($row) {
                return number_format($row->sun, 0, ',', '.') . ' IDR';
            })
            ->add('action', function ($row) {
                return '
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/superuser/setup/price_edit/' . $row->id . '" class="text-white btn btn-primary btn-sm">
                        <i class="ti-pencil"></i>
                    </a>
                    <a href="/superuser/setup/price_delete/' . $row->id . '" class="text-white btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                        <i class="ti-trash"></i>
                    </a>
                </div>
                ';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function price_add()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $type = new RoomsTypeModel();

        $data = [
            'title'   => 'Add New Price List',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'type'    => $type->findAll(),
        ];

        return view('superuser/setup/price_add', $data);
    }

    public function price_insert()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $price = new PriceListModel();

        $cek = $price->where('rooms_type_id', $this->request->getVar('rooms_type_id'))->where('type', 'REGULAR')->findAll();
        if ($cek != null) {
            session()->setFlashdata('failed', 'This room already has a regular rate');
            return redirect()->to(base_url('/superuser/setup/price_add'));
        }

        $data =  [
            'rooms_type_id' => $this->request->getVar('rooms_type_id'),
            'type'          => 'REGULAR',
            'dates'         => '',
            'start_date'    => '',
            'end_date'      => '',
            'mon'           => $this->request->getVar('mon'),
            'tue'           => $this->request->getVar('tue'),
            'wed'           => $this->request->getVar('wed'),
            'thu'           => $this->request->getVar('thu'),
            'fri'           => $this->request->getVar('fri'),
            'sat'           => $this->request->getVar('sat'),
            'sun'           => $this->request->getVar('sun'),
        ];

        if ($price->save($data)) {
            session()->setFlashdata('success', 'Data saved successfully');
            return redirect()->to(base_url('/superuser/setup/price_add'));
        } else {
            session()->setFlashdata('failed', 'Data failed to save');
            return redirect()->to(base_url('/superuser/setup/price_add'));
        }
    }

    public function price_edit($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $type = new RoomsTypeModel();
        $price = new PriceListModel();

        $data = [
            'title'   => 'Edit Price',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
            'type'    => $type->findAll(),
            'price'   => $price->where('id', $id)->first(),
        ];

        return view('superuser/setup/price_edit', $data);
    }

    public function price_update($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $price = new PriceListModel();

        $data =  [
            'id'            => $id,
            // 'rooms_type_id' => $this->request->getVar('rooms_type_id'),
            // 'type'          => 'REGULAR',
            // 'dates'         => '',
            // 'start_date'    => '',
            // 'end_date'      => '',
            'mon'           => $this->request->getVar('mon'),
            'tue'           => $this->request->getVar('tue'),
            'wed'           => $this->request->getVar('wed'),
            'thu'           => $this->request->getVar('thu'),
            'fri'           => $this->request->getVar('fri'),
            'sat'           => $this->request->getVar('sat'),
            'sun'           => $this->request->getVar('sun'),
        ];

        if ($price->save($data)) {
            session()->setFlashdata('success', 'Data saved successfully');
            return redirect()->to(base_url('/superuser/setup/price_edit/' . $id));
        } else {
            session()->setFlashdata('failed', 'Data failed to save');
            return redirect()->to(base_url('/superuser/setup/price_edit/' . $id));
        }
    }

    public function price_delete($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $price = new PriceListModel();
        if ($price->delete($id)) {
            session()->setFlashdata('delete_success', 'Data delete successfully');
            return redirect()->to(base_url('/superuser/setup/price_list'));
        } else {
            session()->setFlashdata('deletefailed', 'Data failed to delete');
            return redirect()->to(base_url('/superuser/setup/price_list'));
        }
    }


    // START SERVICE
    public function service()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Services',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/service', $data);
    }

    public function service_data()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $db = db_connect();
        $query = $db->table('services');

        return DataTable::of($query)

            ->add('action', function ($row) {
                return '
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/superuser/setup/service_edit/' . $row->id . '" class="text-white btn btn-primary btn-sm">
                        <i class="ti-pencil"></i>
                    </a>
                    <a href="/superuser/setup/service_delete/' . $row->id . '" class="text-white btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">
                        <i class="ti-trash"></i>
                    </a>
                </div>
                ';
            })
            ->addNumbering('no')
            ->toJson(true);
    }

    public function service_add()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Add New Service',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/setup/service_add', $data);
    }

    public function service_delete($id)
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $ser = new ServiceModel();
        if ($ser->delete($id)) {
            session()->setFlashdata('delete_success', 'Data delete successfully');
            return redirect()->to(base_url('/superuser/setup/service'));
        } else {
            session()->setFlashdata('deletefailed', 'Data failed to delete');
            return redirect()->to(base_url('/superuser/setup/service'));
        }
    }
}
