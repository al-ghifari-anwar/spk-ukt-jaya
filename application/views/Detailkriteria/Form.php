<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Kriteria</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" method="POST">
                    <div class="form-group">
                        <label for="">Batas Minimum</label>
                        <input type="text" name="min_value" id="min_value" class="form-control" value="<?= $detailkriteria['min_value'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Batas Maksimum</label>
                        <input type="text" name="max_value" id="max_value" class="form-control" value="<?= $detailkriteria['max_value'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Bobot</label>
                        <input type="text" name="bobot" id="bobot" class="form-control" value="<?= $detailkriteria['bobot_detail_kriteria'] ?>">
                    </div>
                    <input type="text" name="id_kriteria" id="id_kriteria" class="form-control" value="<?= $id_kriteria ?>" hidden>
                    <div class="row">
                        <button type="submit" class="btn btn-primary mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->