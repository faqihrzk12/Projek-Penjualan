<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../images/logo.jpg">
	<title>Data Petugas</title>


<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>

</head>
<body style="background-color: grey;">
<?php

if(!isset($this->session->userdata['akses'])){
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
			<p><a href="<?php echo base_url('admin/index')?>"><span class="glyphicon glyphicon-user"> Dashboard </span></a></p>
		</li>

		<li >
       		 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      		 <span class="glyphicon glyphicon-user"></span> Master <span class="caret"></span></a>
        	  <ul class="dropdown-menu">
             			  <li><a href="<?php echo base_url('admin/index'); ?>"><span class='glyphicon glyphicon-th-large'> Barang </span></a></li>

               			

              			 <li><a href="<?php echo base_url('admin/pelanggan'); ?>"><span class='glyphicon glyphicon-user'> Pelanggan </span></a> </li> 
              			  <li><a href="<?php echo base_url('admin/user'); ?>"><span class='glyphicon glyphicon-user'> User </span></a> </li> 
         		 </ul>
    	</li>

		
		   <li class="dropdown">
        <a href="<?php echo base_url('admin/lp');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-user"></span> Laporan <span class="caret"></span></a>
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
		<div class="panel-heading"> Daftar Petugas</div>
		<div class="panel-body">
<table class="table">
	<thead>

		<th>No</th>
		<th>Username</th>
      	<th>Password</th>
		<th>Nama</th>

		<!-- <th>
		<button><a href="<?php //echo base_url('admin/tambahpetugas')?>"> <span class="glyphicon glyphicon-plus" ></span> New </a></button>
		</th> -->
	
	</thead>

<?php
$n=0;
foreach ($datauser as $row ) {
	$n++;?>

	<tbody>
		<td><?php echo $n;?></td>
		<td><?php echo $row->username;?></td>
		<td><?php echo $row->password;?></td>
		<td><?php echo $row->nama;?></td>
		<!-- <td><a href="<?php //echo base_url('admin/edituser/').$row->id_user ?>" title='edit'> <span class="glyphicon glyphicon-edit"></span > Edit | </a> 


				<a href="<?php //echo base_url('admin/deleteuser/').$row->id_user ?>" title="delete"
				onclick='return confirm("benar data barang akan dihapus ?");'>  
				<span class="glyphicon glyphicon-remove"></span> Delete</a>
		</td>
 -->

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