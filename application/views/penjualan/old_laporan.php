<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="../images/logo1.jpg">
	<title>Rumahku.com</title>


<meta http-equiv="Content-Language" content="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.css')?>">
<link rel="stylesheet" href="<?php echo base_url('bootstrap-3-3-7/css/bootstrap.min.css')?>">
<script src="<?php echo base_url('bootstrap-3-3-7/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('bootstrap-3-3-7/js/bootstrap.min.js')?>"></script>

</head>

<body>
<?php $this->load->view('admin/nav_kasir') ;

$nomor=0;

if (isset($this->session->pesan)) {
	$message_display=$this->session->pesan;
	$this->session->unset_userdata('pesan');
}
?>
	


	<div class='container-fluid' >


      <div class='panel panel-default'>
      	 <div class="panel-body">


      	<div class="col-sm-3"><!--kolom 1 -->


         
          
          <div class="panel panel-primary"><!--panel 1 -->
          	 <div class='panel-heading'> <span class="glyphicon glyphicon-print"></span> Informasi Laporan</div>
          	 	<div class="panel-body">
          	 		<form action="<?php echo base_url('penjualan/preview_laporan')?>" method="POST" name="formbook" enctype="multypart/form-data">
          	 			<div class="form-horizontal">
					
								<div class="form-group">
										<label class="col-sm-4 control-label"> Dari Tanggal </label>
										<div class="col-sm-8">
										<input type="date" name="tglawal" class="form-control" 	placeholder="dari tanggal"
										value=<?php echo date('Y-m-d')?>>
									</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label"> Sampai Tanggal </label>
										<div class="col-sm-8">
										<input type="date" name="tglakhir" class="form-control" 	placeholder="sampai tanggal" >
									</div>
								</div>

                 

								<div class="form-group col-sm-4">
								<button type="submit" class=" btn btn-danger" > Preview </button>
								</div>
					   </div>
					 </form>
          	 </div>
      	   
     	    </div>
          </div>
           
     	
     						<!--alert peringatan -->

 							<?php if (isset($message_display)) { ?>
								 <div class="alert alert-danger" role="alert" >
									<button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
									<h4><B>Pesan :</B></h4> 
									<?php echo $message_display;?>
								</div>
						 	<?php }?>
				
				<!--kolom 2 -->
      	<div class="col-sm-9">

<?php
      		if ($this->session->muncul==TRUE){
?>
<div class="panel panel-primary">

      	<div class="panel panel-heading">	<h5><i class="glyphicon glyphicon-shopping-cart"></i> Laporan Transaksi Dari <?php echo $tglawal;?> Sampai Tanggal <?php echo $tglakhir;?></h5></div>
      	<div class="panel panel-body">
      				
      				<table class="table">
      				<thead>
      					<tr class="info">
      						<th style="width:35px">#</th>
      						 <th style="width:200px">Tanggal</th>

      						<th style="width:210px">Kode Barang</th>
      						<th>Nama Barang</th>
      						<th style="width: 120px;text-align: left;">Harga Satuan</th>
      						<th style="width: 75px">Qty</th>
      						<th style="width: 125px;text-align: left;" > Total</th>
      						
      					</tr>
      				</thead>

      				<?php 

      				$n=0;$ttotal=0;$tqty=0;
      				foreach ($laporan as $row) {
      					$n++;$ttotal=$ttotal+$row->total;
      					$tqty=$tqty+$row->jumlah_beli;
      				


      				?>
      				<tbody>
      					<tr>
      						<td><?php echo $n;?>
      							
      						</td>
      						
      						<td>
      								<?php echo $row->tanggal;?>

      						</td>
      						<td>
      							    	<?php echo $row->kode_barang;?>

      						
      						</td>
      						<td>
      										<?php echo $row->nama_barang;?>

      						</td>
      						<td>
      							      		<?php echo $row->harga_satuan;?>

      						</td>
      						<td>
      							      	<?php echo $row->jumlah_beli;?>

      						</td>
      						<td>
      							
      							      	<?php echo number_format($row->total,0);?>

      						</td>
      						
      					</tr>

      				</tbody>
      				<?php } ?>
      				<tbody>
      					<tr>
      						<td>
      							
      						</td>
      						<td>
      							
      						</td>
      						<td>
      							
      						</td>
      						<td>
      							
      						</td>
      						<td>
      							
      						</td>
      						<td>
     								<?php echo $tqty;?>

      						</td>
      						<td>
      								<?php echo number_format($ttotal,0);?>

      						</td>
      					</tr>
      				</tbody>
      		
      		</table>
      	</div>
      	</div>
      				  <div class='col-sm-2'>
      				  	<a class="btn btn-danger btn-block" href="<?php echo base_url('penjualan/cetak')?>" role='button' data-toggle='tooltip'><span class="glyphicon glyphicon-print "></span> Print Pdf</a>
      				  	
      					<?php }?>
   
    			
   
   
      	</div>
		
	
	</div>
	</div>






</body>
</html>