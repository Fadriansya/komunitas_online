<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
  public function index()
  {
    return view('auth/register');
  }

  public function store()
  {
    $validation = \Config\Services::validation();

    $validation->setRules([
      'username' => 'required|min_length[3]|is_unique[users.username]',
      'email'    => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[5]',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $userModel = new UserModel();
    $userModel->save([
      'username' => $this->request->getPost('username'),
      'email'    => $this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    ]);

    return redirect()->to('/login')->with('message', 'Registrasi berhasil! Silakan login.');
  }
}
