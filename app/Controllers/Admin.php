<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function getContent($page)
    {
        if (!is_file(APPPATH . 'Views/admin/' . $page . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        return view('admin/' . $page);
    }
}
