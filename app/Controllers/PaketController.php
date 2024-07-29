<?php

namespace App\Controllers;

use App\Models\PaketModel;

class PaketController extends BaseController
{
    protected $paketModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    public function index()
    {
        $data['pakets'] = $this->paketModel->findAll();
        return view('admin/paket/index', $data);
    }

    public function create()
    {
        return view('admin/paket/create');
    }

    public function store()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'isi_paket' => $this->request->getPost('isi_paket')
        ];

        $this->paketModel->insert($data);
        return redirect()->to('admin')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['paket'] = $this->paketModel->find($id);
        return view('admin/paket/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'isi_paket' => $this->request->getPost('isi_paket')
        ];

        $this->paketModel->update($id, $data);
        return redirect()->to('admin')->with('success', 'Paket berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->paketModel->delete($id);
        return redirect()->to('admin')->with('success', 'Paket berhasil dihapus');
    }
}