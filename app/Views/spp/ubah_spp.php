<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-graduation-cap"></i> Ubah Data SPP</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-header text-gray-800 text-center"><i class="fa fa-plus mr-1"></i> Form Ubah Data SPP</h4>
            </div>
            <div class="card-body">
                <form action="/spp/ubahspp/<?= $spp['id_spp']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="col-lg-6 m-auto">
                        <div class="form-group row">
                            <label for="tahun" class="col-sm-3 col-form-label">Tahun :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-tambah-siswa <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" value="<?= (old('tahun')) ? old('tahun') : $spp['tahun']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tahun'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nominal" class="col-sm-3 col-form-label">Nominal :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-tambah-siswa <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" id="nominal" name="nominal" value="<?= (old('nominal')) ? old('nominal') : $spp['nominal']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nominal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-default"><i class="fa fa-plus mr-1"></i>Ubah</button>
                                <a href="/spp" class="btn btn-danger float-left mr-2"><i class="fa fa-sign-out-alt mr-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>