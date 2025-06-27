<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriForumModel extends Model
{
  protected $table = 'kategori_forum';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_kategori'];
  protected $useTimestamps = true;
}
