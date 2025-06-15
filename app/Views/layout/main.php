<!DOCTYPE html>
<html lang="en" data-bs-theme="<?= session()->get('theme') ?? 'light' ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="X-CSRF-TOKEN" content="<?= csrf_token() ?>">
  <title><?= $title ?? 'Komunitas Online' ?></title>
  <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/95/three.min.js"></script>
</head>

<body>

  <?php
  $uri = service('uri');
  $segment1 = $uri->getSegment(1);
  ?>
  <!-- Tombol Burger -->
  <button id="burgerToggle" class="burger-btn" onclick="toggleSidebar()">
    <i id="burgerIcon" class="bi bi-list"></i>
  </button>

  <!-- Sidebar -->
  <aside id="sidebar">
    <div class="d-flex justify-content-center align-items-center mb-1">
      <h4 class="mb-1">Komunitas</h4>
    </div>
    <hr>
    <a href="<?= base_url('/') ?>" class="<?= $segment1 === '' ? 'active' : '' ?>">Home</a>
    <a href="<?= base_url('/forum') ?>" class="<?= $segment1 === 'forum' ? 'active' : '' ?>">Forum</a>
    <a href="<?= base_url('/anggota') ?>" class="<?= $segment1 === 'anggota' ? 'active' : '' ?>">Anggota</a>
    <a href="<?= base_url('/tentang') ?>" class="<?= $segment1 === 'tentang' ? 'active' : '' ?>">About</a>
    <a href="<?= base_url('game') ?>" class="<?= $segment1 === 'admin' ? 'active' : '' ?>">Games</a>

    <?php if (session()->get('logged_in')): ?>
      <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('dashboard') ?>" class="<?= $segment1 === 'admin' ? 'active' : '' ?>">Dashboard</a>
      <?php endif; ?>
      <a href="<?= base_url('/logout') ?>">Logout</a>
    <?php else: ?>
      <a href="<?= base_url('/login') ?>" class="<?= $segment1 === 'login' ? 'active' : '' ?>">Login</a>
    <?php endif ?>

    <!-- Theme Switcher -->
    <button id="toggle-theme" class="btn btn-sm btn-secondary mt-3">
      <i class="bi bi-sun"></i> Theme
    </button>

    <!-- Notifikasi (Hanya jika login) -->
    <?php if (session()->get('logged_in')): ?>
      <!-- Tombol Notifikasi -->
      <!-- <div class="dropdown me-3">
        <button id="notifBtn" class="btn btn-outline-primary position-relative dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-bell"></i>
          <span id="notifCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
        </button> -->

      <!-- Dropdown Menu Notifikasi -->
      <!-- <ul id="notifList" class="dropdown-menu dropdown-menu-end p-0" style="width: 320px; max-height: 400px; overflow-y: auto;">
          <li class="list-group-item text-center text-muted">Memuat notifikasi...</li>
        </ul>
      </div> -->

      <!-- Avatar -->
      <a class="nav-item mt-3 text-center" href="<?= base_url('profile') ?>">
        <?php
        $avatar = session()->get('avatar');
        $avatarPath = $avatar && file_exists(FCPATH . 'uploads/avatars/' . $avatar)
          ? 'uploads/avatars/' . $avatar
          : 'uploads/avatars/default-avatar.png';
        ?>
        <img src="<?= base_url($avatarPath) ?>" class="rounded-circle" width="50" height="50" alt="My Profile">
      </a>
    <?php endif; ?>
  </aside>

  <!-- Konten Utama -->
  <main id="content">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    setTimeout(function() {
      const alert = document.querySelector('.alert');
      if (alert) {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }
    }, 2000);
  </script>

  <script>
    const avatarInput = document.querySelector('input[name="avatar"]');
    if (avatarInput) {
      avatarInput.addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function() {
          const imgPreview = document.querySelector('#avatar-preview');
          if (imgPreview) {
            imgPreview.src = reader.result;
          }
        };
        if (e.target.files[0]) {
          reader.readAsDataURL(e.target.files[0]);
        }
      });
    }
  </script>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const burgerIcon = document.getElementById('burgerIcon');
      const body = document.body;

      sidebar.classList.toggle('hidden');
      body.classList.toggle('sidebar-hidden');

      if (sidebar.classList.contains('hidden')) {
        burgerIcon.classList.remove('bi-x-lg');
        burgerIcon.classList.add('bi-list');
      } else {
        burgerIcon.classList.remove('bi-list');
        burgerIcon.classList.add('bi-x-lg');
      }
    }

    document.getElementById('toggle-theme').addEventListener('click', function() {
      const html = document.documentElement;
      const newTheme = html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-bs-theme', newTheme);

      fetch("<?= base_url('/theme/toggle') ?>", {
        method: "POST",
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          theme: newTheme
        })
      }).then(() => {
        // Optional: bisa tambahkan feedback ke user
      });
    });
  </script>

  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Di head atau sebelum penutup body -->
  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  <script>
    ScrollReveal({
      reset: false,
      distance: '50px',
      duration: 1000,
      easing: 'ease-in-out',
      delay: 100,
    });

    ScrollReveal().reveal('.hero-section', {
      origin: 'top'
    });
    ScrollReveal().reveal('.feature-card', {
      origin: 'bottom',
      interval: 150
    });
    ScrollReveal().reveal('.latest-forum', {
      origin: 'left',
      interval: 100
    });
    ScrollReveal().reveal('.quote-section', {
      origin: 'right'
    });
  </script>
</body>

</html>