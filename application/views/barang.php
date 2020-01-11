<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../images/logo1.jpg">
	<title>Rumahku.com</title>


<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
  <link href="_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>

</head>
<body style="background-color:gray;">

<?php

if(!isset($this->session->userdata['masuk'])){
	redirect(base_url('sigin/index'));
}

$this->load->view('admin/nav_admin');
?>
<div class="container">
<div class="panel panel-default">
<div class='panel-body'>
<!--ini kolom 1 -->
	

<div class="col-sm-2">
		<div class="panel panel-primary">
		<div class="panel-heading"> Menu </div>
		<div class="panel-body">

		<ul class="nav navbar-nav">
		<li>
			<p><a href="<?php echo base_url('admin/index')?>"><span class="glyphicon glyphicon-home"> Dashboard </span></a></p>
		</li>

		<li >
       		 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      		 <span class="glyphicon glyphicon-th-list"></span> Master <span class="caret"></span></a>
        	  <ul class="dropdown-menu">
             			  <li><a href="<?php echo base_url('admin/index'); ?>"><span class='glyphicon glyphicon-briefcase'> Barang </span></a></li>

               			

              			 <li><a href="<?php echo base_url('admin/pelanggan'); ?>"><span class='glyphicon glyphicon-user'> Pembeli </span></a> </li> 
              			  <li><a href="<?php echo base_url('admin/user'); ?>"><span class='glyphicon glyphicon-user'> User </span></a> </li> 
         		 </ul>
    	</li>

		
		   <li class="dropdown">
        <a href="<?php echo base_url('admin/lp');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-th-list"></span> Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu">
               <li><a href="<?php echo base_url('Penjualan/lp'); ?>"><span class="glyphicon glyphicon-refresh"> Data Transaksi Pertanggal</a></li>
                   <li><a href="<?php echo base_url('Penjualan/lpbr'); ?>"><span class="glyphicon glyphicon-refresh"> Data Transaksi PerBarang</a></li>
          </ul>
    </li>
      

		   

		</div>
		</div>

</div>

<!--ini kolom 2 -->
	
	<div class="col-sm-10">
		<div class="panel panel-primary">
		<div class="panel-heading">Daftar Barang</div>
		<div class="panel-body">
<table class="table">
	<thead>

		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Harga Barang</th>
		<th>Stok Barang</th>

		<th> <button> <a href="<?php echo base_url('admin/tambahbarang')?>"> <span class="glyphicon glyphicon-plus" ></span> New </a></th></button>
	
	</thead>

<?php
$n=0;
foreach ($databarang as $row ) {
	$n++;?>

	<tbody>
		<td><?php echo $n;?></td>
		<td><?php echo $row->kode_barang;?></td>
		<td><?php echo $row->nama_barang;?></td>
		<td><?php echo $row->harga;?></td>
		<td><?php echo $row->total_stock;?></td>
		<td><a href="<?php echo base_url('admin/editbarang/').$row->kode_barang ?>" title='edit'> <span class="glyphicon glyphicon-edit"></span > Edit | </a> 


				<a href="<?php echo base_url('admin/deletebarang/').$row->kode_barang
				 ?>" title="delete"
				onclick='return confirm("benar data barang akan dihapus ?");'>  
				<span class="glyphicon glyphicon-remove"></span> Delete</a>
		</td>


	</tbody>
<?php } ?>
</table>

<?php
echo $this->pagination->create_links();
?>
</div>
</div>
</div>
</div>
</div>
</div>



</body>
</html>