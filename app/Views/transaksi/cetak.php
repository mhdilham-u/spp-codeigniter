<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        @media print {
            .btn {
                display: none;
            }

            .ttd {
                margin-top: -150px;
                text-align: right;
            }
        }
    </style>
</head>

<body>
    <div class="float-right d-flex flex-column">
        <a href="" onclick="window.print();" class="btn btn-secondary mr-5 mb-2"><i class="fa fa-print mr-1"></i>CETAK</a>
        <a href="/transaksi?nis=<?= $d['nis']; ?>" class="btn btn-danger mr-5"><i class="fa fa-times mr-1"></i>BATAL</a>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <b class="h3">
                    SMK NEGERI 4 BATAM <br> JL. BOUROQ NO. 1 TIBAN II PATAM LESTARI <br> SEKUPANG KOTA BATAM
                </b>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <td>Sudah terima dari</td>
                            <td>:</td>
                            <td><b><?= $d['nama']; ?> / <?= $d['nis']; ?> / <?= $d['nama_kelas']; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no-border">No Kwitansi</td>
                            <td class="no-border">:</td>
                            <td class="no-border"><?= $d['no_bayar']; ?></td>
                        </tr>
                        <tr>
                            <td class="no-border">Banyak Uang</td>
                            <td class="no-border">:</td>
                            <td class="no-border"><?= $d['jumlah_bayar']; ?></td>
                        </tr>
                        <tr>
                            <td class="no-border">Terbilang</td>
                            <td class="no-border">:</td>
                            <td class="no-border"><b>dua ratus limah puluh ribu rupiah</b></td>
                        </tr>
                        <tr>
                            <td class="no-border"><b>Untuk Pembayaran</b></td>
                            <td class="no-border">:</td>
                            <td class="no-border"></td>
                        </tr>
                    </thead>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border"></th>
                            <th scope="col" class="no-border text-right">Billing</th>
                            <th scope="col" class="no-border text-right">Bayar</th>
                            <th scope="col" class="no-border text-right">Bantuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-pembayaran">
                            <td><?= strtoupper($d['bulan']); ?>-SPP</td>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <td class="text-right"><?= $d['nominal']; ?></td>
                            <td class="text-right"><?= $d['nominal']; ?></td>
                            <td class="text-right">0</td>
                        </tr>
                        <tr>
                            <td>JUMLAH</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"></td>
                            <td class="text-right"><?= $d['nominal']; ?></td>
                            <td class="text-right">0</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="no-border"></th>
                                    <th class="no-border"></th>
                                    <th class="no-border"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="no-border">Catatan</td>
                                    <td class="no-border">:</td>
                                    <td class="no-border">Pembayaran SPP paling lambat tgl 10 tiap bulannya & uang yang sudah <br> disetorkan TIDAK DAPAT DIKEMBALIKAN!</td>
                                </tr>
                                <tr>
                                    <td width="200px" class="no-border"><b>Jenis Pembayaran</b></td>
                                </tr>
                                <tr>
                                    <td class="no-border">
                                        <p>Tunai / Bank</p>
                                    </td>
                                    <td class="no-border">:</td>
                                    <td class="no-border">TUNAI</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4 ttd">
                        <tr>
                            <td>KOTA BATAM,<span class="mr-2"></span> <?= date('d/m/Y'); ?></td>
                            <br />
                            <br />
                            <br />
                            <br />
                            <b class="text-ttd mr-5"><?= session()->get('nama_petugas'); ?></b>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>