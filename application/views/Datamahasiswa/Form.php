<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data <?= $kriteria['nama_kriteria'] ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Masukkan <?= $kriteria['nama_kriteria'] ?></label>
                        <input type="text" name="value" id="value" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Masukkan Dokumen Pendukung <?= $kriteria['nama_kriteria'] ?></label>
                        <input type="file" name="dokumen" id="dokumen" class="form-control" value="">
                    </div>
                    <input type="text" name="id_mahasiswa" id="id_mahasiswa" class="form-control" value="<?= $mahasiswa['id_mahasiswa'] ?>" hidden>
                    <input type="text" name="id_kriteria" id="id_kriteria" class="form-control" value="<?= $kriteria['id_kriteria'] ?>" hidden>
                    <div class="row">
                        <button type="submit" class="btn btn-primary mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->