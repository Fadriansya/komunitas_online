<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ForumModel;
use App\Models\CommentModel;
use App\Models\KategoriForumModel;

class Forum extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $forumModel = new ForumModel();
        $kategoriModel = new KategoriForumModel();

        $keyword = $this->request->getGet('keyword');
        $kategoriId = $this->request->getGet('kategori');

        $query = $forumModel->getAllWithCommentCount();

        if ($keyword) {
            $query->like('judul', $keyword);
        }

        if ($kategoriId) {
            $query->where('forum.kategori', $kategoriId);
        }

        $diskusi = $query->findAll();
        $semuaKategori = $kategoriModel->findAll();

        return view('forum/index', [
            'diskusi' => $diskusi,
            'keyword' => $keyword,
            'kategoriDipilih' => $kategoriId,
            'kategoriList' => $semuaKategori,
        ]);
    }

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');;
        }
        $kategoriModel = new KategoriForumModel();
        return view('forum/create', [
            'kategoriList' => $kategoriModel->findAll()
        ]);
    }

    public function comment($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');;
        }

        $komentarModel = new CommentModel();
        $data = [
            'forum_id' => $id,
            'user_id' => session()->get('user_id'),
            'komentar' => $this->request->getPost('balasan'),
        ];
        $komentarModel->insert($data);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
    }

    public function detail($id)
    {
        $forumModel = new ForumModel();
        $commentModel = new CommentModel();
        $userModel = new \App\Models\UserModel();

        $diskusi = $forumModel->select('forum.*, users.username')
            ->join('users', 'users.id = forum.user_id', 'left')
            ->where('forum.id', $id)
            ->first();

        if (!$diskusi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Diskusi tidak ditemukan.");
        }

        $komentar = $commentModel->select('comments.*, users.username')
            ->join('users', 'users.id = comments.user_id', 'left')
            ->where('forum_id', $id)
            ->orderBy('comments.created_at', 'ASC')
            ->findAll();

        return view('forum/detail', [
            'diskusi'  => $diskusi,
            'komentar' => $komentar
        ]);
    }

    public function balas()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu untuk membalas.');
        }

        $commentModel = new \App\Models\CommentModel();

        $data = [
            'forum_id' => $this->request->getPost('topik_id'),
            'user_id'  => session()->get('user_id'),
            'komentar' => $this->request->getPost('balasan'),
        ];

        $commentModel->save($data);

        return redirect()->to('/forum/detail/' . $data['forum_id'])->with('success', 'Komentar berhasil dikirim.');
    }

    public function simpan()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|min_length[5]',
            'kategori' => 'required',
            'isi' => 'required|min_length[10]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan ke database
        $forumModel = new \App\Models\ForumModel();

        $forumModel->save([
            'judul' => $this->request->getPost('judul'),
            'kategori' => $this->request->getPost('kategori'),
            'isi' => $this->request->getPost('isi'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('forum'))->with('success', 'Topik berhasil dibuat!');
    }
}
