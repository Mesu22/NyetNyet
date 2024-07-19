<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\BerandaController;
use CodeIgniter\Email\Email;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function send()
    {
        $email = \Config\Services::email();

        $email->setFrom('mesab520@gmail.com', 'Mesa');
        $email->setTo('mesab520@gmail.com'); // Ganti dengan email tujuan

        $email->setSubject($this->request->getPost('subject'));
        $email->setMessage(
            'Name: ' . $this->request->getPost('name') . '<br>' .
            'Email: ' . $this->request->getPost('email') . '<br>' .
            'Message: ' . $this->request->getPost('message')
        );

        if ($email->send()) {
            return redirect()->back()->with('success', 'Pesan Anda telah terkirim.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan.');
        }
    }
}
