<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
  <!-- Pesan jika ada flash data sukses -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <!-- Judul Halaman -->
  <h2 class="text-center mb-4">Daftar Anggota Komunitas</h2>

  <!-- Tabel Daftar Anggota -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Nama Pengguna</th>
        <th>Email</th>
        <th>Tanggal Bergabung</th>
      </tr>
    </thead>
    <tbody>
      <!-- Loop untuk menampilkan anggota -->
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= esc($user['username']); ?></td>
          <td><?= esc($user['email']); ?></td>
          <td><?= esc($user['created_at']); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>