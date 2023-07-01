<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Beasiswa</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" method="POST">
                    <div class="form-group">
                        <label for="">Kriteria</label>
                        <select name="id_kriteria" id="id_kriteria" class="form-control">
                            <?php foreach ($kriteria as $data) : ?>
                                <option value="<?= $data['id_kriteria'] ?>" <?= ($detailbeasiswa['id_kriteria'] == $data['id_kriteria']) ? 'selected' : '' ?>><?= $data['nama_kriteria'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bobot</label>
                        <input type="text" name="bobot_beasiswa" id="bobot_beasiswa" class="form-control" value="<?= $detailbeasiswa['bobot_beasiswa'] ?>">
                    </div>
                    <input type="text" name="id_beasiswa" id="id_beasiswa" class="form-control" value="<?= $id_beasiswa ?>" hidden>
                    <div class="row">
                        <button type="submit" class="btn btn-primary mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->