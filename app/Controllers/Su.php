<?php

namespace App\Controllers;

use App\Models\SuperUserModel;

class Su extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('su', $data);
    }

    public function proses()
    {
        $su = new SuperUserModel();
        $e = $this->request->getVar('email');
        $p = $this->request->getVar('password');

        $query = $su->where('email', $e)->first();
        if ($query) {
            if (password_verify($p, $query->password)) {
                $data = [
                    'id'        => $query->id,
                    'email'     => $query->email,
                    'full_name' => $query->full_name,
                    'level'     => $query->level,
                    'logged_in' => true,
                ];

                $this->session->set($data);
                return redirect()->to('superuser/dashboard');
            } else {
                session()->setFlashdata('failed', 'Invalid password');
                return redirect()->to(base_url('/su'));
            }
        } else {
            session()->setFlashdata('failed', 'User not found');
            return redirect()->to(base_url('/su'));
        }
    }
}
