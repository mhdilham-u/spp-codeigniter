<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-users"></i> Tambah Data Petugas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-header text-gray-800 text-center"><i class="fa fa-plus mr-1"></i> Form Tambah Data Petugas</h4>
            </div>
            <div class="card-body">
                <form action="/petugas/simpanpetugas" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="col-lg-7 m-auto">
                        <div class="form-group row">
                            <label for="namapetugas" class="col-sm-4 col-form-label">Nama Petugas :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-tambah-siswa <?= ($validation->hasError('namapetugas')) ? 'is-invalid' : ''; ?>" id="namapetugas" name="namapetugas" value="<?= old('namapetugas'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namapetugas'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-tambah-siswa <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-tambah-siswa <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ulangipassword" class="col-sm-4 col-form-label">Ulangi Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-tambah-siswa <?= ($validation->hasError('ulangipassword')) ? 'is-invalid' : ''; ?>" id="ulangipassword" name="ulangipassword" value="<?= old('ulangipassword'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ulangipassword'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Level :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="level">
                                    <option>--- Pilih Level ---</option>
                                    <option value="admin" <?= (old('level') == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="petugas" <?= (old('level') == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                                    <option value="siswa" <?= (old('level') == 'siswa') ? 'selected' : ''; ?>>Siswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label">Foto :</label>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('fotopetugas')) ? 'is-invalid' : ''; ?>" id="foto" name="fotopetugas" onchange="getFoto()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fotopetugas'); ?>
                                    </div>
                                    <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-default"><i class="fa fa-plus mr-1"></i>Tambah</button>
                                <a href="/petugas" class="btn btn-danger float-left mr-2"><i class="fa fa-sign-out-alt mr-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>