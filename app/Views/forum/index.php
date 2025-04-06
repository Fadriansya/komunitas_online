<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h2>Daftar Diskusi</h2>
  <a href="<?= base_url('/forum/create') ?>" class="btn btn-primary mb-3">Buat Diskusi Baru</a>

  <?php if (!empty($diskusi)) : ?>
    <?php foreach ($diskusi as $item) : ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5><?= esc($item['judul']) ?></h5>
          <small class="text-muted"><?= esc($item['kategori']) ?> | <?= $item['created_at'] ?></small>
          <p><?= esc($item['isi']) ?></p>
        </div>
      </div>
    <?php endforeach ?>
  <?php else : ?>
    <p>Belum ada diskusi.</p>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>