<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'username' => $user['username'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('error', 'Invalid Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username not found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    
}
?>
