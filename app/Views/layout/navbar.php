<nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-black shadow">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>">KomunitasKu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mb-2">
        <li class="nav-item">
          <a class="nav-link nav-btn mx-3" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-btn mx-3" href="/forum">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-btn mx-3" href="/anggota">Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-btn mx-3" href="/tentang">Tentang</a>
        </li>
      </ul>

      <!-- Dark/Light Mode Switch -->
      <button id="toggle-theme" class="theme-toggle-btn ms-1" title="Toggle Dark/Light">
        <i class="bi bi-moon"></i>
      </button>
      <!-- End Dark/Light Mode Switch -->
      <div class="d-flex align-items-center">
        <!-- Cek apakah pengguna sudah login -->
        <?php if (session()->get('logged_in')) : ?>
          <a href="<?= base_url('logout') ?>" class="btn btn-secondary">Logout</a>
        <?php else : ?>
          <a href="<?= base_url('login') ?>" class="btn btn-secondary me-2">Login</a>
          <a href="<?= base_url('register') ?>" class="btn btn-secondary">Daftar</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>