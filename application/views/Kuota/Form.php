<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kuota</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" method="POST">
                    <div class="form-group">
                        <label for="">Beasiswa</label>
                        <select name="id_beasiswa" class="form-control">
                            <?php foreach ($beasiswa as $bea) : ?>
                                <option value="<?= $bea['id_beasiswa'] ?>" <?= ($kuota['id_beasiswa'] == $bea['id_beasiswa']) ? 'selected' : '' ?>><?= $bea['nama_beasiswa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Prodi</label>
                        <select name="id_prodi" class="form-control">
                            <?php foreach ($prodi as $bea) : ?>
                                <option value="<?= $bea['id_prodi'] ?>" <?= ($kuota['id_prodi'] == $bea['id_prodi']) ? 'selected' : '' ?>><?= $bea['nama_prodi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kuota</label>
                        <input type="text" name="kuota" id="kuota" class="form-control" value="<?= $kuota['kuota'] ?>">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->