<?php

namespace App\Controllers;

use App\Models\PortfolioModel;
use App\Models\ContactModel;

class AdminController extends BaseController
{
    protected $portfolioModel;
    protected $contactModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        return view('admin');
    }

    public function loadContent($page)
    {
        switch ($page) {
            case 'dashboard':
                return view('admin/dashboard');
            case 'users':
                return view('admin/users');
            case 'menu':
                $data['portfolios'] = $this->portfolioModel->findAll();
                $data['categories'] = $this->portfolioModel->distinct()->select('category')->findAll();
                return view('admin', $data);
            case 'contacts':
                $data['contacts'] = $this->contactModel->findAll();
                return view('admin/contacts/index', $data);
            case 'settings':
                return view('admin/settings');
            default:
                return 'Page not found';
        }
    }

    public function create()
    {
        $data['categories'] = $this->portfolioModel->distinct()->select('category')->findAll();
        return view('admin/menu/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'category' => 'required|min_length[3]|max_length[255]',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            'description' => 'required|min_length[10]',
            'price' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads', $imageName);

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'image' => $imageName,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];

        if ($this->portfolioModel->insert($data)) {
            return redirect()->to('/admin')->with('success', 'Menu item added successfully')->with('alert', 'Menu item has been created!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add menu item');
        }
    }

    public function edit($id)
    {
        $data['portfolio'] = $this->portfolioModel->find($id);
        $data['categories'] = $this->portfolioModel->distinct()->select('category')->findAll();
        return view('admin/menu/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'category' => 'required|min_length[3]|max_length[255]',
            'image' => 'max_size[image,1024]|is_image[image]',
            'description' => 'required|min_length[10]',
            'price' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];

        if ($this->request->getFile('image')->isValid()) {
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
            $data['image'] = $imageName;

            // Delete old image
            $oldImage = $this->portfolioModel->find($id)['image'];
            if (file_exists(ROOTPATH . 'public/uploads/' . $oldImage)) {
                unlink(ROOTPATH . 'public/uploads/' . $oldImage);
            }
        }

        if ($this->portfolioModel->update($id, $data)) {
            return redirect()->to('/admin')->with('success', 'Menu item updated successfully')->with('alert', 'Menu item has been updated!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update menu item');
        }
    }

    public function delete($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if ($portfolio) {
            // Delete image file
            if (file_exists(ROOTPATH . 'public/uploads/' . $portfolio['image'])) {
                unlink(ROOTPATH . 'public/uploads/' . $portfolio['image']);
            }
            if ($this->portfolioModel->delete($id)) {
                return redirect()->to('/admin')->with('success', 'Menu item deleted successfully')->with('alert', 'Menu item has been deleted!');
            } else {
                return redirect()->to('/admin')->with('error', 'Failed to delete menu item');
            }
        }
        return redirect()->to('/admin')->with('error', 'Menu item not found');
    }

    public function createContact()
    {
        return view('contacts/create');
    }

    public function storeContact()
    {
        $data = [
            'type' => $this->request->getPost('type'),
            'value' => $this->request->getPost('value')
        ];

        if ($this->contactModel->insert($data)) {
            return redirect()->to('admin/contacts')->with('success', 'Contact added successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add contact');
        }
    }

    public function editContact($id)
    {
        $data['contact'] = $this->contactModel->find($id);
        if (empty($data['contact'])) {
            return redirect()->to('admin/contacts')->with('error', 'Contact not found');
        }
        return view('contacts/edit', $data);
    }

    public function updateContact($id)
    {
        $data = [
            'type' => $this->request->getPost('type'),
            'value' => $this->request->getPost('value')
        ];

        if ($this->contactModel->update($id, $data)) {
            return redirect()->to('admin/contacts')->with('success', 'Contact updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update contact');
        }
    }

    public function deleteContact($id)
    {
        if ($this->contactModel->delete($id)) {
            return redirect()->to('admin/contacts')->with('success', 'Contact deleted successfully');
        } else {
            return redirect()->to('admin/contacts')->with('error', 'Failed to delete contact');
        }
    }

    public function getContent($page)
    {
        // Validate and sanitize the $page parameter
        $page = filter_var($page, FILTER_SANITIZE_STRING);
        
        // Load the appropriate view based on the $page parameter
        switch ($page) {
            case 'dashboard':
                return view('admin/dashboard');
            case 'users':
                return view('admin/users');
            case 'menu':
                $data['portfolios'] = $this->portfolioModel->findAll();
                $data['categories'] = $this->portfolioModel->distinct()->select('category')->findAll();
                return view('admin', $data);
            case 'contacts':
                $data['contacts'] = $this->contactModel->findAll();
                return view('contacts/index', $data);
            case 'settings':
                return view('admin/settings');
            default:
                return 'Invalid page';
        }
    }

    public function someAdminPage()
    {
        if ($this->request->isAJAX()) {
            $data['title'] = 'Some Admin Page';
            $content = view('admin/some_page', $data);
            
            return $this->response->setJSON([
                'title' => $data['title'],
                'content' => $content
            ]);
        }
        
        // Regular page load
        return view('admin/some_page', ['title' => 'Some Admin Page']);
    }
}