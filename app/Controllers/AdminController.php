<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('admin');
    }
    
}
?>