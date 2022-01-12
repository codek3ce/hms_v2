<?php

namespace App\Controllers\Superuser;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') === false) {
            return redirect()->to('/su');
        }

        $data = [
            'title'   => 'Dashboard',
            'session' => $this->session,
            'segment' => $this->request->uri->getSegments(),
        ];

        return view('superuser/dashboard/index', $data);
    }
}
