<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
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
  <div class="card shadow-sm p-4">
    <div class="d-flex align-items-center">
      <?php
      $avatar = session()->get('avatar');
      $avatarPath = $avatar && file_exists(FCPATH . 'uploads/avatars/' . $avatar)
        ? 'uploads/avatars/' . $avatar
        : 'uploads/avatars/default-avatar.png';
      ?>
      <img src="<?= base_url($avatarPath) ?>" class="rounded-circle" width="100" height="100" alt="My Profile">
      <div class="ms-3">
        <h4><?= esc($user['username']) ?></h4>
        <p class="mb-1"><?= esc($user['email']) ?></p>
        <p class="mb-2 text-muted"><?= esc($user['role']) ?></p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profil</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post" enctype="multipart/form-data" action="<?= base_url('profile/update') ?>">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Foto Profil</label>
          <input type="file" name="avatar" class="form-control" accept="image/png, image/jpeg, image/jpg">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>