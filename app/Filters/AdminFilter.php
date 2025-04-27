<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Cek apakah user login dan memiliki role admin
    if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
      // Kalau bukan admin, redirect ke halaman utama
      return redirect()->to('/')->with('error', 'Anda tidak memiliki akses sebagai admin.');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Tidak perlu diisi untuk kasus ini
  }
}
