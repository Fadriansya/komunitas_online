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
    $userModel = new UserModel();
    $users = $userModel->where('role !=', 'admin')->findAll();
    return view('admin/dashboard', ['users' => $users]);
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
    return redirect()->to('dashboard')->with('success', 'User berhasil dihapus.');
  }
}
