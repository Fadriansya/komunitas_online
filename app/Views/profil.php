<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h2 class="mb-4">Profil Saya</h2>
<div class="row g-4">
  <div class="col-md-4 text-center">
    <img src="<?= base_url('assets/img/user-default.png') ?>" alt="Foto Profil" class="img-fluid rounded-circle mb-3" width="150">
    <h5>Nama Pengguna</h5>
    <p class="text-muted">email@domain.com</p>
    <button class="btn btn-outline-light btn-sm mt-2">Ubah Foto</button>
  </div>
  <div class="col-md-8">
    <form>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control bg-dark text-light border-secondary" id="nama" placeholder="Nama Lengkap">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control bg-dark text-light border-secondary" id="email" placeholder="Email">
      </div>
      <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea class="form-control bg-dark text-light border-secondary" id="bio" rows="4" placeholder="Ceritakan sedikit tentang dirimu"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>