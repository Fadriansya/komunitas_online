<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card bg-dark border-secondary text-light">
      <div class="card-body">
        <h3 class="mb-4 text-center">Login</h3>
        <form>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control bg-dark text-light border-secondary" id="email" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control bg-dark text-light border-secondary" id="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
        <p class="mt-3 text-center">Belum punya akun? <a href="<?= base_url('register') ?>" class="text-decoration-none">Daftar</a></p>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>