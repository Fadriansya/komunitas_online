<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

helper('html');

class Admin extends BaseController
{
  public function dashboard()
  {
    if (session()->get('role') !== 'admin') {
      return view('errors/html/error_403');
    }
    return view('admin/dashboard');
  }

  public function manageUsers()
  {
    if (session()->get('role') !== 'admin') {
      return view('errors/html/error_403');
    }

    $userModel = new UserModel();
    $users = $userModel->where('role !=', 'admin')->findAll(); // Ambil semua user kecuali admin

    return view('admin/manage_users', ['users' => $users]);
  }

  public function deleteUser($id)
  {
    // proteksi admin
    if (session()->get('role') !== 'admin') {
      return view('errors/html/error_403');
    }

    $userModel = new \App\Models\UserModel();
    $user = $userModel->find($id);

    if (!$user || $user['role'] === 'admin') {
      return redirect()->back()->with('error', 'Tidak bisa menghapus user ini.');
    }

    $userModel->delete($id);
    return redirect()->to('manage-users')->with('success', 'User berhasil dihapus.');
  }
}
