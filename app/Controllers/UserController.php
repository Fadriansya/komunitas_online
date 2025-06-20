<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends BaseController
{
  public function profile()
  {
    // Pastikan user sudah login
    if (!session()->get('logged_in')) {
      return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
    $userId = session()->get('user_id');
    $userModel = new \App\Models\UserModel();
    $user = $userModel->find($userId);
    return view('user/profile', ['user' => $user]);
  }

  public function update()
  {
    $userId = session()->get('user_id');
    $userModel = new \App\Models\UserModel();
    $user = $userModel->find($userId);

    // Ambil input dari form
    $data = [
      'username' => $this->request->getPost('username'),
      'email'    => $this->request->getPost('email'),
    ];

    // Cek jika file avatar diupload
    $avatar = $this->request->getFile('avatar');
    if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
      $avatarName = $avatar->getRandomName();
      $avatar->move('uploads/avatars', $avatarName);
      $data['avatar'] = $avatarName;
      // Update session avatar
      session()->set('avatar', $avatarName);
    }
    // Bersihkan data kosong, tapi biarkan avatar jika ada
    $filtered = array_filter($data, function ($val, $key) {
      if ($key === 'avatar') return true;
      return $val !== null && trim($val) !== '';
    }, ARRAY_FILTER_USE_BOTH);

    if (empty($filtered)) {
      return redirect()->back()->with('error', 'Tidak ada data yang diubah.');
    }

    // Update ke database
    $userModel->update($userId, $filtered);
    return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui!');
  }
}
