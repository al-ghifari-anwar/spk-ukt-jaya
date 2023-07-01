<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col-6 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?= $action ?>" method="POST">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $user['email_user'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama_user'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="kaprodi">Kaprodi</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
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