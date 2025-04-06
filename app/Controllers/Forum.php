<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Forum extends BaseController
{
    public function index()
    {
        $forumModel = new \App\Models\ForumModel();
        $data['diskusi'] = $forumModel->findAll();

        return view('forum/index', $data);
    }

    public function create(): string
    {
        return view('forum/create');
    }

    public function detail($id): string
    {
        // Data dummy detail topik
        $topik = [
            'id' => $id,
            'judul' => 'Cara install CodeIgniter 4',
            'kategori' => 'Tanya Jawab',
            'penulis' => 'andi123',
            'waktu' => '3 hari lalu',
            'isi' => 'Saya masih bingung saat setup awal, ada yang bisa bantu?'
        ];

        // Data dummy komentar
        $balasan = [
            [
                'user' => 'member01',
                'pesan' => 'Coba mulai dengan composer create-project, lalu jalankan php spark serve.',
                'waktu' => '2 hari lalu'
            ],
            // Balasan lain bisa ditambahkan di sini
        ];

        return view('forum/detail', [
            'topik' => $topik,
            'balasan' => $balasan
        ]);
    }

    public function balas()
    {
        // Sementara hanya tampilkan balasan yang dikirim
        $topik_id = $this->request->getPost('topik_id');
        $pesan = $this->request->getPost('balasan');

        // Proses simpan ke database nanti kita bahas

        return redirect()->to('/forum/detail/' . $topik_id);
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
