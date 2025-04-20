<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('message')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('message') ?>
  </div>
<?php endif; ?>
<div class="text-center">
  <h1 class="mb-4">Selamat datang di KomunitasKu!</h1>
  <p class="lead">
    Kami adalah tempat berkumpulnya para pemikir, pembelajar, dan pencipta yang ingin tumbuh bersama dalam semangat kolaborasi. Di sini, setiap suara dihargai, setiap ide punya tempat, dan setiap anggota adalah bagian penting dari perjalanan ini.<br><br>
    KomunitasKu dibangun untuk menjadi ruang diskusi yang ramah, terbuka, dan inspiratif. Kamu bisa berbagi pemikiran, bertanya, memberi solusi, atau sekadar bersosialisasi dengan sesama anggota yang memiliki minat dan semangat yang sama.</p>
  <a href="<?= base_url('register') ?>" class="btn btn-primary mt-3">Gabung Sekarang?</a>
</div>
<?= $this->endSection() ?>