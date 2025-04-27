<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <h1>Kelola Users - Hanya Admin</h1>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= esc($user['username']) ?></td>
          <td><?= esc($user['email']) ?></td>
          <td>
            <a href="<?= base_url('delete-user/' . $user['id']) ?>"
              class="btn btn-danger btn-sm"
              onclick="return confirm('Yakin ingin menghapus user ini?');">
              Hapus
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>