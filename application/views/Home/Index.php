<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <?php if ($this->session->userdata('level_user') == 'mahasiswa') : ?>
            <a href="<?= base_url('datamahasiswa') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-file fa-sm text-white-50"></i> Lengkapi Data Sekarang</a>
        <?php endif; ?>
    </div>

    <?php if ($this->session->userdata('level_user') == 'admin' || $this->session->userdata('level_user') == 'kaprodi') : ?>
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Beasiswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlBea['jml'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Mahasiswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlMhs['jml'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('level_user') == 'mahasiswa') : ?>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h5>Perhatian!</h5>
                        <ul>
                            <li>Sebelum mengisi data, harap siapkan dokumen pendukung dari setiap poin</li>
                            <li>Pengumuman hasil pendaftaran akan diinformasikan melalui email masing masing mahasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h5>Dokumen Pendukung:</h5>
                        <ul style="list-style-type: none; margin: 0; padding: 0;">
                            <?php foreach ($kriteria as $krit) : ?>
                                <li>
                                    <?php
                                    $cek = $this->db->get_where('tb_data_mahasiswa', ['id_mahasiswa' => $mahasiswa['id_mahasiswa'], 'id_kriteria' => $krit['id_kriteria']])->row_array();
                                    ?>
                                    <?php if ($cek) : ?>
                                        <i class="fas fa-check text-success">&nbsp;</i>
                                    <?php endif; ?>
                                    <?php if (!$cek) : ?>
                                        <i class="fas fa-times text-danger">&nbsp;</i>
                                    <?php endif; ?>
                                    <?= $krit['nama_kriteria'] ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <br>
                        <?php
                        $cekFull = $this->db->get_where('tb_data_mahasiswa', ['id_mahasiswa' => $mahasiswa['id_mahasiswa']])->row_array();
                        $jml = $this->db->query("SELECT COUNT(*) AS jml FROM tb_data_mahasiswa WHERE id_mahasiswa = " . $mahasiswa['id_mahasiswa'])->row_array();
                        ?>

                        <?php if ($cekFull) : ?>
                            <?php if (count($cekFull) == $jml['jml']) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <p><b>Data anda sudah lengkap, semoga anda bisa lolos jangan lupa berdoa dan ikhtiar</b></p>
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>

                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->