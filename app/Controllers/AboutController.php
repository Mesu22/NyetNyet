<?php

namespace App\Controllers;

use App\Models\AboutModel;
use CodeIgniter\Controller;

class AboutController extends Controller
{
    protected $aboutModel;

    public function __construct()
    {
        $this->aboutModel = new AboutModel();
    }

    public function index()
    {
        $data['about'] = $this->aboutModel->first();
        return view('admin/about/index', $data);
    }

    public function create()
    {
        return view('admin/about/create');
    }

    public function store()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image' => $this->handleImageUpload()
        ];

        $this->aboutModel->insert($data);
        return redirect()->to('admin')->with('success', 'About section created successfully');
    }

    public function edit($id)
    {
        $data['about'] = $this->aboutModel->find($id);
        return view('admin/about/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];

        if ($this->request->getFile('image')->isValid()) {
            $data['image'] = $this->handleImageUpload();
        }

        $this->aboutModel->update($id, $data);
        return redirect()->to('admin')->with('success', 'About section updated successfully');
    }

    public function delete($id)
    {
        $this->aboutModel->delete($id);
        return redirect()->to('admin')->with('success', 'About section deleted successfully');
    }

    private function handleImageUpload()
    {
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/about', $newName);
            return $newName;
        }
        return null;
    }
}