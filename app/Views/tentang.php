<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<section class="py-5 text-light bg-dark">
  <div class="container">
    <h2 class="mb-4 text-center">Tentang Komunitas Kami</h2>
    <p class="lead text-center">Komunitas ini dibuat sebagai wadah berkumpulnya para penggiat teknologi, programmer, dan kreator digital di Universitas Bina Sarana Informatika.</p>
    <hr class="bg-secondary my-4">
    <div class="row">
      <div class="col-md-6">
        <h5>Misi Kami</h5>
        <ul>
          <li class="list-about">Meningkatkan kemampuan melalui diskusi dan kolaborasi.</li>
          <li class="list-about">Membangun relasi antar anggota komunitas.</li>
          <li class="list-about">Berbagi pengetahuan dan sumber daya yang bermanfaat.</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h5>Kenapa Bergabung?</h5>
        <p>Dengan bergabung, kamu akan menjadi bagian dari jaringan komunitas yang saling mendukung dan aktif. Kami percaya bahwa setiap orang bisa tumbuh bersama komunitas yang positif.</p>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>