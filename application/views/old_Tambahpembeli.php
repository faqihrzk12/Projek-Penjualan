<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../images/logo.jpg">
	<title>Tambah Data Pembeli</title>

<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>

</head>
<body style="background-color: gray">

<?php

if(!isset($this->session->userdata['akses'])){
	redirect(base_url('sigin/index'));
}

$this->load->view('admin/nav_admin');
?>
<div class="container">
<div class="panel panel-default">
<div class='panel-body'>

<div class="col-sm-8">

		<div class="panel panel-primary">
		<div class="panel-heading"> Tambah Pembeli</div>
		<div class="panel-body">


		    	<?php if (isset($pesan)) {?>

				<div class='alert alert-danger' role='alert'>
					<button type="button" class="close" data-dismiss='alert'>x</button>
					<h4>peringatan</h4>

					<?php echo $pesan;?>
				</div> 
				
				<?php } ?>



			

				<form class="form-horizontal" action="<?php echo base_url('admin/savepembeli')?>" method="post" name="form">
					<div class="form-group">
						<label class="col-sm-2 control-label" > Kode </label>
						<div class="col-sm-4">
							<input type="text" name="kode" class="form-control" placeholder="Kode">
						</div>
					</div>

					<div class="form-group">	
						<label class="col-sm-2 control-label" > Nama Pembeli </label>
						<div class="col-sm-4">
							<input type="text" name="nama" class="form-control" placeholder="Nama Pembeli">
						</div>
					</div>
					
					<div class="form-group">	
						<label class="col-sm-2 control-label" > Alamat </label>
						<div class="col-sm-4">
							<input type="text" name="alamat" class="form-control" placeholder="Alamat">
						</div>
					</div>


					<div class="form-group">	
						<label class="col-sm-2 control-label" > No.Telepon </label>
						<div class="col-sm-4">
							<input type="number" name="telpon" class="form-control" placeholder="No.Telepon">
						</div>
					</div>


					

					<div class="form-group">	
					<div class="col-sm-4 control-label">
						 <label class="col-sm-2 control-label" ></label>
					 	 <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"> Simpan </span></button>	
					</div>
					  <a href="../index.php" class="btn btn-secondary btn-sm float-right"><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
					</div>
				</form>

</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>