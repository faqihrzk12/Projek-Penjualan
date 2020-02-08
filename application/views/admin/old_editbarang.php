<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../images/logo.jpg">
	<title>Edit Data Barang</title>

<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>


</head>
<body style="background-color: gray;">


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

		<div class="panel panel-info">
		<div class="panel-heading"> Edit Barang </div>
		<div class="panel-body">

				<form class="form-horizontal" action="<?php echo base_url('admin/updatebarang')?>" method="post" name="form">
					<div class="form-group">
						<label class="col-sm-2 control-label" > Kode </label>
						<div class="col-sm-4">
							<input type="text" name="kode" class="form-control" placeholder="Kode"
							value="<?php echo $databarang->kode_barang;?>">
						</div>
					</div>

					<div class="form-group">	
						<label class="col-sm-2 control-label" >Nama barang </label>
						<div class="col-sm-4">
							<input type="text" name="nama" class="form-control" placeholder="Nama Barang" value="<?php echo $databarang->nama_barang;?>">
						</div>
					</div>
					
					<div class="form-group">	
						<label class="col-sm-2 control-label" > Harga </label>
						<div class="col-sm-4">
							<input type="number" name="harga" class="form-control" placeholder="Harga"
							value="<?php echo $databarang->harga;?>">
						</div>
					</div>


					<div class="form-group">	
						<label class="col-sm-2 control-label" > Stok </label>
						<div class="col-sm-4">
							<input type="number" name="stok" class="form-control" placeholder="Stok"
							value="<?php echo $databarang->total_stock;?>">
						</div>
					</div>


					<div class="form-group">	
						<label class="col-sm-2 control-label" > Merk </label>
						<div class="col-sm-4">
						
						<input value='<?php echo "$databarang->id_merk";?>' name='merk' type='text'> 						
							
						</div>
					</div>



					<div class="form-group">	
					<div class="col-sm-4 control-label">
						 <label class="col-sm-2 control-label" ></label>
					 	 <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"> Simpan </span></button>	
					</div>
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