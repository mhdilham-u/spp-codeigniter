<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-graduation-cap"></i> Tambah Data Kelas</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="text-header text-gray-800 text-center"><i class="fa fa-plus mr-1"></i> Form Tambah Data Kelas</h4>
            </div>
            <div class="card-body">
                <form action="/kelas/simpankelas" method="post">
                    <?= csrf_field(); ?>
                    <div class="col-lg-7 m-auto">
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="namakelas">
                                    <option value="X RPL 1">X RPL 1</option>
                                    <option value="X RPL 2">X RPL 2</option>
                                    <option value="X RPL 3">X RPL 3</option>
                                    <option value="XI RPL 1">XI RPL 1</option>
                                    <option value="XI RPL 2">XI RPL 2</option>
                                    <option value="XI RPL 3">XI RPL 3</option>
                                    <option value="XII RPL 1">XII RPL 1</option>
                                    <option value="XII RPL 2">XII RPL 2</option>
                                    <option value="XII RPL 3">XII RPL 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-4 col-form-label">Kompetensi Keahlian :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="jurusan">
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Kimia Industri">Kimia Industri</option>
                                    <option value="Kimia Analis">Kimia Analis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-default"><i class="fa fa-plus mr-1"></i>Tambah</button>
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