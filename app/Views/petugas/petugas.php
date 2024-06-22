<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-users"></i> Data Petugas</h1>
<div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/petugas/tambah" class="btn btn-default"><i class="fa fa-plus mr-1"></i>Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Level</th>
                        <th scope="col" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($petugas as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['username']; ?></td>
                            <td><?= $p['nama_petugas']; ?></td>
                            <td><?= $p['level']; ?></td>
                            <td class="text-center">
                                <a href="/petugas/ubah/<?= $p['id_petugas']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a> |
                                <a href="/petugas/hapus/<?= $p['id_petugas']; ?>" class="btn btn-danger btn-hapus btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>