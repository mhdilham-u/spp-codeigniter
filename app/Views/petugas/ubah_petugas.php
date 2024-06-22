<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-users"></i> Ubah Data Petugas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-header text-gray-800 text-center"><i class="fa fa-edit mr-1"></i> Form Ubah Data Petugas</h4>
            </div>
            <div class="card-body">
                <form action="/petugas/ubahpetugas/<?= $petugas['id_petugas']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="fotoLamaPetugas" value="<?= $petugas['fotopetugas']; ?>">
                    <div class="col-lg-7 m-auto">
                        <div class="form-group row">
                            <label for="namapetugas" class="col-sm-4 col-form-label">Nama Petugas :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-tambah-siswa <?= ($validation->hasError('namapetugas')) ? 'is-invalid' : ''; ?>" id="namapetugas" name="namapetugas" value="<?= (old('namapetugas')) ? old('namapetugas') : $petugas['nama_petugas']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namapetugas'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-tambah-siswa <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $petugas['username']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-tambah-siswa <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>" placeholder="masukkan password baru">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ulangipassword" class="col-sm-4 col-form-label">Ulangi Password :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control form-tambah-siswa <?= ($validation->hasError('ulangipassword')) ? 'is-invalid' : ''; ?>" id="ulangipassword" name="ulangipassword" value="<?= old('ulangipassword'); ?>" placeholder="ulangi password baru">
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
                                    <option value="admin" <?= ($petugas['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option value="petugas" <?= ($petugas['level'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                                    <option value="siswa" <?= ($petugas['level'] == 'siswa') ? 'selected' : ''; ?>>Siswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-4 col-form-label">Foto :</label>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('fotopetugas')) ? 'is-invalid' : ''; ?>" id="foto" name="fotopetugas" value="<?= (old('fotopetugas')) ? old('fotopetugas') : $petugas['fotopetugas']; ?>" onchange="getFoto()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fotopetugas'); ?>
                                    </div>
                                    <label class="custom-file-label" for="customFile"><?= $petugas['fotopetugas']; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-default"><i class="fa fa-edit mr-1"></i>Ubah</button>
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