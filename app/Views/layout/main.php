<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Komunitas Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <?= $this->include('layout/navbar') ?>
  <main class="container py-5">
    <?= $this->renderSection('content') ?>
  </main>
  <?= $this->include('auth/login') ?>
  <?= $this->include('auth/register') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toggleBtn = document.getElementById("toggle-theme");
      const icon = toggleBtn.querySelector("i");
      const navbar = document.getElementById("main-navbar");

      let currentTheme = localStorage.getItem("theme") || "dark";

      const applyTheme = (theme) => {
        document.documentElement.setAttribute("data-bs-theme", theme);
        icon.className = theme === "dark" ? "bi bi-sun" : "bi bi-moon";
        localStorage.setItem("theme", theme);

        // Update navbar classes
        if (theme === "dark") {
          navbar.classList.remove("navbar-light", "bg-light");
          navbar.classList.add("navbar-dark", "bg-black");
        } else {
          navbar.classList.remove("navbar-dark", "bg-black");
          navbar.classList.add("navbar-light", "bg-light");
        }
      };

      // Terapkan tema saat halaman dimuat
      applyTheme(currentTheme);

      toggleBtn.addEventListener("click", function() {
        currentTheme = currentTheme === "dark" ? "light" : "dark";
        applyTheme(currentTheme);
      });
    });
  </script>
  <script>
    ScrollReveal({
      distance: '50px',
      duration: 1000,
      easing: 'ease-in-out',
      origin: 'bottom',
      reset: false
    });
    ScrollReveal().reveal('h1, h2, h5, p, .card, .list-group-item, .btn, .list-about', {
      interval: 100
    });
  </script>
</body>

</html>