<?php

// app/Controllers/BerandaController.php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PortfolioModel;

class BerandaController extends BaseController
{
    public function index()
    {
        $portfolioModel = new PortfolioModel();
        $data['portfolios'] = $portfolioModel->getPortfolios(); // Mengambil data portfolio dari model

        return view('users/beranda/index', $data); // Menampilkan view 'users/beranda/index' dengan data portfolio
    }
}
