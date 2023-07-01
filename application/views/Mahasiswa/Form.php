<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beasiswa</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" method="POST">
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $mahasiswa['nama_mahasiswa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">NIM Mahasiswa</label>
                        <input type="text" name="nim" id="nim" class="form-control" value="<?= $mahasiswa['nim_mahasiswa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Mahasiswa</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control">
<?= $mahasiswa['nama_mahasiswa'] ?>
                        </textarea>
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