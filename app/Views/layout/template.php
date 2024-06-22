<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oleo+Script&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-default sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon">
                    <h5 class="sidebar-brand-text mx-1">SPP</h5>
                    <sup><i class="fas fa-comment-dollar" aria-hidden="true"></i></sup>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if (session()->get('level') == 'admin') : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/dashboard">
                        <div class="fas fa-fw fa-tachometer-alt mr-1 ml-1"></div>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data
                </div>

                <!-- Nav Item - Siswa -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/siswa">
                        <div class="fas fa-fw fa-graduation-cap mr-1 ml-1"></div>
                        <span>Data Siswa</span>
                    </a>
                </li>

                <!-- Nav Item - Petugas -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/petugas">
                        <div class="fas fa-fw fa-users mr-1 ml-1"></div>
                        <span>Data Petugas</span>
                    </a>
                </li>

                <!-- Nav Item - Kelas -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/kelas">
                        <div class="fas fa-fw fa-university mr-1 ml-1"></div>
                        <span>Data Kelas</span>
                    </a>
                </li>

                <!-- Nav Item - SPP -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/spp">
                        <div class="fas fa-fw fa-money-bill-alt mr-1 ml-1"></div>
                        <span>Data SPP</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Transaksi
                </div>

                <!-- Nav Item - Transaksi -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/transaksi">
                        <div class="fas fa-fw fa-paper-plane mr-1 ml-1"></div>
                        <span>Transaksi</span>
                    </a>
                </li>

                <!-- Nav Item - History Pembayaran -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/history">
                        <div class="fas fa-fw fa-history mr-1 ml-1"></div>
                        <span>History Pembayaran</span>
                    </a>
                </li>

                <!-- Nav Item - Generate Laporan -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/laporan">
                        <div class="fas fa-fw fa-print mr-1 ml-1"></div>
                        <span>Generate Laporan</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('level') == 'petugas') : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/dashboard">
                        <div class="fas fa-fw fa-tachometer-alt mr-1 ml-1"></div>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Transaksi
                </div>

                <!-- Nav Item - Transaksi -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/transaksi">
                        <div class="fas fa-fw fa-paper-plane mr-1 ml-1"></div>
                        <span>Transaksi</span>
                    </a>
                </li>

                <!-- Nav Item - History Pembayaran -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/history">
                        <div class="fas fa-fw fa-history mr-1 ml-1"></div>
                        <span>History Pembayaran</span>
                    </a>
                </li>

                <!-- Nav Item - Generate Laporan -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/laporan">
                        <div class="fas fa-fw fa-print mr-1 ml-1"></div>
                        <span>Generate Laporan</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session()->get('level') == 'siswa') : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    History
                </div>

                <!-- Nav Item - History Pembayaran -->
                <li class="nav-item">
                    <a class="nav-link text-sidebar" href="/history">
                        <div class="fas fa-fw fa-history mr-1 ml-1"></div>
                        <span>History Pembayaran</span>
                    </a>
                </li>
            <?php endif; ?>


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
                        <div class="fa fa-bars"></div>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama_petugas'); ?></span>
                                <img class="img-profile rounded-circle" src="/img/petugas/<?= session()->get('foto'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?= $this->renderSection('content'); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; <?= date('Y'); ?> · M.Ilham Ushuluddin · All rights reserved</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Terima Kasih, <br> sudah menggunakan aplikasi dengan baik babayyy....</div>
                <div class="modal-footer">
                    <button class="btn btn-cancel" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-default" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Sweet Alert 2 -->
    <script src="/vendor/sweetalert/dist/sweetalert2.all.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- My Javascript -->
    <script src="/js/script.js"></script>

</body>

</html>