<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
  public function index()
  {
    return view('auth/login');
  }

  public function login()
  {
    $session = session();
    $model = new UserModel();
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
      $session->set([
        'user_id' => $user['id'],
        'username' => $user['username'],
        'email' => $user['email'],
        'logged_in' => true
      ]);
      return redirect()->to('/forum');
    } else {
      return redirect()->back()->with('error', 'Email atau Password salah / belum terdaftar.');
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}
