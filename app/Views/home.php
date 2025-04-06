<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="text-center">
  <h1 class="mb-4">Selamat Datang di KomunitasKu</h1>
  <p class="lead">Gabung dan diskusi bareng dengan anggota komunitas yang keren dan aktif!</p>
  <a href="<?= base_url('register') ?>" class="btn btn-primary mt-3">Gabung Sekarang</a>
</div>
<?= $this->endSection() ?>