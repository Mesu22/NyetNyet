<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use CodeIgniter\Controller;

class ServiceController extends Controller
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data['services'] = $this->serviceModel->findAll();
        return view('admin/services/index', $data);
    }

    public function create()
    {
        return view('admin/services/create');
    }

    public function store()
    {
        $data = [
            'icon' => $this->request->getPost('icon'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        $this->serviceModel->insert($data);
        return redirect()->to('admin')->with('success', 'Service added successfully');
    }

    public function edit($id)
    {
        $data['service'] = $this->serviceModel->find($id);
        return view('admin/services/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'icon' => $this->request->getPost('icon'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        $this->serviceModel->update($id, $data);
        return redirect()->to('admin')->with('success', 'Service updated successfully');
    }

    public function delete($id)
    {
        $this->serviceModel->delete($id);
        return redirect()->to('admin')->with('success', 'Service deleted successfully');
    }
}