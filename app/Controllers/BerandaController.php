<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PortfolioModel;
use App\Models\HeroSectionModel;
use App\Models\ContactModel;
use App\Models\AboutModel;
use App\Models\PaketModel;
use App\Models\ClientModel;
use App\Models\ServiceModel;

class BerandaController extends BaseController
{
    protected $portfolioModel;
    protected $heroSectionModel;
    protected $contactModel;
    protected $aboutModel;
    protected $paketModel;
    protected $clientModel;
    protected $serviceModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
        $this->heroSectionModel = new HeroSectionModel();
        $this->contactModel = new ContactModel();
        $this->aboutModel = new AboutModel();
        $this->paketModel = new PaketModel();
        $this->clientModel = new ClientModel();
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'portfolios' => $this->portfolioModel->findAll(),
            'heroSections' => $this->heroSectionModel->findAll(),
            'contactInfo' => $this->contactModel->findAll(),
            'about' => $this->aboutModel->findAll(),
            'paket' => $this->paketModel->findAll(),
            'clients' => $this->clientModel->findAll(),
            'services' => $this->serviceModel->findAll()
        ];

        return view('users/beranda/index', $data);
    }
}