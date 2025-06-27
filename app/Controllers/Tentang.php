<?php

namespace App\Controllers;

class Tentang extends BaseController
{
  public function index(): string
  {
    return view('tentang');
  }
}
