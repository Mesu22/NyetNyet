<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $contactModel = new \App\Models\ContactModel();
        $data['contacts'] = $contactModel->findAll();
        
        return view('users/beranda/index', $data);
    }
}