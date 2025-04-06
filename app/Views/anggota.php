<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h2 class="mb-4">Anggota Komunitas</h2>
<div class="row  justify-content-md-center mb-1 ">
  <div class="col-4 mb-4">
    <div class="card text-bg-dark border-secondary">
      <div class="card-body text-center">
        <img src="<?= base_url('assets/img/user-default.png') ?>" class="rounded-circle" width="80" alt="">
        <h6 class="mb-0">Aditya</h6>
        <small class="mb-0">Ketua</small>
      </div>
    </div>
  </div>
  <div class="col-4 mb-4">
    <div class="card text-bg-dark border-secondary">
      <div class="card-body text-center">
        <img src="<?= base_url('assets/img/user-default.png') ?>" class="rounded-circle" width="80" alt="">
        <h6 class="mb-0">Achmad</h6>
        <small class="mb-1">Anggota</small>
      </div>
    </div>
  </div>
  <div class="col-4 mb-4">
    <div class="card text-bg-dark border-secondary">
      <div class="card-body text-center">
        <img src="<?= base_url('/img/nasrullah.jpg') ?>" class="rounded-circle" width="80" alt="">
        <h6 class="mb-0">Nasrullah</h6>
        <small class="mb-1">Anggota</small>
      </div>
    </div>
  </div>
  <div class="col-4 mb-4">
    <div class="card text-bg-dark border-secondary">
      <div class="card-body text-center">
        <img src="<?= base_url('assets/img/user-default.png') ?>" class="rounded-circle" width="80" alt="">
        <h6 class="mb-0">Fitria</h6>
        <small class="mb-1">Anggota</small>
      </div>
    </div>
  </div>
  <div class="col-4 mb-4">
    <div class="card text-bg-dark border-secondary">
      <div class="card-body text-center">
        <img src="<?= base_url('assets/img/user-default.png') ?>" class="rounded-circle" width="80" alt="">
        <h6 class="mb-0">Elsa</h6>
        <small class="mb-1">Anggota</small>
      </div>
    </div>
  </div>
  <div class="col-4 mb-4">
    <div class="card text-bg-dark border-secondary">
      <div class="card-body text-center">
        <img src="<?= base_url('/img/florentina.jpg') ?>" class="rounded-circle" width="80" alt="">
        <h6 class="mb-0">Florentina</h6>
        <small class="mb-1">Anggota</small>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>