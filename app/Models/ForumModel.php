<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
  protected $table = 'forum';
  protected $primaryKey = 'id';
  protected $allowedFields = ['judul', 'isi', 'kategori', 'user_id', 'created_at', 'updated_at'];
  protected $useTimestamps = true;

  public function getAllWithCommentCount()
  {
    return $this->select('forum.*, users.username, COUNT(comments.id) as jumlah_komentar')
      ->join('users', 'users.id = forum.user_id', 'left')
      ->join('comments', 'comments.forum_id = forum.id', 'left')
      ->groupBy('forum.id')
      ->orderBy('forum.created_at', 'DESC')
      ->findAll();
  }
}
