<?php
namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
  public function login(): string
  {
    return view('auth/login');
  }
  public function register()
  {
    return view('auth/register');
  }
  public function save()
  {
    $userModel = new \App\Models\UserModel();

    $username = $this->request->getPost('username');
    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Validasi username hanya huruf dan angka
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
      return redirect()->back()->withInput()->with('error', 'Username hanya boleh mengandung huruf dan angka.');
    }

    // Validasi email harus @gmail.com
    if (!preg_match('/^[\w.+\-]+@gmail\.com$/', $email)) {
      return redirect()->back()->withInput()->with('error', 'Email harus menggunakan domain @gmail.com');
    }

    // Cek apakah username atau email sudah ada
    if ($userModel->where('username', $username)->first()) {
      return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
    }

    if ($userModel->where('email', $email)->first()) {
      return redirect()->back()->withInput()->with('error', 'Email sudah digunakan.');
    }

    $data = [
      'username' => $username,
      'email'    => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT),
    ];

    $userModel->insert($data);

    return redirect()->to('/anggota')->with('success', 'Akun berhasil didaftarkan!');
  }
}
