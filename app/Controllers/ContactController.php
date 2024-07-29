<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function index()
    {
        $data['contacts'] = $this->contactModel->getContacts();
        if (empty($data['contacts'])) {
            $data['message'] = 'No contacts found in the database.';
        }
        return view('contacts/index', $data);
    }

    public function create()
    {
        return view('contacts/create');
    }

    public function store()
    {
        $data = [
            'type' => $this->request->getPost('type'),
            'value' => $this->request->getPost('value')
        ];

        if ($this->contactModel->insert($data)) {
            return redirect()->to('admin')->with('success', 'Contact added successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add contact');
        }
    }

    public function edit($id)
    {
        $data['contact'] = $this->contactModel->getContact($id);
        if (empty($data['contact'])) {
            return redirect()->to('admin')->with('error', 'Contact not found');
        }
        return view('contacts/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'type' => $this->request->getPost('type'),
            'value' => $this->request->getPost('value')
        ];

        if ($this->contactModel->update($id, $data)) {
            return redirect()->to('admin')->with('success', 'Contact updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update contact');
        }
    }

    public function delete($id)
    {
        if ($this->contactModel->delete($id)) {
            return redirect()->to('admin')->with('success', 'Contact deleted successfully');
        } else {
            return redirect()->to('admin')->with('error', 'Failed to delete contact');
        }
    }
}