<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>::. SIMIDISKO .::</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <?= $this->renderSection('csspage'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">APP E-Gudang</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#"
                            class="d-block"><?= (user()->username != null) ? strtoupper(user()->username) : 'Administrator'; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-header">MASTER</li>
                        <li class="nav-item">
                            <a href="<?=site_url('kategori/index')?>" class="nav-link">
                                <i class="nav-icon fa fa-tasks"></i>
                                <p class="text">Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('satuan/index')?>" class="nav-link">
                                <i class="nav-icon fa fa-tasks"></i>
                                <p class="text">Satuan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('barang/index')?>" class="nav-link">
                                <i class="nav-icon fa fa-tasks"></i>
                                <p class="text">Barang</p>
                            </a>
                        </li>
                        <li class="nav-header">TRANSAKSI</li>
                        <li class="nav-item">
                            <a href="<?=site_url('barangmasuk/data')?>" class="nav-link">
                                <i class="nav-icon fas fa-warehouse"></i>
                                <p class="text">Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('pinjambarang/index')?>" class="nav-link">
                                <i class="nav-icon fas fa-file-export"></i>
                                <p class="text">Peminjaman Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('kembalibarang/index')?>" class="nav-link">
                                <i class="nav-icon fas fa-file-import"></i>
                                <p class="text">Pengembalian Barang</p>
                            </a>
                        </li>
                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item">
                            <a href="<?=site_url('lpb/index')?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p class="text">Penggunaan Barang</p>
                            </a>
                        </li>
                        <li class="nav-header">SETTING</li>
                        <li class="nav-item">
                            <a href="<?=site_url('barangmasuk/data')?>" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p class="text">Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('barangmasuk/data')?>" class="nav-link">
                                <i class="nav-icon fa fa-user-circle"></i>
                                <p class="text">Group</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('barangmasuk/data')?>" class="nav-link">
                                <i class="nav-icon fa fa-user-secret"></i>
                                <p class="text">Permission</p>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="<?=site_url('logout')?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p class="text">Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                <?= $this->renderSection('judul'); ?>
                            </h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div> -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <?= $this->renderSection('subjudul'); ?>
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->renderSection('isi'); ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2022-<?= date('Y') ?> <a href="https://adminlte.io">Dinas Komunikasi Dan
                    Informatika Provinsi
                    Papua</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url() ?>/dist/js/demo.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <?= $this->renderSection('jspage'); ?>

</body>

</html>