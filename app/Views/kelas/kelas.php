<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-university"></i> Data Kelas</h1>

<div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/kelas/tambah" class="btn btn-default"><i class="fa fa-plus mr-1"></i>Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Kompetensi Keahlian</th>
                        <th scope="col" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $k['nama_kelas']; ?></td>
                            <td><?= $k['kompetensi_keahlian']; ?></td>
                            <td class="text-center">
                                <a href="/kelas/ubah/<?= $k['id_kelas']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a> |
                                <a href="/kelas/hapus/<?= $k['id_kelas']; ?>" class="btn btn-danger btn-hapus btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>