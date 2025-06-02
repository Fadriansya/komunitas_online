<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="fw-bold">Buat Topik Baru</h2>
  <a href="<?= base_url('/forum') ?>" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left"></i> Kembali ke Forum
  </a>
</div>

<?php if (session()->getFlashdata('errors')) : ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $error) : ?>
        <li><?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif; ?>
<form action="<?= base_url('/forum/simpan') ?>" method="post" class="shadow-sm p-4 rounded-3 bg-body-tertiary">
  <div class="mb-3">
    <label for="judul" class="form-label">Judul Topik</label>
    <input type="text" class="form-control" id="judul" name="judul" required>
  </div>

  <div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <select class="form-select" id="kategori" name="kategori" required>
      <option value="">-- Pilih Kategori --</option>
      <?php foreach ($kategoriList as $kat): ?>
        <option value="<?= $kat['id'] ?>"><?= esc($kat['nama_kategori']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="isi" class="form-label">Isi Topik</label>
    <textarea class="form-control" id="isi" name="isi" rows="6" required></textarea>
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="bi bi-send"></i> Posting
  </button>
</form>
<?= $this->endSection() ?>