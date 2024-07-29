<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use CodeIgniter\Controller;

class AdminPortfolioController extends Controller
{
    protected $portfolioModel;

    public function __construct()
    {
        helper(['form', 'url', 'filesystem']);
        $this->portfolioModel = new PortfolioModel();
    }

    public function index()
    {
        $data['portfolios'] = $this->portfolioModel->findAll();
        return view('admin/menu', $data);
    }

    public function create()
    {
        return view('admin/create_portfolio');
    }

    public function store()
    {
        $validation = $this->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4096]',
            ],
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/img/Menu', $imageName);

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'image' => $imageName,
        ];

        $this->portfolioModel->save($data);
        return redirect()->to('admin')->with('success', 'Menu added successfully');
    }

    public function edit($id)
    {
        $data['portfolio'] = $this->portfolioModel->find($id);
        return view('admin/edit_portfolio', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => [
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4096]',
            ],
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
        ];

        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/assets/img/Menu', $imageName);

            // Delete old image
            $portfolio = $this->portfolioModel->find($id);
            $oldImagePath = ROOTPATH . 'public/assets/img/Menu/' . $portfolio['image'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $data['image'] = $imageName;
        }

        $this->portfolioModel->update($id, $data);
        return redirect()->to('admin')->with('success', 'Menu updated successfully');
    }

    public function delete($id)
    {
        $portfolio = $this->portfolioModel->find($id);

        $imagePath = ROOTPATH . 'public/assets/img/Menu/' . $portfolio['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $this->portfolioModel->delete($id);
        return redirect()->to('admin')->with('success', 'Menu deleted successfully');
    }
}
