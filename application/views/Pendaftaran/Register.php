<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pendaftaran</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9">
                <?php if ($this->session->flashdata('fail')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                        <strong>Alert!</strong> <?= $this->session->flashdata('fail') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Masukkan Data Anda!</h1>
                                    </div>
                                    <form class="user" action="<?= base_url('daftar/') . $nim ?>" method="POST">
                                        <div class="form-group">
                                            <label for="">NIM :</label>
                                            <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?= $nim ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email :</label>
                                            <input type="email" class="form-control" placeholder="Nomor Induk Mahasiswa" name="email" value="<?= $nim ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Lengkap :</label>
                                            <input type="text" class="form-control" name="nama" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat :</label>
                                            <textarea type="text" class="form-control" name="alamat" value="">
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Prodi :</label>
                                            <select name="id_prodi" class="form-control">
                                                <?php foreach ($prodi as $data) : ?>
                                                    <option value="<?= $data['id_prodi'] ?>"><?= $data['nama_prodi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password :</label>
                                            <input type="password" class="form-control" name="password" value="">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>

</body>

</html>