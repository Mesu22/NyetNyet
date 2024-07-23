<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use CodeIgniter\Controller;

class AdminPortfolioController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url', 'filesystem']);
    }

    public function index()
    {
        $model = new PortfolioModel();
        $data['portfolios'] = $model->findAll();
        return view('admin/portfolio', $data);
    }

    public function create()
    {
        return view('admin/create_portfolio');
    }

    public function store()
    {
        $model = new PortfolioModel();

        // Validasi input
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
        $image->move(FCPATH . 'assets/img/Menu', $imageName); // Pastikan path sesuai dengan struktur folder

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'image' => $imageName,
        ];

        $model->save($data);
        return redirect()->to('/admin/portfolio')->with('success', 'Menu added successfully');
    }

    public function edit($id)
    {
        $model = new PortfolioModel();
        $data['portfolio'] = $model->find($id);
        return view('admin/edit_portfolio', $data);
    }

    public function update($id)
    {
        $model = new PortfolioModel();

        // Validasi input
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
            $image->move(FCPATH . 'assets/img/Menu', $imageName);

            // Hapus gambar lama
            $portfolio = $model->find($id);
            if (file_exists(FCPATH . 'assets/img/Menu/' . $portfolio['image'])) {
                unlink(FCPATH . 'assets/img/Menu/' . $portfolio['image']);
            }

            $data['image'] = $imageName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/portfolio')->with('success', 'Menu updated successfully');
    }

    public function delete($id)
    {
        $model = new PortfolioModel();
        $portfolio = $model->find($id);

        if (file_exists(FCPATH . 'assets/img/Menu/' . $portfolio['image'])) {
            unlink(FCPATH . 'assets/img/Menu/' . $portfolio['image']);
        }

        $model->delete($id);
        return redirect()->to('/admin/portfolio')->with('success', 'Menu deleted successfully');
    }
}
