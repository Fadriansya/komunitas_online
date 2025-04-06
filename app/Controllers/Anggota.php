<?php

namespace App\Controllers;

class Anggota extends BaseController
{
  public function index(): string
  {
    return view('anggota');
  }
}
