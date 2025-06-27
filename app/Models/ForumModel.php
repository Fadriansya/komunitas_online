<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model
{
  protected $table = 'forum';
  protected $primaryKey = 'id';
  protected $allowedFields = ['judul', 'isi', 'kategori', 'user_id', 'gambar', 'created_at', 'updated_at'];
  protected $useTimestamps = true;

  public function getAllWithCommentCount()
  {
    return $this->select('forum.*, COUNT(comments.id) as jumlah_komentar')
      ->join('comments', 'comments.forum_id = forum.id', 'left')
      ->groupBy('forum.id')
      ->orderBy('forum.created_at', 'DESC');
  }

  public function getForumWithDetails($id)
  {
    return $this->select('forum.*, users.username, users.avatar, kategori_forum.nama_kategori')
      ->join('users', 'users.id = forum.user_id', 'left')
      ->join('kategori_forum', 'kategori_forum.id = forum.kategori', 'left')
      ->where('forum.id', $id)
      ->first();
  }
}
