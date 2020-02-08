<!DOCTYPE html>
<html lang="en">

<head>
  <?php $vendorDirectory = base_url('/mcvendor/admin/') ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <?php
    if (isset($this->session->pesan)) {
      $message_display=$this->session->pesan;
      $this->session->unset_userdata('pesan');
    }
  ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Rumahku.com</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Penjualan');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

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
          <form  action="<?php echo base_url('penjualan/simpandulu')?>" method="POST" name="formbook" enctype="multipart/form-data">
          <div class="row">

            <div class="col-lg-4">

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Nota</h6>
                </div>
                <div class="card-body">
                  <div class="panel-body">
                  <div class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">No. Nota</label>
                      <div class="col-sm-8">
                        <input type='text' name='nomor_nota' class='form-control input-sm' id='nomor_nota' value="<?php echo $this->session->nota;?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Tanggal</label>
                      <div class="col-sm-8">
                        <input type='date' name='tanggal' class='form-control input-sm' id='tanggal' value="<?php echo $this->session->tanggal?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kasir Id</label>
                      <div class="col-sm-8">
                        <input type='text' name='kasirid' class='form-control input-sm' id='kasirid' value="<?php echo $this->session->userdata('ses_id');?>" readonly>
                      </div>
                    </div>
                  </div>  
                  </div>
                </div>
              </div>

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Pembeli</h6>
                </div>
                <div class="card-body">
                  <div class="panel-body">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-4 control-label"><b>Pembeli</b></label>
                        <div class="col-sm-8">
                        <select name='id_pelanggan' id='id_pelanggan' class='form-control input-sm' style='cursor: pointer;'>
                        <option value=''>-- Umum --</option>
                        <?php
                        if($cmbpelanggan->num_rows() > 0)
                        {
                          foreach($cmbpelanggan->result() as $p)
                          {
                            if ($this->session->id_pelanggan==$p->id_pelanggan) { $x="selected";} else {$x="";};
                            echo "<option value='".$p->id_pelanggan."' ".$x." >".$p->nama_pelanggan."</option>";
                          }
                        }
                        ?>
                          </select>
                          
                              <?php
                          //$p=$this->session->userdata['statusform']['id_pelanggan'];  
                          //$js = 'class="form-control input-sm" id="id_pelanggan" placeholder="tesssss"';
                                //echo form_dropdown('id_pelanggan', $cmbpelanggan, $p,$js);
                                  ?>                  
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4"><b>Alamat</b></div>
                        <div class="col-sm-8">
                          <div id='alamat'><?php echo $this->session->alamat?></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4"><b>Telepon</b></div>
                        <div class="col-sm-8">
                          <div id='telepon'><?php echo $this->session->telepon?></div>
                        </div>
                          
                      </div>
                    </div>  
                    </div>
                </div>
              </div>

              <?php if (isset($message_display)) { ?>
                 <div class="alert alert-danger" role="alert" >
                  <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
                  <h4><B>Pesan :</B></h4> 
                  <?php echo $message_display;?>
                </div>
              <?php }?>
            </div>

            <div class="col-lg-8">
              <h5>
            <i class='glyphicon glyphicon-shopping-cart'></i> Penjualan > Transaksi
          </h5>
          
          <table class='table table-bordered' id='TabelTransaksi'>
            <thead>
              <tr class="info">
                <th style='width:35px;'>No</th>
                <th style='width:210px;'>Kode Barang</th>
                <th>Nama Barang</th>
                <th style='width:120px;text-align: right;'>Harga Satuan</th>
                <th style='width:75px;'>Qty</th>
                <th style='width:125px;text-align: right;'>Sub Total</th>
                <th style='width:40px;'></th>
              </tr>
            </thead>
            <?php
              $nomor = 0;
              $total = 0;
              //----tampilkan data detil yang sebelumnya
                if (count($datadetil)>0) {
              $nomor=0;
              foreach ($datadetil as $row) {
                $nomor++; $total=$total+$row->total;
            ?>
            <tbody>
              <tr>
                <td><?php echo $nomor?>
                  <input type='hidden' name="id_detil" value="<?php echo $row->id_detil;?>">
                </td>
                <td><?php echo $row->kode_barang;?></td>
                <td><?php echo $row->nama_barang;?></td>
                <td style="text-align: right;"><span><?php echo number_format($row->harga_satuan,0);?></span></td>
                <td><span><?php echo $row->jumlah_beli;?></span></td>
                <td style="text-align:right">
                  <input type='hidden' name="subtotal" value="<?php echo $row->total;?>"> 
                  <span><?php echo number_format($row->total,0);?></span>
                </td>
                <td >
                  <a href="javascript:;" data-id="<?php echo $row->id_detil?>" data-toggle="modal"  data-target="#modal-konfirmasi" class="btn btn-danger btn-xs" title="Hapus">X</a>
                </td>
              </tr>
            </tbody>  
            <?php }

              }
              $nomor++;
            ?>
            <!--untuk input penjualan-->
            <tbody>
              <tr>
                <td ><?php echo $nomor?></td>
                <td >
                  <select name='kode_barang' id='kode_barang' class='form-control input-sm' style='cursor: pointer;'>
                  <option value=''>-- Pilih Kode Barang--</option>
                  <?php
                  if($cmbkodebrg->num_rows() > 0)
                  {
                    foreach($cmbkodebrg->result() as $p)
                    {
                      echo "<option value='".$p->kode_barang."'>".$p->kode_barang."</option>";
                    }
                  }
                  ?>
                  </select>

                </td>
                <td>
                  <div id='nama_barang'></div>

                </td>
                <td style="text-align: right;">
                  <input type='hidden' name="harga_barang">
                  <span></span>
                </td>
                <td>
                  <input type='text' name='jumlah_beli' class='form-control input-sm' id='jumlah_beli' onkeypress='return check_int(event)'>
                </td>
                <td style="text-align:right">
                  <input type='hidden' name="subtotal">
                  <span></span>
                </td>
                <td >
                  <button type="submit" class="btn btn-success btn-xs" title="Tambah" >+</button>
                </td>
              
            </tbody>
          </table>

          <div class='alert alert-info' style="text-align: right">
          <div class=" pull-left">  
            <button type='button' class='btn btn-primary' id='batal'><span class="glyphicon glyphicon-remove"></span> Transaksi Batal</button>  

            <button type='button' class='btn btn-primary' id='baru'><span class="glyphicon glyphicon-edit"></span> Transaksi Baru</button>
              
              <button type='button' class='btn btn-primary' id='cetak'><span class="glyphicon glyphicon-print"></span> Cetak Transaksi</button> 
          </div>  
            <h2 style="margin-top: 0px;margin-bottom: 0px">Total : <span id='TotalBayar'>Rp. <?php echo number_format($total,0);?></span></h2>
            <input type="hidden" id='TotalBayarHidden' name="totalbayar" value="<?php echo $total;?>" >
          
          </div>
          <div class='row'>
            <div class='col-sm-7'>
              <textarea name='catatan' id='catatan' class='form-control' rows='2' placeholder="Catatan Transaksi (Jika Ada)" style='resize: vertical; width:83%;'></textarea>
              <br />
               
            </div>
            <div class='col-sm-5'>
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-6 control-label">Bayar</label>
                  <div class="col-sm-6">
                    <input type='text' name='cash' id='UangCash' class='form-control' style='width:200%;' onkeypress='return check_int(event)'>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Kembali</label>
                  <div class="col-sm-6">
                    <input type='text' id='UangKembali' class='form-control' style='width:200%;' disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label"></label>
                  <div class="col-sm-6">
                  <button type='submit' class='btn btn-primary' title="Simpan"><span class="glyphicon glyphicon-log-in"></span> Bayar </button>
                </div>

              </div>
                <div class='row'>
                
                </div>
              </div>
            </div>
          </div>

          <br />
            </div>

        </div>
      </form>
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
        "lengthChange": false,
        "paging": false,
        "searching": false,
        "bInfo": false
      } );
  </script>
  <script>

$(document).ready(function(){
  
  $('#id_pelanggan').change(function(){
    if($(this).val() !== '')
      {
      $.ajax({
        url: "<?php echo base_url('penjualan/ajax_pelanggan'); ?>",
        type: "POST",
        data: "id_pelanggan="+$(this).val(),
        dataType:'json',
        success: function(json){
          $('#alamat').html(json.alamat);
          $('#telepon').html(json.telepon);
        }
      });
    }
    else
    {
      $('#alamat').html('<i>Tidak Ada</i>');
      $('#telepon').html('<i>Tidak Ada</i>');     
    } 
  });


  $('#kode_barang').change(function(){
    if($(this).val() !== '')
    {
      var Indexnya = $(this).parent().parent().index(); 
        $.ajax({
        url: "<?php echo base_url('penjualan/ajax_kodebarang'); ?>",
        type: "POST",
        data: "kode_barang="+$(this).val(),
        dataType:'json',
        success: function(json){
          $('#nama_barang').html(json.nama_barang);
          $('#harga_barang').html(json.harga_barang);
          Indexnya=json.jumlah_item;
          
          $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val(json.harga_barang);
          $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(to_rupiah(json.harga_barang));
          $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').val(1);
          $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(json.harga_barang);
          $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(json.harga_barang));     

          $('#TabelTransaksi tbody tr').each(function(){
            $(this).find('td:nth-child(5) input').focus();
          });

          HitungTotalBayar();
        }
      });
    }
    });


//batas document  
})  

// modal untuk transaksi baru
$('#baru').click(function(){
//  $('.modal-dialog').removeClass('modal-lg');
//  $('.modal-dialog').add('modal-sm');
  $('#ModalHeader').html('Konfirmasi');
  $('#ModalContent').html("Apakah yakin akan membuat transaksi baru ?");
  $('#ModalFooter').html("<button type='button' id='TransaksiBaru' class='btn btn-primary'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal' autofocus>Batal</button>");
  $('#ModalGue').modal('show');
});
// kode untuk aksi dai transaksi baru
$(document).on('click','#TransaksiBaru',function(){
    $('#ModalGue').modal('hide');
    window.open("<?php echo base_url('penjualan/transaksibaru')?>",'_self');
});

// modal batalkan transaksi 
$('#batal').click(function(){
//  $('.modal-dialog').removeClass('modal-lg');
  $('.modal-dialog').add('modal-sm');
  $('#ModalHeader').html('Konfirmasi');
  $('#ModalContent').html("Apakah yakin akan dibatalkan ?");
  $('#ModalFooter').html("<button type='button' id='TransaksiBatal' class='btn btn-primary'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal' >Batal</button>");
  $('#ModalGue').modal('show');
});

// kode untuk aksi dai transaksi baru
$(document).on('click','#TransaksiBatal',function(){
    $('#ModalGue').modal('hide');
    window.open("<?php echo base_url('penjualan/transaksibatal')?>",'_self');
});

// modal cetak transaksi 
$('#cetak').click(function(){
  
if($('#TotalBayarHidden').val() >0) {
  $('#ModalHeader').html('Konfirmasi');
  $('#ModalContent').html("Apakah yakin data akan dicetak ?");
  $('#ModalFooter').html("<button type='button' id='CetakTransaksi' class='btn btn-primary'>Ya, saya yakin</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
  $('#ModalGue').modal('show');
} else {
  $('#ModalHeader').html('Konfirmasi');
  $('#ModalContent').html("Belum ada transaksi");
  $('#ModalFooter').html("<button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
  $('#ModalGue').modal('show');
};
});


$(document).ready(function(){
 
$('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
 
// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')
 
var modal = $(this)
// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","penjualan/delete_detil/"+id);
})
 
});


// kode untuk aksi dari cetak transaksi 
$(document).on('click','#CetakTransaksi',function(){
    $('#ModalGue').modal('hide');
    window.open("<?php echo base_url('penjualan/cetak_transaksi')?>",'_blank');
});

// kode untuk aksi dari transaksi baru
$(document).on('click','#hapus_detil',function(){
    $('#ModalGue').modal('hide');
    window.open("<?php echo base_url('penjualan/transaksibatal')?>",'_self');
});


$(document).on('keyup', '#jumlah_beli', function(){
  //var Indexnya = $(this).parent().parent().index();
  var Indexnya = $('#TabelTransaksi tbody tr').length-1;
  var Harga = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val();
  var JumlahBeli = $(this).val();
  if (JumlahBeli=='') {JumlahBeli=0};
  
  var Subtotal= parseInt(Harga) * parseInt(JumlahBeli);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(Subtotal);
  $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html(to_rupiah(Subtotal));

  HitungTotalBayar();
    
});

$(document).on('keyup', '#UangCash', function(){
  HitungTotalKembalian();
});


function HitungTotalBayar()
{
  var Total = 0;
  $('#TabelTransaksi tbody tr').each(function(){
    if($(this).find('td:nth-child(6) input').val() > 0)
    {
      var SubTotal = $(this).find('td:nth-child(6) input').val();
      Total = parseInt(Total) + parseInt(SubTotal);
    }
  });

  $('#TotalBayar').html('Rp. '+to_rupiah(Total));
  $('#TotalBayarHidden').val(Total);

  $('#UangCash').val('');
  $('#UangKembali').val('');
}


function HitungTotalKembalian()
{
  var Cash = $('#UangCash').val();
  var TotalBayar = $('#TotalBayarHidden').val();

  if(parseInt(Cash) >= parseInt(TotalBayar)){
    var Selisih = parseInt(Cash) - parseInt(TotalBayar);
    $('#UangKembali').val(to_rupiah(Selisih));
  } else {
    $('#UangKembali').val('');
  }
}

function to_rupiah(angka){
    var rev     = parseInt(angka, 0).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}

function check_int(evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
  return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}

</script>
<div class="modal" id="ModalGue" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='glyphicon glyphicon-remove'></i></button>
            <h4 class="modal-title" id="ModalHeader"></h4>
          </div>
          <div class="modal-body btn-danger" id="ModalContent"></div>
          <div class="modal-footer" id="ModalFooter"></div>
        </div>
      </div>
    </div>


<!-- modal konfirmasi class="modal fade"-->
    <div id="modal-konfirmasi" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body btn-info">
          Apakah Anda yakin ingin menghapus data ini ?
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
         
        </div>
      </div>
    </div>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

 
</script>  

</body>

</html>
