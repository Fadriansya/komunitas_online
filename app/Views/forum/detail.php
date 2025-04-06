<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="mb-4">
  <a href="<?= base_url('forum') ?>" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left"></i> Kembali ke Forum
  </a>
</div>

<!-- Topik Utama -->
<div class="p-4 rounded-3 shadow-sm mb-4 bg-body">
  <h3 class="fw-bold mb-1">Cara install CodeIgniter 4</h3>
  <p class="mb-1 text-muted">Kategori: Tanya Jawab • Oleh <strong>andi123</strong> • 3 hari lalu</p>
  <hr>
  <p>Saya masih bingung saat setup awal, ada yang bisa bantu?</p>
</div>

<!-- Komentar / Balasan -->
<h5 class="fw-semibold mb-3">4 Balasan</h5>

<div class="list-group mb-5">
  <div class="list-group-item bg-body-secondary rounded-3 mb-3 border-0">
    <div class="d-flex justify-content-between">
      <strong>member01</strong>
      <small class="text-muted">2 hari lalu</small>
    </div>
    <p class="mb-1">Kamu bisa mulai dengan composer create-project, terus jalankan `php spark serve`.</p>
  </div>
  <!-- Tambahkan balasan lain di sini -->
</div>

<!-- Form Balasan -->
<h5 class="fw-semibold">Tulis Balasan</h5>
<form action="<?= base_url('forum/balas') ?>" method="post" class="mt-3">
  <input type="hidden" name="topik_id" value="1"> <!-- ID topik -->
  <div class="mb-3">
    <textarea name="balasan" class="form-control" rows="4" placeholder="Tulis balasan kamu di sini..." required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="bi bi-chat-dots"></i> Kirim Balasan
  </button>
</form>
<?= $this->endSection() ?>
