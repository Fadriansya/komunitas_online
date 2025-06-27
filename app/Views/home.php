<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('message')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('message') ?>
  </div>
<?php endif; ?>

<!-- Hero Section -->
<div class="text-center mb-5 hero-section">
  <h1 class="mb-4 fw-bold">Selamat datang di <span class="text-primary">KomunitasKu!</span></h1>
  <p class="lead">
    Kami adalah tempat berkumpulnya para pemikir, pembelajar, dan pencipta yang ingin tumbuh bersama dalam semangat kolaborasi. Di sini, setiap suara dihargai, setiap ide punya tempat, dan setiap anggota adalah bagian penting dari perjalanan ini.<br><br>
    KomunitasKu dibangun untuk menjadi ruang diskusi yang ramah, terbuka, dan inspiratif. Kamu bisa berbagi pemikiran, bertanya, memberi solusi, atau sekadar bersosialisasi dengan sesama anggota yang memiliki minat dan semangat yang sama.
  </p>
  <a href="<?= base_url('register') ?>" class="btn btn-primary mt-3">Gabung Sekarang?</a>
</div>

<!-- Fitur Komunitas -->
<div class="container mb-5">
  <div class="row text-center g-4">
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0 bg-body-tertiary feature-card">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Forum Diskusi</h5>
          <p class="card-text">Tempat berbagi ide, bertanya, dan saling membantu.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0 bg-body-tertiary feature-card">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Anggota Aktif</h5>
          <p class="card-text">Bergabung dengan komunitas yang aktif dan suportif.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0 bg-body-tertiary feature-card">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Games</h5>
          <p class="card-text">Mainkan game seru untuk melatih logika.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100 shadow-sm border-0 bg-body-tertiary feature-card">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Kolaborasi</h5>
          <p class="card-text">Temukan teman kolaborasi untuk proyek atau ide kreatif.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Diskusi Terbaru -->
<?php if (isset($latestForums) && count($latestForums) > 0): ?>
  <div class="container mb-5 latest-forum">
    <h3 class="mb-4">Diskusi Terbaru</h3>
    <div class="list-group">
      <?php foreach ($latestForums as $forum): ?>
        <a href="<?= base_url('forum/' . $forum['id']) ?>" class="list-group-item list-group-item-action">
          <h5 class="mb-1"><?= esc($forum['judul']) ?></h5>
          <small class="text-muted">Diposting oleh <?= esc($forum['username']) ?> pada <?= date('d M Y', strtotime($forum['created_at'])) ?></small>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<!-- Kutipan Inspiratif -->
<div class="container text-center mt-5 quote-section">
  <blockquote class="blockquote">
    <p class="mb-0">"Komunitas yang hebat dimulai dari satu ide dan satu langkah kecil."</p>
    <footer class="blockquote-footer mt-2">Admin KomunitasKu</footer>
  </blockquote>
</div>

<?= $this->endSection() ?>