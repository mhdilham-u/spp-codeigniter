<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-crown mr-1"></i> Selamat Datang!</h1>
<div class="alert alert-primary" role="alert">
    Hi, <b><?= session()->get('nama_petugas'); ?></b> anda berhasil login sebagai <b><?= session()->get('level'); ?></b>
</div>
<?= $this->endSection(); ?>