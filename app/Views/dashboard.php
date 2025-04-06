<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row g-4">
  <div class="col-md-4">
    <div class="card text-bg-dark h-100 border border-secondary shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-chat-dots me-2"></i>Forum Diskusi</h5>
        <p class="card-text">Temukan dan buat topik menarik untuk didiskusikan bersama komunitas.</p>
        <a href="<?= base_url('forum') ?>" class="stretched-link"></a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-bg-dark h-100 border border-secondary shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Anggota</h5>
        <p class="card-text">Lihat siapa saja yang menjadi bagian dari komunitas dan jalin koneksi.</p>
        <a href="<?= base_url('anggota') ?>" class="stretched-link"></a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-bg-dark h-100 border border-secondary shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="bi bi-person-circle me-2"></i>Profil Saya</h5>
        <p class="card-text">Kelola informasi pribadi dan preferensi komunitas kamu.</p>
        <a href="<?= base_url('profil') ?>" class="stretched-link"></a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>