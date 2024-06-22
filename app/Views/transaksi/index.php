<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="spp" data-spp="<?= session()->get('berhasil'); ?>"></div>
<div class="batal" data-batal="<?= session()->get('batal'); ?>"></div>
<div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-paper-plane mr-1"></i> Transaksi Pembayaran SPP</h1>
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

<?php if (isset($_GET['nis'])) : ?>
    <?php
    $keyword = $_GET['nis'];
    $siswa = $model->db->table('siswa')
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
                        <img src="/img/siswa/<?= $row['foto'] ?>" alt="Foto Siswa" class="img-siswa">
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
                        <h6 class="text-header"><i class="fa fa-plus mr-1"></i> Tambah Bulan Pembayaran</h6>
                    </div>
                    <div class="card-body">
                        <form action="/transaksi/tambahbulan/<?= $row['nis']; ?>" method="post">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <select class="form-control form-control-sm <?= ($validation->hasError('bulan')) ? 'is-invalid' : ''; ?>" name="bulan">
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bulan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <select class="form-control form-control-sm <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" name="tahun">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tahun'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="text-header"><i class="fa fa-paper-plane mr-1"></i> Tagihan SPP</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">Tgl Bayar</th>
                                        <th scope="col">No Bayar</th>
                                        <th scope="col">Jumlah Bayar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    // $spp = $db->query("SELECT pembayaran.*, siswa.* FROM pembayaran INNER JOIN siswa ON pembayaran.id_pembayaran=siswa.nisn WHERE nis=$row['nis");
                                    // $spp = $db->query("SELECT * FROM pembayaran WHERE nisn = $row[nisn]");
                                    $spp = $model->db->table('pembayaran')
                                        ->join('siswa', 'siswa.nisn=pembayaran.nisn')
                                        ->where(['siswa.nisn' => $row['nisn']])
                                        ->get()->getResultArray();
                                    foreach ($spp as $p) :
                                    ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++; ?></th>
                                            <td><?= $p['bulan']; ?></td>
                                            <td><?= $p['tahun']; ?></td>
                                            <td><?= $p['nisn']; ?></td>
                                            <td><?= $p['tgl_bayar']; ?></td>
                                            <td><?= $p['no_bayar']; ?></td>
                                            <td>Rp. <?= $p['jumlah_bayar']; ?></td>
                                            <td><span class="badge badge-success"><?= $p['status']; ?></span></td>
                                            <td class="text-center">
                                                <?php if ($p['no_bayar'] == '') : ?>
                                                    <a href="/transaksi/proses/<?= $row['nis']; ?>/<?= $p['id_pembayaran']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Bayar">Bayar</a> |
                                                    <a href="/transaksi/hapus/<?= $row['nis']; ?>/<?= $p['id_pembayaran']; ?>" class="btn btn-danger btn-hapus btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus">Hapus</a>
                                                <?php else : ?>
                                                    <a href="/transaksi/batal/<?= $p['no_bayar']; ?>/<?= $row['nis']; ?>" class="btn btn-danger btn-batal btn-sm" data-toggle="tooltip" data-placement="top" title="Batal"><i class="fa fa-times"></i> Batal</a> |
                                                    <a href="/transaksi/cetak/<?= $p['id_pembayaran']; ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fa fa-print"></i> Cetak</a>
                                                <?php endif; ?>
                                            </td>
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