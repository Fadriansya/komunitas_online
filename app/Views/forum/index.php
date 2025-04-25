<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h2>Daftar Diskusi</h2>

  <!-- Hanya tampilkan tombol buat diskusi jika pengguna sudah login -->
  <?php if (session()->get('logged_in')): ?>
    <a href="<?= base_url('/forum/create') ?>" class="btn btn-primary mb-3">Buat Diskusi Baru</a>
  <?php endif; ?>

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
    <p>Belum ada diskusi.</p>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>