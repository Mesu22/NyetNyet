<?php

namespace App\Controllers;

use App\Models\ClientModel;
use CodeIgniter\Controller;

class ClientController extends Controller
{
    protected $clientModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function index()
    {
        $data['clients'] = $this->clientModel->findAll();
        return view('admin/clients/index', $data);
    }

    public function create()
    {
        return view('admin/clients/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|max_length[255]',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads/clients', $imageName);

        $this->clientModel->insert([
            'name' => $this->request->getPost('name'),
            'image' => $imageName
        ]);

        return redirect()->to('admin')->with('success', 'Client added successfully');
    }

    public function edit($id)
    {
        $data['client'] = $this->clientModel->find($id);
        return view('admin/clients/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|max_length[255]',
            'image' => 'max_size[image,1024]|is_image[image]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = ['name' => $this->request->getPost('name')];

        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $oldImage = $this->clientModel->find($id)['image'];
            if (file_exists(ROOTPATH . 'public/uploads/clients/' . $oldImage)) {
                unlink(ROOTPATH . 'public/uploads/clients/' . $oldImage);
            }

            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/clients', $imageName);
            $data['image'] = $imageName;
        }

        $this->clientModel->update($id, $data);

        return redirect()->to('admin')->with('success', 'Client updated successfully');
    }

    public function delete($id)
    {
        $client = $this->clientModel->find($id);
        if (file_exists(ROOTPATH . 'public/uploads/clients/' . $client['image'])) {
            unlink(ROOTPATH . 'public/uploads/clients/' . $client['image']);
        }

        $this->clientModel->delete($id);

        return redirect()->to('admin')->with('success', 'Client deleted successfully');
    }
}