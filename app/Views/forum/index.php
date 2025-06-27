<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>
<div class="container mt-4">
  <h2>Daftar Diskusi</h2>

  <!-- Form Filter Kategori & Pencarian -->
  <form method="get" action="<?= base_url('forum') ?>" class="d-flex flex-wrap gap-2 mb-3">
    <!-- Dropdown Kategori -->
    <select name="kategori" class="form-select" style="max-width: 200px;">
      <option value="">Semua Kategori</option>
      <?php foreach ($kategoriList as $kat): ?>
        <option value="<?= $kat['id'] ?>" <?= ($kategoriDipilih == $kat['id']) ? 'selected' : '' ?>>
          <?= esc($kat['nama_kategori'] ?? 'Tidak Diketahui') ?>
        </option>
      <?php endforeach; ?>
    </select>


    <!-- Input pencarian keyword -->
    <input type="text" name="keyword" class="form-control" style="max-width: 300px;" placeholder="Cari judul..." value="<?= esc($keyword ?? '') ?>">

    <!-- Tombol submit -->
    <button type="submit" class="btn btn-primary">Filter</button>
  </form>

  <!-- Tampilkan tombol buat diskusi jika login -->
  <?php if (session()->get('logged_in')): ?>
    <a href="<?= base_url('/forum/create') ?>" class="btn btn-success mb-3">Buat Diskusi Baru</a>
  <?php endif; ?>

  <!-- Tampilkan daftar diskusi -->
  <?php if (!empty($diskusi)) : ?>
    <?php foreach ($diskusi as $item) : ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5>
            <a href="<?= base_url('forum/detail/' . $item['id']) ?>" class="text-decoration-none">
              <?= esc($item['judul']) ?>
            </a>
          </h5>
          <small class="text-muted">
            <?= esc($item['kategori']) ?> |
            <?= date('d M Y H:i', strtotime($item['created_at'])) ?> |
            oleh <strong><?= esc($item['username'] ?? 'Anonim') ?></strong> •
            <?= $item['jumlah_komentar'] ?> komentar
          </small>
          <p><?= esc($item['isi']) ?></p>
        </div>
      </div>
    <?php endforeach ?>
  <?php else : ?>
    <div class="alert alert-info">Tidak ada diskusi ditemukan untuk filter/kategori tersebut.</div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>