<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-history mr-1"></i> History Pembayaran SPP</h1>

<?php if ((session()->get('level') == 'admin') || (session()->get('level') == 'petugas')) : ?>
    <div class="alert alert-primary" role="alert">
        NB : Untuk melakukan pembayaran masukkan NIS siswa terlebih dahulu!
    </div>
    <div class="card py-2">
        <div class="card-body">
            <div class="col-md-5">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="number" class="form-control" name="nis" placeholder="Cari berdasarkan NIS">
                        <div class="input-group-append">
                            <button class="btn btn-search" type="submit"><i class="fas fa-search fa-sm"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->get('level') == 'siswa') : ?>
    <?php
    $nis = session()->get('nis');
    $siswa = $data->db->table('siswa')
        ->join('kelas', 'kelas.id_kelas=siswa.id_kelas')
        ->where(['nis' => "$nis"])
        ->get()->getResultArray();
    ?>
    <?php foreach ($siswa as $row) : ?>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="text-header"><i class="fa fa-graduation-cap mr-1"></i> Biodata Siswa</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4 text-center">
                        <img src="/img/siswa/<?= $row['foto']; ?>" alt="Image Siswa" class="img-siswa">
                    </div>
                    <div class="col-lg-5">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"></li>
                            <li class="list-group-item"><b>NISN</b><span class="float-right"><?= $row['nisn']; ?></span>
                            </li>
                            <li class="list-group-item"><b>NIS</b> <span class="float-right"><?= $row['nis']; ?></span></li>
                            <li class="list-group-item"><b>Nama</b> <span class="float-right"><?= $row['nama']; ?></span></li>
                            <li class="list-group-item"><b>Alamat</b> <span class="float-right"><?= $row['alamat']; ?></span></li>
                            <li class="list-group-item"><b>No Telp</b> <span class="float-right"><?= $row['no_telp']; ?></span></li>
                            <li class="list-group-item"><b>Kelas</b> <span class="float-right"><?= $row['nama_kelas']; ?></span></li>
                            <li class="list-group-item"><b>Jurusan</b> <span class="float-right"><?= $row['kompetensi_keahlian']; ?></span></li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-header"><i class="fa fa-paper-plane mr-1"></i> History Pembayaran SPP</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col">Nama Petugas</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Tgl Bayar</th>
                                        <th scope="col">No Bayar</th>
                                        <th scope="col">Jumlah Bayar</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $spp = $db->table('pembayaran')
                                        ->join('petugas', 'petugas.id_petugas=pembayaran.id_petugas')
                                        ->where(['nisn' => $row['nisn']])
                                        ->get()->getResultArray();
                                    foreach ($spp as $p) :
                                    ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++; ?></th>
                                            <td><?= $p['nama_petugas']; ?></td>
                                            <td><?= $p['bulan']; ?></td>
                                            <td><?= $p['tahun']; ?></td>
                                            <td><?= $p['nisn']; ?></td>
                                            <td><?= $p['tgl_bayar']; ?></td>
                                            <td><?= $p['no_bayar']; ?></td>
                                            <td>Rp. <?= $p['jumlah_bayar']; ?></td>
                                            <td><span class="badge badge-success"><?= $p['status']; ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<?php if (isset($_GET['nis'])) : ?>
    <?php
    $keyword = $_GET['nis'];
    $siswa = $data->db->table('siswa')
        ->join('kelas', 'kelas.id_kelas=siswa.id_kelas')
        ->where(['nis' => $keyword])
        ->get()->getResultArray();
    ?>
    <?php foreach ($siswa as $row) : ?>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="text-header"><i class="fa fa-graduation-cap mr-1"></i> Biodata Siswa</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4 text-center">
                        <img src="/img/siswa/<?= $row['foto']; ?>" alt="Image Siswa" class="img-siswa">
                    </div>
                    <div class="col-lg-5">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"></li>
                            <li class="list-group-item"><b>NISN</b><span class="float-right"><?= $row['nisn']; ?></span>
                            </li>
                            <li class="list-group-item"><b>NIS</b> <span class="float-right"><?= $row['nis']; ?></span></li>
                            <li class="list-group-item"><b>Nama</b> <span class="float-right"><?= $row['nama']; ?></span></li>
                            <li class="list-group-item"><b>Alamat</b> <span class="float-right"><?= $row['alamat']; ?></span></li>
                            <li class="list-group-item"><b>No Telp</b> <span class="float-right"><?= $row['no_telp']; ?></span></li>
                            <li class="list-group-item"><b>Kelas</b> <span class="float-right"><?= $row['nama_kelas']; ?></span></li>
                            <li class="list-group-item"><b>Jurusan</b> <span class="float-right"><?= $row['kompetensi_keahlian']; ?></span></li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-header"><i class="fa fa-paper-plane mr-1"></i> History Pembayaran SPP</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col">Nama Petugas</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Tgl Bayar</th>
                                        <th scope="col">No Bayar</th>
                                        <th scope="col">Jumlah Bayar</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $spp = $db->table('pembayaran')
                                        ->join('petugas', 'petugas.id_petugas=pembayaran.id_petugas')
                                        ->where(['nisn' => $row['nisn']])
                                        ->get()->getResultArray();
                                    foreach ($spp as $p) :
                                    ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++; ?></th>
                                            <td><?= $p['nama_petugas']; ?></td>
                                            <td><?= $p['bulan']; ?></td>
                                            <td><?= $p['tahun']; ?></td>
                                            <td><?= $p['nisn']; ?></td>
                                            <td><?= $p['tgl_bayar']; ?></td>
                                            <td><?= $p['no_bayar']; ?></td>
                                            <td>Rp. <?= $p['jumlah_bayar']; ?></td>
                                            <td><span class="badge badge-success"><?= $p['status']; ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?= $this->endSection(); ?>