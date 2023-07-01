<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rangking Calon Penerima Beasiswa</h1>
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

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card shadow">
                <div class="card-body p-5">
                    <h5>Perhatian!</h5>
                    <ul>
                        <li>Mahasiswa akan mendapat email perihal diterima atau tidaknya dalam proses pendaftaran beasiswa setelah persetujuan Kaprodi</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card shadow">
                <div class="card-body p-5">
                    <h5>Pilih Prodi:</h5>
                    <form action="<?= $action ?>" method="POST">
                        <div class="form-group">
                            <select name="id_prodi" class="form-control">
                                <?php foreach ($prodi as $bea) : ?>
                                    <option value="<?= $bea['id_prodi'] ?>"><?= $bea['nama_prodi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary mx-auto">Lihat Rangking</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->