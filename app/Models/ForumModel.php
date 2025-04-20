<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
  protected $table = 'forum';
  protected $primaryKey = 'id';
  protected $allowedFields = ['judul', 'isi', 'kategori', 'user_id', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
