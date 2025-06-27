<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ForumModel;

helper('html');

class Admin extends BaseController
{
  public function dashboard()
  {
    if (session()->get('role') !== 'admin') {
      return view('errors/html/error_403');
    }
    $userModel = new UserModel();
    $users = $userModel->findAll();
    // Statistik
    $totalUser = $userModel->where('role !=', 'admin')->countAllResults();
    $totalAdmin = $userModel->where('role', 'admin')->countAllResults();
    // Jika ada tabel forum
    $forumModel = new ForumModel();
    $totalForum = $forumModel->countAllResults();
    return view('admin/dashboard', [
      'users' => $users,
      'totalUser' => $totalUser,
      'totalAdmin' => $totalAdmin,
      'totalForum' => $totalForum
    ]);
  }

  public function deleteUser($id)
  {
    // proteksi admin
    if (session()->get('role') !== 'admin') {
      return view('errors/html/error_403');
    }

    $userModel = new UserModel();
    $user = $userModel->find($id);

    if (!$user || $user['role'] === 'admin') {
      return redirect()->back()->with('error', 'Tidak bisa menghapus user ini.');
    }

    $userModel->delete($id);
    return redirect()->to('dashboard')->with('success', 'User berhasil dihapus.');
  }
}
