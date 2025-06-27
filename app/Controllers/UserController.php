<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class UserController extends BaseController
{
  public function profile()
  {
    // Pastikan user sudah login
    if (!session()->get('logged_in')) {
      return redirect()->to('/login')
        ->with('error', 'Silakan login terlebih dahulu.');
    }

    $userId = session()->get('user_id');
    $userModel = new UserModel();
    $user = $userModel->find($userId);

    // Jika user tidak ditemukan
    if (!$user) {
      return redirect()->to('/login')
        ->with('error', 'Sesi tidak valid, silakan login kembali.');
    }

    return view('user/profile', [
      'user' => $user,
      'validation' => \Config\Services::validation()
    ]);
  }

  public function update(): RedirectResponse
  {
    // Verifikasi login
    if (!session()->get('logged_in')) {
      return redirect()->to('/login')
        ->with('error', 'Silakan login terlebih dahulu.');
    }

    $userId = session()->get('user_id');
    $userModel = new UserModel();
    $user = $userModel->find($userId);

    // Validasi user
    if (!$user) {
      return redirect()->to('/login')
        ->with('error', 'Sesi tidak valid, silakan login kembali.');
    }

    // Aturan validasi
    $rules = [
      'username' => 'required|min_length[3]|max_length[30]',
      'email' => 'required|valid_email',
      'avatar' => [
        'max_size[avatar,2048]', // Maksimal 2MB
        'is_image[avatar]',
        'mime_in[avatar,image/jpg,image/jpeg,image/png]'
      ]
    ];

    // Jalankan validasi
    if (!$this->validate($rules)) {
      return redirect()->back()
        ->withInput()
        ->with('errors', $this->validator->getErrors());
    }

    // Siapkan data untuk update
    $data = [
      'username' => $this->request->getPost('username'),
      'email' => $this->request->getPost('email')
    ];

    // Handle upload avatar
    $avatar = $this->request->getFile('avatar');
    if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
      $namaFileBaru = $avatar->getRandomName();
      $avatar->move(ROOTPATH . 'public/uploads/avatars', $namaFileBaru);

      // Hapus avatar lama jika ada
      if ($user['avatar'] && file_exists(ROOTPATH . 'public/uploads/avatars/' . $user['avatar'])) {
        unlink(ROOTPATH . 'public/uploads/avatars/' . $user['avatar']);
      }

      $data['avatar'] = $namaFileBaru;
      session()->set('avatar', $namaFileBaru);
    }

    try {
      // Update data user
      $userModel->update($userId, $data);

      // Update data di session
      session()->set([
        'username' => $data['username'],
        'email' => $data['email']
      ]);

      return redirect()->to('/profile')
        ->with('success', 'Profil berhasil diperbarui!');
    } catch (\Exception $e) {
      // Log error untuk debugging
      log_message('error', 'Gagal update profil: ' . $e->getMessage());
      return redirect()->back()
        ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
  }
}
