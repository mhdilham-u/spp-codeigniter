<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1 class="h3 mb-4 text-gray-800"><i class="fa fa-money-bill-alt"></i> Data SPP</h1>
<div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/spp/tambah" class="btn btn-default"><i class="fa fa-plus mr-1"></i>Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Nominal</th>
                        <th scope="col" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spp as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $s['tahun']; ?></td>
                            <td>Rp. <?= $s['nominal']; ?></td>
                            <td class="text-center">
                                <a href="/spp/ubah/<?= $s['id_spp']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a> |
                                <a href="/spp/hapus/<?= $s['id_spp']; ?>" class="btn btn-danger btn-hapus btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>