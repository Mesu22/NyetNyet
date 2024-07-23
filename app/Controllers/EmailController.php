<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class EmailController extends Controller
{
    public function index()
    {
        // Menampilkan form kontak
        return view('contact_form');
    }

    public function send()
    {
        $email = \Config\Services::email();

        // Validasi form
        if (!$this->validate([
            'name'    => 'required|min_length[3]',
            'email'   => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $name    = $this->request->getPost('name');
        $emailTo = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = nl2br(htmlspecialchars($this->request->getPost('message')));

        // Atur pengaturan email
        $email->setFrom('mesab520@gmail.com', 'Mesa');
        $email->setTo('mesab520@gmail.com'); // Ganti dengan email penerima Anda
        $email->setSubject($subject);
        $email->setMessage(
            'Nama: ' . htmlspecialchars($name) . '<br>' .
            'Email: ' . htmlspecialchars($emailTo) . '<br>' .
            'Pesan: <br>' . $message
        );

        // Kirim email
        if ($email->send()) {
            return redirect()->to('/contact')->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
        } else {
            // Menampilkan debug error jika gagal
            $data = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', 'Email gagal dikirim: ' . print_r($data, true));
            return redirect()->back()->with('error', 'Gagal mengirim pesan.')->with('debug', $data);
        }
    }
}
