<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="mb-4">
  <a href="<?= base_url('forum') ?>" class="btn btn-outline-secondary">
    <i class="bi bi-arrow-left"></i> Kembali ke Forum
  </a>
</div>

<!-- Flash Error -->
<?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger mb-3" role="alert">
    <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>
<!-- Flash Success -->
<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success mb-3" role="alert">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<!-- Topik Utama -->
<div class="p-4 rounded-3 shadow-sm mb-4 bg-body">
  <div class="row">
    <!-- Kolom Gambar -->
    <?php if (!empty($diskusi['gambar'])): ?>
      <div class="col-md-2">
        <img src="<?= base_url('uploads/forum/' . $diskusi['gambar']) ?>"
          alt="Gambar Forum"
          class="img-fluid rounded"
          style="max-height: 200px; width: auto;">
      </div>
    <?php endif; ?>

    <!-- Kolom Konten -->
    <div class="<?= !empty($diskusi['gambar']) ? 'col-md-8' : 'col-12' ?>">
      <h3 class="fw-bold mb-2"><?= esc($diskusi['judul']) ?></h3>
      <p class="text-muted mb-2">
        <small>
          Kategori: <?= esc($diskusi['nama_kategori'] ?? $diskusi['kategori']) ?> •
          Oleh <strong>Anonim</strong> •
          <?= date('d M Y H:i', strtotime($diskusi['created_at'])) ?>
        </small>
      </p>
      <div class="forum-content mt-3">
        <?= nl2br(esc($diskusi['isi'])) ?>
      </div>
    </div>
  </div>
</div>

<!-- Komentar -->
<h5 class="fw-semibold mb-3"><?= count($komentar) ?> Balasan</h5>

<div class="list-group mb-5">
  <?php if (!empty($komentar)): ?>
    <?php foreach ($komentar as $komen): ?>
      <div class="list-group-item bg-body-secondary rounded-3 mb-3 border-0">
        <div class="d-flex justify-content-between">
          <strong><?= esc($komen['username'] ?? 'Anonim') ?></strong>
          <small class="text-muted">
            <?= date('d M Y H:i', strtotime($komen['created_at'])) ?>
          </small>
        </div>
        <p class="mb-1"><?= nl2br(esc($komen['komentar'])) ?></p>
      </div>
    <?php endforeach ?>
  <?php else: ?>
    <p class="text-muted">Belum ada balasan.</p>
  <?php endif ?>
</div>

<!-- Form Balasan -->
<?php if (session()->get('logged_in')): ?>
  <h5 class="fw-semibold">Tulis Balasan</h5>
  <form action="<?= base_url('forum/comment/' . $diskusi['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
      <textarea name="balasan" class="form-control" rows="4"
        placeholder="Tulis balasan kamu di sini..." required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">
      <i class="bi bi-chat-dots"></i> Kirim Balasan
    </button>
  </form>
<?php else: ?>
  <div class="alert alert-warning">
    <i class="bi bi-exclamation-triangle"></i>
    <a href="<?= base_url('login') ?>">Login</a> terlebih dahulu untuk memberikan balasan.
  </div>
<?php endif; ?>
<?= $this->endSection() ?>