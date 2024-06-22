<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user mr-1"></i> Profile - <?= session()->get('nama_petugas'); ?></h1>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters profile">
        <div class="col-md-4 p-3">
            <img src="/img/petugas/<?= session()->get('foto'); ?>" class="card-img rounded-circle" alt="Profile Image">
        </div>
        <div class="col-md-8 p-3">
            <div class="card-body middle">
                <h5 class="card-title"><?= session()->get('nama_petugas'); ?></h5>
                <p class="card-text"><span class="badge badge-pill badge-success"><?= session()->get('level'); ?></span></p>
                <p class="card-text">Hi, my name is <?= session()->get('username'); ?></p>
                <p class="card-text"><small class="text-muted"></small></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>