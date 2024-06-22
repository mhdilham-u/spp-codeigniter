<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-graduation-cap"></i> Ubah Data Kelas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-header text-gray-800 text-center"><i class="fa fa-edit mr-1"></i> Form Tambah Data Kelas</h4>
            </div>
            <div class="card-body">
                <form action="/kelas/ubahkelas/<?= $kelas['id_kelas']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="col-lg-7 m-auto">
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="namakelas">
                                    <option value="X RPL 1" <?= ($kelas['nama_kelas'] == 'X RPL 1') ? 'selected' : ''; ?>>X RPL 1</option>
                                    <option value="X RPL 2" <?= ($kelas['nama_kelas'] == 'X RPL 2') ? 'selected' : ''; ?>>X RPL 2</option>
                                    <option value="X RPL 3" <?= ($kelas['nama_kelas'] == 'X RPL 3') ? 'selected' : ''; ?>>X RPL 3</option>
                                    <option value="XI RPL 1" <?= ($kelas['nama_kelas'] == 'XI RPL 1') ? 'selected' : ''; ?>>XI RPL 1</option>
                                    <option value="XI RPL 2" <?= ($kelas['nama_kelas'] == 'XI RPL 2') ? 'selected' : ''; ?>>XI RPL 2</option>
                                    <option value="XI RPL 3" <?= ($kelas['nama_kelas'] == 'XI RPL 3') ? 'selected' : ''; ?>>XI RPL 3</option>
                                    <option value="XII RPL 1" <?= ($kelas['nama_kelas'] == 'XII RPL 1') ? 'selected' : ''; ?>>XII RPL 1</option>
                                    <option value="XII RPL 2" <?= ($kelas['nama_kelas'] == 'XII RPL 2') ? 'selected' : ''; ?>>XII RPL 2</option>
                                    <option value="XII RPL 3" <?= ($kelas['nama_kelas'] == 'XII RPL 3') ? 'selected' : ''; ?>>XII RPL 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-4 col-form-label">Kompetensi Keahlian :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="jurusan">
                                    <option value="Rekayasa Perangkat Lunak" <?= ($kelas['kompetensi_keahlian'] == 'Rekayasa Perangkat Lunak') ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
                                    <option value="Multimedia" <?= ($kelas['kompetensi_keahlian'] == 'Multimedia') ? 'selected' : ''; ?>>Multimedia</option>
                                    <option value="Kimia Industri" <?= ($kelas['kompetensi_keahlian'] == 'Kimia Industri') ? 'selected' : ''; ?>>Kimia Industri</option>
                                    <option value="Kimia Analis" <?= ($kelas['kompetensi_keahlian'] == 'Kimia Analis') ? 'selected' : ''; ?>>Kimia Analis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-default"><i class="fa fa-edit mr-1"></i>Ubah</button>
                                <a href="/kelas" class="btn btn-danger float-left mr-2"><i class="fa fa-sign-out-alt mr-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>