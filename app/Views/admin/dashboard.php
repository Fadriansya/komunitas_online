<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
  <div class="row mb-4">
    <div class="col">
      <div class="card shadow-sm bg-primary text-white">
        <div class="card-body">
          <h1 class="card-title mb-0"><i class="bi bi-speedometer2"></i> Admin Dashboard</h1>
          <p class="card-text mt-2">Selamat datang, <b><?= esc(session()->get('username')) ?></b>!</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Statistik Card -->
  <div class="row mb-4">
    <div class="col-md-4 mb-2">
      <div class="card text-bg-info shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title mb-1"><i class="bi bi-people"></i> Total User</h5>
          <h2><?= $totalUser ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card text-bg-success shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title mb-1"><i class="bi bi-person-badge"></i> Total Admin</h5>
          <h2><?= $totalAdmin ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card text-bg-warning shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title mb-1"><i class="bi bi-chat-dots"></i> Total Forum</h5>
          <h2><?= $totalForum ?></h2>
        </div>
      </div>
    </div>
  </div>
  <!-- end card -->
  <div class="row mb-3">
    <div class="col">
      <h4 class="mb-3">Daftar User</h4>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= session()->getFlashdata('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Avatar</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($users)): ?>
              <?php $no = 1;
              foreach ($users as $u): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <img src="<?= base_url('uploads/avatars/' . ($u['avatar'] ?? 'default-avatar.png')) ?>" width="40" height="40" class="rounded-circle" alt="avatar">
                  </td>
                  <td><?= esc($u['username']) ?></td>
                  <td><?= esc($u['email']) ?></td>
                  <td>
                    <span class="badge <?= $u['role'] === 'admin' ? 'bg-success' : 'bg-secondary' ?>">
                      <?= esc($u['role']) ?>
                    </span>
                  </td>
                  <td>
                    <?php if ($u['role'] !== 'admin'): ?>
                      <form action="<?= base_url('admin/delete_user/' . $u['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="bi bi-trash"></i> Hapus
                        </button>
                      </form>
                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center">Belum ada user.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>