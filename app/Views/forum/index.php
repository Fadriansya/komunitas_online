<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h2>Daftar Diskusi</h2>

  <!-- Hanya tampilkan tombol buat diskusi jika pengguna sudah login -->
  <?php if (session()->get('logged_in')): ?>
    <a href="<?= base_url('/forum/create') ?>" class="btn btn-primary mb-3">Buat Diskusi Baru</a>
  <?php endif; ?>
  <!-- form pencarian diskusi -->
  <form action="<?= base_url('forum') ?>" method="get" id="searchForm" class="mb-4">
    <div class="input-group">
      <input type="text" name="keyword" id="searchInput"
        class="form-control bg-body text-body border"
        placeholder="Cari judul diskusi..."
        value="<?= esc($keyword ?? '') ?>"
        aria-label="Cari judul diskusi">
      <button class="btn btn-outline-primary" type="submit">Cari</button>
    </div>
  </form>

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