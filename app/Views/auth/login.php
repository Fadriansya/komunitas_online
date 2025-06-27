<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-center align-items-center vh-100 bg-body">
  <div class="card shadow-lg rounded-2 p-4" style="max-width: 400px; width: 100%;">
    <!-- Flash Error -->
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger mb-3" role="alert">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <h3 class="text-center mb-4">Login</h3>

    <form action="<?= base_url('login') ?>" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          class="form-control"
          placeholder="name@gmail.com"
          required
          value="<?= old('email') ?>">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          class="form-control"
          placeholder="Password"
          required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <div class="text-center mt-3">
      <small>Belum punya akun? <a href="<?= base_url('register') ?>">Daftar</a></small>
    </div>
  </div>
</div>

<?= $this->endSection() ?>