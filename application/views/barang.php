<!DOCTYPE html>
<html lang="en">

<head>
  <?php $vendorDirectory = base_url('/mcvendor/admin/') ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" type="image/png" href="../images/logo1.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rumahku.com</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $vendorDirectory?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $vendorDirectory?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo $vendorDirectory?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="sidebar-brand-icon">
          <img src="../images/logo1.jpg" style="width:100%;height:100%;">
        </div>
        <div class="sidebar-brand-text mx-3">Rumahku.com</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/index'); ?>">Barang</a>
            <a class="collapse-item" href="<?php echo base_url('admin/pelanggan'); ?>">Pembeli</a>
            <a class="collapse-item" href="<?php echo base_url('admin/user'); ?>">User</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('Penjualan/lp'); ?>">Data Transaksi per Tanggal</a>
            <a class="collapse-item" href="<?php echo base_url('Penjualan/lpbr'); ?>">Data Transaksi per Barang</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('ses_nama');?></span>
                <img class="img-profile rounded-circle" src="<?php echo $vendorDirectory?>/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('sigin/logout')?>" data-toggle="modal" data-target="#logoutModal">
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
          <?php 
            if ($this->session->flashdata('insert') == true) {
          ?>
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card bg-success text-white shadow">
                <span style="text-align: right;padding-right: 8px;">
                  <button onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </span>
                <div class="card-body" style="padding-top: 0px;">
                  Data berhasil ditambah
                  <div class="text-white-50 small"></div>
                </div>
              </div>
            </div>
          </div>
          <?php
            } 
            if ($this->session->flashdata('update') == true) {
          ?>
            <div class="row">
              <div class="col-lg-12 mb-4">
                <div class="card bg-primary text-white shadow">
                  <span style="text-align: right;padding-right: 8px;">
                    <button onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' type="button" class="close" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </span>
                  <div class="card-body" style="padding-top: 0px;">
                    Data berhasil diupdate
                    <div class="text-white-50 small"></div>
                  </div>
                </div>
              </div>
            </div>
          <?php
            }
            if ($this->session->flashdata('delete') == true) {
          ?>
              <div class="row">
                <div class="col-lg-12 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <span style="text-align: right;padding-right: 8px;">
                      <button onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </span>
                    <div class="card-body" style="padding-top: 0px;">
                      Data berhasil dihapus
                      <div class="text-white-50 small"></div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>Stok Barang</th>
                      <th><button> <a href="<?php echo base_url('admin/tambahbarang')?>"> <span class="glyphicon glyphicon-plus" ></span> <b>+</b> New </a></button></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $n=0;
                  foreach ($data as $row ) {
                    $n++;?>
                      <tr>
                      <td><?php echo $n;?></td>
                      <td><?php echo $row->kode_barang;?></td>
                      <td><?php echo $row->nama_barang;?></td>
                      <td><?php echo $row->harga;?></td>
                      <td><?php echo $row->total_stock;?></td>
                      <td><a href="<?php echo base_url('admin/editbarang/').$row->kode_barang ?>" class="btn btn-info" title='edit'> <i class="fas fa-edit"></i> Edit </a> 

                          <a class="btn btn-danger" href="<?php echo base_url('admin/deletebarang/').$row->kode_barang
                           ?>" title="delete"
                          onclick='return confirm("benar data barang akan dihapus ?");'>  
                          <i class="fas fa-trash"></i> Delete</a>
                      </td>
                      </tr>

                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Rumahku.com 2020</span>
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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('sigin/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo $vendorDirectory?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $vendorDirectory?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo $vendorDirectory?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo $vendorDirectory?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo $vendorDirectory?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo $vendorDirectory?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo $vendorDirectory?>js/demo/datatables-demo.js"></script>
  <script>
    $('#dataTable').dataTable( {
      } );
  </script>

</body>

</html>
