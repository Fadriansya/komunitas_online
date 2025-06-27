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
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $kategoriModel = new KategoriForumModel();
        return view('forum/create', [
            'kategoriList' => $kategoriModel->findAll()
        ]);
    }

    public function comment($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'balasan' => 'required|min_length[3]|max_length[1000]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $komentarModel = new CommentModel();
        $data = [
            'forum_id' => $id,
            'user_id' => session()->get('user_id'),
            'komentar' => $this->request->getPost('balasan')
        ];

        try {
            $komentarModel->insert($data);
            return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
        } catch (\Exception $e) {
            log_message('error', 'Error posting comment: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim balasan.');
        }
    }

    public function detail($id)
    {
        $forumModel = new ForumModel();
        $commentModel = new CommentModel();

        // Ambil detail forum (tetap anonim)
        $diskusi = $forumModel->select('forum.*, kategori_forum.nama_kategori')
            ->join('kategori_forum', 'kategori_forum.id = forum.kategori', 'left')
            ->where('forum.id', $id)
            ->first();

        if (!$diskusi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil komentar dengan nama user (tanpa avatar)
        $komentar = $commentModel->select('comments.*, users.username')
            ->join('users', 'users.id = comments.user_id', 'left')
            ->where('forum_id', $id)
            ->orderBy('comments.created_at', 'ASC')
            ->findAll();

        return view('forum/detail', [
            'diskusi' => $diskusi,
            'komentar' => $komentar
        ]);
    }


    public function balas()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'topik_id' => 'required|numeric',
            'balasan' => 'required|min_length[3]|max_length[1000]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $commentModel = new CommentModel();
        $data = [
            'forum_id' => $this->request->getPost('topik_id'),
            'user_id' => session()->get('user_id'),
            'komentar' => $this->request->getPost('balasan')
        ];

        try {
            $commentModel->insert($data);
            return redirect()->to('/forum/detail/' . $data['forum_id'])
                ->with('success', 'Komentar berhasil dikirim.');
        } catch (\Exception $e) {
            log_message('error', 'Error replying: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim komentar.');
        }
    }

    public function simpan()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|min_length[5]',
            'kategori' => 'required',
            'isi' => 'required|min_length[10]',
            'gambar' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle upload gambar
        $gambarName = null;
        $gambar = $this->request->getFile('gambar');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads/forum', $gambarName);
        }

        // Simpan ke database
        $forumModel = new ForumModel();

        $data = [
            'judul' => $this->request->getPost('judul'),
            'kategori' => $this->request->getPost('kategori'),
            'isi' => $this->request->getPost('isi'),
            'user_id' => session()->get('user_id'),
            'gambar' => $gambarName,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $forumModel->save($data);

        return redirect()->to(base_url('forum'))->with('success', 'Topik berhasil dibuat!');
    }
}
