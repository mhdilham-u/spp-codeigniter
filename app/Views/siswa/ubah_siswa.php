<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-graduation-cap"></i> Ubah Data Siswa</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-header text-gray-800 text-center"><i class="fa fa-edit mr-1"></i> Form Ubah Data Siswa</h4>
            </div>
            <div class="card-body">
                <form action="/siswa/ubahsiswa/<?= $siswa['nis']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="fotoLama" value="<?= $siswa['foto']; ?>">
                    <div class="col-lg-6 m-auto">
                        <div class="form-group row">
                            <label for="nisn" class="col-sm-2 col-form-label">NISN :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-tambah-siswa <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" name="nisn" value="<?= (old('nisn')) ? old('nisn') : $siswa['nisn']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nisn'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nis" class="col-sm-2 col-form-label">NIS :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-tambah-siswa <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" id="nis" name="nis" value="<?= (old('nis')) ? old('nis') : $siswa['nis']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nis'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-tambah-siswa <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $siswa['nama']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kelas">
                                    <option value="1" <?= $siswa['id_kelas'] == '1' ? 'selected' : '' ?>>X RPL 1</option>
                                    <option value="2" <?= $siswa['id_kelas'] == '2' ? 'selected' : '' ?>>X RPL 2</option>
                                    <option value="3" <?= $siswa['id_kelas'] == '3' ? 'selected' : '' ?>>X RPL 3</option>
                                    <option value="5" <?= $siswa['id_kelas'] == '5' ? 'selected' : '' ?>>XI RPL 1</option>
                                    <option value="8" <?= $siswa['id_kelas'] == '8' ? 'selected' : '' ?>>XI RPL 2</option>
                                    <option value="9" <?= $siswa['id_kelas'] == '9' ? 'selected' : '' ?>>XI RPL 3</option>
                                    <option value="10" <?= $siswa['id_kelas'] == '10' ? 'selected' : '' ?>>XII RPL 1</option>
                                    <option value="11" <?= $siswa['id_kelas'] == '11' ? 'selected' : '' ?>>XII RPL 2</option>
                                    <option value="12" <?= $siswa['id_kelas'] == '12' ? 'selected' : '' ?>>XII RPL 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notelp" class="col-sm-2 col-form-label">No Telp :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-tambah-siswa <?= ($validation->hasError('notelp')) ? 'is-invalid' : ''; ?>" id="notelp" name="notelp" value="<?= (old('notelp')) ? old('notelp') : $siswa['no_telp']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('notelp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat"><?= (old('alamat')) ? old('alamat') : $siswa['alamat']; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto :</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" value="<?= (old('foto')) ? old('foto') : $siswa['foto']; ?>" onchange="getFoto()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto'); ?>
                                    </div>
                                    <label class="custom-file-label" for="customFile"><?= $siswa['foto']; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-default"><i class="fa fa-edit mr-1"></i>Ubah</button>
                                <a href="/siswa" class="btn btn-danger float-left mr-2"><i class="fa fa-sign-out-alt mr-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>