<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <!-- Flash Error -->
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <div class="card shadow-lg">
        <div class="card-body">
          <h3 class="card-title text-center mb-4">Daftar Akun Baru</h3>
          <form action="<?= base_url('register/save') ?>" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Hanya alfanumerik" required value="<?= old('username') ?>">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email (harus @gmail.com)</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com" required value="<?= old('email') ?>">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Minimal 5 karakter" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>