<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
  protected $table = 'forum';
  protected $primaryKey = 'id';
  protected $allowedFields = ['judul', 'kategori', 'isi', 'created_at'];
  protected $useTimestamps = false;
}
