<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ThemeController extends Controller
{
  public function toggle()
  {
    $data = json_decode($this->request->getBody());
    if (isset($data->theme)) {
      session()->set('theme', $data->theme);
    }

    return $this->response->setJSON(['status' => 'ok']);
  }
}
