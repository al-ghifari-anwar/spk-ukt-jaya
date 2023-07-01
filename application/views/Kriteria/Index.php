<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('fail')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> <?= $this->session->flashdata('fail') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('add-kriteria') ?>" class="btn btn-primary float-right">Tambah Data <i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kriteria as $data) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kode_kriteria'] ?></td>
                                <td><?= $data['nama_kriteria'] ?></td>
                                <td>
                                    <a href="<?= base_url('detailkriteria/') . $data['id_kriteria'] ?>" class="btn btn-success" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a href="<?= base_url('update-kriteria/' . $data['id_kriteria']) ?>" class="btn btn-primary" title="Ubah"><i class="fas fa-pen"></i></a>
                                    <a href="<?= base_url('delete-kriteria/' . $data['id_kriteria']) ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin akan menghapus data?')"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->