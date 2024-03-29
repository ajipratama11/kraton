<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <?php
  $uri = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->uri->segment(1);
  $pageTitle = ucwords(str_replace("_", " ", $uri));
  ?>
  <title><?php echo $pageTitle . " - " . $pageInfo ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() . "assets/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() . "assets/" ?>css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/select2-develop/dist/css/select2.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/sweetalert-master/dist/sweetalert.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>css/custom.css" rel="stylesheet" />
  <script src="<?php echo base_url() . "assets/" ?>vendor/jquery/jquery.min.js"></script>
</head>

<body id="page-top">
  <span id="baseUrl" data-url="<?php echo base_url() ?>"></span>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <div class="left-sidebar">
      <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
          <div class="sidebar-brand-icon">
            <i class="fas fa-desktop"></i>
          </div>
          <div class="sidebar-brand-text mx-3">E-Kasir <sup><small> BUMDesa RAMAI JAYA</small></sup></div>
        </a>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url() . 'dashboard' ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
          Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() . 'pembelian' ?>">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Pembelian Barang</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() . 'transaksi/penjualan' ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Penjualan Barang</span></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() . 'transaksi/kas' ?>">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Kas</span></a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cube"></i>
            <span>Data Barang</span>
          </a>
          <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url('Pages/table_barang'); ?>">Master Barang</a>
              <a class="collapse-item" href="<?= base_url('Pages/table_kategori'); ?>">Kategori Barang</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
          </a>
          <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url('Laporan/laporanpembelian'); ?>">Laporan Pembelian</a>
              <a class="collapse-item" href="<?= base_url('Laporan/laporanpenjualan'); ?>">Laporan Penjualan</a>
              <a class="collapse-item" href="<?php echo base_url() . 'Laporan/laporanbukubesar' ?>">Buku Besar</a>
              <a class="collapse-item" href="<?php echo base_url() . 'Laporan/laporanlabarugi' ?>">Laba Rugi</a>
            </div>
          </div>
        <!-- </li>
        <?php if ($this->session->userdata('level') == 'admin') { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Pages/table_akun'); ?>">
              <i class="fas fa-fw fa-users"></i>
              <span>Akun</span></a>
          </li> -->
        <?php } ?>


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
    </div>
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

            <!-- Nav Item - Alerts -->

            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata("username"); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url() . "assets/img/default.png" ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">



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
        <div class="container-fluid common-container">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="h4 mb-0 solid-color font-weight-bold">
              <span class="fa <?php echo $this->icon ?> info-icon-page"></span>
              <?php
              echo ucwords(str_replace("_", " ", $this->uri->segment(1)));
              ?>
            </div>
            <div class="float-right info-text-page">
              <a href="#"> <?php echo $pageTitle ?></a>
              <span class="ml-2 mr-2">/</span>
              <a href="#"> <?php echo $pageInfo ?></a>
            </div>
          </div>
          <div class="row pb-5">
            <div class="col-md-12">
              <?php echo $contents; ?>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Kasir Desa Kraton</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="<?php echo base_url() . "index.php/login/logout" ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="place-modal"></div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() . "assets/" ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() . "assets/" ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() . "assets/" ?>js/sb-admin-2.min.js"></script>
  <script src="<?php echo base_url() . "assets/" ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() . "assets/" ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() . "assets/" ?>vendor/select2-develop/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url() . "assets/" ?>vendor/sweetalert-master/dist/sweetalert-dev.js"></script>
  <script src="<?php echo base_url() . "assets/" ?>vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url() . "assets/" ?>js/custom.js"></script>
</body>

</html>
