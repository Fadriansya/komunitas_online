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
    helper(['form']);
    $session = session();
    $model = new \App\Models\UserModel();
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $user = $model->where('email', $email)->first();

    if ($user) {
      $verify_pass = password_verify($password, $user['password']);
      if ($verify_pass) {
        // ✅ SET SESSION DI SINI
        session()->set([
          'user_id'   => $user['id'],
          'username'  => $user['username'],
          'avatar'    => $user['avatar'] ?? 'default-avatar.png',
          'role'      => $user['role'],
          'logged_in' => true,
        ]);
        return redirect()->to('/')->with('success', 'Berhasil login!');
      } else {
        return redirect()->back()->with('error', 'Password salah.');
      }
    } else {
      return redirect()->back()->with('error', 'Email tidak ditemukan.');
    }
  }


  public function logout()
  {
    session()->destroy();
    return redirect()->to('/login');
  }
}
