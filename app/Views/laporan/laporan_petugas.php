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
        b {
            display: block;
            margin-bottom: 25px !important;
        }

        .ttd {
            text-align: right;
            margin-left: -30px !important;
        }

        .text-ttd {
            margin-right: 40px !important;
        }

        @media print {
            .btn {
                display: none;
            }

            .ttd {
                text-align: right;
                margin-left: -30px !important;
            }

            .text-ttd {
                margin-right: 40px !important;
            }

            #debug-icon {
                display: none !important;
            }
        }
    </style>

</head>

<body>
    <div class="float-right d-flex flex-column mt-4">
        <a href="" onclick="window.print();" class="btn btn-secondary mr-5 mb-2"><i class="fa fa-print mr-1"></i>CETAK</a>
        <a href="/laporan" class="btn btn-danger mr-5"><i class="fa fa-times mr-1"></i>BATAL</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="row align-items-center">
                    <div class="col-6">
                        <img src="/img/img-smk.jpeg" alt="img-laporan" class="img-laporan">
                    </div>
                    <div class="col-6 text-laporan">
                        <b class="h3">
                            SMK NEGERI 4 BATAM <br> JL. BOUROQ NO. 1 TIBAN II PATAM LESTARI SEKUPANG KOTA BATAM
                        </b>
                    </div>
                </div>
                <h3 class="text-center my-4">LAPORAN DATA PETUGAS</h3>
                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" width="80">No</th>
                            <th scope="col" width="400">Nama Petugas</th>
                            <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $siswa = $db->query("SELECT * FROM petugas"); ?>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa->getResultArray() as $s) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i++; ?></th>
                                <td><?= $s['nama_petugas']; ?></td>
                                <td><?= $s['level']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ttd">
                <tr>
                    <td>KOTA BATAM,<span class="mr-2"></span> <?= date('d/m/Y'); ?></td>
                    <br />
                    <br />
                    <br />
                    <br />
                    <b class="text-ttd"><?= session()->get('nama_petugas'); ?></b>
                </tr>
            </div>
        </div>
    </div>
</body>

</html>