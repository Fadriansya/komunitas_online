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

<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<form action="<?= base_url('/forum/simpan') ?>" method="post" enctype="multipart/form-data" class="shadow-sm p-4 rounded-3 bg-body-tertiary">
  <div class="mb-3">
    <label for="judul" class="form-label">Judul Topik</label>
    <input type="text" class="form-control" id="judul" name="judul" value="<?= old('judul') ?>" required>
  </div>

  <div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <select class="form-select" id="kategori" name="kategori" required>
      <option value="">-- Pilih Kategori --</option>
      <?php foreach ($kategoriList as $kat): ?>
        <option value="<?= $kat['id'] ?>" <?= old('kategori') == $kat['id'] ? 'selected' : '' ?>>
          <?= esc($kat['nama_kategori']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="isi" class="form-label">Isi Topik</label>
    <textarea class="form-control" id="isi" name="isi" rows="6" required><?= old('isi') ?></textarea>
  </div>

  <div class="mb-4">
    <label for="gambar" class="form-label">Gambar Pendukung (Opsional)</label>
    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
    <div class="form-text">
      Format yang didukung: JPG, JPEG, PNG. Maksimal ukuran: 2MB.
    </div>
    <?php if (session()->getFlashdata('error_gambar')) : ?>
      <div class="text-danger small mt-1"><?= session()->getFlashdata('error_gambar') ?></div>
    <?php endif; ?>
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="bi bi-send"></i> Posting
  </button>
</form>
<?= $this->endSection() ?>