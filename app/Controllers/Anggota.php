<?php

namespace App\Controllers;

use App\Models\UserModel;

class Anggota extends BaseController
{
  public function index()
  {
    $userModel = new UserModel();
    $data['users'] = $userModel->findAll();
    return view('anggota', $data);
  }
}
