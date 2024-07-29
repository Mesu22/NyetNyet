<?php

namespace App\Controllers;

use App\Models\HeroSectionModel;
use CodeIgniter\Controller;

class HeroSectionController extends Controller
{
    protected $heroSectionModel;

    public function __construct()
    {
        $this->heroSectionModel = new HeroSectionModel();
    }

    public function index()
    {
        $data['hero_sections'] = $this->heroSectionModel->findAll();
        return view('admin/hero_section/index', $data);
    }

    public function create()
    {
        return view('admin/hero_section/create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            'whatsapp_number' => 'required|regex_match[/^\+?[0-9]{10,14}$/]',
            'whatsapp_message' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads/hero', $imageName);

        $data = [
            'title' => $this->request->getPost('title'),
            'image' => $imageName,
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'whatsapp_message' => $this->request->getPost('whatsapp_message')
        ];

        $this->heroSectionModel->insert($data);
        return redirect()->to('admin')->with('success', 'Hero section created successfully');
    }

    public function edit($id)
    {
        $data['hero_section'] = $this->heroSectionModel->find($id);
        return view('admin/hero_section/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'image' => 'max_size[image,1024]|is_image[image]',
            'whatsapp_number' => 'required|regex_match[/^\+?[0-9]{10,14}$/]',
            'whatsapp_message' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'whatsapp_message' => $this->request->getPost('whatsapp_message')
        ];

        if ($this->request->getFile('image')->isValid()) {
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/hero', $imageName);
            $data['image'] = $imageName;

            // Delete old image
            $oldImage = $this->heroSectionModel->find($id)['image'];
            if (file_exists(ROOTPATH . 'public/uploads/hero/' . $oldImage)) {
                unlink(ROOTPATH . 'public/uploads/hero/' . $oldImage);
            }
        }

        $this->heroSectionModel->update($id, $data);
        return redirect()->to('admin')->with('success', 'Hero section updated successfully');
    }

    public function delete($id)
    {
        $heroSection = $this->heroSectionModel->find($id);
        if ($heroSection) {
            // Delete image
            if (file_exists(ROOTPATH . 'public/uploads/hero/' . $heroSection['image'])) {
                unlink(ROOTPATH . 'public/uploads/hero/' . $heroSection['image']);
            }
            $this->heroSectionModel->delete($id);
            return redirect()->to('admin')->with('success', 'Hero section deleted successfully');
        }
        return redirect()->to('admin')->with('error', 'Hero section not found');
    }
}
