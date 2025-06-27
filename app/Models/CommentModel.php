<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
  protected $table      = 'comments';
  protected $primaryKey = 'id';
  protected $allowedFields = ['forum_id', 'user_id', 'komentar',];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
