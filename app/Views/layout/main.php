<!DOCTYPE html>
<html lang="en" data-bs-theme="<?= session()->get('theme') ?? 'light' ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'Komunitas Online' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

    #sidebar {
      width: 200px;
      background-color: var(--bs-body-bg);
      padding: 1rem;
      color: var(--bs-body-color);
      position: sticky;
      top: 0;
      height: 100vh;
      z-index: 1040;
      transition: transform 0.3s ease-in-out;
    }

    #sidebar h4 {
      margin-left: 30px;
    }

    #sidebar a {
      color: inherit;
      display: block;
      padding: 10px;
      text-decoration: none;
    }

    #sidebar a:hover {
      background-color: var(--bs-secondary-bg);
      border-radius: 5px;
    }

    #sidebar.hidden {
      transform: translateX(-100%);
      position: fixed;
      left: 0;
      top: 0;
    }

    .burger-btn {
      position: fixed;
      top: 7px;
      left: 10px;
      z-index: 1050;
      background: none;
      border: none;
      font-size: 1.8rem;
      color: var(--bs-secondary);
    }

    .burger-btn :hover {
      cursor: pointer;
      color: var(--bs-primary);
    }

    #content {
      flex-grow: 1;
      height: 100vh;
      padding: 1rem;
      transition: margin-left 0.3s ease-in-out;
      margin-left: 10px;
    }

    .sidebar-hidden #content {
      margin-left: 0;
    }

    @media (max-width: 768px) {
      #content {
        margin-left: 0;
      }

      #sidebar {
        position: fixed;
        height: 100%;
      }
    }
  </style>
</head>

<body>
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
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('/forum') ?>">Forum</a>
    <a href="<?= base_url('/anggota') ?>">Anggota</a>
    <a href="<?= base_url('/tentang') ?>">Tentang</a>
    <?php if (session()->get('logged_in')): ?>
      <a href="<?= base_url('/logout') ?>">Logout</a>
    <?php else: ?>
      <a href="<?= base_url('/login') ?>">Login</a>
      <a href="<?= base_url('/register') ?>">Daftar</a>
    <?php endif ?>
    <button id="toggle-theme" class="btn btn-sm btn-secondary mt-3">
      <i class="bi bi-circle-half"></i> Theme
    </button>
  </aside>

  <!-- Konten Utama -->
  <main id="content">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>

</html>