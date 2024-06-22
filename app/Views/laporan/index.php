<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-print mr-1"></i> Generate Laporan</h1>
<div class="col-lg-5">
    <ul class="list-group">
        <li class="list-group-item"> -> Laporan Data Siswa <a class="btn badge badge-primary float-right" href="/laporan/siswa" role="button">CETAK</a></li>
        <li class="list-group-item"> -> Laporan Data Kelas <a class="btn badge badge-primary float-right" href="/laporan/kelas" role="button">CETAK</a></li>
        <li class="list-group-item"> -> Laporan Data Petugas <a class="btn badge badge-primary float-right" href="/laporan/petugas" role="button">CETAK</a></li>
        <li class="list-group-item"> -> Laporan Pembayaran SPP (Lunas)<a class="btn badge badge-primary float-right" href="/laporan/spp" role="button">CETAK</a></li>
        <li class="list-group-item"> -> Laporan Pembayaran SPP (Belum Lunas) <a class="btn badge badge-primary float-right" href="/laporan/sppblmlunas" role="button">CETAK</a></li>
    </ul>
</div>
<?= $this->endSection(); ?>