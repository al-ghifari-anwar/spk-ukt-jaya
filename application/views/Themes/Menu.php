<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($this->session->userdata('level_user') == 'admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Masters</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-primary py-2 collapse-inner rounded ">
                    <h6 class="collapse-header">Data:</h6>
                    <a class="collapse-item text-white" href="<?= base_url('user') ?>">User</a>
                    <a class="collapse-item text-white" href="<?= base_url('kriteria') ?>">Kriteria</a>
                    <a class="collapse-item text-white" href="<?= base_url('beasiswa') ?>">Beasiswa</a>
                    <a class="collapse-item text-white" href="<?= base_url('prodi') ?>">Prodi</a>
                    <a class="collapse-item text-white" href="<?= base_url('kuota') ?>">Kuota</a>
                    <a class="collapse-item text-white" href="<?= base_url('mahasiswa') ?>">Mahasiswa</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif; ?>

    <?php if ($this->session->userdata('level_user') == 'admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            SPK
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('perhitungan') ?>">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Perhitungan</span>
            </a>
        </li>

        <?php
        $menuBeasiswa = $this->db->get('tb_beasiswa')->result_array();
        ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Beasiswa:</h6>
                    <?php foreach ($menuBeasiswa as $menuBea) : ?>
                        <a class="collapse-item" href="<?= base_url('laporan/') . $menuBea['id_beasiswa'] ?>"><?= $menuBea['nama_beasiswa'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php endif; ?>


    <?php
    $menuBeasiswa = $this->db->get('tb_beasiswa')->result_array();
    ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHasil" aria-expanded="true" aria-controls="collapseHasil">
            <i class="fas fa-fw fa-folder"></i>
            <span>Hasil</span>
        </a>
        <div id="collapseHasil" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Beasiswa:</h6>
                <?php foreach ($menuBeasiswa as $menuBea) : ?>
                    <a class="collapse-item" href="<?= base_url('laporan/') . $menuBea['id_beasiswa'] ?>"><?= $menuBea['nama_beasiswa'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/') ?>img/logo.png" alt="" style="width: 50px;">
                <div class="sidebar-brand-text mx-3"></div>
            </div>
            <div class="sidebar-brand-text mx-3">Sistem Pendukung Keputusan Uang Kuliah Tunggal</div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_user') ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets') ?>/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('change-password') ?>">
                            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ubah Password
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->