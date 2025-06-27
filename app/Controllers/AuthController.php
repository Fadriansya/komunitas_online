<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
  public function login()
  {
    $session = session();
    $model = new UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {
      $session->set([
        'user_id'  => $user['id'],
        'username' => $user['username'],
        'email'    => $user['email'],
        'logged_in' => true,
      ]);

      return redirect()->to('/anggota')->with('success', 'Berhasil login!');
    } else {
      return redirect()->back()->with('error', 'Email atau password salah!');
    }
  }
  public function logout()
  {
    session()->remove('logged_in');
    session()->remove('user_id');  // Hapus session lainnya yang dibutuhkan
    return redirect()->to('/login')->with('message', 'Anda telah logout.'); 
  }
}
